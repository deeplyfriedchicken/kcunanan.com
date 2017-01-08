@extends('master-no-sticky')
@section('meta')
  <meta property="og:image" content="{{ URL::asset('/kcunanan-og.jpg') }}" />

  <meta property="og:description" content="Welcome to Kevin Cunanan's Portfolio! Kevin is really interested in backend and frontend engineering. But he also has other skills." />

  <meta property="og:url"content="http://kcunanan.com/portfolio" />

  <meta property="og:title" content="kcunanan.com - The Portfolio About Kevin" />
@endsection
@section('stylesheets')
  <style>
   .focus-heading {
     font-size: 20px;
     font-weight: 800;
   }
   .text-center {
     text-align: center;
   }
   .ish-sc_portfolio .ish-section-filter ul>li a {
     background-color: #2b3956;
     border-radius: 25px;
     color: #fff;
     line-height: 14px;
   }
   #all {
     font-size: 17px;
     border-radius: 0;
     padding: 15px;
     margin-top: 15px;
   }
   .ish-part_header, .ish-part_tagline {
     background-color: #fff;
   }
  </style>
@endsection
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
                                      <h1 data-firstletter="W">Portfolio</h1>
                                      <h2>A list of professional and personal projects.</h2>
                                  </div>
                                  <div class="wpb_column ish-grid5 ish-pt-taglines-additional">
                                      <p>
                                          I have a strong focus in full stack development, but I do have hardware and design projects as well.
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
                            <div class="ish-sc_separator ish-separator-text ish-separator-double ish-taglines-separator">
                                <span class="ish-line ish-left"><span class="ish-line-border"></span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-resp-centered ish-row_notsection ish-has-portfolio" style="">
                <div class="ish-vc_row_inner">
                    <div class="vc_col-sm-12 wpb_column column_container" style="">
                        <div class="wpb_wrapper">
                            <div class="ish-sc-element ish-sc_portfolio ish-layout-masonry-grid ish-ratio-masonry-grid ish-p-zoomin ish-p-packery" data-count="3">
                                <span class="ish-preloader"></span>
                                <div class="ish-section-filter ish-center ish-color5 ish-text-color4">
                                    <div class="ish-vc_row_inner">
                                        <nav class="ish-sc-element ish-p-filter" data-type="organize">
                                          <div class="vc_col-sm-3 wpb_column column_container port-tags">
                                            <div class="text-center"><h4>Frameworks</h4></div>
                                            <ul>
                                              @foreach($frs as $tag)
                                                <li><a href="#" data-filter=".pfilt-{{ preg_replace("/[\s_]/", "-", strtolower($tag->tag)) }}">{{ ucwords($tag->tag) }}</a></li>
                                              @endforeach
                                            </ul>
                                          </div>
                                          <div class="vc_col-sm-3 wpb_column column_container port-tags">
                                            <div class="text-center"><h4>Skills</h4></div>
                                            <ul>
                                              @foreach($skills as $tag)
                                                <li><a href="#" data-filter=".pfilt-{{ preg_replace("/[\s_]/", "-", strtolower($tag->tag)) }}">{{ ucwords($tag->tag) }}</a></li>
                                              @endforeach
                                            </ul>
                                          </div>
                                          <div class="vc_col-sm-3 wpb_column column_container port-tags">
                                            <div class="text-center"><h4>Languages</h4></div>
                                            <ul>
                                            @foreach($pls as $tag)
                                              <li><a href="#" data-filter=".pfilt-{{ preg_replace("/[\s_]/", "-", strtolower($tag->tag)) }}">{{ ucwords($tag->tag) }}</a></li>
                                            @endforeach
                                            </ul>
                                          </div>
                                          <div class="vc_col-sm-3 wpb_column column_container port-tags">
                                            <div class="text-center"><h4>Previous Employment</h4></div>
                                            <ul>
                                              @foreach($workplaces as $tag)
                                                <li><a href="#" data-filter=".pfilt-{{ preg_replace("/[\s_]/", "-", strtolower($tag->tag)) }}">{{ ucwords($tag->tag) }}</a></li>
                                              @endforeach
                                            </ul>
                                          </div>
                                          <div class="vc_col-sm-12 wpb_column column_container port-tags">
                                            <ul><li><a id="all" class="ish-active" href="#all" data-filter="*">All</a></li></ul>
                                          </div>
                                        {{-- <ul>
                                            <li><span class="focus-heading">I know these languages:</span></li>
                                            @foreach($pls as $tag)
                                              <li><a href="#" data-filter=".pfilt-{{ preg_replace("/[\s_]/", "-", strtolower($tag->tag)) }}">{{ ucwords($tag->tag) }}</a></li>
                                            @endforeach
                                            <br>
                                            <li><span class="focus-heading">I've used these frameworks:</span></li>
                                            @foreach($frs as $tag)
                                              <li><a href="#" data-filter=".pfilt-{{ preg_replace("/[\s_]/", "-", strtolower($tag->tag)) }}">{{ ucwords($tag->tag) }}</a></li>
                                            @endforeach
                                            <br>
                                            <li><span class="focus-heading">I have the following skills:</span></li>
                                            @foreach($skills as $tag)
                                              <li><a href="#" data-filter=".pfilt-{{ preg_replace("/[\s_]/", "-", strtolower($tag->tag)) }}">{{ ucwords($tag->tag) }}</a></li>
                                            @endforeach
                                            <br>
                                            <li><span class="focus-heading">I utilized these libraries and APIs:</span></li>
                                            @foreach($js as $tag)
                                              <li><a href="#" data-filter=".pfilt-{{ preg_replace("/[\s_]/", "-", strtolower($tag->tag)) }}">{{ ucwords($tag->tag) }}</a></li>
                                            @endforeach
                                            <br>
                                            <li><span class="focus-heading">I have worked for these companies:</span></li>
                                            @foreach($workplaces as $tag)
                                              <li><a href="#" data-filter=".pfilt-{{ preg_replace("/[\s_]/", "-", strtolower($tag->tag)) }}">{{ ucwords($tag->tag) }}</a></li>
                                            @endforeach
                                            <br>
                                        </ul> --}}
                                        </nav>
                                    </div>
                                </div>
                                <div class="ish-p-items-container" style="width: calc( 100% + 20px ); margin: -10px;">
                                  @foreach($portfolio as $item)
                                    <div class="ish-p-col <?php $ptags = DB::table('lookups')->where('ref_id', $item->id)->where('category', 'ptag')->get() ?>@foreach($ptags as $ptag) pfilt-{{ preg_replace("/[\s_]/", "-", strtolower($ptag->tag)) }} @endforeach {{ $item->portfolio_ish }}">
                                        <a href="/posts/{{ strtolower(preg_replace("/[\s_]/", "-", $item->category)) }}/{{ strtolower(preg_replace("/[\s_]/", "-", $item->sub_category)) }}/{{ strtolower(preg_replace("/[\s_]/", "-", $item->blog_url)) }}" style="border-width: 10px;">
                                        <div class="ish-p-item">
                                            <div class="ish-p-img" style="background-image: url('{{ URL::asset($item->portfolio_image) }}');">
                                            </div>
                                            <div class="ish-p-overlay ish-color9 ish-text-color6">
                                                <div>
                                                    <span class="ish-p-title"><span class="ish-p-box" style="opacity: 1; background-color: {{ $colors[rand(0, count($colors)-1)] }}"><span class="ish-p-headline">{{ $item->blog_title }}</span><span class="ish-p-cat">{{ $item->sub_category }}</span></span></span>
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
