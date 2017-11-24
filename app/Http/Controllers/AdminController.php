<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Mail;
use App\Lookup;
use Image;
use Auth;
use File;
use Carbon\Carbon;
use djchen\OAuth2\Client\Provider\Fitbit;

function cleanUrl($string) {
  $string = strtolower($string);
  //Make alphanumeric (removes all other characters)
  $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
  //Clean up multiple dashes or whitespaces
  $string = preg_replace("/[\s-]+/", " ", $string);
  //Convert whitespaces and underscore to dash
  $string = preg_replace("/[\s_]/", "-", $string);
  return $string;
}

class AdminController extends Controller
{
    public function index() {
      $mails = Mail::get();
      $fitbit = Lookup::where('category', 'fitbit_data')->orderBy('date_posted', 'desc')->take(7)->get();
      $hourSlept = 0.0;
      $countDays = 0;
      foreach($fitbit as $data) {
        if((int)$data->other_1 != 0) {
            $hourSlept += ((int)$data->other_1)/60.0;
            $countDays++;
        }
      }
      $hourSlept = round($hourSlept/$countDays, 2);
      return view('admin/index', ['mails' => $mails, 'hoursSlept' => $hourSlept]);
    }
    public function newPost()
    {
      $tags = Lookup::distinct()->where('category', 'tag')->orWhere('category', 'ptag')->orWhere('category', 'sort')->get();
      return view('admin/blog', ['tags' => $tags]);
    }

    public function getFitbitData(Request $request2) {
      $provider = new Fitbit([
        'clientId'          => env('FITBIT_CLIENT'),
        'clientSecret'      => env('FITBIT_SECRET'),
        'redirectUri'       => 'http://kcunanan.com/fitbit'
      ]);
      $fitbit = Lookup::where('category', 'fitbit_access_refresh')->first();
      $newAccessToken = $provider->getAccessToken('refresh_token', ['refresh_token' => $fitbit->other_2]);
      // other_1 = accessToken
      // other_2 = refreshToken
      $fitbit->other_1 = $newAccessToken->getToken();
      $fitbit->other_2 = $newAccessToken->getRefreshToken();
      $fitbit->save();
      $accessToken = $newAccessToken->getToken();
      $request = $provider->getAuthenticatedRequest(
          Fitbit::METHOD_GET,
          Fitbit::BASE_FITBIT_API_URL . '/1/user/-/sleep/date/today.json',
          $accessToken,
          ['headers' => [Fitbit::HEADER_ACCEPT_LANG => 'en_US'], [Fitbit::HEADER_ACCEPT_LOCALE => 'en_US']]
          // Fitbit uses the Accept-Language for setting the unit system used
          // and setting Accept-Locale will return a translated response if available.
          // https://dev.fitbit.com/docs/basics/#localization
      );
      $response = $provider->getResponse($request)['sleep'];
      $request = $provider->getAuthenticatedRequest(
          Fitbit::METHOD_GET,
          Fitbit::BASE_FITBIT_API_URL . '/1/user/-/activities/date/today.json',
          $accessToken,
          ['headers' => [Fitbit::HEADER_ACCEPT_LANG => 'en_US'], [Fitbit::HEADER_ACCEPT_LOCALE => 'en_US']]
          // Fitbit uses the Accept-Language for setting the unit system used
          // and setting Accept-Locale will return a translated response if available.
          // https://dev.fitbit.com/docs/basics/#localization
      );
      $response2 = $provider->getResponse($request);
      $data = $response2['summary'];
      if(Lookup::where('date_posted', Carbon::today())->exists()) {
        $entry = Lookup::where('date_posted', Carbon::today())->first();
        $entry->blog_views = $data['steps'];
        $entry->blog_shares = $data['floors'];
        if (count($response) > 0) {
            $entry->other_1 = $response[0]['minutesAsleep'];
            $entry->date_posted = $response[0]['dateOfSleep'];
        }
        $entry->save();
      }
      else {
        $entry = new Lookup;
        $entry->category = 'fitbit_data';
        $entry->blog_views = $data['steps'];
        $entry->blog_shares = $data['floors'];
        if (count($response) > 0) {
            $entry->other_1 = $response[0]['minutesAsleep'];
            $entry->date_posted = $response[0]['dateOfSleep'];
        }
        $entry->save();
      }
    }

