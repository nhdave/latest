@extends('layouts.app')

@section('menu')
    <li><a href="{{ url('/home') }}">Dashboard</a></li>
@stop

@section('header')
    <i class="glyphicon glyphicon-plus"></i> Create a Project
@stop

@section('content')
	
    <div class="container" align="center">
    	<div class="row">
    		<div class="col-md-8 col-md-offset-2">
            	<form class="form-horizontal" action="{{ route('projects.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label class="control-label col-sm-2" for="name-field">Name</label>
                       <div class="col-sm-8">
                        <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                        </div>
                       @if($errors->has("name"))
                        <small><span class="help-block">{{ $errors->first("name") }}</span></small>
                       @endif
                </div>
                <div class="form-group @if($errors->has('details')) has-error @endif">
                       <label class="control-label col-sm-2" for="details-field">Details</label>
                       <div class="col-sm-8">
                        <input type="text" id="details-field" name="details" class="form-control" value="{{ old("details") }}" />
                        </div>
                       @if($errors->has("details"))
                        <small><span class="help-block">{{ $errors->first("details") }}</span></small>
                       @endif
                </div>
                <div class="form-group">
                       <label class="control-label col-sm-2" for="priority">Priority</label>
                       <div class="col-sm-8">
                        <select id="priority" name="priority" class="form-control"/>
                          <option value="" disabled="disabled" selected="selected">Please select a priority</option>
                          <option>high</option>
                          <option>medium</option>
                          <option>low</option>
                         </select>
                        </div>
                       
                </div>
                <div class="form-group">
            <label for="category_id" class="control-label col-xs-2">Category ID</label>
              <div class="col-xs-8">
                <select id="category_id" name="category_id" class="form-control"/>
                <option value="" disabled="disabled" selected="selected">Please select a category</option>
                @foreach( $categories->where('parent_id', null) as $listItem)
                <option value="{{$listItem->id}}">{{ $listItem->name }}</option>
                 @if (($categories->where('parent_id', $listItem->id)->count()) > 0)
                 @include('partials.selSubCat')
                 @endif
                 @endforeach
                 </select>
              </div>
          </div>
                <div class="form-group" align="center">
                    <button type="submit" class="btn btn-success">Create</button><br>
                    <a class="btn btn-link" href="{{ url('/home') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                    
                </div>
            </form>
            </div>
        </div>
    </div>
@stop