@extends('master')
@section('meta')
  <meta property="og:image" content="{{ URL::asset($blog->media_url) }}" />

  <meta property="og:description" content="{{ $blog->heading }}" />

  <meta property="og:url"content="{{ URL::asset("/posts"."/".$blog->category."/".$blog->sub_category."/".$blog->blog_url) }}" />

  <meta property="og:title" content="kcunanan.com - {{ $blog->blog_title }}" />
@endsection
@section('stylesheets')
  <style>
  #portfolio-link, #github-link {
    @if($blog->color) background-color: {{ $blog->color }}; @endif
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

  #toolbar [data-wysihtml-action] {
    float: right;
  }
  
  textarea {
    width: 920px;
    padding: 5px;
    -webkit-box-sizing: border-box;
    -ms-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }
  
  textarea {
    height: 280px;
    border: 2px solid green;
  }
  
  textarea:focus {
    color: black;
    border: 2px solid black;
  }
  
  .wysihtml-command-active, .wysihtml-action-active {
    font-weight: bold;
  }
  
  [data-wysihtml-dialog] {
    margin: 5px 0 0;
    padding: 5px;
    border: 1px solid #666;
  }
  
  
  
  a[data-wysihtml-command-value="red"] {
    color: red;
  }
  
  a[data-wysihtml-command-value="green"] {
    color: green;
  }
  
  a[data-wysihtml-command-value="blue"] {
    color: blue;
  }
  
  .wysihtml-editor, .wysihtml-editor table td {
    outline: 1px dotted #abc;
    
  }
  
  code {
    background: #ddd;
    padding: 10px;
    white-space: pre;
    display: block;
    margin: 1em 0;
  }
  
  #toolbar {
    display: block;
    border-radius: 3px;
    border: 1px solid #fff;
    margin-bottom: 9px;
    line-height: 1em;
  }
  #toolbar a {
    display: inline-block;
    height: 1.5em;
    border-radius: 3px;
    font-size: 15px;
    line-height: 1.5em;
    text-decoration: none;
    background: #e1e1e1;
    border: 1px solid #ddd;
    padding: 0 0.2em;
    margin: 1px 0;
  }
  #toolbar a.wysihtml-command-active, .toolbar .wysihtml-action-active {
    background: #222;
    color: white;
  }
  #toolbar .block { 
    padding: 1px 1px;
    display: inline-block;
    border-radius: 3px;
    margin: 0px 1px 1px 0;
  }
  
  div[data-wysihtml-dialog="createTable"] {
    position: absolute;
    background: white;
  }
  
  div[data-wysihtml-dialog="createTable"] td {
    width: 10px; height: 5px;
    border: 1px solid #666;
  }
  
  .wysihtml-editor table td.wysiwyg-tmp-selected-cell {
    outline: 2px solid green;
  }
  
  .editor-container-tag {
    padding: 5px 10px;
    position: absolute;
    color: white;
    background: rgba(0,0,0,0.8);
    width: 100px;
    margin-left: -50px;
    -webkit-transition: 0.1s left, 0.1s top;
  }
  
  .wrap {
    max-width: 700px;
    margin: 40px;
  }

  #editor {
      margin-bottom: 15px;
  }
  
  .editable .wysihtml-uneditable-container {
    outline: 1px dotted gray;
    position: relative;
  }
  .editable .wysihtml-uneditable-container-right {
    float: right;
    width: 50%;
    margin-left: 2em;
    margin-bottom: 1em;
  }
  
  .editable .wysihtml-uneditable-container-left {
    float: left;
    width: 50%;
    margin-right: 2em;
    margin-bottom: 1em;
  }

  .saved {
    opacity: 0;
    position: fixed;
    bottom: 50px;
    width: 100%;
    text-align: center;
    z-index: 1000;

    transition: opacity .25s ease-in-out;
    -moz-transition: opacity .25s ease-in-out;
    -webkit-transition: opacity .25s ease-in-out;
  }
  .saved span {
    background-color: #dff0d8;
    border-color: #d0e9c6;
    display: inline-block;
    color: #3c763d;
    padding: 30px;
    border: 1px solid;
    border-radius: 25px;
    width: 500px;
  }

  button {
    -webkit-transition-duration: .3s;
    -moz-transition-duration: .3s;
    -ms-transition-duration: .3s;
    -o-transition-duration: .3s;
    transition-duration: .3s;
    color: #fff;
  }

  button:hover {
      background-color: #2c3a55;

  }

  .editor-btn {
      width: 100px;
  }

  .float-right {
      float: right;
  }

  </style>
