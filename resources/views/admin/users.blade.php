@extends('admin/master')
@section('main')

  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Shmoothies Pending Admins
          <small>Approve or Deny a user</small>
        </h3>
      </div>
    </div>
    <div class="box">
      <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>User</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                @foreach($users as $user)
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                  <td>{{ $user->created_at->format('F j, Y') }}</td>
                  <td><span class="label label-warning">Pending</span></td>
                  <td>{{ $user->description }}</td>
                  <td>
                    <form method="POST" action="users/approve/{{ $user->id }}">
                      {{ csrf_field() }}
                      <input name="_method" type="hidden" value="PATCH">
                      <input class="btn btn-success" type="submit" value="Approve">
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
    </div>
  </div>
@endsection
