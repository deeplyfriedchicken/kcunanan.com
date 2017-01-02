<!doctype html>

<!--[if IE 8]><html class="ie8 ie-all" lang="en-US" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if IE 9]><html class="ie9 ie-all" lang="en-US" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if IE 10]><html class="ie10 ie-all" lang="en-US" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en-US" prefix="">
<!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 enabling script -->
    <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

    <title>Kevin Cunanan - Full Stack Web Engineer</title>




    <link rel='stylesheet' href="{{ URL::asset('css/layerslider.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ URL::asset('css/shortcodes.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ URL::asset('css/ish-fontello.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ URL::asset('css/style.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ URL::asset('css/tooltipster.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ URL::asset('css/main-options.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ URL::asset('css/main-options_2.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ URL::asset('css/main-options_3.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ URL::asset('css/jquery.fancybox.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ URL::asset('js/mediaelement/mediaelementplayer.min.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ URL::asset('js/mediaelement/wp-mediaelement.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ URL::asset('css/js_composer.min.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ URL::asset('css/font.css') }}" type='text/css' media='all' />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    @yield('stylesheets')
    <style>
    .social-box {
       width:50px;
       height:50px;
       border-radius: 25px;
       color: rgba(255, 255, 255, 0.8);
       padding: 10px;
    }
    .social-box:hover {
      color:#fff;
    }
    .social-footer-fb {
      background-color: #3C599F;
    }
    .social-footer-instagram {
      background-color: #fbad50;
    }
    .social-footer-tumblr {
      background-color: #314E6C;
    }
    @media (max-width: 983px) and (min-width: 769px) {
      .hide-social {
        display:none;
      }
    }
    @media (max-width: 483px) {
      .hide-social {
        display:none;
      }
    }
    @media (max-width: 857px) {
      .contact-info-div h4 span {
        font-size: 16px;
      }
    }
    @media(min-width: 858px) {
      .contact-info-div h4 span {
        font-size: 20px;
      }
    }
    .social-footer-pinterest {
      background-color: #CC2127;
    }
    .social-footer-linkedin {
      background-color: #0077B5;
    }
    .social-footer-github {
      background-color: #000;
    }
    .contact-info {
      margin-right: 15px;
      font-size: 35px;
      border-radius: 50px;
      padding: 10px;
      color: #fff;
      width: 35px;
      height: 35px;
      text-align: center;
    }
    .contact-info-email {
      background-color: #2b3956;
    }
    .contact-info-phone {
      background-color: #2b3956;
    }
    .contact-info-map {
      background-color: #2b3956;
    }
    .contact-info-div h4 span {
      font-family: 'Montserrat';
      color: #000;
    }
    .black-border-left {
      border-left: 10px solid #000;
    }
    .black-border-right {
      border-right: 10px solid #000;
    }
    .text-left {
      text-align: left;
      margin-left: 50px;
    }
    div.text-left h4 i {
      margin: 10px 15px 10px 0 !important;
      margin-right: 15px;
    }
    </style>


    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Dosis%3A300%2C300italic%2C400%2C400italic%2Cregular%2Citalic%2C600%2C600italic%2C700%2C700italic%2Cregular%2Cregular%2Cregular%2Cregular%2C&amp;subset=latin&amp;ver=4.4.2' type='text/css' media='all' />
    <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Lobster|Raleway|Montserrat|Crete+Round|Bitter|Open+Sans">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:100,300,regular,700,900%7COpen+Sans:300%7CIndie+Flower:regular%7COswald:300,regular,700&amp;subset=latin%2Clatin-ext' type='text/css' media='all' />



    <link rel="shortcut icon" href="{{ URL::asset('favicon.png') }}"/>
    <link rel="icon" href="upload/cropped-freelo-favicon-200x200.png" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="upload/cropped-freelo-favicon-180x180.png" />
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>

