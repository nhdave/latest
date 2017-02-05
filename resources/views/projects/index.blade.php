@extends('layouts.app')

@section('menu')
    <li><a href="{{ url('/home') }}">Dashboard</a></li>
@stop

@section('header')
    <i class="glyphicon glyphicon-align-justify"></i>  Existing Projects
@stop

@section('content')
<div class="col-xs-6 col-xs-offset-3">    
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
        
    @else
        <h3 class="text-center alert alert-info">Empty!</h3>
    @endif

    <div align="center">
        <a class="btn btn-primary" href="{{ route('projects.create') }}"><i class="glyphicon glyphicon-plus"></i> Create New Project</a><br>
        <a class="btn btn-link" href="{{ url('/categories')}}"><i class="glyphicon glyphicon-backward"></i> Back</a>
    </div> 
</div>

@stop