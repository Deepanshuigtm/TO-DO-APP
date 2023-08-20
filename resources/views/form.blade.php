@extends('layouts.app')

@section('title',isset($task) ? 'Edit Task' : 'Add Tasks')


@section('content')
    <!-- {{ $errors }} -->
    <form method="POST" action="{{ isset($task) ? route('tasks.update',['task' => $task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-4">
            <label for="title"> title</label>
            <input @class(['border-red-500'=> $errors->has('title')]) text="text" name="title" id="title" value="{{ $task->title ?? old('title') }}" />
            @error('title')
                <p class="error" >{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description"> Description </label>
            <textarea @class(['border-red-500'=> $errors->has('title')]) name="description" id="title" rows="5">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="error" >{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="long_description"> Long Description </label>
            <textarea @class(['border-red-500'=> $errors->has('title')]) name="long_description" id="title" rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="error" >{{ $message }}</p>
            @enderror
        </div>
        <button class="btn" type="submit">
            @isset($task)
                Update Task
            @else
                Add Task
            @endisset
        </button>
        <a style="margin-left:1rem;" href="{{ route('tasks.index') }}"> Cancel</a>
    </form>
@endsection
