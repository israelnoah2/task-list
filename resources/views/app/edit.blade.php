@extends('layouts.app')
@section('content')
@include('app.form',['task' => $task])
@endsection
