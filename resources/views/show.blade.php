@extends('layouts.app')

@section('title',$task->title)

@section('style')
    <style>
        .second-nav{
        display: flex;
        flex-direction:column;
        gap:1rem;
        }
    </style>
@endsection

@section('content')
<!-- <h1>{{ $task->title }}</h1> -->
<a class="text-blue-700" href="{{ route('tasks.index') }}" ><- Go Back to the task list</a >


<p class="mb-4 mt-4 text-slate-700">{{ $task->description }}</p>
 
@if($task->long_description)
    <p>{{ $task->long_description }}</p>
@else
    <p> there is no long description </p>
@endif

<p class="mb-4 mt-4 text-sm text-slate-500"> Created {{ $task->created_at->diffForHumans() }} . Updated {{ $task->updated_at->diffForHumans() }}</p>

<p class="mb-4">
    @if($task->completed)
        <span class="font-medium text-green-500">completed</span>
    @else
        <span class="font-medium text-red-500">not completed</span>
    @endif 
</p>
<div class="second-nav">
    <div class="btn">
        <a href="{{ route('tasks.edit',['task' => $task->id]) }}" >Edit</a >
    </div>

    <div class="btn">
        <form action="{{ route('tasks.toggle-complete',['task' => $task->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit">
                Mark as {{ $task->completed ? 'not complted' : 'completed' }}
            </button>
        </form>
    </div>
    <div class="btn">
        <form action="{{ route('tasks.destroy',['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button  type="submit">Delete</button>
        </form>
    </div>
</div>
@endsection