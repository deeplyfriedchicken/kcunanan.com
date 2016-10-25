<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
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
      return view('admin/index');
    }
    public function newPost()
    {
      return view('admin/blog');
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
      return redirect('shm-admin/settings');
    }
    public function showBlogs() {
      $blogs = Lookup::where('category', 'blog')->orWhere('category', 'portfolio')->orderBy('created_at', 'desc')->get();
      return view('admin/blogs', ['blogs' => $blogs]);
    }
    public function editBlog($id) {
      $blog = Lookup::findOrFail($id);
      $tag = Lookup::where('category', 'tag')->orWhere('category', 'ptag')->where('ref_id', $id)->get();
      $allTags = Lookup::where('category', 'tag')->orWhere('category', 'ptag')->get();
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
      $blog->sub_category = $request['category'];
      $blog->heading = $request['intro-paragraph'];
      $blog->content = $request['content'];
      if($request['lookup_category'] == 'portfolio') {
          $blog->portfolio_ish = $request['portfolio-ish'];
      }
      if ($request->file('photo') != null) {
        $image = Image::make($request->file('photo'));
        $image_id = uniqid();
        $path = public_path('upload/'.$image_id.".".$request->file('photo')->extension());
        $blog->media_url = 'upload/'.$image_id.".".$request->file('photo')->extension();
        $image->save($path);
        runSync();
      }
      if ($request->file('portf-photo') != null) {
        $image = Image::make($request->file('portf-photo'));
        $image_id = uniqid();
        $path = public_path('upload/'.$image_id.".".$request->file('portf-photo')->extension());
        $blog->portfolio_image = 'upload/'.$image_id.".".$request->file('portf-photo')->extension();
        $image->save($path);
        runSync();
      }
      $blog->save();
      Lookup::where('category', 'tag')->orwhere('category', 'ptag')->where('ref_id', $blog->id)->delete();
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
            if($request["content".$i]) {
              $section = new Lookup;
              $section->ref_id = $blog->id;
              $section->category = "article_helper";
              $section->helper_type = $request["type".$i];
              $section->color = $request["color".$i];
              $section->heading = $request["title".$i];
              $section->content = $request["content".$i];
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
      $tag = Lookup::where('category', 'tag')->orWhere('category', 'ptag')->where('ref_id', $id)->get();
      $allTags = Lookup::where('category', 'tag')->orWhere('category', 'ptag')->get();
      $sections = Lookup::where('category', 'article_helper')->where('ref_id', $id)->get();
      $sections_count = Lookup::where('category', 'article_helper')->where('ref_id', $id)->count();
      if($sections_count == null) {
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
          $path = public_path('upload/'.$image_id.".".$request->file('portf-photo')->extension());
          $blog->portfolio_image = 'upload/'.$image_id.".".$request->file('portf-photo')->extension();
          $image->save($path);
          runSync();
        }
        if ($request->file('photo') != null) {
          $image = Image::make($request->file('photo'));
          $image_id = uniqid();
          $path = public_path('upload/'.$image_id.".".$request->file('photo')->extension());
          $blog->media_url = 'upload/'.$image_id.".".$request->file('photo')->extension();
          $image->save($path);
          runSync();
        }
        $blog->date_posted = Carbon::now()->toDateString();
        $blog->save();
        // tags
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
            if($request["content".$i]) {
              $section = new Lookup;
              $section->ref_id = $blog->id;
              $section->category = "article_helper";
              $section->helper_type = $request["type".$i];
              $section->color = $request["color".$i];
              $section->heading = $request["title".$i];
              $section->content = $request["content".$i];
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
        return view('admin/blog');
    }
}
