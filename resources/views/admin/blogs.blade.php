@extends('admin/master')
@section('main')

  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Posted Posts
          <small>Viewing All Posts</small>
        </h3>
      </div>
    </div>
    <div class="box">
      <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Category</th>
                  <th>Sub Category</th>
                  <th>Title</th>
                  <th>Date Posted</th>
                  <th>Views</th>
                  <th>Description</th>
                  <th>Action 1</th>
                  <th>Action 2</th>
                </tr>
                @foreach($blogs as $blog)
                <tr>
                  <td>{{ $blog->id }}</td>
                  <td>{{ $blog->category }}</td>
                  <td>{{ $blog->sub_category }}</td>
                  <td>{{ $blog->blog_title }}</td>
                  <td>{{ $blog->date_posted->format('F j, Y') }}</td>
                  <td>{{ $blog->blog_views }}</td>
                  <td>{{ $blog->heading }}</td>
                  <td><a target="_blank" href="/kevin/blog/edit/{{ $blog->id }}" class="btn btn-success">Edit Content</a></td>
                  <td><a target="_blank" href="/kevin/blog/update/{{ $blog->id }}" class="btn btn-success">Edit Data</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
    </div>
  </div>
@endsection