@endsection
@section('facebook-dev')
  @if($blog->category == 'blog')
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
@section('alert')
<div class="saved" style="">
    <span>Blog Successfully Saved!</span>
</div>
@endsection
@section('content')
            <!-- Content part section -->
            <section class="ish-part_content ish-without-sidebar">

                <div class="vc_row wpb_row vc_row-fluid ish-row-notfull ish-row-full-nopadding ish-has-nobgimage ish-resp-centered ish-row_notsection" style="">
                    <div class="ish-vc_row_inner">
                        <div class="vc_col-sm-12 wpb_column column_container" style="">
                            <div class="wpb_wrapper">
                                <div class="ish-sc-element ish-sc_image ish-center ish-fullwidth">
                                  <a href="{{ URL::asset($blog->media_url) }}" title="" target="_blank"><img width="969" src="{{ URL::asset($blog->media_url) }}" class="attachment-theme-large size-theme-large" alt="{{ $blog->blog_title }}"/></a>
                                </div>
                                <div class="vc_row wpb_row vc_inner vc_row-fluid  ish-valign-middle">
                                    <div class="vc_col-sm-6 wpb_column column_container ish-center" style="">
                                        <div class="wpb_wrapper">
                                            <h1 class="ish-sc-element ish-sc_headline ish-color8 ish-bottom-margin-none" style=" @if($blog->color) {{ 'color:'.$blog->color }}  @endif">{{ $blog->blog_title }}</h1>
                                              @if($blog->portfolio_link != null || $blog->github_url != null)
                                              <div class="ish-sc-element ish-sc_cf7 ish-color6 ish-text-color1 ish-bg-text-color1 ish-button-bg-color5 ish-button-text-color4">
                                                                <div class="ish-row">
                                                                  @if($blog->portfolio_link != null && $blog->github_url != null)
                                                                    <div class="ish-grid6">
                                                                        <p class="portfolio-p">
                                                                            <a class="portfolio-link" href="{{ $blog->portfolio_link }}" target="_blank"><button id="portfolio-link" class="wpcf7-form-control wpcf7-submit ish-cf7-submit" style="color: #fff;">View Site</button></a>
                                                                            </p><div id="msg" class="message"></div>
                                                                        <p></p>
                                                                    </div>
                                                                    <div class="ish-grid6">
                                                                        <p class="portfolio-p">
                                                                            <a class="github-link" href="{{ $blog->github_url }}" target="_blank"><button id="github-link" class="wpcf7-form-control wpcf7-submit ish-cf7-submit" style="color: #fff;">View Code</button></a>
                                                                            </p><div id="msg" class="message"></div>
                                                                        <p></p>
                                                                    </div>
                                                                  @elseif($blog->portfolio_link != null && $blog->github_url == null)
                                                                    <div class="ish-grid12">
                                                                        <p class="portfolio-p">
                                                                            <a class="portfolio-link" href="{{ $blog->portfolio_link }}" target="_blank"><button id="portfolio-link" class="wpcf7-form-control wpcf7-submit ish-cf7-submit" style="color: #fff;">View Site</button></a>
                                                                            </p><div id="msg" class="message"></div>
                                                                        <p></p>
                                                                    </div>
                                                                  @elseif($blog->github_url != null && $blog->portfolio_link == null)
                                                                    <div class="ish-grid12">
                                                                        <p class="portfolio-p">
                                                                            <a class="github-link" href="{{ $blog->github_url }}" target="_blank"><button id="github-link" class="wpcf7-form-control wpcf7-submit ish-cf7-submit" style="color: #fff;">View Code</button></a>
                                                                            </p><div id="msg" class="message"></div>
                                                                        <p></p>
                                                                    </div>
                                                                  @endif
                                                                </div>
                                                    </div>
                                                    @endif
                                            {{-- <h5 class="ish-sc-element ish-sc_headline ish-color2">{{ $blog->heading }}</h5> --}}
                                        </div>
                                    </div>
                                    <div class="vc_col-sm-6 wpb_column column_container" style="">
                                        <div class="wpb_wrapper">

                                            <div class="wpb_text_column wpb_content_element " style="">
                                                <div class="wpb_wrapper">
                                                    @if($blog->category == 'blog')
                                                      <div class="text-center">
                                                        <a class="tumblr-share-button" data-color="blue" data-notes="right" data-href="{{ URL::asset("/posts/".strtolower(preg_replace("/[\s_]/", "-", $blog->category))."/".strtolower(preg_replace("/[\s_]/", "-", $blog->sub_category))."/".strtolower(preg_replace("/[\s_]/", "-", $blog->blog_url))) }}" href="https://embed.tumblr.com/share"></a> <script>!function(d,s,id){var js,ajs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://assets.tumblr.com/share-button.js";ajs.parentNode.insertBefore(js,ajs);}}(document, "script", "tumblr-js");</script>
                                                      <div class="fb-share-button" data-href="{{ URL::asset("/posts/".strtolower(preg_replace("/[\s_]/", "-", $blog->category))."/".strtolower(preg_replace("/[\s_]/", "-", $blog->sub_category))."/".strtolower(preg_replace("/[\s_]/", "-", $blog->blog_url))) }}" data-layout="button_count" data-size="small" data-mobile-iframe="true"></div>
                                                    </div>
                                                    @endif
                                                    <h6 class="tags">Tags: @foreach($tags as $tag)@if($loop->last){{ $tag->tag }}@else{{ $tag->tag }}, @endif @endforeach</h6>
                                                    <p>{{ $blog->heading }}</p>
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
                                    <div id="toolbar" style="display: none;">
                                        <div class="block">
                                            <a data-wysihtml-command="bold" title="CTRL+B"><i class="fa fa-bold"></i></a>
                                            <a data-wysihtml-command="italic" title="CTRL+I"><i class="fa fa-italic"></i></a>
                                            <a data-wysihtml-command="underline" title="CTRL+U"><i class="fa fa-underline"></i></a>
                                            <a data-wysihtml-command="superscript" title="sup"><i class="fa fa-superscript"></i></a>
                                            <a data-wysihtml-command="subscript" title="sub"><i class="fa fa-subscript"></i></a>
                                        </div>
                                        <div class="block">
                                            <a data-wysihtml-command="createLink"><i class="fa fa-link"></i></a>
                                            <a data-wysihtml-command="removeLink"><s>link</s></a>
                                            <a data-wysihtml-command="insertImage"><i class="fa fa-image"></i></a>
                                            <a data-wysihtml-command="formatBlock" data-wysihtml-command-value="h1"><i class="fa fa-header"></i>1</a>
                                            <a data-wysihtml-command="formatBlock" data-wysihtml-command-value="h2"><i class="fa fa-header"></i>2</a>
                                            <a data-wysihtml-command="formatBlock" data-wysihtml-command-value="h3"><i class="fa fa-header"></i>3</a>
                                            <a data-wysihtml-command="formatBlock" data-wysihtml-command-value="p">p</a>
                                            <a data-wysihtml-command="formatBlock" data-wysihtml-command-value="pre">pre</a>
                                            <a data-wysihtml-command="formatBlock" data-wysihtml-command-blank-value="true">plaintext</a>
                                            <a data-wysihtml-command="insertBlockQuote"><i class="fa fa-quote-right"></i></a>
                                            <a data-wysihtml-command="formatCode" data-wysihtml-command-value="language-html"><i class="fa fa-code"></i></a>
                                        </div>
                                        
                                        <div class="block">
                                            <a data-wysihtml-command="fontSizeStyle">Size</a>
                                            <div data-wysihtml-dialog="fontSizeStyle" style="display: none;">
                                            Size:
                                            <input type="text" data-wysihtml-dialog-field="size" style="width: 60px;" value="" />
                                            <a data-wysihtml-dialog-action="save">OK</a>&nbsp;<a data-wysihtml-dialog-action="cancel">Cancel</a>
                                            </div>
                                        </div>
                                        
                                        <div class="block">
                                            <a data-wysihtml-command="insertUnorderedList"><i class="fa fa-list"></i></a>
                                            <a data-wysihtml-command="insertOrderedList"><i class="fa fa-list-ol"></i></a>
                                        </div>
                                        <div class="block">
                                            <a data-wysihtml-command="outdentList"><i class="fa fa-outdent"></i>-</a>
                                            <a data-wysihtml-command="indentList">-<i class="fa fa-indent"></i></a>
                                        </div>
                                        <div class="block">
                                            <a data-wysihtml-command="justifyLeft">L<i class="fa fa-align-justify"></i></a>
                                            <a data-wysihtml-command="justifyFull"><i class="fa fa-align-justify"></i></a>
                                            <a data-wysihtml-command="justifyRight"><i class="fa fa-align-justify"></i>R</a>
                                        </div>

                                        <div class="block">
                                            <a data-wysihtml-command="alignLeftStyle"><i class="fa fa-align-left"></i></a>
                                            <a data-wysihtml-command="alignCenterStyle"><i class="fa fa-align-center"></i></a>
                                            <a data-wysihtml-command="alignRightStyle"><i class="fa fa-align-right"></i></a>
                                        </div>
                                        
                                        <div class="block">
                                            <a data-wysihtml-command="foreColorStyle">Color</a>
                                            <div data-wysihtml-dialog="foreColorStyle" style="display: none;">
                                            Color:
                                            <input type="text" data-wysihtml-dialog-field="color" value="rgba(0,0,0,1)" />
                                            <a data-wysihtml-dialog-action="save">OK</a>&nbsp;<a data-wysihtml-dialog-action="cancel">Cancel</a>
                                            </div>
                                        </div>
                                        
                                        <div class="block">
                                            <a data-wysihtml-command="bgColorStyle">BG Color</a>
                                            <div data-wysihtml-dialog="bgColorStyle" style="display: none;">
                                            Color:
                                            <input type="text" data-wysihtml-dialog-field="color" value="rgba(0,0,0,1)" />
                                            <a data-wysihtml-dialog-action="save">OK</a>&nbsp;<a data-wysihtml-dialog-action="cancel">Cancel</a>
                                            </div>
                                        </div>
                                        
                                        <div class="block">
                                            <a data-wysihtml-command="undo"><i class="fa fa-undo"></i></a>
                                            <a data-wysihtml-command="redo"><i class="fa fa-repeat"></i></a>
                                        </div>
                                        
                                        <div class="block">
                                            <a data-wysihtml-action="change_view">HTML</a>
                                        </div>
                                        
                                        <div data-wysihtml-dialog="createLink" style="display: none;">
                                            <label>
                                            Link:
                                            <input data-wysihtml-dialog-field="href" placeholder="http://" value="">
                                            </label>
                                            <a data-wysihtml-dialog-action="save">OK</a>&nbsp;<a data-wysihtml-dialog-action="cancel">Cancel</a>
                                        </div>
                                        <div data-wysihtml-dialog="insertImage" style="display: none;">
                                            <label>
                                            Image:
                                            <input data-wysihtml-dialog-field="src" value="http://">
                                            </label>
                                            <label>
                                            Align:
                                            <select data-wysihtml-dialog-field="className">
                                                <option value="">default</option>
                                                <option value="wysiwyg-float-left">left</option>
                                                <option value="wysiwyg-float-right">right</option>
                                            </select>
                                            </label>
                                            <a data-wysihtml-dialog-action="save">OK</a>&nbsp;<a data-wysihtml-dialog-action="cancel">Cancel</a>
                                        </div>
                                        </div><!-- toolbar -->
                                        <div id="editor" class="wpb_wrapper" contenteditable="true">
                                            {!! $blog->content !!}
                                        </div>
                                        <button class="editor-btn" id="save">Save</button>
                                        <a class="float-right" href="{{ URL::action('HomeController@showPost', ['lookup_category' => strtolower(preg_replace("/[\s_]/", "-", $blog->category)), 'sub_category' => strtolower(preg_replace("/[\s_]/", "-", $blog->sub_category)), 'url' => strtolower(preg_replace("/[\s_]/", "-", $blog->blog_url))] ) }}" target="_blank"><button class="editor-btn" style="color: #fff;">Preview</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </section>
            <!-- Content part section END -->
@endsection

@section('scripts')
<script src="{{ URL::asset('admin/plugins/wysihtml/wysihtml.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/wysihtml/wysihtml.all-commands.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/wysihtml/wysihtml.table_editing.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/wysihtml/wysihtml.toolbar.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/wysihtml/advanced_and_extended.js') }}"></script>
<script>

  var editor = new wysihtml.Editor('editor', {
    toolbar: 'toolbar',
    parserRules:    wysihtmlParserRules,
    pasteParserRulesets: wysihtmlParserPasteRulesets
  });

const xCsrfToken = "{{ csrf_token() }}";
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': xCsrfToken
    }
});

function saveContent(){
    const content = document.querySelector('#editor').innerHTML
    console.log(content)
    $.ajax({
        type: 'POST',
        url: '{{ URL::action('AdminController@updateBlogContent', ['id' => $blog->id]) }}',
        data: {
            'content': content,
        },
        dataType: 'json',
        success: function(info){
            document.querySelector('.saved').style.opacity = '1';
            setTimeout(function() {
                document.querySelector('.saved').style.opacity = '0'
            }, 1000)
        }
    });

    // e.preventDefault();
}

$(document).keydown(function(event) {
        // If Control or Command key is pressed and the S key is pressed
        // run save function. 83 is the key code for S.
        if((event.ctrlKey || event.metaKey) && event.which == 83) {
            // Save Function
            event.preventDefault();
            saveContent();
            return false;
        }
    }
);

$(document).ready(function(){
    $('#save').bind("click", saveContent);
});

</script>
@endsection