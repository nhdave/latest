@extends('layouts.app')

@section('menu')
    <li><a href="{{ url('/home') }}">Dashboard</a></li>
@stop

@section('header')
    <i class="glyphicon glyphicon-edit"></i> Edit Link
@stop

@section('content')
    <div class="row">
    	<div class="col-md-8 col-md-offset-2">

            <form class="form-horizontal" action="{{ route('links.update', $link) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('url')) has-error @endif">
                       <label class="control-label col-sm-2" for="url-field">Url</label>
                       <div class="col-sm-8">
                        <input type="text" id="url-field" name="url" class="form-control" value="{{ $link->url }}"/>
                        </div>
                       @if($errors->has("url"))
                        <span class="help-block">{{ $errors->first("url") }}</span>
                       @endif
                </div>
                <div class="form-group @if($errors->has('label')) has-error @endif">
                       <label class="control-label col-sm-2" for="label-field">Label</label>
                       <div class="col-sm-8">
                        <input type="text" id="label-field" name="label" class="form-control" value="{{ $link->label }}"/>
                        </div>
                       @if($errors->has("label"))
                        <span class="help-block">{{ $errors->first("label") }}</span>
                       @endif
                </div>
                <div class="form-group @if($errors->has('credential_id')) has-error @endif">
                       <label class="control-label col-sm-2" for="credential_id-field">Credential ID</label>
                       <div class="col-sm-8">
                        <input type="text" id="credential_id-field" name="credential_id" class="form-control" value="{{ $link->credential_id }}"/>
                        </div>
                       @if($errors->has("credential_id"))
                        <span class="help-block">{{ $errors->first("credential_id") }}</span>
                       @endif
                </div>
                <div class="form-group" align="center">
                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Update</button><br>
                    <a class="btn btn-link" href="{{ route('links.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>
        </div>
    </div>

        
@endsection 