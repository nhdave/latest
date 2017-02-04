@extends('layouts.app')

@section('menu')
    <li><a href="{{ url('/home') }}">Dashboard</a></li>
@stop

@section('header')
	<i class="glyphicon glyphicon-align-justify"></i> All Articles
@stop

@section('content')
	@unless ($articles->count())
		<h3 class="text-center alert alert-info">No Articles</h3>
	@endunless

	@foreach($articles as $article)
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<strong><h1 align="center">{{ $article->title }}</h1></strong>
				<div class="well">
				<p>{{$article->body}}</p>
				</div>
			</div>
		</div>

	@endforeach
	<div align="center">
        <a class="btn btn-success" href="{{ route('articles.create') }}"><i class="glyphicon glyphicon-plus"></i> Create New Article</a><br>
        <a class="btn btn-link" href="{{ url('/home') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
    </div> 
@stop

