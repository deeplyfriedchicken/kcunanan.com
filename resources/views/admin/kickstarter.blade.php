@extends('admin/master')
@section('main')
    @if(Session::has('added-kick'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Successfully Added New Kickstarter!</h4>
        {{ Session::get('added-kick') }}
      </div>
    @endif
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">kcunanan.com New Kickstarter
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
              <label for="search_term">Kickstarter Search Term</label>
              <input class="form-control" id="search_term" type="text" name="search_term">
            </div>
          </div>
          <button class="btn btn-success" type="submit">Add</button>
        </form>
      </div>
      <div class="box-body pad">
      @foreach($kicks as $kick)
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div><img style="width: 100%;" src="{{ $kick->media_url }}"></div>
            <h4>{{ $kick->blog_title }}</h4>
            <a href="{{ $kick->blog_url }}"><p>{{ $kick->heading }}</p></a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
