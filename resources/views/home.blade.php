@extends('layouts.app') 

@section('header')
    <i class="glyphicon glyphicon-dashboard"></i> Admin Dashboard
@stop

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <h3 align="center"><i class="glyphicon glyphicon-wrench"></i> Content Actions</h3><hr>
            <div class="list-group">
            
                
                <li class="list-group-item"><strong>Category Actions</strong>
                <a class="btn btn-xs btn-success pull-right" href="{{ route('categories.create') }}"><i class="glyphicon glyphicon-plus"></i></a>
                <span class="pull-right">&nbsp;</span>
                <a class="btn btn-xs btn-primary pull-right" href="{{ route('categories.index') }}"><i class="glyphicon glyphicon-eye-open"></i></a>
                </li>
                
                <li class="list-group-item"><strong>Credential Actions</strong>
                <a class="btn btn-xs btn-success pull-right" href="{{ route('credentials.create') }}"><i class="glyphicon glyphicon-plus"></i></a>
                <span class="pull-right">&nbsp;</span>
                <a class="btn btn-xs btn-primary pull-right" href="{{ route('credentials.index') }}"><i class="glyphicon glyphicon-eye-open"></i></a>
                </li>
                               
                <li class="list-group-item"><strong>Project Actions</strong>
                <a class="btn btn-xs btn-success pull-right" href="{{ route('projects.create') }}"><i class="glyphicon glyphicon-plus"></i></a>
                <span class="pull-right">&nbsp;</span>
                <a class="btn btn-xs btn-primary pull-right" href="{{ route('projects.index') }}"><i class="glyphicon glyphicon-eye-open"></i></a>
                </li>
                            
                <li class="list-group-item"><strong>Link Actions</strong>
                <a class="btn btn-xs btn-success pull-right" href="{{ route('links.create') }}"><i class="glyphicon glyphicon-plus"></i></a>
                <span class="pull-right">&nbsp;</span>
                <a class="btn btn-xs btn-primary pull-right" href="{{ route('links.index') }}"><i class="glyphicon glyphicon-eye-open"></i></a>
                </li>
              
                <li class="list-group-item"><strong>Article Actions</strong>
                <a class="btn btn-xs btn-success pull-right" href="{{ route('articles.create') }}"><i class="glyphicon glyphicon-plus"></i></a>
                <span class="pull-right">&nbsp;</span>
                <a class="btn btn-xs btn-primary pull-right" href="{{ route('articles.index') }}"><i class="glyphicon glyphicon-eye-open"></i></a>
                </li>
                
            </div>
        </div>
    </div>
@stop
