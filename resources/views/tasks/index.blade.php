@extends('layouts.app')

<style>
    .task-box {
        border: 1px solid #0d6efd;
        border-radius: 12px;
        padding: 12px;
        margin: 12px 0;
        overflow: hidden;
        max-width: 100%;
        word-wrap: break-word;   
        white-space: normal;   
    }

    .task-box p {
        margin: 0;
        overflow: hidden;
        word-wrap: break-word;  
        white-space: normal;   
    }

    input[type="text"] {
        width: 100%;
        border-radius: 8px;
        border: 1px solid #0d6efd;
        padding: 8px;
    }
</style>

@section('content')

<div class="container text-center">
<h1 class="mb-4">My To-Do</h1>

    <div class="d-flex justify-content-center gap-4">
        {{-- To Start Section --}}
        <div class="w-25">
            <h3 class="bg-secondary text-dark fw-semibold p-3 rounded-3">To Start</h3>
            @foreach($tasks->where('status', 'to_start') as $task)
                <div class="task-box">
                    <p>{{ $task->content }}</p>
                    <div class="d-flex justify-content-center gap-2 mt-2">
                        <form action="{{ route('task.update', $task->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="to_progress">
                            <button type="submit" class="btn btn-sm btn-warning">In Progress</button>
                        </form>
                        <form action="{{ route('task.delete', $task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
            
            <form action="{{ route('task.add') }}" method="POST" class="mt-3">
                @csrf
                <input type="text" name="content" class="form-control border-primary rounded-3" placeholder="Type something here..." required>
                <button type="submit" class="btn btn-primary mt-2 w-100">Add Task</button>
            </form>
        </div>

        {{-- To Progress Section --}}
        <div class="w-25">
            <h3 class="bg-secondary text-dark fw-semibold p-3 rounded-3">To Progress</h3>
            @foreach($tasks->where('status', 'to_progress') as $task)
                <div class="task-box">
                    <p>{{ $task->content }}</p>
                    <div class="d-flex justify-content-center gap-2 mt-2">
                        <form action="{{ route('task.update', $task->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="completed">
                            <button type="submit" class="btn btn-sm btn-success">Complete</button>
                        </form>
                        <form action="{{ route('task.delete', $task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Completed Section --}}
        <div class="w-25">
            <h3 class="bg-secondary text-dark fw-semibold p-3 rounded-3">Completed</h3>
            @foreach($tasks->where('status', 'completed') as $task) 
                <div class="task-box">
                    <p>{{ $task->content }}</p>
                    <div class="d-flex justify-content-center gap-2 mt-2">
                        <form action="{{ route('task.delete', $task->id) }}" method="POST">
                            @csrf
                           @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
