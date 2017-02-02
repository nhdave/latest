@extends('layouts.app')

@section('menu')
    <li><a href="{{ url('/home') }}">Dashboard</a></li>
@stop

@section('header')
    <i class="glyphicon glyphicon-eye-open"></i> {{$project->name}}
@stop

@section('content')
	<div class="row">
    	<div class="col-md-6 col-md-offset-3">
        
        	<ul>
            	<li>Id: {{$project->id}}</li>
                <li>Name: {{$project->name}}</li>
                <li>Priority: {{$project->priority}}</li>
                <li>Details: {{$project->details}}</li>
                <li>Updates:</li>
                <ul>
            		@foreach($project->updates as $update)
                    	<li>{{$update->details}}</li>
                    @endforeach
                </ul>
            </ul>
        </div>
    </div>
@stop

@section('footer')
	<div align="center">
    	<a class="btn btn-xs btn-warning" href="{{ route('projects.edit', $project->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
        	<form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            	<input type="hidden" name="_method" value="DELETE">
            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
            	<button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
            </form><br>
        <a class="btn btn-link" href="{{ url('projects')}}"><i class="glyphicon glyphicon-backward"></i> Back</a>
    </div>
    @parent
@stop