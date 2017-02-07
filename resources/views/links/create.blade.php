@extends('layouts.app')

@section('header')
    <i class="glyphicon glyphicon-plus"></i> Create a Link
@stop

@section('content')
    <div class="row">
    	<div class="col-md-8 col-md-offset-2">

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
                        <option value="" disabled="disabled" selected="selected">Please select a credential record</option>
                          @foreach($credentials as $credential)
                            <option value="{{$credential->id}}">{{$credential->name}}</option>
                          @endforeach
                        </select>
                        </div>
                       
                </div>
                <div class="form-group" align="center">
                    <button type="submit" class="btn btn-primary">Create</button><br>
                    <a class="btn btn-link" href="{{ url('/home') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>
        </div>
    </div>

        
@stop 