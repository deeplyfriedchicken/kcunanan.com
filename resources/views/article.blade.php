@extends('master')
@section('meta')
  <meta property="og:image" content="{{ URL::asset($blog[0]->media_url) }}" />

  <meta property="og:description" content="{{ $blog[0]->heading }}" />

  <meta property="og:url"content="{{ URL::asset("/posts"."/".$blog[0]->category."/".$blog[0]->sub_category."/".$blog[0]->blog_url) }}" />

  <meta property="og:title" content="kcunanan.com - {{ $blog[0]->blog_title }}" />
@endsection
@section('stylesheets')
  <style>
  #portfolio-link, #github-link {
    @if($blog[0]->color) background-color: {{ $blog[0]->color }} @endif;
    width: 85%;
  }
  #portfolio-link:hover, #github-link:hover {
    background-color: #2c3a55;
  }
  h6.tags {
    font-weight: 800;
  }
  p {
  	color: #000;
  	font-family: 'Open Sans';
  }
  /* Overwrite annoying CSS */
  .ish-part_content.ish-without-sidebar>.ish-row>.ish-row_inner, .ish-part_content.ish-without-sidebar>.ish-row>.ish-vc_row_inner, .ish-part_content.ish-without-sidebar>.wpb_row>.ish-row_inner, .ish-part_content.ish-without-sidebar>.wpb_row>.ish-vc_row_inner {
    padding-bottom: 20px;
  }
  .text-center {
    text-align: center;
  }
  .fb-share-button {
    top: -7px;
  }
  </style>
@endsection
@section('facebook-dev')
  @if($blog[0]->category == 'blog')
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '277376799346635',
          xfbml      : true,
          version    : 'v2.8'
        });
        FB.AppEvents.logPageView();
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
  @endif
