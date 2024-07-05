@extends('layout')
@section('title', 'Edit task - '.$task->title)
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Edit task - {{$task->title}}</h5>
                <form action="{{route('tasks.update', $task->id)}}" method="POST">
                    @csrf @method('PUT')
                    <div class="card-body">

                        @include('notifications.alert-all')

                        <div class="d-flex">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title*</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{old('title', $task->title)}}"/>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description*</label>
                                    <textarea class="form-control" name="description" id="description" placeholder="Description" rows="3">{{old('description', $task->description)}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="priority" class="form-label">Priority</label>
                                    <select class="form-select" name="priority_id" id="priority" aria-label="Default select example" required>
                                        @foreach($priorities as $priority)
                                            <option value="{{$priority->id}}" @if(old('priority_id', $task->priority_id) == $priority->id) selected @endif>{{$priority->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="completed" class="form-label">Completed</label>
                                    <select class="form-select" name="completed" id="completed" aria-label="Default select example" required>
                                        <option value="0" @if(is_null(old('completed')) || old('completed', $task->completed) == 0) selected @endif>Active</option>
                                        <option value="1" @if(old('completed', $task->completed) == 1) selected @endif>Closed</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark">Save</button>
                    </div>
                </form>
            </div>
        </div>
@endsection
