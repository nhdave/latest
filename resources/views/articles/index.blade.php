@extends('layouts.app')

@section('header')
<i class="glyphicon glyphicon-align-justify"></i> All Articles 
@stop 

@section('content') 
<br>
@unless ($articles->count())
<div class="row">
	<div class="col-xs-6 col-xs-offset-3">
		<h3 class="text-center alert alert-info">No Articles</h3> 
	</div>
</div>
@endunless 

@foreach ($articles->chunk(2) as $chunk)
<div class="row">
	@foreach ($chunk as $article)
	@if($chunk->count() > 1)
	<div class="col-xs-6">
	@else
	<div class="col-xs-12">
	@endif
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong><h1 align="center">{{ $article->title }}</h1></strong>
			</div>

			<div class="panel-body">
				<h4>{!!$article->body!!}</h4>
			</div>

			<div class="panel-footer">
				<form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline;" 			 onsubmit="if(confirm('Delete Article? Are you sure?')) { return true } else {return false };">
					<input type="hidden" name="_method" value="DELETE">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
				</form>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endforeach 
<div align="center">
		<hr>
		<a class="btn btn-primary" href="{{ route('articles.create') }}"><i class="glyphicon glyphicon-plus"></i> New Article</a><br>
  	<a class="btn btn-link" href="{{ url('/home') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
  </div>
@stop 

