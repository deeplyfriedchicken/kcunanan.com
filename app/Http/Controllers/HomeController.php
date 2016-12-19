<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Mail;
use App\Lookup;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio = DB::table('lookups')->where('category', 'portfolio')->orderBy('created_at', 'desc')->take(10)->get();
        return view('index', ['portfolio' => $portfolio]);
    }
    public function showPortfolio()
    {
      $portfolio = DB::table('lookups')->where('category', 'portfolio')->orderBy('created_at', 'desc')->get();
      $languages = Lookup::where('category', 'sort')->where('sub_category', 'pl')->orderBy('tag', 'asc')->get();
      $frameworks = Lookup::where('category', 'sort')->where('sub_category', 'framework')->orderBy('tag', 'asc')->get();
      $skills = Lookup::where('category', 'sort')->where('sub_category', 'skill')->orderBy('tag', 'asc')->get();
      $jslibraries = Lookup::where('category', 'sort')->where('sub_category', 'jslibrary')->orderBy('tag', 'asc')->get();
      $workplace = Lookup::where('category', 'sort')->where('sub_category', 'workplace')->orderBy('tag', 'asc')->get();
      return view('portfolio', ['portfolio' => $portfolio, 'pls' => $languages, 'frs' => $frameworks, 'skills' => $skills, 'js' => $jslibraries, 'workplaces' => $workplace]);
    }
    public function sendMessage(Request $request) {
      $mail = new Mail;
      $mail->name = $request['name'];
      $mail->subject = $request['subject'];
      $mail->email = $request['email'];
      $mail->message = $request['message'];
      $mail->seen = false;
      $mail->save();
      $request->session()->flash('mail-success', 'Message successfully sent.');
      return view('contact');
    }
    public function searchURL(Request $request) {
      $term = $request['s'];
      return redirect('/search/'.$term);
    }
    public function search($term) {
      $ids = Lookup::where('tag', 'LIKE', '%'.$term.'%')->get();
      $ids2 = Lookup::where('blog_title', 'LIKE', '%'.$term.'%')->orWhere('heading', 'LIKE', '%'.$term.'%')->get();
      $array = [];
      $i = 0;
      foreach($ids as $id) {
        $array[$i] = $id->ref_id;
        $i++;
      }
      foreach($ids2 as $id) {
        $array[$i] = $id->id;
        $i++;
      }
      $posts = Lookup::whereIn('id', $array)->orderBy('created_at', 'desc')->get();
      return view('search', ['posts' => $posts, 'ids' => $array, 'term' => $term]);
    }
    public function showPosts() {
        $posts = Lookup::where('category', 'blog')->orWhere('category', 'portfolio')->orderBy('created_at', 'desc')->paginate(4);
        return view('blog-classic', ['posts' => $posts]);
    }
    public function showBlogs() {
      $blogs = Lookup::where('category', 'blog')->orderBy('created_at', 'desc')->paginate(2);
      return view('blog-classic', ['blogs' => $blogs, 'categories' => $categories]);
    }
    public function showPost($lookup_category, $sub_category, $url)
    {
      $blog = DB::table('lookups')->where('category', $lookup_category)->where('sub_category', $sub_category)->where('blog_url', $url)->get();
      if($blog == null) {
        // return 404
      }
      if($lookup_category == 'portfolio') {
        $tags = Lookup::where('category', 'ptag')->where('ref_id', $blog[0]->id)->get();
      }
      else {
        $tags = Lookup::where('category', 'tag')->where('ref_id', $blog[0]->id)->get();
      }
      if(session()->has($sub_category."+".$url) == false) {
          $viewcount = Lookup::where('sub_category', $sub_category)->where('blog_url', $url)->increment('blog_views');
           session([$sub_category."+".$url => $sub_category."+".$url]);
      }
      $sections = Lookup::where('category', 'article_helper')->where('ref_id', $blog[0]->id)->get();
      $author = DB::table('users')->where('id', $blog[0]->user_id)->get();
      $previous = Lookup::where('category', $lookup_category)->where('id', '<', $blog[0]->id)->max('id');
      if($previous != null) {
          $previous = Lookup::findOrFail($previous);
          $previousUrl = '/posts/'.$previous->category."/".$previous->sub_category."/".$previous->blog_url;
      }
      else {
        $previousUrl = null;
      }
      $next = Lookup::where('category', $lookup_category)->where('id', '>', $blog[0]->id)->min('id');
      if($next != null) {
        $next = Lookup::findOrFail($next);
        $nextUrl = '/posts/'.$next->category."/".$next->sub_category."/".$next->blog_url;
      }
      else {
        $nextUrl = null;
      }
      return view('article', ['blog' => $blog, 'author' => $author, 'sections' => $sections, 'tags' => $tags, 'previous' => $previousUrl, 'next' => $nextUrl]);
    }
}
