@extends('layouts.app') 

@section('header')
  <i class="glyphicon glyphicon-plus"></i> Create a Credential Record
@stop

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
      <form class="form-horizontal" action="{{ route('credentials.store') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group @if($errors->has('name')) has-error @endif">
            <label for="name-field" class="control-label col-xs-2">Name</label>
              <div class="col-xs-8">
                <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                  @if($errors->has("name"))
                  <small></small><span class="help-block">{{ $errors->first("name") }}</span></small>
                  @endif
              </div>
          </div>
          <div class="form-group @if($errors->has('user_name')) has-error @endif">
            <label for="user_name-field" class="control-label col-xs-2">User Name</label>
              <div class="col-xs-8">
                <input type="text" id="user_name-field" name="user_name" class="form-control" value="{{ old("user_name") }}"/>
                  @if($errors->has("user_name"))
                  <small></small><span class="help-block">{{ $errors->first("user_name") }}</span></small>
                  @endif
              </div>
          </div>
          <div class="form-group @if($errors->has('password')) has-error @endif">
            <label for="password-field" class="control-label col-xs-2">Password</label>
              <div class="col-xs-8">
                <input type="text" id="password-field" name="password" class="form-control" value="{{ old("password") }}"/>
                  @if($errors->has("password"))
                  <small></small><span class="help-block">{{ $errors->first("password") }}</span></small>
                  @endif
              </div>
          </div>
          <div class="form-group @if($errors->has('category_id')) has-error @endif">
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
								 @if($errors->has("category_id"))
                  <small></small><span class="help-block">{{ $errors->first("category_id") }}</span></small>
                  @endif	
              </div>
          </div>
          <div class="form-group" align="center">
            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Create</button><br>
              <a class="btn btn-link" href="{{ url('/home') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
          </div>
      </form>
    </div>
  </div>
         
@stop 