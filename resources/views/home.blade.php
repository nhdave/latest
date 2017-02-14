@extends('layouts.app') 

@section('header')
    <i class="glyphicon glyphicon-dashboard"></i> Admin Dashboard
@stop

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <h3 align="center"><i class="glyphicon glyphicon-wrench"></i> Content Actions</h3><hr>
            <div class="list-group">
            
                <div class="col-md-6  list-group-item" align="center">
                <h5 class="list-group-item-heading"><strong>Category Actions</strong></h5>
                <p><a class="btn btn-xs btn-success" href="{{ route('categories.create') }}"><i class="glyphicon glyphicon-plus"></i></a>
                <a class="btn btn-xs btn-primary" href="{{ route('categories.index') }}"><i class="glyphicon glyphicon-eye-open"></i></a>
                </p>
                </div>

                <div class="col-md-6 list-group-item" align="center">
                <h5 class="list-group-item-heading"><strong>Credential Actions</strong></h5>
                <p><a class="btn btn-xs btn-success" href="{{ route('credentials.create') }}"><i class="glyphicon glyphicon-plus"></i></a>
                <a class="btn btn-xs btn-primary" href="{{ route('credentials.index') }}"><i class="glyphicon glyphicon-eye-open"></i></a>
                </p>
                </div>

                <div class="col-md-6 list-group-item" align="center">
                <h5 class="list-group-item-heading"><strong>Project Actions</strong></h5>
                <p><a class="btn btn-xs btn-success" href="{{ route('projects.create') }}"><i class="glyphicon glyphicon-plus"></i></a>
                <a class="btn btn-xs btn-primary" href="{{ route('projects.index') }}"><i class="glyphicon glyphicon-eye-open"></i></a>
                </p>
                </div>
            
                <div class="col-md-6 list-group-item" align="center">
                <h5 class="list-group-item-heading"><strong>Link Actions</strong></h5>
                <p><a class="btn btn-xs btn-success" href="{{ route('links.create') }}"><i class="glyphicon glyphicon-plus"></i></a>
                <a class="btn btn-xs btn-primary" href="{{ route('links.index') }}"><i class="glyphicon glyphicon-eye-open"></i></a>
                </p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    
@endsection
