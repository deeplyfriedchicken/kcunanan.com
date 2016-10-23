@extends('master')
@section('content')
            <!-- Content part section -->
            <section class="ish-part_content ish-without-sidebar">

                <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-bottom-margin-half ish-resp-centered ish-row_notsection ish-valign-middle" >
                    <div class="ish-vc_row_inner">
                        <div class="vc_col-sm-4 wpb_column column_container" >
                            <div class="wpb_wrapper">
                                <div class="ish-sc-element ish-sc_box ish-color7 ish-text-color4 ish-fullwidth ish-same-height ish-has-valign ish-valign-middle" id="div_4f8c_0">
                                    <div class="ish-box-inner">
                                        <div class="vc_row wpb_row vc_inner vc_row-fluid ">
                                            <div class="vc_col-sm-12 wpb_column column_container" >
                                                <div class="wpb_wrapper">
                                                    <h1 class="ish-sc-element ish-sc_headline ish-color4 ish-center ish-bottom-margin-none">Welcome!</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="vc_col-sm-8 wpb_column column_container" >
                            <div class="wpb_wrapper">
                                <div class="ish-sc-element ish-sc_box ish-color5 ish-text-color4 ish-fullwidth ish-same-height ish-has-valign ish-valign-middle" id="div_4f8c_1">
                                    <div class="ish-box-inner">
                                        <div class="vc_row wpb_row vc_inner vc_row-fluid ">
                                            <div class="vc_col-sm-12 wpb_column column_container" >
                                                <div class="wpb_wrapper">

                                                    <div class="wpb_text_column wpb_content_element  ish-text-color4" >
                                                        <div class="wpb_wrapper">
                                                            <p>Hi! I'm Kevin Cunanan. I am currently a junior at Claremont McKenna College double majoring in Computer Science and Philosophy. I love volleyball, rock climbing, and cats. My passion for software development has inspired me to build useful and interactive database-driven web applications. To learn more, check out <a href="{{ URL::asset('kevin-resume.pdf') }}" target="_blank">my resume</a> or go to <a href="/portfolio">my portfolio</a>.</p>

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
                <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-bottom-margin-half ish-resp-centered ish-row_notsection ish-has-portfolio" >
                    <div class="ish-vc_row_inner">
                        <div class="vc_col-sm-12 wpb_column column_container" >
                            <div class="wpb_wrapper">
                                <div class="ish-sc-element ish-sc_portfolio  ish-layout-masonry-tiles ish-ratio-masonry-tiles ish-p-zoomin ish-p-packery" data-count="3"><span class="ish-preloader"></span>
                                    <div class="ish-p-items-container" id="div_4f8c_2">
                                      @foreach($portfolio as $item)
                                        <div class="ish-p-col {{ $item->portfolio_ish }}">
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
                <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-resp-centered ish-row_notsection" >
                    <div class="ish-vc_row_inner">
                        <div class="vc_col-sm-4 wpb_column column_container ish-center" >
                            <div class="wpb_wrapper">
                                <div class="ish-sc-element ish-sc_box ish-color5 ish-text-color4 ish-fullwidth ish-same-height ish-has-valign ish-valign-middle" id="div_4f8c_11">
                                    <div class="ish-box-inner">
                                        <div class="vc_row wpb_row vc_inner vc_row-fluid ">
                                            <div class="vc_col-sm-12 wpb_column column_container" >
                                                <div class="wpb_wrapper">
                                                    <div class="ish-sc-element ish-sc_icon ish-simple ish-color1 ish-text-color4 ish-center" id="div_4f8c_12"><span id="span_4f8c_8"><span class="ish-icon-comment-2" id="span_4f8c_9"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="vc_col-sm-8 wpb_column column_container" >
                            <div class="wpb_wrapper">
                                <div class="ish-sc-element ish-sc_box ish-color7 ish-text-color4 ish-fullwidth ish-same-height ish-has-valign ish-valign-middle" id="div_4f8c_13">
                                    <div class="ish-box-inner">
                                        <div class="vc_row wpb_row vc_inner vc_row-fluid ">
                                            <div class="vc_col-sm-12 wpb_column column_container" >
                                                <div class="wpb_wrapper">
                                                    <blockquote class="ish-sc-element ish-sc_quote ish-h3 ish-center">&#8220;Choose a job you love, and you will never have to work a day in your life.&#8221;<cite>Confucius</cite></blockquote>
                                                </div>
                                            </div>
                                        </div>
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
