@extends('master')
@section('content')

            <!-- Content part section -->
            <section class="ish-part_content ish-without-sidebar">

                <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-bottom-margin-half ish-resp-centered ish-row_notsection" style="">
                    <div class="ish-vc_row_inner">
                      <div class="vc_col-sm-6 wpb_column column_container" style="">
                          <div class="wpb_wrapper">
                              <div class="ish-sc-element ish-sc_box ish-color7 ish-text-color4 ish-fullwidth ish-bottom-margin-half" style=" padding:  60px 60px 60px 60px; border-width: 3px;">
                                  <div class="ish-box-inner">
                                      <div class="vc_row wpb_row vc_inner vc_row-fluid ">
                                          <div class="vc_col-sm-12 wpb_column column_container" style="">
                                              <div class="wpb_wrapper">
                                                  <div class="ish-sc-element ish-sc_headline ish-right ish-h1">Talk to me!</div>
                                                  <h5 class="ish-sc-element ish-sc_headline ish-right">(I'm pretty lonely)</h5>
                                                  <div class="wpb_text_column wpb_content_element  ish-right" style="">
                                                      <div class="wpb_wrapper">
                                                          <p>Have something you want me to make? A small website? A logo? Design? All of those things and more? Feel free to contact me however you see fit. Message me for more information.</p>
                                                          <p>Email: kevin@kcunanan.com</p>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="ish-sc-element ish-sc_image ish-fullwidth">
                                  <a href="upload/1602123_square.jpg" title="" target="_blank"><img width="571" height="571" src="{{ URL::asset('images/kevin-bobcat.jpg') }}" class="attachment-theme-half size-theme-half" alt="Painter"  /></a>
                              </div>
                          </div>
                      </div>

                        <div class="vc_col-sm-6 wpb_column column_container" style="">
                            <div class="wpb_wrapper">
                                <div class="ish-sc-element ish-sc_box ish-fullwidth" style=" padding:  60px 60px 60px 40px; border-width: 3px;">
                                    <div class="ish-box-inner">
                                        <div class="vc_row wpb_row vc_inner vc_row-fluid ">
                                            <div class="vc_col-sm-12 wpb_column column_container" style="">
                                                <div class="wpb_wrapper">
                                                    @if(Session::has('mail-success'))
                                                      <div class="ish-sc-element ish-sc_icon ish-simple ish-color1 ish-text-color5" style="font-size:50px;width:50px;height:50px;"><span style="width:50px;height:50px;"><span class="ish-icon-comment-1" style="font-size:50px;line-height:50px; color:#226f22;"></span></span>
                                                      </div>
                                                      <h1 class="ish-sc-element ish-sc_headline ish-color5 ish-bottom-margin-none" style="color: #226f22;">Message</h1>
                                                      <h3 class="ish-sc-element ish-sc_headline ish-color5" style="color: #226f22;">successfully sent!</h3>
                                                      <div class="wpb_text_column wpb_content_element " style="">
                                                          <div class="wpb_wrapper">
                                                              <p>{{ Session::get('mail-success') }}</p>

                                                          </div>
                                                      </div>
                                                      <div class="ish-sc-element ish-sc_separator ish-color2 ish-separator-simple ish-separator-double" style=" border-top-style: double;  opacity: 0.5; "></div>
                                                    @else
                                                      <div class="ish-sc-element ish-sc_icon ish-simple ish-color1 ish-text-color5" style="font-size:50px;width:50px;height:50px;"><span style="width:50px;height:50px;"><span class="ish-icon-comment-2" style="font-size:50px;line-height:50px;"></span></span>
                                                      </div>
                                                      <h1 class="ish-sc-element ish-sc_headline ish-color5 ish-bottom-margin-none">Stay</h1>
                                                      <h3 class="ish-sc-element ish-sc_headline ish-color5">in touch with me!</h3>
                                                      <div class="wpb_text_column wpb_content_element " style="">
                                                          <div class="wpb_wrapper">
                                                              <p>Honestly I am friendly I promise.</p>

                                                          </div>
                                                      </div>
                                                      <div class="ish-sc-element ish-sc_separator ish-color2 ish-separator-simple ish-separator-double" style=" border-top-style: double;  opacity: 0.5; "></div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vc_row wpb_row vc_inner vc_row-fluid ">
                                            <div class="vc_col-sm-6 wpb_column column_container" style="">
                                                <div class="wpb_wrapper">
                                                    <div class="ish-sc-element ish-sc_headline ish-color5 ish-h4 ish-bottom-margin-none"><span class="ish-icon ish-left"><span class="ish-icon-location-2"></span></span>
                                                    </div>
                                                    <div class="wpb_text_column wpb_content_element " style="">
                                                        <div class="wpb_wrapper">
                                                            <p>Claremont Mckenna College
                                                                <br /> Claremont, CA
                                                                <br /> 91711</p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="vc_col-sm-6 wpb_column column_container" style="">
                                                <div class="wpb_wrapper">
                                                    <div class="ish-sc-element ish-sc_headline ish-color5 ish-h4 ish-bottom-margin-none"><span class="ish-icon ish-left"><span class="ish-icon-comment-2"></span></span>
                                                    </div>
                                                    <div class="wpb_text_column wpb_content_element " style="">
                                                        <div class="wpb_wrapper">
                                                            <p>Phone: <a href="/kevin-resume.pdf" target="_blank">See Resume</a>
                                                                <br /> kevin@kcunanan.com
                                                            </p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vc_row wpb_row vc_inner vc_row-fluid ">
                                            <div class="vc_col-sm-12 wpb_column column_container" style="">
                                                <div class="wpb_wrapper">
                                                    <div class="ish-sc-element ish-sc_separator ish-color2 ish-separator-simple ish-separator-double" style=" border-top-style: double;  opacity: 0.5; "></div>
                                                    <div class="ish-sc-element ish-sc_cf7 ish-color6 ish-text-color1 ish-bg-text-color1 ish-button-bg-color5 ish-button-text-color4">
                                                        <div role="form" class="wpcf7" id="wpcf7-f61-p37-o1" lang="en-US" dir="ltr">
                                                            <div class="screen-reader-response"></div>
                                                            <form id="contact-form" action="/contact" method="POST">
                                                                {{ csrf_field() }}
                                                                <div class="ish-row">
                                                                    <div class="ish-grid12">
                                                                        <p><span class="wpcf7-form-control-wrap your-name">
                                                                            <input name="name" id="name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Your Name *" /></span> </p>
                                                                    </div>
                                                                </div>
                                                                <div class="ish-row">
                                                                    <div class="ish-grid12">
                                                                        <p><span class="wpcf7-form-control-wrap your-email">
                                                                            <input name="email" id="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Your Email *" /></span></p>
                                                                    </div>
                                                                </div>
                                                                <div class="ish-row">
                                                                    <div class="ish-grid12">
                                                                        <p><span class="wpcf7-form-control-wrap your-web">
                                                                            <input name="subject" id="subject" type="text"  size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Subject" /></span></p>
                                                                    </div>
                                                                </div>
                                                                <div class="ish-row">
                                                                    <div class="ish-grid12">
                                                                        <p><span class="wpcf7-form-control-wrap your-message">
                                                                            <textarea name="message" id="comment"  cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Your Comment"></textarea></span></p>
                                                                    </div>
                                                                </div>
                                                                <div class="ish-row">
                                                                    <div class="ish-grid12">
                                                                        <p>
                                                                            <input type="submit" value="SUBMIT COMMENT" id="submit_contact" class="wpcf7-form-control wpcf7-submit ish-cf7-submit" />
                                                                            <div id="msg" class="message"></div>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </form>
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

            </section>
            <!-- Content part section END -->

            <!-- #content  END -->
@endsection
@section('scripts')
  <script type='text/javascript' src='http://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;callback=initialize&amp;ver=4.4.2'></script>
@endsection
