@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">My To-Do</h1>

    <div class="row text-center mb-3">
        <div class="col"><h3>To Start</h3></div>
        <div class="col"><h3>To Progress</h3></div>
        <div class="col"><h3>Completed</h3></div>
    </div>

    <div class="row">
        @foreach(['toStartTasks', 'inProgressTasks', 'completedTasks'] as $section)
            <div class="col border p-3 rounded mx-2">
                @foreach($$section as $task)
                    <div class="d-flex justify-content-between align-items-center border rounded p-2 mb-2">
                        <span>{{ $task->content }}</span>
                        <form action="{{ route('task.delete', $task->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

    <div class="mt-4 text-center">
        <form action="{{ route('task.add') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
            <input type="text" name="title" class="form-control" placeholder="Type something here..." required>
            <button class="btn btn-primary" type="submit">Add</button>
            </div>
        </form>
    </div>
</div>
@endsection
