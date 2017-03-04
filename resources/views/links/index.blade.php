@extends('layouts.app')

@section('header')
    <i class="glyphicon glyphicon-align-justify"></i> Existing Links Records
@stop

@section('content')
    <div class="row">
    <div class="col-md-10 col-md-offset-1">
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
                                <td>{{$link->url}}</td>
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
                <div class="row" align="center">
                    {!! $links->render() !!}
                </div>
                                
                @else
                    <h3 class="text-center alert alert-info">Empty!</h3>
            @endif
    </div>
    </div>
    <div align="center">
		<hr>
		<a class="btn btn-primary" href="{{ route('links.create') }}"><i class="glyphicon glyphicon-plus"></i> New Link</a><br>
  	<a class="btn btn-link" href="{{ url('/home') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
  </div>
@endsection
