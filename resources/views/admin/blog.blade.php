@extends('admin/master')
@section('main')
  <div class="col-md-12">
    @if(Session::has('added-blog'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        {{ Session::get('added-blog') }}
      </div>
    @endif
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">kcunanan.com New Post
          <small>New Blog Post</small>
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
                <option value="portfolio">Portfolio</option>
                <option value="blog">Blog</option>
              </select>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="title">Color</label>
                <input class="form-control colorme" type="text" name="color">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="title">1st Paragraph Description</label>
                <input type="text" class="form-control" name="intro-paragraph">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="subcategory" class="form-control">
                  @foreach($category as $cate)
                    <option value="{{ $cate }}">{{ ucwords($cate) }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tags">Tags</label>
                <select id="tags" name="tags[]" class="form-control" multiple="multiple">
                  @foreach($tags as $tag)
                    <option value="{{ $tag->tag }}">{{ $tag->tag }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="portf_link">Portfolio Link</label>
                <input type="text" class="form-control" name="portf_link" id="portf_link">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="portf_link">GitHub Repo</label>
                <input type="text" class="form-control" name="github_repo" id="github_repo">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group" style="">
                <label for="media">Blog Cover Photo (recommended width: 969)</label>
                <input id="photo" name="photo" type="file" class="file">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group" style="">
                <label for="media">Portfolio Photo</label>
                <input id="portf-photo" name="portf-photo" type="file" class="file">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="portfolio-preview">Portfolio Preview</label>
                <select name="portfolio-ish" class="form-control">
                  <option value="ish-p-col-w1 ish-p-col-h1">Square (1x1)</option>
                  <option value="ish-p-col-w2 ish-p-col-h2">Big Square (2x2)</option>
                  <option value="ish-p-col-w1 ish-p-col-h2">Vertical (2x1)</option>
                  <option value="ish-p-col-w2 ish-p-col-h1">Horizontal (1x2)</option>
                </select>
              </div>
            </div>
          </div>
          <button class="btn btn-success" type="submit">Create Post</button>
        </form>
      </div>
    </div>
  </div>
@endsection
@section('more-scripts')
  <script>
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
  var editor = new wysihtml.Editor('editor', {
    toolbar: 'toolbar',
  });
  </script>
@endsection
