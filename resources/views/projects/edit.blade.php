@extends('layouts.app')
@section('header')
  <i class="glyphicon glyphicon-edit"></i> Update Project {{ $project->name}}
@stop

@section('content')
	<div class="row" align="center">
    	<div class="col-md-8 col-md-offset-2">
        
        <form class="form-horizontal" action="{{ route('projects.update', $project->id) }}" method="POST">
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group @if($errors->has('name')) has-error @endif">
            <label class="control-label col-sm-2" for="name-field">Name</label>
            <div class="col-sm-8">
              <input type="text" id="name-field" name="name" class="form-control" value="{{ $project->name }}"/>
            </div>
              @if($errors->has("name"))
                <span class="help-block">{{ $errors->first("name") }}</span>
              @endif
          </div>

          <div class="form-group @if($errors->has('details')) has-error @endif">
            <label class="control-label col-sm-2" for="details-field">Details</label>
            <div class="col-sm-8">
              <input type="text" id="details-field" name="details" class="form-control" value="{{ $project->details }}" />
            </div>
              @if($errors->has("details"))
                <span class="help-block">{{ $errors->first("details") }}</span>
              @endif
          </div>

          <div class="form-group @if($errors->has('priority')) has-error @endif">
            <label class="control-label col-sm-2" for="priority-field">Priority</label>
            <div class="col-sm-8">
              <select id="priority" name="priority" class="form-control"/>
                          <option value="" disabled="disabled" selected="selected">{{$project->priority}}</option>
                          <option>high</option>
                          <option>medium</option>
                          <option>low</option>
                         </select>
            </div>
              @if($errors->has("priority"))
                <span class="help-block">{{ $errors->first("priority") }}</span>
              @endif
          </div>

          <div class="form-group" align="center">
            <button type="submit" class="btn btn-success">Update</button><br>
          </div>
        </form>
        </div>
    </div>
      <div class="row" align="center">
    	<div class="col-md-8 col-md-offset-2">
      <h3><i class="glyphicon glyphicon-align-justify"></i> Existing Updates</h3>
       @if($project->updates()->count())
        <table class="table table-condensed table-striped table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>NAME</th>
              <th>Details</th>
              <th class="text-right">OPTIONS</th>
            </tr>
          </thead>

          <tbody>
            @foreach($project->updates as $update)
              <tr>
                <td>{{$update->id}}</td>
                <td>{{$update->name}}</td>
                <td>{{$update->details}}</td>
                <td class="text-right">
                  <a class="btn btn-xs btn-warning" href="{{ route('updates.edit', $update->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                  <form action="{{ route('updates.destroy', $update->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        </div>
    </div>
        @else
          <h3 class="text-center alert alert-info">Empty!</h3>
        @endif
        
        
      </div>
    </div>
    
    <div class="row" align="center">
      <div class="col-md-8 col-md-offset-2">
        <h3><i class="glyphicon glyphicon-plus"></i> Add an Update</h3>
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