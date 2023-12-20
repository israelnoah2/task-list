@extends('layouts.app')

<a href="{{ route('task.create') }}" class="btn btn-sm btn-dark mb-4">
  Add Task
</a>

@section('title','List Of Tasks')

@section('content')



@forelse ($tasks as $task )
<li>

<a href="{{ route('task.show',['task' => $task->id]) }}" @class(['line-through' => $task->completed]) >
    {{ $task->title }} 
</a>

</li>

@empty
    <div> <p> No Tasks </p> </div>
@endforelse

@if($tasks->count())
<div class="mt-3">
  {{ $tasks->links() }}
</div>
@endif

@endsection