@extends('layouts.app')

@section('header')
    <i class="glyphicon glyphicon-align-justify"></i>  All Projects
@stop

@section('content')
<div class="row">
	<div class="col-xs-6 col-xs-offset-3"> 
@unless ($projects->count())
	<h3 class="text-center alert alert-info">No Projects</h3> 
@endunless 
   
@if($projects->count())
	<table class="table table-condensed table-striped table-bordered">
  	<thead>
    	<tr>
      	<th>ID</th>
        <th>NAME</th>
        <th>PRIORITY</th>
        <th>DETAIL</th>
        <th class="text-right">OPTIONS</th>
      </tr>
    </thead>

    <tbody>
    @foreach($projects as $project)
    	<tr>
      	<td>{{$project->id}}</td>
      	<td><a href="{{ route('projects.show', $project->id) }}">{{$project->name}}</a></td>
        <td>{{$project->priority}}</td>
        <td>{{$project->details}}</td>
        <td class="text-right">
        	<form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
          	<input type="hidden" name="_method" value="DELETE">
          	<input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
	       
  <div align="center">
  	{!! $projects->render() !!}
  </div>
@endif
	</div>
</div>
<div align="center">
		<hr>
		<a class="btn btn-primary" href="{{ route('projects.create') }}"><i class="glyphicon glyphicon-plus"></i> New Project</a><br>
  	<a class="btn btn-link" href="{{ url('/home') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
  </div>
@stop

