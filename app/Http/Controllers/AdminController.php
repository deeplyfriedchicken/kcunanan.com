<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Mail;
use App\Lookup;
use Image;
use Auth;
use Carbon\Carbon;

function runSync() {
    chdir('/homepages/37/d587320544/htdocs/kcunanan');
    shell_exec('./sync.sh'); //moving things to public after image upload
}
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
      return view('admin/index', ['mails' => $mails]);
    }
    public function newPost()
    {
      $tags = Lookup::distinct()->where('category', 'tag')->orWhere('category', 'ptag')->orWhere('category', 'sort')->get();
      return view('admin/blog', ['tags' => $tags]);
    }
    public function viewMail($id) {
      $mail = Mail::findOrFail($id);
      $mail->seen = 1;
      $mail->save();
      return view('admin/read-mail', ['mail' => $mail]);
    }
    public function sync(Request $request) {
      runSync();
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
        runSync();
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
      $allTags = Lookup::distinct()->where('category', 'tag')->orWhere('category', 'ptag')->orWhere('category', 'sort')->get();
      $sections = Lookup::where('category', 'article_helper')->where('ref_id', $id)->get();
      $sections_count = Lookup::where('category', 'article_helper')->where('ref_id', $id)->count();
      if($sections_count == null) {
        $sections_count = 1;
      }
      return view('admin/blogUpdate', ['blog' => $blog, 'tagged' => $tag, 'allTags' => $allTags, 'sections' => $sections, 'sections_count' => $sections_count]);
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
      $blog->content = $request['content'];
      if($request['lookup_category'] == 'portfolio') {
          $blog->portfolio_ish = $request['portfolio-ish'];
      }
      if ($request->file('photo') != null) {
        $image = Image::make($request->file('photo'));
        $image_id = uniqid();
        $path = public_path('uploads/'.$image_id.".".$request->file('photo')->extension());
        $blog->media_url = 'uploads/'.$image_id.".".$request->file('photo')->extension();
        $image->save($path);
        runSync();
      }
      if ($request->file('portf-photo') != null) {
        $image = Image::make($request->file('portf-photo'));
        $image_id = uniqid();
        $path = public_path('uploads/'.$image_id.".".$request->file('portf-photo')->extension());
        $blog->portfolio_image = 'uploads/'.$image_id.".".$request->file('portf-photo')->extension();
        $image->save($path);
        runSync();
      }
      $blog->save();
      Lookup::where('category', 'tag')->where('ref_id', $blog->id)->orwhere('category', 'ptag')->where('ref_id', $blog->id)->delete();
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
      Lookup::where('category', 'article_helper')->where('ref_id', $blog->id)->delete();
      for($i = 1; $i <= $request['num-sections']; $i++) {
            if($request["content".$i] || $request["code".$i] || $request->file('portf-photo') != null) {
              $section = new Lookup;
              $section->ref_id = $blog->id;
              $section->category = "article_helper";
              $section->helper_type = $request["type".$i];
              $section->color = $request["color".$i];
              $section->heading = $request["title".$i];
              $section->content = $request["content".$i];
              $section->code = $request["code".$i];
              if ($request->file('image'.$i) != null) {
                $image = Image::make($request->file('image'.$i));
                $image_id = uniqid();
                $path = public_path('uploads/'.$image_id.".".$request->file('image'.$i)->extension());
                $section->media_url = 'uploads/'.$image_id.".".$request->file('image'.$i)->extension();
                $image->save($path);
                runSync();
              }
              else {
                $section->media_url = $request['old_image'.$i];
              }
              $section->save();
            }
        }
      $blog = Lookup::findOrFail($id);
      $tag = Lookup::where('category', 'tag')->where('ref_id', $id)->orWhere('category', 'ptag')->where('ref_id', $id)->get();
      $allTags = Lookup::distinct()->where('category', 'tag')->orWhere('category', 'ptag')->orWhere('category', 'sort')->get();
      $sections = Lookup::where('category', 'article_helper')->where('ref_id', $id)->get();
      $sections_count = Lookup::where('category', 'article_helper')->where('ref_id', $id)->get();
      if($sections_count->count()) {
        $sections_count = Lookup::where('category', 'article_helper')->where('ref_id', $id)->count();
      }
      else {
        $sections_count = 1;
      }
      $request->session()->flash('updated-blog', 'Blog post successfully updated.');
      return view('admin/blogUpdate', ['blog' => $blog, 'tagged' => $tag, 'allTags' => $allTags, 'sections' => $sections, 'sections_count' => $sections_count]);
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
        $blog->content = $request['content'];

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
          runSync();
        }
        if ($request->file('photo') != null) {
          $image = Image::make($request->file('photo'));
          $image_id = uniqid();
          $path = public_path('uploads/'.$image_id.".".$request->file('photo')->extension());
          $blog->media_url = 'uploads/'.$image_id.".".$request->file('photo')->extension();
          $image->save($path);
          runSync();
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
        for($i = 1; $i <= $request['num-sections']; $i++) {
            if($request["content".$i] || $request["code".$i] || $request->file('portf-photo') != null) {
              $section = new Lookup;
              $section->ref_id = $blog->id;
              $section->category = "article_helper";
              $section->helper_type = $request["type".$i];
              $section->color = $request["color".$i];
              $section->heading = $request["title".$i];
              $section->content = $request["content".$i];
              $section->code = $request["code".$i];
              if ($request->file('image'.$i) != null) {
                $image = Image::make($request->file('image'.$i));
                $image_id = uniqid();
                $path = public_path('uploads/'.$image_id.".".$request->file('image'.$i)->extension());
                $section->media_url = 'uploads/'.$image_id.".".$request->file('image'.$i)->extension();
                $image->save($path);
                runSync();
              }
              $section->save();
            }
        }
          // $file = new Lookup;
          // $file->category = 'blog_cover_photo';
          // $file->ref_id = $blog->id;
          // $file->save();
        $request->session()->flash('added-blog', 'Blog post successfully saved.');
        $tag = Lookup::where('category', 'tag')->orWhere('category', 'ptag')->where('ref_id', $return_id)->get();
        $allTags = Lookup::distinct()->where('category', 'tag')->orWhere('category', 'ptag')->orWhere('category', 'sort')->get();
        $sections = Lookup::where('category', 'article_helper')->where('ref_id', $return_id)->get();
        $sections_count = Lookup::where('category', 'article_helper')->where('ref_id', $return_id)->get();
        if($sections_count->count()) {
          $sections_count = Lookup::where('category', 'article_helper')->where('ref_id', $return_id)->count();
        }
        else {
          $sections_count = 1;
        }
        return redirect('/kevin/blog/edit/'.$return_id);
    }
}