</head>
<body class="home page page-id-157 page-template-default ish-boxed ish-pixel-width ish-responsive_layout_on ish-sticky-on ish-header_bar-on wpb-js-composer js-comp-ver-4.10 vc_responsive">
  <div class="ish-body">


      <!-- Search bar -->
      <section class="ish-part_searchbar ish-a-search">
          <div>
              <form  method="post" id="headersearchform" action="/search">
                {{ csrf_field() }}
                  <label>
                      <input type="text" value="" name="s" id="sh" autocomplete="off" placeholder="Search ...">
                  </label>
              </form>

              <a href="#close" class="ish-ps-searchform_close ish-icon-cancel-outline" title="Close Search (ESC)"></a>
          </div>
      </section>
      <!-- Search bar END -->

      <!-- Wrap whole page -->
      <div class="ish-wrapper-all">

          <!-- Top Header Bar Section -->
          <section class="ish-part_header_bar">
              <div class="ish-row ish-row-notfull">
                  <div class="ish-row_inner">

                      <div class="ish-hb-left ish-hb-social">
                          <div class="ish-sc-element ish-sc_icon ish-simple ish-color1 ish-text-color2 ish-active-text-color17 ish-tooltip-color17 ish-tooltip-text-color4"  data-type="tooltip" title="Pinterest"><a href="https://www.pinterest.com/kevincunanan" target="_blank"><span><span class="ish-icon-pinterest"></span></span></a></div>

                          <div class="ish-sc-element ish-sc_icon ish-simple ish-color1 ish-text-color2 ish-active-text-color13 ish-tooltip-color13 ish-tooltip-text-color4"  data-type="tooltip" title="Facebook"><a href="https://www.facebook.com/kongkuaifan" target="_blank"><span><span class="ish-icon-facebook"></span></span></a></div>

                          <div class="ish-sc-element ish-sc_icon ish-simple ish-color1 ish-text-color2 ish-active-text-color14 ish-tooltip-color14 ish-tooltip-text-color4"  data-type="tooltip" title="LinkedIn"><a href="https://www.linkedin.com/in/kevin-cunanan" target="_blank"><span><span class="ish-icon-linkedin"></span></span></a></div>

                          <div class="ish-sc-element ish-sc_icon ish-simple ish-color1 ish-text-color2 ish-active-text-color15 ish-tooltip-color15 ish-tooltip-text-color4"  data-type="tooltip" title="GitHub"><a href="https://github.com/kcunanan" target="_blank"><span><span class="ish-icon-github-circled"></span></span></a></div>

                          <div class="ish-sc-element ish-sc_icon ish-simple ish-color1 ish-text-color2 ish-active-text-color5 ish-tooltip-color7 ish-tooltip-text-color4"  data-type="tooltip" title="Contact Me"><a href="/contact"><span><span class="ish-icon-email"></span></span></a></div>
                      </div>

                      <div class="ish-hb-right  ish-hb-menu">


                      </div>

                  </div>
              </div>
          </section>
          <!-- Top Header Bar Section END -->

          <!-- Header part section -->
          <section class="ish-part_header ish-default-style">
              <div class="ish-row ish-row-notfull">
                  <div class="ish-row_inner">

                      <!-- Logo image / text -->
                      <a class="ish-ph-logo ish-ph-logo_retina-no" href="/">
                          <span>
                <img src="{{ URL::asset('images/kevin-logo-3.png') }}" alt="kevin cunanan logo full stack engineer" title="kevin cunanan - a full stack engineer" />
            </span>
                      </a>

                      <!-- Default HTML tagline -->
                      <span class="ish-ph-wp_tagline"><span></span></span>
                      <!-- Main navigation -->
                      <nav class="ish-ph-main_nav">
                          <ul id="mainnav" class="ish-ph-mn-main_nav ish-nt-regular ish-megamenu">
                              <li class="menu-item {{ Request::is('/') ? 'current_page_parent' : '' }}"><a href="/">Home</a>
                              </li>
                              <li class="menu-item {{ Request::is('portfolio/') ? 'current_page_parent' : '' }}"><a href="/portfolio">Portfolio</a>
                              </li>
                              <li class="menu-item"><a href="{{ URL::asset('kevin-resume.pdf') }}" target="_blank">Resume</a>
                              </li>
                              {{-- <li class="menu-item {{ Request::is('gallery') ? 'current_page_parent' : '' }}"><a href="/gallery">Gallery</a>
                              </li> --}}
                              <li class="menu-item menu-item-236 {{ Request::is('posts') ? 'current_page_parent' : '' }}"><a href="/posts">Blog</a></li>
                              <li class="menu-item ish-megamenu-item {{ Request::is('about') ? 'current_page_parent' : '' }}"><a href="/about">About Me</a></li>
                              <li class="menu-item {{ Request::is('contact') ? 'current_page_parent' : '' }}"><a href="/contact">Contact</a></li>
                              <li class="ish-ph-mn-search"><a href="#search" class="ish-icon-search-outline"><span>Search</span></a></li>
                          </ul>
                          <!-- Responsive or sidenav navigation -->
                          <ul class="ish-ph-mn-resp_nav ish-ph-mn-hidden">
                              <!-- Resp menu button -->
                              <li class="ish-ph-mn-resp_menu">
                                  <a href="#respnav" class="ish-icon-waves-outline"></a>
                              </li>

                              <!-- Search button if enabled -->
                              <li class="ish-ph-mn-search">
                                  <a href="#search" class="ish-icon-search-outline"></a>
                              </li>


                          </ul>

                      </nav>
                  </div>
              </div>
          </section>
          <!-- Header part section END -->
  @yield('content')

  <!-- #content  END -->
  <!-- Footer part section -->

  <section class="black-border-left ish-part_footer ish-center" id="ish-part_footer">

      <div class="ish-row ish-row-notfull">
          <div class="ish-row_inner">

              <div id="text-2" class="ish-grid6 widget-1 widget widget_text">
                  <div class="textwidget">
                          <h1><span style="border-bottom:10px solid black;">FOLLOW</span> <span style="background-color:#2b3956; color:#fff; padding: 10px;">ME</span></h1>
                          <div style="margin-top: 30px;" class="ish-sc-element ish-sc_icon_button_set ish-sc_global_iconic_box">
                              <div class="ish-sc-element ish-sc_icon ish-simple ish-color1 ish-text-color3 ish-tooltip-color13 ish-tooltip-text-color3" style="font-size:24px;width:50px;height:24px;" data-type="tooltip" title="Let's be friends"><a target="_blank" href="https://www.facebook.com/kongkuaifan"><span class="social-box social-footer-fb"><span class="ish-icon-facebook" style="font-size:24px;line-height:24px;"></span></span></a></div>
                              <div class="hide-social ish-sc-element ish-sc_icon ish-simple ish-color2 ish-text-color3 ish-tooltip-color23 ish-tooltip-text-color3" style="font-size:24px;width:50px;height:24px;" data-type="tooltip" title="Follow me on Instagram"><a target="_blank" href="https://www.instagram.com/cunananananan/"><span class="social-box social-footer-instagram"><span class="fa fa-instagram" style="font-size:24px;line-height:24px;"></span></span></a></div>
                              <div class="ish-sc-element ish-sc_icon ish-simple ish-color3 ish-text-color3 ish-tooltip-color1 ish-tooltip-text-color3" style="font-size:24px;width:50px;height:24px;" data-type="tooltip" title="Follow my Tumblr pls"><a target="_blank" href="http://kcunanan.tumblr.com/"><span class="social-box social-footer-tumblr"><span class="ish-icon-tumblr" style="font-size:24px;line-height:24px;"></span></span></a></div>
                              <div class="ish-sc-element ish-sc_icon ish-simple ish-color22 ish-text-color3 ish-tooltip-color24 ish-tooltip-text-color3" style="font-size:24px;width:50px;height:24px;" data-type="tooltip" title="I GitHub frequently"><a target="_blank" href="http://github.com/kcunanan"><span class="social-box social-footer-github"><span class="fa fa-github" style="font-size:24px;line-height:24px;"></span></span></a></div>
                              <div class="hide-social ish-sc-element ish-sc_icon ish-simple ish-color4 ish-text-color3 ish-tooltip-color18 ish-tooltip-text-color3" style="font-size:24px;width:50px;height:24px;" data-type="tooltip" title="Checkout my Pins"><a target="_blank" href="https://www.pinterest.com/kevincunanan"><span class="social-box social-footer-pinterest"><span class="ish-icon-pinterest-circled" style="font-size:24px;line-height:24px;"></span></span></a></div>
                              <div class="ish-sc-element ish-sc_icon ish-simple ish-color5 ish-text-color3 ish-tooltip-color1 ish-tooltip-text-color3" style="font-size:24px;width:50px;height:24px;" data-type="tooltip" title="LinkedIn Profile"><a target="_blank" href="https://www.linkedin.com/in/kevin-cunanan"><span class="social-box social-footer-linkedin"><span class="ish-icon-linkedin" style="font-size:24px;line-height:24px;"></span></span></a></div>
                          </div>
                  </div>
              </div>
              <div id="ishyoboy-twitter-widget-3" class="ish-grid6 widget-2 widget widget_ishyoboy-twitter-widget contact-info-div">
                  <h1><span style="border-bottom:10px solid black;">CONT</span><span style="background-color:#edaa1e; color:#fff; padding: 10px 0;">ACT</span></h1>
                  <br>
                  <div class="text-left">
                    <h4><i class="fa fa-envelope contact-info contact-info-email"></i> <span>kevin.a.cunanan@gmail.com</span></h4>
                    <h4><i class="fa fa-phone contact-info contact-info-phone" ></i> <span>+1 818 671 9284</span></h4>
                    <h4><i class="fa fa-map-marker contact-info contact-info-map"></i> <span>Claremont Mckenna College</span></h4>
                  </div>

              </div>
          </div>
      </div>

  </section>
  <!-- Footer part section END -->
  @yield('quote')
  <!-- Footer legals part section -->
  <section class="ish-part_legals">

      <div class="ish-row ish-row-notfull ish-resp-centere">
          <div class="ish-row_inner">
              <div class="ish-grid12" id="div_24aa_0"><a href="/" class="pull-left"><img style="height:25px;" src="{{ URL::asset('favicon.png') }}" alt="Kevin Cunanan"></a>powered by <a href="https://laravel.com/" title="HTML">Laravel 5.3</a><span class="ish-spacer">/</span>Created by <a href="#" title="IshYoBoy.com">Kevin Cunanan</a></div>
          </div>
      </div>

  </section>
  <!-- Footer legals part section END -->

