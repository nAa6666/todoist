@extends('layout')
@section('title', 'Task - '.$task->title)
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between flex-wrap">
                <h5>Task - {{$task->title}}</h5>
                <div class="d-flex align-items-center">
                    <a class="btn btn-primary me-2 d-block" href="{{route('tasks.edit', $task->id)}}">Edit</a>
                    <form action="{{route('tasks.destroy', $task->id)}}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>

            <div class="card-body">
                @include('notifications.alert-all')
                <p class="m-0">ID: {{$task->id}}</p>
                <p class="m-0">Create/Update: <span class="badge bg-warning">{{sprintf('%s / %s', $task->created_at, $task->updated_at)}}</span></p>
                <p class="m-0">Completed: <span class="badge bg-{{!$task->completed ? 'success' : 'danger'}}">{{!$task->completed ? 'Active' : 'Closed'}}</span></p>
                <p class="m-0">Priority: {{$task->priority?->name}}</p>
                <p class="m-0">Name: {{$task->title}}</p>
                <p class="m-0">Description: {{$task->description}}</p>
            </div>
        </div>
    </div>
@endsection
