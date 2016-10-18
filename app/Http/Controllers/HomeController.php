<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
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
        $portfolio = DB::table('lookups')->where('category', 'portfolio')->get();
        return view('index', ['portfolio' => $portfolio]);
    }
    public function showPortfolio()
    {
      $portfolio = DB::table('lookups')->where('category', 'portfolio')->get();
      $tags = Lookup::distinct()->where('category', 'ptag')->get(['tag']);
      return view('portfolio', ['portfolio' => $portfolio, 'tags' => $tags]);
    }
    public function showPosts() {
        $posts = Lookup::where('category', 'blog')->orWhere('category', 'portfolio')->orderBy('date_posted', 'asc')->paginate(2);
        $categories = Lookup::distinct()->where('category', 'blog')->orWhere('category', 'portfolio')->get(['sub_category']); //will provide distinct
        $latest = Lookup::where('category', 'blog')->orWHere('category', 'portfolio')->orderBy('date_posted', 'asc')->take(6)->get();
        return view('blog-classic', ['posts' => $posts, 'categories' => $categories, 'latest' => $latest]);
    }
    public function showBlogs() {
      $blogs = Lookup::where('category', 'blog')->orderBy('date_posted', 'asc')->paginate(2);
      $categories = Lookup::where('category', 'blog')->pluck('category', 'sub_category');
      return view('blog-classic', ['blogs' => $blogs, 'categories' => $categories]);
    }
    public function showPost($lookup_category, $sub_category, $url)
    {
      $blog = DB::table('lookups')->where('category', $lookup_category)->where('sub_category', $sub_category)->where('blog_url', $url)->get();
      if($blog == null) {
        // return 404
      }
      $tags = Lookup::where('category', 'tag')->where('ref_id', $blog[0]->id)->get();
      if(session()->has($sub_category."+".$url) == false) {
          $viewcount = Lookup::where('sub_category', $sub_category)->where('blog_url', $url)->increment('blog_views');
           session([$sub_category."+".$url => $sub_category."+".$url]);
      }
      $sections = Lookup::where('category', 'article_helper')->where('ref_id', $blog[0]->id)->get();
      $author = DB::table('users')->where('id', $blog[0]->user_id)->get();
      return view('article', ['blog' => $blog, 'author' => $author, 'sections' => $sections, 'tags' => $tags]);
    }
}
