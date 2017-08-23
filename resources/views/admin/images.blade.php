@extends('admin/master')
@section('stylesheets')
<style>
    td img {
        width: 200px;
    }
    .copy:hover {
        background: #eff0f1;
        cursor: pointer;
        transition: all 2s ease-in-out;
    }
    form {
        padding: 10px;
    }
    .image-delete {
        position: fixed;
        width: 50%;
        display: inline-block;
        bottom: 50px;
        opacity: 0;
        transition: all 1s ease-in-out;
        z-index: 1000;
    }
</style>
@endsection
@section('alert')
<div class="col-xs-8 col-xs-offset-3 image-delete">
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Deleted.</h4>
        Successfully deleted image.
    </div>
</div>
@endsection
@section('main')
  <div class="col-md-12">
  @if(Session::has('added-image'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Yaas!</h4>
        {{ Session::get('added-image') }}
      </div>
    @endif
    @if(Session::has('no-image'))
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> No!</h4>
        {{ Session::get('no-image') }}
      </div>
    @endif
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Images
          <small>Viewing All Uploaded Images</small>
        </h3>
      </div>
    </div>
    <div class="box">
      <div class="box-body table-responsive">
        <form method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label>Upload New Photo</label>
            <input id="image" name="image" type="file" class="file">
        </form>
              <table class="table table-hover">
                <tbody><tr>
                  <th>Photo</th>
                  <th>Date Modified</th>
                  <th>URL</th>
                  <th>Copied</th>
                  <th>Delete</th>
                </tr>
                @foreach($images as $image)
                <tr class="copy">
                  <td><img src="{{ URL::asset(substr($image, 10)) }}"></td>
                  <td>{{  \Carbon\Carbon::createFromTimeStamp($image->getCTime())->diffForHumans() }}</td>
                  <td><input value="{{ URL::asset(substr($image, 10)) }}"></td>
                  <td class="icon"><i></i></td>
                  <td class="delete-image"><button class="delete-image btn btn-danger" value="{{ $image }}">Delete</button></td>
                </tr>
                @endforeach
              </tbody>
            </table>
    </div>
  </div>
@endsection
@section('more-scripts')
    <script>
    $("#image1").fileinput({'previewFileType':'any'});
    const xCsrfToken = "{{ csrf_token() }}";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': xCsrfToken
        }
    });

    function deleteImage(row, image){
        console.log(image)
        $.ajax({
            type: 'POST',
            url: '{{ URL::action('AdminController@deleteImage') }}',
            data: {
                'image': image,
            },
            dataType: 'json',
            success: function(info){
                row.style.display = 'none'
                document.querySelector('.image-delete').style.opacity = '1';
            }
        });

        // e.preventDefault();
    }
    let icon = null
    $('.copy').click(function(e) {
        let target = e.target
        let deleteButton = this.querySelector('td button.delete-image')
        if (target == deleteButton) {
            deleteImage(this, deleteButton.value)
            return
        }
        else {
            if (icon) {
                icon.className = ''
            }
            let copy = this.querySelector('td input')
            icon = this.querySelector('.icon i')
            copy.select()
            icon.className = 'fa fa-check'
            try {
                var successful = document.execCommand('copy');
            } catch (err) {
                console.log('Oops, unable to copy')
            }
        }
    });
</script>
@endsection