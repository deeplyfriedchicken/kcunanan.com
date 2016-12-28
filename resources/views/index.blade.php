@extends('master')
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
                              <div style="text-align:center;"><h1>Featured Projects</h1></div>
                                <div class="ish-sc-element ish-sc_portfolio  ish-layout-masonry-tiles ish-ratio-masonry-tiles ish-p-zoomin ish-p-packery" data-count="3"><span class="ish-preloader"></span>
                                    <div class="ish-p-items-container" id="div_4f8c_2">
                                      @foreach($portfolio as $item)
                                        <div class="ish-p-col ish-p-col-w1 ish-p-col-h1">
                                            <a href="/posts/{{ $item->category }}/{{ $item->sub_category }}/{{ $item->blog_url }}" id="a_4f8c_0">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Content part section END -->
    <!-- ish-body END -->
    @endsection
    @section('quote')
      <div class="vc_row wpb_row white-quote-background vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-resp-centered ish-row_notsection" >
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
