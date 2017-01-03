@extends('admin/master')
@section('main')
    <div class="col-md-12">
      @if(Session::has('sync'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Success!</h4>
          {{ Session::get('sync') }}
        </div>
      @endif
      @if(Session::has('downloaded-fitbit'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Success!</h4>
          {{ Session::get('downloaded-fitbit') }}
        </div>
      @endif
      @if(Session::has('existing-fitbit'))
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Data Already Downloaded!</h4>
          {{ Session::get('existing-fitbit') }}
        </div>
      @endif
    </div>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ DB::table('lookups')->where('category', 'portfolio')->orWhere('category', 'blog')->sum('blog_views') }}</h3>

              <p>Total Blog Views</p>
            </div>
            <div class="icon">
              <i class="ion ion-pound"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ DB::table('lookups')->where('category', 'portfolio')->orWhere('category', 'blog')->avg('blog_views') }}</h3>

              <p>Views Per Blog</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ DB::table('lookups')->where('category', 'portfolio')->orWhere('category', 'blog')->count() }}</h3>

              <p>Total Posts</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-book"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <!-- Main content -->
          <section class="content">
            <div class="row">
              {{-- <div class="col-md-3">
                <a href="compose.html" class="btn btn-primary btn-block margin-bottom">Compose</a>

                <div class="box box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">Folders</h3>

                    <div class="box-tools">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                      <li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox
                        <span class="label label-primary pull-right">12</span></a></li>
                      <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                      <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                      <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a>
                      </li>
                      <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                    </ul>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /. box -->
                <div class="box box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">Labels</h3>

                    <div class="box-tools">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                      <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
                      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
                      <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
                    </ul>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <!-- /.col --> --}}
              <div class="col-md-12">
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Inbox</h3>

                    <div class="box-tools pull-right">
                      <div class="has-feedback">
                        <input type="text" class="form-control input-sm" placeholder="Search Mail">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                      </div>
                    </div>
                    <!-- /.box-tools -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <div class="mailbox-controls">
                      <!-- Check all button -->
                      <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                      </button>
                      <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                      </div>
                      <!-- /.btn-group -->
                      <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                    </div>
                    <div class="table-responsive mailbox-messages">
                      <table class="table table-hover table-striped">
                        <tbody>
                        @foreach($mails as $mail)
                        <tr>
                          <td><input type="checkbox"></td>
                          <td class="mailbox-name"><a href="/kevin/mail/{{ $mail->id }}">{{ $mail->name }}</a></td>
                          <td class="mailbox-subject"><b>{{ $mail->subject }}</b> - {{ substr($mail->message, 0, 25) }}
                          </td>
                          <td class="mailbox-attachment"></td>
                          <td class="mailbox-date">{{ $mail->created_at->diffForHumans() }}</td>
                          <td>@if($mail->seen == 0) Read @else <i class="fa fa-check"></i> @endif</td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                      <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer no-padding">
                    <div class="mailbox-controls">
                      <!-- Check all button -->
                      <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                      </button>
                      <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                      </div>
                      <!-- /.btn-group -->
                      <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                      <div class="pull-right">
                        1-50/200
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                        </div>
                        <!-- /.btn-group -->
                      </div>
                      <!-- /.pull-right -->
                    </div>
                  </div>
                </div>
                <!-- /. box -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </section>
          <!-- /.content -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  @endsection