@endsection
@section('content')
            <!-- Content part section -->
            <section class="ish-part_content ish-without-sidebar">

                <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-resp-centered ish-row_notsection" style="">
                    <div class="ish-vc_row_inner">
                        <div class="vc_col-sm-12 wpb_column column_container" style="">
                            <div class="wpb_wrapper">
                                <div class="ish-sc-element ish-sc_image ish-center ish-fullwidth">
                                  <a href="{{ URL::asset($blog[0]->media_url) }}" title="" target="_blank"><img width="969" src="{{ URL::asset($blog[0]->media_url) }}" class="attachment-theme-large size-theme-large" alt="{{ $blog[0]->blog_title }}"/></a>
                                </div>
                                <div class="vc_row wpb_row vc_inner vc_row-fluid  ish-valign-middle">
                                    <div class="vc_col-sm-6 wpb_column column_container ish-center" style="">
                                        <div class="wpb_wrapper">
                                            <h1 class="ish-sc-element ish-sc_headline ish-color8 ish-bottom-margin-none" style=" @if($blog[0]->color) {{ 'color:'.$blog[0]->color }}  @endif">{{ $blog[0]->blog_title }}</h1>
                                              @if($blog[0]->portfolio_link != null || $blog[0]->github_url != null)
                                              <div class="ish-sc-element ish-sc_cf7 ish-color6 ish-text-color1 ish-bg-text-color1 ish-button-bg-color5 ish-button-text-color4">
                                                                <div class="ish-row">
                                                                  @if($blog[0]->portfolio_link != null && $blog[0]->github_url != null)
                                                                    <div class="ish-grid6">
                                                                        <p class="portfolio-p">
                                                                            <a class="portfolio-link" href="{{ $blog[0]->portfolio_link }}" target="_blank"><button id="portfolio-link" class="wpcf7-form-control wpcf7-submit ish-cf7-submit" style="color: #fff;">View Site</button></a>
                                                                            </p><div id="msg" class="message"></div>
                                                                        <p></p>
                                                                    </div>
                                                                    <div class="ish-grid6">
                                                                        <p class="portfolio-p">
                                                                            <a class="github-link" href="{{ $blog[0]->github_url }}" target="_blank"><button id="github-link" class="wpcf7-form-control wpcf7-submit ish-cf7-submit" style="color: #fff;">View Code</button></a>
                                                                            </p><div id="msg" class="message"></div>
                                                                        <p></p>
                                                                    </div>
                                                                  @elseif($blog[0]->portfolio_link != null && $blog[0]->github_url == null)
                                                                    <div class="ish-grid12">
                                                                        <p class="portfolio-p">
                                                                            <a class="portfolio-link" href="{{ $blog[0]->portfolio_link }}" target="_blank"><button id="portfolio-link" class="wpcf7-form-control wpcf7-submit ish-cf7-submit" style="color: #fff;">View Site</button></a>
                                                                            </p><div id="msg" class="message"></div>
                                                                        <p></p>
                                                                    </div>
                                                                  @elseif($blog[0]->github_url != null && $blog[0]->portfolio_link == null)
                                                                    <div class="ish-grid12">
                                                                        <p class="portfolio-p">
                                                                            <a class="github-link" href="{{ $blog[0]->github_url }}" target="_blank"><button id="github-link" class="wpcf7-form-control wpcf7-submit ish-cf7-submit" style="color: #fff;">View Code</button></a>
                                                                            </p><div id="msg" class="message"></div>
                                                                        <p></p>
                                                                    </div>
                                                                  @endif
                                                                </div>
                                                    </div>
                                                    @endif
                                            {{-- <h5 class="ish-sc-element ish-sc_headline ish-color2">{{ $blog[0]->heading }}</h5> --}}
                                        </div>
                                    </div>
                                    <div class="vc_col-sm-6 wpb_column column_container" style="">
                                        <div class="wpb_wrapper">

                                            <div class="wpb_text_column wpb_content_element " style="">
                                                <div class="wpb_wrapper">
                                                    @if($blog[0]->category == 'blog')
                                                      <div class="text-center">
                                                        <a class="tumblr-share-button" data-color="blue" data-notes="right" data-href="{{ URL::asset("/posts/".strtolower(preg_replace("/[\s_]/", "-", $blog[0]->category))."/".strtolower(preg_replace("/[\s_]/", "-", $blog[0]->sub_category))."/".strtolower(preg_replace("/[\s_]/", "-", $blog[0]->blog_url))) }}" href="https://embed.tumblr.com/share"></a> <script>!function(d,s,id){var js,ajs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://assets.tumblr.com/share-button.js";ajs.parentNode.insertBefore(js,ajs);}}(document, "script", "tumblr-js");</script>
                                                      <div class="fb-share-button" data-href="{{ URL::asset("/posts/".strtolower(preg_replace("/[\s_]/", "-", $blog[0]->category))."/".strtolower(preg_replace("/[\s_]/", "-", $blog[0]->sub_category))."/".strtolower(preg_replace("/[\s_]/", "-", $blog[0]->blog_url))) }}" data-layout="button_count" data-size="small" data-mobile-iframe="true"></div>
                                                    </div>
                                                    @endif
                                                    <h6 class="tags">Tags: @foreach($tags as $tag)@if($loop->last){{ $tag->tag }}@else{{ $tag->tag }}, @endif @endforeach</h6>
                                                    <p>{{ $blog[0]->heading }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-resp-centered ish-row_notsection" style="">
                        <div class="ish-vc_row_inner">
                            <div class="vc_col-sm-12 wpb_column column_container" style="">
                                <div class="wpb_wrapper">
                                    <div class="wpb_text_column wpb_content_element " style="">
                                        <div class="wpb_wrapper">
                                          {!! $blog[0]->content !!}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @foreach($sections as $section)
                    @if($section->helper_type == 'fp')
                    <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-resp-centered ish-row_notsection" style="">
                        <div class="ish-vc_row_inner">
                            <div class="vc_col-sm-12 wpb_column column_container" style="">
                                <div class="wpb_wrapper">
                                    @if($section->heading)<h3 class="article-subheading ish-sc-element-15 ish-sc_headline ish-color8" style="@if($section->color) color:{{ $section->color }} @endif">{{ $section->heading }}</h3>@endif
                                    <div class="wpb_text_column wpb_content_element " style="">
                                        <div class="wpb_wrapper">
                                          {!! $section->content !!}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @elseif($section->helper_type == 'fc')
                      <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-resp-centered ish-row_notsection" style="">
                          <div class="ish-vc_row_inner">
                              <div class="vc_col-sm-12 wpb_column column_container" style="">
                                  <div class="wpb_wrapper">
                                      @if($section->heading)<h3 class="article-subheading ish-sc-element-15 ish-sc_headline ish-color8" style="@if($section->color) color:{{ $section->color }} @endif">{{ $section->heading }}</h3>@endif
                                      <div class="wpb_text_column wpb_content_element " style="">
                                          <div class="wpb_wrapper">
                                            {!! $section->code !!}

                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                    @elseif($section->helper_type == 'fim')<div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-resp-centered ish-row_notsection" style="">
                        <div class="ish-vc_row_inner">
                            <div class="vc_col-sm-12 wpb_column column_container" style="">
                                <div class="wpb_wrapper">
                                    @if($section->heading)<h3 class="article-subheading ish-sc-element-15 ish-sc_headline ish-color8" style="@if($section->color) color:{{ $section->color }} @endif">{{ $section->heading }}</h3>@endif
                                    <div class="wpb_text_column wpb_content_element " style="">
                                        <div class="wpb_wrapper" style="text-align: center;">
                                          <a href="{{ URL::asset($section->media_url) }}" title="" target="_blank"><img src="{{ URL::asset($section->media_url) }}" alt=""  /></a
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @elseif($section->helper_type == 'cp')
                      <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-resp-centered ish-row_notsection ish-valign-middle" style="">
                          <div class="ish-vc_row_inner">
                              <div class="vc_col-sm-6 wpb_column column_container" style="">
                                  <div class="wpb_wrapper">
                                      <div class="ish-sc-element ish-sc_image ish-fullwidth">
                                          {!! $section->code !!}
                                      </div>
                                  </div>
                              </div>

                              <div class="vc_col-sm-6 wpb_column column_container" style="">
                                  <div class="wpb_wrapper">
                                      <div class="ish-sc-element ish-sc_box ish-fullwidth" style=" padding:  0 30px 0 30px; border-width: 3px;">
                                          <div class="ish-box-inner">
                                              <div class="vc_row wpb_row vc_inner vc_row-fluid ">
                                                  <div class="vc_col-sm-12 wpb_column column_container" style="">
                                                      <div class="wpb_wrapper">
                                                          @if($section->heading)<h3 class="article-subheading ish-sc-element-15 ish-sc_headline ish-color8" style="@if($section->color) color:{{ $section->color }} @endif">{{ $section->heading }}</h3>@endif
                                                          <div class="wpb_text_column wpb_content_element " style="">
                                                              <div class="wpb_wrapper">
                                                                  {!! $section->content !!}
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      @elseif($section->helper_type == 'cp48')
                        <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-resp-centered ish-row_notsection ish-valign-middle" style="">
                            <div class="ish-vc_row_inner">
                                <div class="vc_col-sm-4 wpb_column column_container" style="">
                                    <div class="wpb_wrapper">
                                        <div class="ish-sc-element ish-sc_image ish-fullwidth">
                                            {!! $section->code !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="vc_col-sm-8 wpb_column column_container" style="">
                                    <div class="wpb_wrapper">
                                        <div class="ish-sc-element ish-sc_box ish-fullwidth" style=" padding:  0 30px 0 30px; border-width: 3px;">
                                            <div class="ish-box-inner">
                                                <div class="vc_row wpb_row vc_inner vc_row-fluid ">
                                                    <div class="vc_col-sm-12 wpb_column column_container" style="">
                                                        <div class="wpb_wrapper">
                                                            @if($section->heading)<h3 class="article-subheading ish-sc-element-15 ish-sc_headline ish-color8" style="@if($section->color) color:{{ $section->color }} @endif">{{ $section->heading }}</h3>@endif
                                                            <div class="wpb_text_column wpb_content_element " style="">
                                                                <div class="wpb_wrapper">
                                                                    {!! $section->content !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      @elseif($section->helper_type == 'pc84')
                        <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-resp-centered ish-row_notsection ish-valign-middle" style="">
                            <div class="ish-vc_row_inner">
                                <div class="vc_col-sm-8 wpb_column column_container" style="">
                                    <div class="wpb_wrapper">
                                        <div class="ish-sc-element ish-sc_box ish-fullwidth" style=" padding:  0 30px 0 30px; border-width: 3px;">
                                            <div class="ish-box-inner">
                                                <div class="vc_row wpb_row vc_inner vc_row-fluid ">
                                                    <div class="vc_col-sm-12 wpb_column column_container" style="">
                                                        <div class="wpb_wrapper">
                                                            @if($section->heading)<h3 class="article-subheading ish-sc-element-15 ish-sc_headline ish-color8" style="@if($section->color) color:{{ $section->color }} @endif">{{ $section->heading }}</h3>@endif
                                                            <div class="wpb_text_column wpb_content_element " style="">
                                                                <div class="wpb_wrapper">
                                                                    {!! $section->content !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_col-sm-4 wpb_column column_container" style="">
                                    <div class="wpb_wrapper">
                                        <div class="ish-sc-element ish-sc_image ish-fullwidth">
                                            {!! $section->code !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($section->helper_type == 'imp')
                      <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-resp-centered ish-row_notsection ish-valign-middle" style="">
                          <div class="ish-vc_row_inner">
                              <div class="vc_col-sm-6 wpb_column column_container" style="">
                                  <div class="wpb_wrapper">
                                      <div class="ish-sc-element ish-sc_image ish-fullwidth">
                                          <a href="{{ URL::asset($section->media_url) }}" title="" target="_blank"><img width="571" height="357" src="{{ URL::asset($section->media_url) }}" class="attachment-theme-half size-theme-half" alt=""  /></a>
                                      </div>
                                  </div>
                              </div>

                              <div class="vc_col-sm-6 wpb_column column_container" style="">
                                  <div class="wpb_wrapper">
                                      <div class="ish-sc-element ish-sc_box ish-fullwidth" style=" padding:  0 30px 0 30px; border-width: 3px;">
                                          <div class="ish-box-inner">
                                              <div class="vc_row wpb_row vc_inner vc_row-fluid ">
                                                  <div class="vc_col-sm-12 wpb_column column_container" style="">
                                                      <div class="wpb_wrapper">
                                                          @if($section->heading)<h3 class="article-subheading ish-sc-element-15 ish-sc_headline ish-color8" style="@if($section->color) color:{{ $section->color }} @endif">{{ $section->heading }}</h3>@endif
                                                          <div class="wpb_text_column wpb_content_element " style="">
                                                              <div class="wpb_wrapper">
                                                                  {!! $section->content !!}

                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      @elseif($section->helper_type == 'imp48')
                        <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-resp-centered ish-row_notsection ish-valign-middle" style="">
                            <div class="ish-vc_row_inner">
                                <div class="vc_col-sm-4 wpb_column column_container" style="">
                                    <div class="wpb_wrapper">
                                        <div class="ish-sc-element ish-sc_image ish-fullwidth">
                                            <a href="{{ URL::asset($section->media_url) }}" title="" target="_blank"><img width="571" height="357" src="{{ URL::asset($section->media_url) }}" class="attachment-theme-half size-theme-half" alt=""  /></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="vc_col-sm-8 wpb_column column_container" style="">
                                    <div class="wpb_wrapper">
                                        <div class="ish-sc-element ish-sc_box ish-fullwidth" style=" padding:  0 30px 0 30px; border-width: 3px;">
                                            <div class="ish-box-inner">
                                                <div class="vc_row wpb_row vc_inner vc_row-fluid ">
                                                    <div class="vc_col-sm-12 wpb_column column_container" style="">
                                                        <div class="wpb_wrapper">
                                                            @if($section->heading)<h3 class="article-subheading ish-sc-element-15 ish-sc_headline ish-color8" style="@if($section->color) color:{{ $section->color }} @endif">{{ $section->heading }}</h3>@endif
                                                            <div class="wpb_text_column wpb_content_element " style="">
                                                                <div class="wpb_wrapper">
                                                                    {!! $section->content !!}

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif($section->helper_type == 'pim84')
                          <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-resp-centered ish-row_notsection ish-valign-middle" style="">
                              <div class="ish-vc_row_inner">
                                  <div class="vc_col-sm-8 wpb_column column_container" style="">
                                      <div class="wpb_wrapper">
                                          <div class="ish-sc-element ish-sc_box ish-fullwidth" style=" padding:  0 30px 0 30px; border-width: 3px;">
                                              <div class="ish-box-inner">
                                                  <div class="vc_row wpb_row vc_inner vc_row-fluid ">
                                                      <div class="vc_col-sm-12 wpb_column column_container" style="">
                                                          <div class="wpb_wrapper">
                                                              @if($section->heading)<h3 class="article-subheading ish-sc-element-15 ish-sc_headline ish-color8" style="@if($section->color) color:{{ $section->color }} @endif">{{ $section->heading }}</h3>@endif
                                                              <div class="wpb_text_column wpb_content_element " style="">
                                                                  <div class="wpb_wrapper">
                                                                      {!! $section->content !!}

                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="vc_col-sm-4 wpb_column column_container" style="">
                                      <div class="wpb_wrapper">
                                          <div class="ish-sc-element ish-sc_image ish-fullwidth">
                                              <a href="{{ URL::asset($section->media_url) }}" title="" target="_blank"><img width="571" height="357" src="{{ URL::asset($section->media_url) }}" class="attachment-theme-half size-theme-half" alt=""  /></a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      @elseif($section->helper_type == 'pc')
                        <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-resp-centered ish-row_notsection ish-valign-middle" style="">
                            <div class="ish-vc_row_inner">
                                <div class="vc_col-sm-6 wpb_column column_container ish-right" style="">
                                    <div class="wpb_wrapper">
                                        <div class="ish-sc-element ish-sc_box ish-fullwidth" style=" padding:  0 30px 0 30px; border-width: 3px;">
                                            <div class="ish-box-inner">
                                                <div class="vc_row wpb_row vc_inner vc_row-fluid ">
                                                    <div class="vc_col-sm-12 wpb_column column_container" style="">
                                                        <div class="wpb_wrapper">
                                                            @if($section->heading)<h3 class="article-subheading ish-sc-element-15 ish-sc_headline ish-color8" style="@if($section->color) color:{{ $section->color }} @endif">{{ $section->heading }}</h3>@endif
                                                            <div class="wpb_text_column wpb_content_element " style="">
                                                                <div class="wpb_wrapper">
                                                                    {!! $section->content !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="vc_col-sm-6 wpb_column column_container" style="">
                                    <div class="wpb_wrapper">
                                        <div class="ish-sc-element ish-sc_image ish-fullwidth">
                                            {!! $section->code !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      @elseif($section->helper_type == 'pim')
                      <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-resp-centered ish-row_notsection ish-valign-middle" style="">
                          <div class="ish-vc_row_inner">
                              <div class="vc_col-sm-6 wpb_column column_container ish-right" style="">
                                  <div class="wpb_wrapper">
                                      <div class="ish-sc-element ish-sc_box ish-fullwidth" style=" padding:  0 30px 0 30px; border-width: 3px;">
                                          <div class="ish-box-inner">
                                              <div class="vc_row wpb_row vc_inner vc_row-fluid ">
                                                  <div class="vc_col-sm-12 wpb_column column_container" style="">
                                                      <div class="wpb_wrapper">
                                                          @if($section->heading)<h3 class="article-subheading ish-sc-element-15 ish-sc_headline ish-color8" style="@if($section->color) color:{{ $section->color }} @endif">{{ $section->heading }}</h3>@endif
                                                          <div class="wpb_text_column wpb_content_element " style="">
                                                              <div class="wpb_wrapper">
                                                                  {!! $section->content !!}
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <div class="vc_col-sm-6 wpb_column column_container" style="">
                                  <div class="wpb_wrapper">
                                      <div class="ish-sc-element ish-sc_image ish-fullwidth">
                                          <a href="{{ URL::asset($section->media_url) }}" title="" target="_blank"><img width="571" height="547" src="{{ URL::asset($section->media_url) }}" class="attachment-theme-half size-theme-half" alt="" /></a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      @elseif($section->helper_type == 'quote')
                      <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-resp-centered ish-row_notsection" style="">
                          <div class="ish-vc_row_inner">
                              <div class="vc_col-sm-12 wpb_column column_container" style="">
                                  <div class="wpb_wrapper">
                                      <div class="ish-sc-element ish-sc_box ish-text-color2 ish-fullwidth" style=" padding:  0 60px 0 60px; border-width: 3px;">
                                          <div class="ish-box-inner">
                                              <div class="vc_row wpb_row vc_inner vc_row-fluid ">
                                                  <div class="vc_col-sm-12 wpb_column column_container" style="">
                                                      <div class="wpb_wrapper">
                                                          <blockquote class="ish-sc-element ish-sc_quote ish-h3 ish-center">&#8220;My advice to you is not to inquire why or whither, but just enjoy your  while it&#8217;s on your plate.&#8221;<cite>Thornton Wilder</cite></blockquote>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endif
                @endforeach



                <div class="wpb_row vc_row-fluid ish-row-notfull ish-row_notsection ish-portfolio-prevnext-container ish-display-nav-social">
                    <div class="ish-vc_row_inner">
                        <!--<div class="ish-sc_separator ish-separator-text ish-separator-double ish-separator-prev-next-social">
                                        <span class="ish-line ish-left">
                                            <span class="ish-line-border">
                                            </span>
                                        </span>
                                    </div>-->
                        <div class="ish-display-table">
                            <div class="ish-single_portfolio_post_navigation ish-single_navigation ish-grid6 ish-color1 ish-text-color4">
                              @if($next == null && $previous != null)
                                <div class="portfolio-next-prev-link ish-next-prev-link"><a class="ish-border" href="{{ $previous }}"><span class="ish-icon ish-left"><span class="ish-icon-left-open-big"></span></span> Previous</a></div>
                              @elseif ($previous == null && $next != null)
                                <div class="portfolio-next-prev-link ish-next-prev-link"><a class="ish-border" href="{{ $next }}">Next <span class="ish-icon ish-right"><span class="ish-icon-right-open-big"></span></span></a></div>
                              @else
                                <div class="portfolio-next-prev-link ish-next-prev-link"><a class="ish-border" href="{{ $previous }}"><span class="ish-icon ish-left"><span class="ish-icon-left-open-big"></span></span> Previous</a><span class="ish-spacer">/</span><a class="ish-border" href="{{ $next }}">Next <span class="ish-icon ish-right"><span class="ish-icon-right-open-big"></span></span></a></div>
                              @endif
                            </div>
                            <div class="table-vertical-divider"></div>
                            <div class="share_box share_box_fixed ish-grid6 ish-color7 ish-text-color4">
                                <div class="ish-sc-element ish-sc_icon ish-simple ish-color1 ish-text-color2 ish-active-text-color13 ish-tooltip-color13 ish-tooltip-text-color4" style="" data-type="tooltip" title="Share on Facebook"><a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(URL::asset("/posts/".strtolower(preg_replace("/[\s_]/", "-", $blog[0]->category))."/".strtolower(preg_replace("/[\s_]/", "-", $blog[0]->sub_category))."/".strtolower(preg_replace("/[\s_]/", "-", $blog[0]->blog_url)))) }}&display=popup" style="color: #bac2c4;" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank"><span><span class="ish-icon-facebook"></span></span></a></div>

                                <div class="ish-sc-element ish-sc_icon ish-simple ish-color1 ish-text-color2 ish-active-text-color15 ish-tooltip-color15 ish-tooltip-text-color4" style="" data-type="tooltip" title="Share on LinkedIn"><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(URL::asset("/posts/".strtolower(preg_replace("/[\s_]/", "-", $blog[0]->category))."/".strtolower(preg_replace("/[\s_]/", "-", $blog[0]->sub_category))."/".strtolower(preg_replace("/[\s_]/", "-", $blog[0]->blog_url)))) }}&title={{ urlencode($blog[0]->blog_title) }}&summary={{ urlencode($blog[0]->blog_title) }}&source=KevinCunanan" style="color: #bac2c4;" target="_blank"><span><i class="fa fa-linkedin"></i></span></a></div>

                                <div class="ish-sc-element ish-sc_icon ish-simple ish-color1 ish-text-color2 ish-active-text-color1 ish-tooltip-color1 ish-tooltip-text-color4" style="" data-type="tooltip" title="Share via e-mail"><a href="mailto:?subject=kcunanan.com - {{ $blog[0]->blog_title }}&body=Check out this article! {{ URL::asset("/posts/".strtolower(preg_replace("/[\s_]/", "-", $blog[0]->category))."/".strtolower(preg_replace("/[\s_]/", "-", $blog[0]->sub_category))."/".strtolower(preg_replace("/[\s_]/", "-", $blog[0]->blog_url))) }}" style="color: #bac2c4;"><span><span class="ish-icon-email"></span></span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- Content part section END -->
@endsection
