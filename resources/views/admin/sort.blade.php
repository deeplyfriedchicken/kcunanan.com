@extends('admin/master')
@section('main')
  <div class="col-md-12">
    @if(Session::has('updated-sorting'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        {{ Session::get('updated-sorting') }}
      </div>
    @endif
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">kcunanan.com Sorting
          <small>Portfolio</small>
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
            <div class="col-md-6">
              <div class="form-group">
                <label for="pl">Languages</span></label>
                <select id="pl" name="pl[]" class="form-control" multiple="multiple">
                  @foreach($pls as $pl)
                    <option value="{{ $pl->tag }}" selected>{{ $pl->tag }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="frs">Frameworks</span></label>
                <select id="frs" name="frs[]" class="form-control" multiple="multiple">
                  @foreach($frs as $fr)
                    <option value="{{ $fr->tag }}" selected>{{ $fr->tag }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="skills">Skills</span></label>
                <select id="skills" name="skills[]" class="form-control" multiple="multiple">
                  @foreach($skills as $skill)
                    <option value="{{ $skill->tag }}" selected>{{ $skill->tag }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="js">JS Libraries</span></label>
                <select id="js" name="js[]" class="form-control" multiple="multiple">
                  @foreach($js as $j)
                    <option value="{{ $j->tag }}" selected>{{ $j->tag }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="workplaces">Workplaces</span></label>
                <select id="workplaces" name="workplaces[]" class="form-control" multiple="multiple">
                  @foreach($workplaces as $w)
                    <option value="{{ $w->tag }}" selected>{{ $w->tag }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <button class="btn btn-success" type="submit">Save</button>
        </form>
      </div>
    </div>
  </div>
  @endsection
  @section('more-scripts')
    <script>
    $("#pl, #frs, #skills, #js, #workplaces").select2({
      tags: true
    });
    </script>
  @endsection