</div>
<!-- Wrap whole page - boxed / unboxed END -->

<a href="#top" class="ish-back_to_top ish-smooth_scroll ish-icon-angle-double-up"></a>

</div>
      <script type='text/javascript' src="{{ URL::asset('js/greensock.js')  }}"></script>
      <script type='text/javascript' src="{{ URL::asset('js/jquery/jquery-migrate.min.js')  }}"></script>
      <script type='text/javascript' src="{{ URL::asset('js/layerslider.kreaturamedia.jquery.js')  }}"></script>
      <script type='text/javascript' src="{{ URL::asset('js/layerslider.transitions.js')  }}"></script>

      <script type="text/javascript">
          jQuery(document).ready(function($) {
              var thumbnails = jQuery("a:has(img)").not(".nolightbox").not(".openfancybox-image").filter(function() {
                  return /\.(jpe?g|png|gif|bmp)$/i.test(jQuery(this).attr('href'))
              });

              if (thumbnails.length > 0) {
                  thumbnails.addClass('openfancybox-image').attr('rel', 'fancybox-post-image-157');
              }
          });
      </script>


      <script type='text/javascript' src="{{ URL::asset('js/ishyoboy-shortcodes.js')  }}"></script>
      <script type='text/javascript'>
          /* <![CDATA[ */
          var php_array = {
              "admin_ajax": "js/admin-ajax.php"
          };
          /* ]]> */
      </script>
      <script type='text/javascript' src="{{ URL::asset('js/jquery-blockui/jquery.blockUI.min.js')  }}"></script>

      <script type='text/javascript' src="{{ URL::asset('js/packery.pkgd.min.js')  }}"></script>
      <script type='text/javascript' src="{{ URL::asset('js/imagesloaded.pkgd.min.js')  }}"></script>
      <script type='text/javascript' src="{{ URL::asset('js/jquery.scrollTo-1.4.3.1-min.js')  }}"></script>
      <script type='text/javascript' src="{{ URL::asset('js/jquery.fancybox.pack.js')  }}"></script>
      <script type='text/javascript' src="{{ URL::asset('js/jquery.tooltipster.min.js')  }}"></script>
      <script type='text/javascript' src="{{ URL::asset('js/jquery.easing-1.3.pack.js')  }}"></script>
      <script type='text/javascript' src="{{ URL::asset('js/typed.js')  }}"></script>
      @yield('scripts')
      <script type='text/javascript'>
          /* <![CDATA[ */
          var iyb_globals = {
              "header_height": "150",
              "sticky_height": "80",
              "colors": {
                  "color1": "#717879",
                  "color2": "#bac2c4",
                  "color3": "#f9f9f9",
                  "color4": "#ffffff",
                  "color5": "#7bc5a6",
                  "color6": "#f1f3f3",
                  "color7": "#434949",
                  "color8": "#11c4f7",
                  "color9": "#fbba00",
                  "color10": "#472025",
                  "color11": "#ee295e",
                  "color12": "#71bac9",
                  "color13": "#3b5998",
                  "color14": "#ea4c89",
                  "color15": "#1769ff",
                  "color16": "#d14836",
                  "color17": "#55acee",
                  "color18": "#cb2027",
                  "color19": "#efb4b6",
                  "color20": "#9e9bba",
                  "color21": "#a8e7de",
                  "color22": "#ede9aa",
                  "color23": "#e99555",
                  "color24": "#000000",
                  "color25": "#ffffff"
              },
              "sidenav_width": "400px",
              "page_width": "100%",
              "website_border_width": "0",
              "user_page_width": "1240",
              "user_page_width_units": "px"
          };
          /* ]]> */
      </script>
      <script type='text/javascript' src="{{ URL::asset('js/main.js')  }}"></script>
      <script type='text/javascript' src="{{ URL::asset('js/jquery.jribbble.min.js')  }}"></script>
      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-85896927-1', 'auto');
        ga('send', 'pageview');

      </script>
  </body>
  </html>
