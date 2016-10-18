@extends('admin/master')
@section('main')
  <div class="col-md-12">
    @if(Session::has('updated-user'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Shmoo!</h4>
        {{ Session::get('updated-user') }}
      </div>
    @endif
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Shmoothies Blog Post
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
            <div class="col-md-4">
              <div class="form-group">
                <label for="first_name">First Name</label>
                <input class="form-control" type="text" name="first_name" value="{{ Auth::user()->first_name }}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="last_name">Last Name</label>
                <input class="form-control" type="text" name="last_name" value="{{ Auth::user()->last_name }}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5">
              <div class="form-group">
                <label for="instagram">Instagram</label>
                <input type="text" id="instagram" class="form-control" name="instagram" value="{{ Auth::user()->instagram }}">
              </div>
              <div class="form-group">
                <label for="facebook">Facebook</label>
                <input type="text" id="facebook" class="form-control" name="facebook" value="{{ Auth::user()->facebook }}">
              </div>
              <div class="form-group">
                <label for="linkedin">LinkedIn</label>
                <input type="text" id="linkedin" class="form-control" name="linkedin" value="{{ Auth::user()->linkedin }}">
              </div>
              <div class="form-group">
                <label for="snapchat">Snapchat</label>
                <input type="text" id="snapchat" class="form-control" name="snapchat" value="{{ Auth::user()->snapchat }}">
              </div>
              <div class="form-group">
                <label for="pinterest">Pinterest</label>
                <input type="text" id="pinterest" class="form-control" name="pinterest" value="{{ Auth::user()->pinterest }}">
              </div>
              <div class="form-group">
                <label for="tumblr">Tumblr URL</label>
                <input type="text" id="tumblr" class="form-control" name="tumblr" value="{{ Auth::user()->tumblr }}">
              </div>
            </div>
            <div class="col-md-7">
              <div class="form-group" style="">
                <label for="photo">Profile Picture</label>
                <input id="photo" name="photo" type="file">
                <script>
                $( document ).ready(function() {
                  $("#photo").fileinput({'showUpload':false, 'previewFileType':'any'});
                });
                </script>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="description">Bio</label>
            <textarea name="description" id="description" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ Auth::user()->description }}</textarea>
          </div>
          <button class="btn btn-primary" type="submit">Save</button>
        </form>
      </div>
    </div>
  </div>
@endsection
@section('more-scripts')
  <script>
  $("#tags").select2({
    tags: true
  });
  </script>
@endsection
