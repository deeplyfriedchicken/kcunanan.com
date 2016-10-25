@extends('master')
@section('content')
            <!-- Content part section -->
            <section class="ish-part_content ish-without-sidebar">

                <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-resp-centered ish-row_notsection" style="">
                    <div class="ish-vc_row_inner">
                        <div class="vc_col-sm-12 wpb_column column_container" style="">
                            <div class="wpb_wrapper">
                                <div class="ish-sc-element ish-sc_image ish-center ish-fullwidth">
                                  <a href="{{ URL::asset($blog[0]->media_url) }}" title="" target="_blank"><img width="969" src="{{ URL::asset($blog[0]->media_url) }}" class="attachment-theme-large size-theme-large" alt="{{ $blog[0]->blog_title }}"  /></a>
                                </div>
                                <div class="vc_row wpb_row vc_inner vc_row-fluid  ish-valign-middle">
                                    <div class="vc_col-sm-6 wpb_column column_container ish-center" style="">
                                        <div class="wpb_wrapper">
                                            <h1 class="ish-sc-element ish-sc_headline ish-color8 ish-bottom-margin-none" style="@if($blog[0]->color) color:{{ $blog[0]->color }} @endif">{{ $blog[0]->blog_title }}</h1>
                                              @if($blog[0]->portfolio_link != null)<a href="{{ $blog[0]->portfolio_link }}"> @if(strpos($blog[0]->portfolio_link, 'github' !== false) View Code @else View Site @endif </a>@endif
                                            {{-- <h5 class="ish-sc-element ish-sc_headline ish-color2">{{ $blog[0]->heading }}</h5> --}}
                                        </div>
                                    </div>
                                    <div class="vc_col-sm-6 wpb_column column_container" style="">
                                        <div class="wpb_wrapper">

                                            <div class="wpb_text_column wpb_content_element " style="">
                                                <div class="wpb_wrapper">
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
                @foreach($sections as $section)
                    @if($section->helper_type == 'fp')
                    <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-resp-centered ish-row_notsection" style="">
                        <div class="ish-vc_row_inner">
                            <div class="vc_col-sm-12 wpb_column column_container" style="">
                                <div class="wpb_wrapper">
                                    <h3 class="ish-sc-element ish-sc_headline ish-color8" style="@if($section->color) color:{{ $section->color }} @endif">{{ $section->heading }}</h3>
                                    <div class="wpb_text_column wpb_content_element " style="">
                                        <div class="wpb_wrapper">
                                          {!! $section->content !!}

                                        </div>
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
                                          <a href="{{ URL::asset($section->media_url) }}" title="" target="_blank"><img width="571" height="357" src="{{ URL::asset($section->media_url) }}" class="attachment-theme-half size-theme-half" alt="Ice Scream"  /></a>
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
                                                          @if( $section->heading != null)<h3 class="ish-sc-element ish-sc_headline ish-color8" style="@if($section->color) color:{{ $section->color }} @endif">{{ $section->heading }}</h3>@endif
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
                                                          @if( $section->heading != null)<h3 class="ish-sc-element ish-sc_headline ish-color8" style="@if($section->color) color:{{ $section->color }} @endif">{{ $section->heading }}</h3>@endif
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
                                          <a href="{{ URL::asset($section->media_url) }}" title="" target="_blank"><img width="571" height="547" src="{{ URL::asset($section->media_url) }}" class="attachment-theme-half size-theme-half" alt="ice_scream" /></a>
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
                                                          <blockquote class="ish-sc-element ish-sc_quote ish-h3 ish-center">&#8220;My advice to you is not to inquire why or whither, but just enjoy your ice cream while it&#8217;s on your plate.&#8221;<cite>Thornton Wilder</cite></blockquote>
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
                                <div class="portfolio-next-prev-link ish-next-prev-link"><a class="ish-border" href="#"><span class="ish-icon ish-right"><span class="ish-icon-left-open-big"></span></span> Next</a><span class="ish-spacer">/</span><a class="ish-border" href="#">Previous <span class="ish-icon ish-right"><span class="ish-icon-right-open-big"></span></span></a></div>
                            </div>
                            <div class="table-vertical-divider"></div>
                            <div class="share_box share_box_fixed ish-grid6 ish-color7 ish-text-color4">
                                <div class="ish-sc-element ish-sc_icon ish-simple ish-color1 ish-text-color2 ish-active-text-color13 ish-tooltip-color13 ish-tooltip-text-color4" style="" data-type="tooltip" title="Share on Facebook"><a href="#" style="color: #bac2c4;" target="_blank"><span><span class="ish-icon-facebook"></span></span></a></div>

                                <div class="ish-sc-element ish-sc_icon ish-simple ish-color1 ish-text-color2 ish-active-text-color16 ish-tooltip-color16 ish-tooltip-text-color4" style="" data-type="tooltip" title="Share on Google+"><a href="#" style="color: #bac2c4;" target="_blank"><span><span class="ish-icon-gplus"></span></span></a></div>

                                <div class="ish-sc-element ish-sc_icon ish-simple ish-color1 ish-text-color2 ish-active-text-color17 ish-tooltip-color17 ish-tooltip-text-color4" style="" data-type="tooltip" title="Share on Twitter"><a href="#" style="color: #bac2c4;" target="_blank"><span><span class="ish-icon-twitter"></span></span></a></div>

                                <div class="ish-sc-element ish-sc_icon ish-simple ish-color1 ish-text-color2 ish-active-text-color1 ish-tooltip-color1 ish-tooltip-text-color4" style="" data-type="tooltip" title="Share via e-mail"><a href="#" style="color: #bac2c4;" target="_blank"><span><span class="ish-icon-email"></span></span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- Content part section END -->
@endsection
