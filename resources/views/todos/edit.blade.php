@extends('todos.layout')

@section('content')
    <h1 class="border-b pb-4" style="font-size: 1.6rem;">Update this Todo list</h1>
    <x-alert />
    <form method="POST" action="{{route('todo.update',['id'=>$todo->id])}}" class="py-5">
        @method('patch')
        @csrf
        <input type="text" name="title" id="" value="{{$todo->title}}" class="p-2 border round"> <br> <br>

        <textarea name="description" id="description" class="border round p-2" placeholder="Description">{{$todo->description}}</textarea> <br> <br>

        <input type="submit" value="Update" class="p-2 mb-4 border rounded-lg cursor-pointer">

        <hr>
    </form>
    <a href="/todos" class="m-5 py-1 px-1 rounded bg-red-400 text-white border">Back</a>
@endsection