    public function showKickstarters() {
      $kicks = Lookup::where('category', 'kickstarter')->get();
      return view('admin/kickstarter', ['kicks' => $kicks]);
    }

    public function newKickstarter(Request $request) {

      $search = $request['search_term'];
      $url = 'https://www.kickstarter.com/projects/search.json?search=&term='.$search;
      $content = file_get_contents($url);
      $kickstarter = json_decode($content, true);
      $kickstarter = $kickstarter['projects'][0];
      $kick = new Lookup;
      $kick->category = 'kickstarter';
      $kick->date_posted = $kickstarter['launched_at'];
      $kick->blog_title = $kickstarter['name'];
      $kick->sub_category = $kickstarter['category']['name'];
      $kick->media_url = $kickstarter['photo']['1024x576'];
      $kick->heading = $kickstarter['blurb'];
      $kick->blog_url = $kickstarter['urls']['web']['project'];
      $kick->save();
      $kicks = Lookup::where('category', 'kickstarter')->get();
      return view('admin/kickstarter', ['kicks' => $kicks]);
    }

    public function viewMail($id) {
      $mail = Mail::findOrFail($id);
      $mail->seen = 1;
      $mail->save();
      return view('admin/read-mail', ['mail' => $mail]);
    }
    public function sync(Request $request) {
      $request->session()->flash('sync', 'Successfully synced.');
      return redirect('/kevin');
    }
    public function updateSettings(Request $request) {
      $user = User::where('id', Auth::user()->id)->first();
      $user->first_name = $request['first_name'];
      $user->last_name = $request['last_name'];
      $user->email = $request['email'];
      $user->bio = $request['description'];
      if ($request->file('photo') != null) {
        $image = Image::make($request->file('photo'))->resize(400, 400);
        $id = uniqid();
        $path = public_path('img/profile_pictures/'.$id.".".$request->file('photo')->extension());
        $user->image_url = $id.".".$request->file('photo')->extension();
        $image->save($path);
      }
      $user->save();
      $request->session()->flash('updated-user', 'User settings successfully updated.');
      return view('admin/settings');
    }
    public function showSorts() {
      $languages = Lookup::where('category', 'sort')->where('sub_category', 'pl')->get();
      $frameworks = Lookup::where('category', 'sort')->where('sub_category', 'framework')->get();
      $skills = Lookup::where('category', 'sort')->where('sub_category', 'skill')->get();
      $jslibraries = Lookup::where('category', 'sort')->where('sub_category', 'jslibrary')->get();
      $workplace = Lookup::where('category', 'sort')->where('sub_category', 'workplace')->get();
      return view('admin/sort', ['pls' => $languages, 'frs' => $frameworks, 'skills' => $skills, 'js' => $jslibraries, 'workplaces' => $workplace]);
    }
    public function updateSorts(Request $request) {
      Lookup::where('category', 'sort')->delete();
      if($request['pl']) {
        foreach($request['pl'] as $item) {
            $tag = new Lookup;
            $tag->category = 'sort';
            $tag->sub_category = 'pl';
            $tag->tag = $item;
            $tag->save();
        }
      }
      if($request['frs']) {
        foreach($request['frs'] as $item) {
            $tag = new Lookup;
            $tag->category = 'sort';
            $tag->sub_category = 'framework';
            $tag->tag = $item;
            $tag->save();
        }
      }
      if($request['skills']) {
        foreach($request['skills'] as $item) {
            $tag = new Lookup;
            $tag->category = 'sort';
            $tag->sub_category = 'skill';
            $tag->tag = $item;
            $tag->save();
        }
      }
      if($request['js']) {
        foreach($request['js'] as $item) {
            $tag = new Lookup;
            $tag->category = 'sort';
            $tag->sub_category = 'jslibrary';
            $tag->tag = $item;
            $tag->save();
        }
      }
      if($request['workplaces']) {
        foreach($request['workplaces'] as $item) {
            $tag = new Lookup;
            $tag->category = 'sort';
            $tag->sub_category = 'workplace';
            $tag->tag = $item;
            $tag->save();
        }
      }
      $languages = Lookup::where('category', 'sort')->where('sub_category', 'pl')->get();
      $frameworks = Lookup::where('category', 'sort')->where('sub_category', 'framework')->get();
      $skills = Lookup::where('category', 'sort')->where('sub_category', 'skill')->get();
      $jslibraries = Lookup::where('category', 'sort')->where('sub_category', 'jslibrary')->get();
      $workplace = Lookup::where('category', 'sort')->where('sub_category', 'workplace')->get();
      return view('admin/sort', ['pls' => $languages, 'frs' => $frameworks, 'skills' => $skills, 'js' => $jslibraries, 'workplaces' => $workplace]);
    }
    public function showBlogs() {
      $blogs = Lookup::where('category', 'blog')->orWhere('category', 'portfolio')->orderBy('created_at', 'desc')->get();
      return view('admin/blogs', ['blogs' => $blogs]);
    }
    public function editBlog($id) {
      $blog = Lookup::findOrFail($id);
      $tag = Lookup::where('category', 'tag')->where('ref_id', $id)->orWhere('category', 'ptag')->where('ref_id', $id)->get();
      $sections = Lookup::where('category', 'article_helper')->where('ref_id', $id)->get();
      $sections_count = Lookup::where('category', 'article_helper')->where('ref_id', $id)->count();
      if($sections_count == null) {
        $sections_count = 1;
      }
      return view('admin/blog-edit', ['blog' => $blog, 'tags' => $tag, 'sections' => $sections, 'sections_count' => $sections_count]);
    }

