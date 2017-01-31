 extends('layouts.app')
 @section('header')
     <i class="glyphicon glyphicon-plus"></i> Create an Update
 @stop

@section('content')
    <div class="row" align="center">
      <div class="col-md-8 col-md-offset-2">
        <form class="form-horizontal" action="{{ route('updates.store') }}" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group @if($errors->has('name')) has-error @endif">
            <label class="control-label col-sm-2" for="name-field">Name</label>
            <div class="col-sm-8">
              <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
            </div>
            @if($errors->has("name"))
              <span class="help-block">{{ $errors->first("name") }}</span>
            @endif
          </div>

          <div class="form-group @if($errors->has('details')) has-error @endif">
            <label class="control-label col-sm-2" for="details-field">Details</label>
            <div class="col-sm-8">
              <input type="text" id="details-field" name="details" class="form-control" value="{{ old("details") }}"/>
            </div>
            @if($errors->has("details"))
              <span class="help-block">{{ $errors->first("details") }}</span>
            @endif
          </div>

          <div class="form-group @if($errors->has('project_id')) has-error @endif">
            <label class="control-label col-sm-2" for="project_id-field">Project Id</label>
            <div class="col-sm-8">
              <input type="number" id="project_id-field" name="project_id" class="form-control" value="{{ $project->id }}"/>
            </div>
            @if($errors->has("project_id"))
              <span class="help-block">{{ $errors->first("project_id") }}</span>
            @endif
          </div>

          <div class="form-group" align="center">
            <button type="submit" class="btn btn-success">Create</button><br>
            <a class="btn btn-link" href="{{ url('projects')}}"><i class="glyphicon glyphicon-backward"></i> Back</a>
          </div>
        </form>

      </div>
    </div>
@stop