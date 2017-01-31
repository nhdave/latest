@extends('layouts.app')

@section('header')
    <i class="glyphicon glyphicon-edit"></i> Edit Credential Record
@stop

@section('content')

	<div class="row">
    <div class="col-md-8 col-md-offset-2">
      <form class="form-horizontal" action="{{ route('credentials.update', $credential->id) }}" method="POST">
      	<input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group @if($errors->has('name')) has-error @endif">
            <label for="name-field" class="control-label col-xs-2">Name</label>
              <div class="col-xs-8">
                <input type="text" id="name-field" name="name" class="form-control" value="{{ $credential->name }}"/>
                  @if($errors->has("name"))
                  <small></small><span class="help-block">{{ $errors->first("name") }}</span></small>
                  @endif
              </div>
          </div>
          <div class="form-group @if($errors->has('user_name')) has-error @endif">
            <label for="user_name-field" class="control-label col-xs-2">User Name</label>
              <div class="col-xs-8">
                <input type="text" id="user_name-field" name="user_name" class="form-control" value="{{ $credential->user_name }}"/>
                  @if($errors->has("user_name"))
                  <small></small><span class="help-block">{{ $errors->first("user_name") }}</span></small>
                  @endif
              </div>
          </div>
          <div class="form-group @if($errors->has('password')) has-error @endif">
            <label for="password-field" class="control-label col-xs-2">Password</label>
              <div class="col-xs-8">
                <input type="text" id="password-field" name="password" class="form-control" value="{{ $credential->password }}"/>
                  @if($errors->has("password"))
                  <small></small><span class="help-block">{{ $errors->first("password") }}</span></small>
                  @endif
              </div>
          </div>
          <div class="form-group">
            <label for="category_id" class="control-label col-xs-2">Category ID</label>
              <div class="col-xs-8">
                <select id="category_id" name="category_id" class="form-control"/>
                <option value="{{$credential->category->id}}">{{$credential->category->name}}</option>
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
            <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Update</button><br>
              <a class="btn btn-link" href="{{ route('categories.show', $credential->category_id) }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
          </div>
      </form>
      <hr>
      <h1 class="text-center">Links</h1>
  			@if($links->count())
   				
                <table class="table table-condensed table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>URL</th>
                            <th>LABEL</th>
                            <th>CREDENTIAL ID</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($links as $link)

                            <tr>
                                <td>{{$link->id}}</td>
                                <td><a href="{{$link->url}}" target="_blank">{{$link->url}}</a></td>
                                <td>{{$link->label}}</td>
                                <td>{{$link->credential_id}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-warning" href="{{ route('links.edit', $link->id) }}"><i class="glyphicon glyphicon-edit"></i></a>
                                    <form action="{{ route('links.destroy', $link->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                                                
                @else
                	<h3 class="text-center alert alert-info">Empty!</h3>
                    
            
            @endif
            <hr>
            <h1 align="center"><i class="glyphicon glyphicon-plus"></i>Add a Link </h1>
            
            <form class="form-horizontal" action="{{ route('links.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('url')) has-error @endif">
                       <label class="control-label col-sm-2" for="url-field">Url</label>
                       <div class="col-sm-8">
                        <input type="text" id="url-field" name="url" class="form-control" value="{{ old("url") }}"/>
                        </div>
                       @if($errors->has("url"))
                        <span class="help-block">{{ $errors->first("url") }}</span>
                       @endif
                </div>
                <div class="form-group @if($errors->has('label')) has-error @endif">
                       <label class="control-label col-sm-2" for="label-field">Label</label>
                       <div class="col-sm-8">
                        <input type="text" id="label-field" name="label" class="form-control" value="{{ old("label") }}"/>
                        </div>
                       @if($errors->has("label"))
                        <span class="help-block">{{ $errors->first("label") }}</span>
                       @endif
                </div>
                <div class="form-group">
                       <label class="control-label col-sm-2" for="credential_id">Credential ID</label>
                       <div class="col-sm-8">
                        <select id="credential_id" name="credential_id" class="form-control"/>
                        <option value="{{$credential->id}}">{{$credential->name}}</option>
                          @foreach($credentials as $credential)
                            <option value="{{$credential->id}}">{{$credential->name}}</option>
                          @endforeach
                        </select>
                        </div>
                       
                </div>
                <div class="form-group" align="center">
                    <button type="submit" class="btn btn-success">Create</button><br>
                    
                </div>
            </form>
    </div>
    </div>
@stop