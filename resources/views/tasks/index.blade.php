@extends('layout')
@section('title', 'Tasks')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap">
            <h3 class="m-0">Tasks</h3>
            <a class="btn btn-primary" href="{{route('tasks.create')}}">Create</a>
        </div>

        <div class="card-body">
            @include('notifications.alert-all')
            @if($tasks->count() < 1)
                <p class="m-0">Empty</p>
            @else
                <h5>Filter</h5>
                <div class="filters">
                    <form action="{{route('tasks.index')}}" method="GET">
                        <div class="row align-items-center">
                            @foreach($priorities as $priority)
                                <div class="col-md-1">
                                    <div class="form-check">
                                        <input @if($priority->id == request()->priority) checked @endif name="priority" class="form-check-input" type="radio" value="{{$priority->id}}" id="flexCheck{{$priority->id}}">
                                        <label class="form-check-label" for="flexCheck{{$priority->id}}">{{$priority->name}}</label>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary mt-2">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
        </div>

        @if($tasks->count() > 0)
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Priority</th>
                        <th>Completed</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{$task->id}}</td>
                            <td><a class="text-decoration-none" href="{{route('tasks.show', $task->id)}}">{{$task->title}}</a></td>
                            <td>{{\Illuminate\Support\Str::limit($task->description, 50)}}</td>
                            <td>{{$task->priority?->name}}</td>
                            <td><span class="badge bg-{{!$task->completed ? 'success' : 'danger'}}">{{!$task->completed ? 'Active' : 'Closed'}}</span></td>
                            <td>
                                <form action="{{route('tasks.destroy', $task->id)}}" method="POST">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{route('tasks.edit', $task->id)}}" class="btn btn-outline-secondary">Edit</a>
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-outline-secondary">Delete</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if($tasks->hasPages())
                <div class="card-body">
                    {!! $tasks->links() !!}
                </div>
            @endif
        @endif
    </div>
</div>
@endsection
