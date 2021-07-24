
@extends('todos.layout')

@section('content')

<h1 class="text-2xl border-b pb-4">{{$todo->title}}</h1>

    <div>
        <h2 class="text-1xl mb-4">{{$todo->description}}</h2>
        
    </div>
        <a href="/todos" class="m-4 py-1 px-1 rounded bg-red-400 text-white border">Back</a>
@endsection
