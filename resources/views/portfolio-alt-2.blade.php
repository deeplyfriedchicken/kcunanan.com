@extends('master')
@section('content')
            <div class="ish-part_tagline ish-tagline_regular ish-tagline-colored ish-no-pattern-img">
                <div class="ish-overlay ish-default-tagline">
                </div>
                <div class="ish-row ish-row-notfull ish-resp-centered ish-valign-middle">
                    <div class="ish-row_inner">
                        <div class="ish-pt-taglines-main">
                            <div class="ish-pt-taglines-left ish-default">
                                <div class="ish-overlay">
                                </div>
                                <div class="ish-pt-container">
                                    <div class="wpb_row ish-valign-middle">
                                        <div class="ish-vc_row_inner">
                                            <div class="wpb_column ish-grid1">
                                            </div>
                                            <div class="wpb_column ish-grid5 ish-pt-taglines">
                                                <h1 data-firstletter="W">What I&#039;ve done</h1>
                                                <h2>&amp; is worth to mention</h2>
                                            </div>
                                            <div class="wpb_column ish-grid5 ish-pt-taglines-additional">
                                                <p>
                                                    Have a look around at my applications! Most projects are web apps, but I do have some hardware and design projects in here too!
                                                </p>
                                            </div>
                                            <div class="wpb_column ish-grid1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Content part section -->
            <section class="ish-part_content ish-without-sidebar">

                <div class="wpb_row vc_row-fluid ish-row-notfull ish-resp-centered ish-row_section ish-taglines-separator-row" style="">
                    <div class="ish-vc_row_inner">
                        <div class="vc_col-sm-12 wpb_column column_container" style="">
                            <div class="wpb_wrapper">
                                <div class="ish-sc_separator ish-separator-text ish-separator-double ish-taglines-separator"><span class="ish-line ish-left"><span class="ish-line-border"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-resp-centered ish-row_notsection ish-has-portfolio" style="">
                    <div class="ish-vc_row_inner">
                        <div class="vc_col-sm-12 wpb_column column_container" style="">
                            <div class="wpb_wrapper">
                                <div class="ish-sc-element ish-sc_portfolio  ish-layout-square ish-ratio-square ish-p-3dcube-bottom" data-count="3"><span class="ish-preloader"></span>
                                    <div class="ish-section-filter ish-center ish-color5 ish-text-color4">
                                        <div class="ish-vc_row_inner">
                                            <nav class="ish-sc-element ish-p-filter" data-type="fade">
                                                <ul>
                                                    <li><a class="ish-active" href="#all" data-filter="*">All</a></li>
                                                    @foreach($tags as $tag)
                                                      <li><a href="#" data-filter=".pfilt-{{ $tag->tag }}">{{ ucwords($tag->tag) }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                    <div class="ish-p-items-container" style="width: calc( 100% + 0px ); margin: 0px;">
                                        @foreach($portfolio as $item)
                                          <div class="ish-p-col  <?php $ptags = DB::table('lookups')->where('ref_id', $item->id)->where('category', 'ptag')->get() ?>@foreach($ptags as $ptag) pfilt-{{ $ptag->tag }} @endforeach">
                                              <a href="/posts/{{ $item->category }}/{{ $item->sub_category }}/{{ $item->blog_url }}" style="border-width: 0px;">
                                                  <div class="ish-p-item">
                                                      <div class="ish-p-img" style="background-image: url('{{ URL::asset($item->portfolio_image) }}');"></div>
                                                      <div class="ish-p-overlay {{ $colors[rand(0,count($colors)-1)] }}" style="background-image: url('{{ URL::asset($item->portfolio_image) }}');">
                                                          <div><span class="ish-p-title"><span class="ish-p-box" style="opacity: 1;"><span class="ish-p-headline">{{ $item->blog_title }}</span></span>
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

            <!-- #content  END -->
  @endsection