    public function editBlogData($id) {
      $blog = Lookup::findOrFail($id);
      $tag = Lookup::where('category', 'tag')->where('ref_id', $id)->orWhere('category', 'ptag')->where('ref_id', $id)->get();
      $allTags = Lookup::distinct()->where('category', 'tag')->orWhere('category', 'ptag')->orWhere('category', 'sort')->get();
      $sections = Lookup::where('category', 'article_helper')->where('ref_id', $id)->get();
      $sections_count = Lookup::where('category', 'article_helper')->where('ref_id', $id)->count();
      if($sections_count == null) {
        $sections_count = 1;
      }
      return view('admin/blogUpdate', ['blog' => $blog, 'tagged' => $tag, 'allTags' => $allTags, 'sections' => $sections, 'sections_count' => $sections_count]);
    }

    public function uploadImage(Request $request) {
      if ($request->file('image') != null) {
        $image = Image::make($request->file('image'));
        $image_id = uniqid();
        $path = public_path('uploads/'.$image_id.".".$request->file('image')->extension());
        $image->save($path);
        $request->session()->flash('added-image', 'Successfully added image.');
      }
      else {
        $request->session()->flash('no-image', 'Image not added image.');
      }
      $files = collect(File::allFiles('../public/uploads'));
      $files = $files->sortByDesc(function ($file) {
        return $file->getCTime();
      });
      return view('admin/images', ['images' => $files]);
    }

    public function showUploadedImages() {
      $files = collect(File::allFiles('../public/uploads'));
      $files = $files->sortByDesc(function ($file) {
        return $file->getCTime();
      });
      return view('admin/images', ['images' => $files]);
    }

    public function deleteImage(Request $request) {
      $image = $request->input('image');
      File::delete($image);
      return ['msg' => 'Deleted Image!'];
    }

    public function updateBlogContent(Request $request, $id) {
      $content = $request->input('content');
      $blog = Lookup::findOrFail($id);
      $blog->content = $content;
      $blog->save();

      return ['msg' => $id, 'data' => $request->input('content')];
    }

