@extends('layouts.app')

@section('header')
  Vue Test Bed
@stop

@section('content')
  <example></example>
  <hr>
  <h1 v-if="!message">You must send a message for help!</h1>
    <h2 v-else>You have sent a message!</h2>
    <textarea v-model="message"></textarea>
    <button v-show="message">
        Send word to allies for help!
    </button>
    <pre>
        @{{ $data }}
    </pre>
@stop
