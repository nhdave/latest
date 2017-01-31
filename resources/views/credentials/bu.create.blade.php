@extends('layouts.app')  



@section('header')
    <h1 align="center"><i class="glyphicon glyphicon-plus"></i> Create a Credential Record </h1>
@stop

@section('content')
@include('error')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
      <form class="form-horizontal" action="{{ route('credentials.store') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group @if($errors->has('name')) has-error @endif">
            <label for="name-field" class="control-label col-xs-2">Name</label>
              <div class="col-xs-8">
                <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                  @if($errors->has("name"))
                    <span class="help-block">{{ $errors->first("name") }}</span>
                  @endif
              </div>
          </div>
          <div class="form-group">
            <label for="user_name_id" class="control-label col-xs-2">User Name ID</label>
              <div class="col-xs-8">
                <select id="user_name_id" name="user_name_id" class="form-control"/>
                  @foreach($userNames as $userName)
                  	<option value="{{$userName->id}}">{{$userName->value}}</option>
                  @endforeach
                </select>
              </div>
          </div>
          <div class="form-group">
            <label for="password_id" class="control-label col-xs-2">Password ID</label>
              <div class="col-xs-8">
                <select id="password_id" name="password_id" class="form-control"/>
                  @foreach($passwords as $password)
                  	<option value="{{$password->id}}">{{$password->value}}</option>
                  @endforeach
                </select>
              </div>
          </div>
          <div class="form-group">
            <label for="category_id" class="control-label col-xs-2">Category ID</label>
              <div class="col-xs-8">
                <select id="category_id" name="category_id" class="form-control"/>
                  @foreach($roots as $root)
    				<option value="{{$root->id}}">{{ $root->name }}</option>
        			@if ($root->children()->count())
						@foreach($root->children() as $child)
               				<option value="{{$child->id}}">***{{ $child->name }}</option>
               				 @if ($child->children()->count())
								@foreach($child->children() as $grandchild)
                       				<option value="{{$grandchild->id}}">******{{ $grandchild->name }}</option>
                        			@if ($grandchild->children()->count())
										@foreach($grandchild->children() as $greatgrandchild)
                               				<option value="{{$greatgrandchild->id}}">*********{{ $greatgrandchild->name }}</option>
                                			@if ($greatgrandchild->children()->count())
												@foreach($greatgrandchild->children() as $greatgreatgrandchild)
                                     				<option value="{{$greatgreatgrandchild->id}}">************{{ $greatgreatgrandchild->name }}</option>
                                    			@endforeach
                                            @endif
                            			@endforeach
                        			@endif
                    			@endforeach
                			@endif
            			@endforeach
        			@endif
    			  @endforeach
  				</select>
              </div>
          </div>
          <div class="form-group" align="center">
            <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Create</button><br>
              <a class="btn btn-link" href="{{ url('/home') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
          </div>
      </form>
    </div>
  </div>
         
@stop