    public function updateBlog(Request $request, $id) {
      $blog = Lookup::findOrFail($id);
      $blog->category = $request['lookup_category'];
      $blog->blog_title = $request['title'];
      $blog->color = $request['color'];
      $blog->user_id = Auth::id();
      $blog->blog_url = cleanUrl($blog->blog_title);
      $blog->portfolio_link = $request['portf_link'];
      $blog->github_url = $request['github_repo'];
      $blog->sub_category = $request['category'];
      $blog->heading = $request['intro-paragraph'];
      if($request['lookup_category'] == 'portfolio') {
          $blog->portfolio_ish = $request['portfolio-ish'];
      }
      if ($request->file('photo') != null) {
        $image = Image::make($request->file('photo'));
        $image_id = uniqid();
        $path = public_path('uploads/'.$image_id.".".$request->file('photo')->extension());
        $blog->media_url = 'uploads/'.$image_id.".".$request->file('photo')->extension();
        $image->save($path);
      }
      if ($request->file('portf-photo') != null) {
        $image = Image::make($request->file('portf-photo'));
        $image_id = uniqid();
        $path = public_path('uploads/'.$image_id.".".$request->file('portf-photo')->extension());
        $blog->portfolio_image = 'uploads/'.$image_id.".".$request->file('portf-photo')->extension();
        $image->save($path);
      }
      $blog->save();
      Lookup::where('category', 'article_helper')->where('ref_id', $blog->id)->delete(); // delete all sections on save
      Lookup::where('category', 'section')->where('ref_id', $blog->id)->orwhere('category', 'ptag')->where('ref_id', $blog->id)->delete();
      if($request['tags']) {
          foreach($request['tags'] as $tags) {
              $tag = new Lookup;
              $tag->ref_id = $blog->id;
              if($request['lookup_category'] == 'portfolio') {
                $tag->category = 'ptag';
              }
              else {
                $tag->category = 'tag';
              }
              $tag->tag = $tags;
              $tag->save();
          }
      }
      $blog = Lookup::findOrFail($id);
      $tag = Lookup::where('category', 'tag')->where('ref_id', $id)->orWhere('category', 'ptag')->where('ref_id', $id)->get();
      $allTags = Lookup::distinct()->where('category', 'tag')->orWhere('category', 'ptag')->orWhere('category', 'sort')->get();
      $request->session()->flash('updated-blog', 'Blog post successfully updated.');
      return view('admin/blogUpdate', ['blog' => $blog, 'tagged' => $tag, 'allTags' => $allTags]);
    }
    public function storePost(Request $request)
    {
        $blog = new Lookup;
        $blog->category = $request['lookup_category'];
        $blog->blog_title = $request['title'];
        $blog->color = $request['color'];
        $blog->user_id = Auth::id();
        $blog->blog_url = cleanUrl($blog->blog_title);
        $blog->portfolio_link = $request['portf_link'];
        $blog->github_url = $request['github_repo'];
        $blog->sub_category = strtolower($request['category']);
        $blog->heading = $request['intro-paragraph'];

        if($request['lookup_category'] == 'portfolio') {
            $blog->portfolio_ish = $request['portfolio-ish'];
        }
        $blog->blog_views = 0;
        $blog->blog_shares = 0;
        if ($request->file('portf-photo') != null) {
          $image = Image::make($request->file('portf-photo'));
          $image_id = uniqid();
          $path = public_path('uploads/'.$image_id.".".$request->file('portf-photo')->extension());
          $blog->portfolio_image = 'uploads/'.$image_id.".".$request->file('portf-photo')->extension();
          $image->save($path);
        }
        if ($request->file('photo') != null) {
          $image = Image::make($request->file('photo'));
          $image_id = uniqid();
          $path = public_path('uploads/'.$image_id.".".$request->file('photo')->extension());
          $blog->media_url = 'uploads/'.$image_id.".".$request->file('photo')->extension();
          $image->save($path);
        }
        $blog->date_posted = Carbon::now()->toDateString();
        $blog->save();
        // tags
        $return_id = $blog->id;
        if($request['tags']) {
          foreach($request['tags'] as $tags) {
            $tag = new Lookup;
            $tag->ref_id = $blog->id;
            if($request['lookup_category'] == 'portfolio') {
              $tag->category = 'ptag';
            }
            else {
              $tag->category = 'tag';
            }
            $tag->tag = $tags;
            $tag->save();
          }
        }
        $request->session()->flash('added-blog', 'Blog post successfully saved.');
        $tag = Lookup::where('category', 'tag')->orWhere('category', 'ptag')->where('ref_id', $return_id)->get();
        $allTags = Lookup::distinct()->where('category', 'tag')->orWhere('category', 'ptag')->orWhere('category', 'sort')->get();
        $sections = Lookup::where('category', 'article_helper')->where('ref_id', $return_id)->get();
        return redirect('/kevin/blog/edit/'.$return_id);
    }
}
