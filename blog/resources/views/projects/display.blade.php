@extends('template')
@section('content')
<div class="container">
<div class="jumbotron">
    <h2>Project Details</h2>
    <h4 class="text-primary">{{ $project->title }}</h4>
    <p class="text-secondary">
        {{ $project->description }}
    </p>
    <div>
        <a class="btn btn-success" href="/projects/{{ $project->id }}/edit">Edit project</a>
    </div>
</div>
<div class="jumbotron">
    <h2>Tasks Details</h2>
    <ul>
    	@foreach($project->tasks as $task)
    	    <li>{{ $task->body }}</li>
    	@endforeach
    </ul>
</div>
</div>

@endsection('content')
