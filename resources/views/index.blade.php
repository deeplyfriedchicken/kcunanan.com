@extends('master')
@section('meta')
  <meta property="og:image" content="{{ URL::asset('/kcunanan-og.jpg') }}" />

  <meta property="og:description" content="Welcome! I have a lot of things to show you. Please take you time. - Kevin Cunanan" />

  <meta property="og:url"content="http://kcunanan.com" />

  <meta property="og:title" content="kcunanan.com - The Site About Kevin" />
@endsection
@section('stylesheets')
  <style>
    h1#kevin {
      font-family: 'Bitter', serif !important;
      text-transform: none;
    }
    blockquote.quote-kevin-1 {
      font-family: 'Bebas Neue', sans-serif !important;
      font-size: 34px;
      font-weight: 700;
      font-style: normal !important;
      line-height: 44px;
      color: #000;
    }
    .white-quote-background, #div_4f8c_13 {
      background: #fff;
      margin-bottom: 0;
    }
    .instas {
      margin: 15px 75px;
    }
    .instas a img {
      border-radius: 50px;
    }
    .kickstarter {
      margin: 15px 30px;
    }
    .text-center {
      text-align: center;
    }
    .cool-button button {
      background-color: #000;
      color: #fff;
      margin: 25px 0 5px 0;
    }
    .cool-button button:hover {
      background-color: #fff;
      color: #000;
      font-size: 1.5em;
    }
    .margin-top-15 {
      margin-top: 15px;
    }
    .instagram_h1 {
      background: linear-gradient(330deg, #405de6 0%, #5851db 25%, #833ab4 50%, #c13584 75%, #e1306c 100%, #fd1d1d 100%, #f56040 100%, #f77737 100%, #fcaf45 100%, #ffdc80 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .kickstarter_h1 {
      color: #2bde73;
    }
    .kickstarter a {
      text-decoration: none;
    }
    .kickstarter a:hover {
      text-decoration: underline;
      color: #2bde73;
    }
    .feature_h1 span {
      background-color: #405de6;
      color: #fff;
      padding: 15px;
    }
    .fitbit_h1 {
      color: #4cc2c4;
      margin-bottom: 15px !important;
    }
    .fitbit_sleep h3 {
        font-size: 3em;
    }

  </style>
@endsection
@section('content')
            <!-- Content part section -->
            <section class="ish-part_content ish-without-sidebar">

                <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-bottom-margin-half ish-resp-centered ish-row_notsection ish-valign-middle" >
                    <div class="ish-vc_row_inner">
                        <div class="vc_col-sm-12 wpb_column column_container" >
                            <div class="wpb_wrapper">
                                <div class="ish-sc-element ish-sc_box ish-color7 ish-text-color4 ish-fullwidth ish-same-height ish-has-valign ish-valign-middle" id="div_4f8c_0">
                                    <div class="ish-box-inner">
                                        <div class="vc_row wpb_row vc_inner vc_row-fluid ">
                                            <div class="vc_col-sm-12 wpb_column column_container" >
                                                <div class="wpb_wrapper">
                                                    <h1 class="ish-sc-element ish-sc_headline ish-color4 ish-center ish-bottom-margin-none" id="kevin">Kevin loves <span id="typed"></span></h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-bottom-margin-half ish-resp-centered ish-row_notsection ish-has-portfolio" >
                    <div class="ish-vc_row_inner">
                        <div class="vc_col-sm-12 wpb_column column_container" >
                            <div class="wpb_wrapper">
                              <div class="text-center"><h1 class="feature_h1"><span>Featured Projects</span></h1></div>
                                <div class="ish-sc-element ish-sc_portfolio  ish-layout-masonry-tiles ish-ratio-masonry-tiles ish-p-zoomin ish-p-packery" data-count="3"><span class="ish-preloader"></span>
                                    <div class="ish-p-items-container" id="div_4f8c_2">
                                      @foreach($portfolio as $item)
                                        <div class="ish-p-col ish-p-col-w1 ish-p-col-h1">
                                            <a href="/posts/{{ strtolower(preg_replace("/[\s_]/", "-", $item->category)) }}/{{ strtolower(preg_replace("/[\s_]/", "-", $item->sub_category)) }}/{{ strtolower(preg_replace("/[\s_]/", "-", $item->blog_url)) }}" id="a_4f8c_0">
                                                <div class="ish-p-item">
                                                    <div class="ish-p-img" style="background-image: url('{{ URL::asset($item->portfolio_image) }}')"></div>
                                                    <div class="ish-p-overlay ish-color-8 text-color-6">
                                                        <div><span class="ish-p-title"><span class="ish-p-box" id="span_4f8c_0" style="background-color: {{ $colors[rand(0, count($colors)-1)] }}"><span class="ish-p-headline">{{ $item->blog_title }}</span><span class="ish-p-cat">{{ $item->sub_category }}</span></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                      @endforeach
                                    </div>
                                    <div class="text-center"><a href="/portfolio" class="cool-button"><button>View Portfolio</button></a></div>
                                </div>
                                <div class="wpb_row vc_row-fluid ish-row-notfull ish-resp-centered ish-row_section ish-taglines-separator-row" style="">
                                    <div class="ish-vc_row_inner">
                                        <div class="vc_col-sm-12 wpb_column column_container" style="">
                                            <div class="wpb_wrapper">
                                                <div class="ish-sc_separator ish-separator-text ish-separator-double ish-taglines-separator" style="white-space: nowrap;">
                                                    <span class="ish-line ish-left"><span class="ish-line-border"></span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="margin-top-15 text-center"><h1 class="recent_h1">Recent Blog Posts</h1></div>
                                <div class="vc_col-sm-12 wpb_column column_container">
                                  <section class="ish-part_content ish-blog ish-blog-2columns ish-without-sidebar">
                                    @foreach($blogs as $blog)
                                    <div id="post-252" class="wpb_row vc_row-fluid ish-row-notfull ish-row_notsection ish-content-align-right post-252 post type-post status-publish format-standard has-post-thumbnail hentry category-flat category-light tag-flash tag-iron">
                                        <div class="ish-vc_row_inner">
                                            <div class="ish-display-table">
                                                <div class="ish-post-content ish-color9 ish-text-color4 ish-grid6">
                                                    <div class="ish-blog-post-content">
                                                        <h2 class="ish-h4"><a href="/posts/{{ strtolower(preg_replace("/[\s_]/", "-", $item->category)) }}/{{ strtolower(preg_replace("/[\s_]/", "-", $item->sub_category)) }}/{{ strtolower(preg_replace("/[\s_]/", "-", $item->blog_url)) }}">{{ $blog->blog_title }}</a></h2>
                                                        <div class="ish-blog-post-details">
                                                            <span><a href="#">{{ $blog->date_posted->format('F j, Y') }}</a></span><span class="ish-spacer">/</span><a href="#">{{ ucwords($blog->sub_category) }}</a><span class="ish-spacer">/</span><span><a href="#">{{ $blog->blog_views }} Views</a></span>
                                                        </div>
                                                        <div class="ish-blog-post-excerpt">
                                                            <p>
                                                                {{ $blog->heading }}
                                                            </p>
                                                        </div>
                                                        <span class="ish-blog-post-links"><a class="ish-read-more" href="/posts/{{ strtolower(preg_replace("/[\s_]/", "-", $blog->category)) }}/{{ strtolower(preg_replace("/[\s_]/", "-", $blog->sub_category)) }}/{{ strtolower(preg_replace("/[\s_]/", "-", $blog->blog_url)) }}">Read more &gt;</a></span>
                                                    </div>
                                                </div>
                                                <div class="ish-post-media ish-grid6 ish-color9 ish-text-color4">
                                                    <div class="ish-blog-post-media">
                                                        <div class="ish-blog-image-content">
                                                            <a href="/posts/{{ strtolower(preg_replace("/[\s_]/", "-", $blog->category)) }}/{{ strtolower(preg_replace("/[\s_]/", "-", $blog->sub_category)) }}/{{ strtolower(preg_replace("/[\s_]/", "-", $blog->blog_url)) }}"><img src="{{ URL::asset($blog->media_url) }}" class="attachment-theme-large size-theme-large wp-post-image" alt="{{ $blog->blog_title }}"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                  </section>
                                  <div class="wpb_row vc_row-fluid ish-row-notfull ish-resp-centered ish-row_section ish-taglines-separator-row" style="">
                                      <div class="ish-vc_row_inner">
                                          <div class="vc_col-sm-12 wpb_column column_container">
                                              <div class="wpb_wrapper">
                                                  <div class="ish-sc_separator ish-separator-text ish-separator-double ish-taglines-separator" style="white-space: nowrap;">
                                                      <span class="ish-line ish-left"><span class="ish-line-border"></span></span>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <section class="margin-top-15">
                                <div class="vc_col-sm-4 wpb_column column_container">
                                  <div class="wpb_wrapper text-center">
                                    <h1 class="instagram_h1">Instagram</h1>
                                    @foreach($instas as $insta)
                                      <div class="instas">
                                        <a href="{{ $insta['link'] }}" ><img src="{{ str_replace('s150x150', 's640x640', $insta['images']['thumbnail']['url']) }}"></a>
                                      </div>
                                    @endforeach
                                  </div>
                                </div>
                                <div class="vc_col-sm-4 wpb_column column_container" >
                                  <div class="wpb_wrapper text-center">
                                    <h1 class="kickstarter_h1">Kickstarter</h1>
                                    <span>(Projects I've Backed)</span>
                                    @foreach($kickstarters as $kick)
                                      <div class="kickstarter">
                                        <a href="{{ $kick->blog_url }}" >
                                          <img src="{{ $kick->media_url }}">
                                          <h5 class="kickstarter_heading">{{ $kick->blog_title }}</h5>
                                        </a>
                                      </div>
                                    @endforeach
                                  </div>
                                </div>
                                <div class="vc_col-sm-3 wpb_column column_container" >
                                  <div class="wpb_wrapper text-center">
                                    <h1 class="fitbit_h1">Fitbit</h1>
                                    <div class="fitbit_sleep">
                                      <h1><i class="fa fa-moon-o"></i></h1>
                                      <h3>{{ $hourSlept }}</h3>
                                      <span>Hours Slept</span>
                                    </div>
                                  </div>
                                </div>
                              </section>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Content part section END -->
    <!-- ish-body END -->
    @endsection
    @section('quote')
      <div class="black-border-right vc_row wpb_row white-quote-background vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-resp-centered ish-row_notsection" >
          <div class="ish-vc_row_inner">

              <div class="vc_col-sm-12 wpb_column column_container" >
                  <div class="wpb_wrapper">
                      <div class="ish-sc-element ish-sc_box ish-color7 ish-text-color4 ish-fullwidth ish-same-height ish-has-valign ish-valign-middle" id="div_4f8c_13">
                          <div class="ish-box-inner">
                              <div class="vc_row wpb_row vc_inner vc_row-fluid ">
                                  <div class="vc_col-sm-12 wpb_column column_container" >
                                      <div class="wpb_wrapper">
                                          <blockquote class="ish-sc-element quote-kevin-1 ish-sc_quote ish-h3 ish-center">&#8220;Choose a job you love, and you will never have to work a day in your life.&#8221;<cite>Confucius</cite></blockquote>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    @endsection
    @section('scripts')
    <script>

    $("#typed").typed({
        strings: ["the full stack", "the fun stack <i class='fa fa-heart'></i>", "data <i class='fa fa-bar-chart'></i>", "to be challenged <i class='fa fa-cog fa-spin'></i>"],
        typeSpeed: 50,
        backSpeed: 100,
        backDelay: 1000,
        contentType: 'html',
        callback: function(){
            lift();
        }
    });
    function lift(){
        $(".head-text").addClass("lift-text");
    }


    </script>
    @endsection
