@extends('admin/master')
@section('main')
  <div class="col-md-12">
    @if(Session::has('updated-blog'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        {{ Session::get('added-blog') }}
      </div>
    @endif
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Update Post {{ $blog->blog_title }}
          <small>Editing {{ $blog->category }}</small>
        </h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
          <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
        <!-- /. tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body pad">
        <form method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-12">
              <label for="lookup_category">Post Type</label>
              <select name="lookup_category" id="lookup_category" class="form-control">
                <option value="portfolio" @if($blog->category == "portfolio") selected @endif>Portfolio</option>
                <option value="blog" @if($blog->category == "blog") selected @endif>Blog</option>
              </select>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" value="{{ $blog->blog_title }}">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="title">Color</label>
                <input class="form-control colorme" type="text" name="color" value="{{ $blog->color }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="title">1st Paragraph Description</label>
                <input type="text" class="form-control" name="intro-paragraph" value="{{ $blog->heading }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="subcategory" class="form-control">
                    <option value="{{ $blog->sub_category }}" selected>{{ ucwords($blog->sub_category) }}</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tags">Tags <span>(separated by commas)</span></label>
                <select id="tags" name="tags[]" class="form-control" multiple="multiple">
                  @foreach($tagged as $tag)
                    <option value="{{ $tag->tag }}" selected>{{ $tag->tag }}</option>
                  @endforeach
                  @foreach($allTags as $tag)
                    <option value="{{ $tag->tag }}">{{ $tag->tag }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="portf_link">Portfolio Link</label>
                <input type="text" class="form-control" name="portf_link" id="portf_link" value="{{ $blog->portfolio_link }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group" style="">
                <label for="media">Blog Cover Photo (recommended width: 969 <a target="_blank" href="{{ URL::asset($blog->media_url) }}">Current</a>)</label>
                <input id="photo" name="photo" type="file" class="file">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group" style="">
                <label for="media">Portfolio Photo @if($blog->portfolio_image)(<a target="_blank" href="{{ URL::asset($blog->portfolio_image) }}">Current</a>)@endif</label>
                <input id="portf-photo" name="portf-photo" type="file" class="file">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="portfolio-preview">Portfolio Preview</label>
                <select name="portfolio-ish" class="form-control">
                  <option value="ish-p-col-w1 ish-p-col-h1" @if($blog->portfolio_ish == "ish-p-col-w1 ish-p-col-h1") selected @endif>Square 1x1</option>
                  <option value="ish-p-col-w2 ish-p-col-h2" @if($blog->portfolio_ish == "ish-p-col-w2 ish-p-col-h2") selected @endif>Big Square (2x2)</option>
                  <option value="ish-p-col-w1 ish-p-col-h2" @if($blog->portfolio_ish == "ish-p-col-w1 ish-p-col-h2") selected @endif>Vertical 2x1</option>
                  <option value="ish-p-col-w2 ish-p-col-h1" @if($blog->portfolio_ish == "ish-p-col-w2 ish-p-col-h1") selected @endif>Horizontal 1x2</option>
                </select>
              </div>
            </div>
          </div>
          <input type="hidden" id="num-sections" name="num-sections" value=@if(isset($sections_count)) {{ $sections_count }} @else 1 @endif>
          <div>
          <?php $counter = 1 ?>
          @foreach($sections as $section)
            <div class="section{{ $counter }}">
              <div class="row push-down">
                <div class="col-md-4">
                  <label for="type{{ $counter }}">Type of Section {{ $counter }}</label>
                  <select name="type{{ $counter }}" class="form-control">
                    <option value="fp" @if($section->helper_type == "fp") selected @endif>Full Width Paragraph</option>
                    <option value="imp" @if($section->helper_type == "imp") selected @endif>Left Image and Right Paragraph</option>
                    <option value="pim" @if($section->helper_type == "pim") selected @endif>Left Paragraph and Right Image</option>
                  </select>
                  <label for="title1">Subtitle {{ $counter }}</label><input type="text" class="form-control title-help" name="title{{ $counter }}" value="{{ $section->heading }}">
                </div>
                <div class="col-md-4">
                  <label for="color{{ $counter }}">Title Color {{ $counter }}</label>
                  <input id="color{{ $counter }}" name="color{{ $counter }}" type="text" class="form-control colorme" value="{{ $section->color }}">
                </div>
                <div class="col-md-4">
                  <label for="image{{ $counter }}">Section Photo {{ $counter }} (if applicable @if($section->media_url) <a target="_blank" href="{{ URL::asset($section->media_url) }}">current</a> <input type="hidden" name="old_image{{ $counter }}" value="<?php echo $section->media_url ?>"> @endif)</label>
                  <input id="image{{ $counter }}" name="image{{ $counter }}" type="file" class="file">
                </div>
              </div>
                <div class="form-group">
                  <textarea name="content{{ $counter }}" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $section->content }}</textarea>
                </div>
              </div>
              <?php $counter++ ?>
          @endforeach
          </div>
          <button class="btn btn-success" type="submit">Save</button>
        </form>
        <button onclick="newSection()" class="btn btn-primary">New Section</button>
      </div>
    </div>
  </div>
@endsection
@section('more-scripts')
  <script>
  var sectionCount = {{ $sections_count }};
  var sectionForm = "<div class='section{{ $sections_count }}'>" +
    "<div class='row push-down'>" +
      "<div class='mid-col'>" +
        "<label for='type{{ $sections_count }}'>Section {{ $sections_count }} Type</label>" +
        "<select name='type{{ $sections_count }}' class='form-control'>" +
          "<option value='fp'>Full Width Paragraph</option>" +
          "<option value='imp'>Left Image and Right Paragraph</option>" +
          "<option value='pim'>Left Paragraph and Right Image</option>" +
        "</select>" +
        "<label for='title{{ $sections_count }}'>Subtitle {{ $sections_count }}</label>" + "<input type='text' class='form-control title-help' name='title{{ $sections_count }}'>" +
      "</div>" +
      "<div class='mid-col'>" +
        "<label for='color{{ $sections_count }}'>Title {{ $sections_count }} Color</label>" +
        "<input id='color{{ $sections_count }}' name='color{{ $sections_count }}' type='text' class='form-control colorme'>" +
      "</div>" +
      "<div class='mid-col'>" +
        "<label for='media'>Section {{ $sections_count }} Photo (if applicable)</label>" +
        "<input id='image{{ $sections_count }}' name='image{{ $sections_count }}' type='file' class='file'>" +
      "</div>" +
    "</div>" +
      "<div class='form-group'>" +
        "<textarea name='content{{ $sections_count }}' class='textarea textarea{{ $sections_count }}' placeholder='Place some text here'></textarea>" +
      "</div>" +
    "</div>";
    var colmd4 = "col-md-4"
    var textareaStyle = 'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;';
  function newSection() {
    sectionCount++;
    var re = new RegExp(parseInt(sectionCount-1),"g");
    sectionForm = sectionForm.replace(re, parseInt(sectionCount));
    console.log(sectionCount);
    $('.section' + parseInt(sectionCount-1)).after(sectionForm);
    $('.textarea' + parseInt(sectionCount)).attr("style", textareaStyle);
    $('.textarea' + parseInt(sectionCount)).wysihtml5();
    $('.mid-col').removeClass('mid-col').addClass(colmd4);
    $('.colorme').colorpicker({ /*options...*/ });
    $("#image" + parseInt(sectionCount)).fileinput({'showUpload':false, 'previewFileType':'any'});
    $("#num-sections").val(sectionCount);
  }
  $("#image1, #photo, #portf-photo").fileinput({'showUpload':false, 'previewFileType':'any'});
  $('#subcategory').select2({
    tags: true,
    createTag: function (params) {
    return {
      id: params.term,
      text: params.term,
      newOption: true
      }
    }
  });
  $('.colorme').colorpicker({ /*options...*/ });
  $("#tags").select2({
    tags: true
  });
  $('.textarea').wysihtml5();
  </script>
@endsection
