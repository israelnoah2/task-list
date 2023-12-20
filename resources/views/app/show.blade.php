@extends('layouts.app')

<div> <a href="{{route('tasks.index')}}" class="btn btn-sm btn-dark mb-4"> Back </a> </div>

@section('title',$task->title)

@section('content')

<div>
<p> {{ $task->description }} </p>
<p> {{ $task->long_description ?? ' '}} </p>

<div class="d-flex text-secondary align-items-center">
    <p> <small> Created at : {{ $task->created_at->diffForHumans() }} </small> </p> 
    <p> &nbsp; . &nbsp; </p>
    <p> <small> Updated at : {{ $task->updated_at->diffForHumans() }} </small> </p>
</div>

<div>
    <form action="{{route('task.complete',['task' => $task->id])}}" method="POST">
     @csrf
     @method('PUT')
     <button type="submit" class="btn btn-sm btn-warning mx-2">{{$task->completed ? 'Completed' : 'Not Completed'}}</button>
    </form>

    <a href="{{route('task.edit',['task' => $task->id])}}" class="btn btn-sm btn-info mx-2 mb-2">Edit</a>

    <form action="{{route('task.delete',['task' => $task->id])}}" method="POST">
     @csrf
     @method('DELETE')
     <button type="submit" class="btn btn-sm btn-danger mx-2">Delete</button>
    </form>
    <!-- <a href="{{route('task.delete',['task' => $task->id])}}" class="btn btn-sm btn-danger mx-2">Delete</a> -->
</div>



</div>

@endsection