@extends('layouts.app')
@section('title','The List of Tasks')

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="font-medium text-blue-700" >Add task</a >
    </nav>
@forelse($tasks as $task)
        <div>
            <a href="{{ route('tasks.show',['task' => $task->id]) }}" 
            @class(['line-through' => $task->completed])> {{ $task->title }} </a>
        </div>
    @empty
        <div>there are no tasks</div>
    @endforelse

@if ($tasks->count())
    <nav class="mt-4">
    {{ $tasks->links() }}
    </nav>
@endif

@endsection