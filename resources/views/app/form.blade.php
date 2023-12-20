


@section('title',isset($task) ? 'Edit Task' : 'Add Task')


@section('content')

<a class="btn btn-sm btn-dark mb-4" href="{{ route('tasks.index')}}"> View Tasks </a>

<div class="container my-3">
  <div class="row justify-content-center">
    <div class="col-lg-9">
      <form  method="POST"
             action="{{ isset($task) ? route('task.update',['task'=>$task->id]) : route('task.store')}}">
        @csrf

        @isset($task)
          @method('PUT')
        @endisset

        <div class="row g-1">
          <div class="col-md-6">
            <label for="title" class="form-label">Title</label>

            <input type="text" 
         
          class="form-control @error('title')
            border-red-500 
          @enderror"
            id="title" name="title"  
            value="{{ $task->title ?? old('title') }}"/>

            @error('title')
              <p class="text-danger mt-2">{{$message}}</p>
            @enderror

          </div>
          <div class="col-md-6">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $task->description ?? old('description') }}" >
            @error('description')
              <p class="text-danger mt-2">{{$message}}</p>
            @enderror
          </div>
       
          <div class="col-12">
            <label for="long_description" class="form-label">Long Description</label>
            <textarea class="form-control" id="long_description" name="long_description" rows="5" >
            {{ $task->long_description ?? old('long_description') }}
            </textarea>
            @error('long_description')
              <p class="text-danger mt-2">{{$message}}</p>
            @enderror
          </div>
          <div class="col-12">
            <div class="row">
              <div class="col-md-6">
                <button  type="submit" class="btn btn-success w-100 mt-2 text-uppercase" >
                    
                @isset($task)
                Update Task
                @else
                Add Task
                @endisset
            
            </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection