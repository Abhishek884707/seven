@extends('todos.layout')

@section('content')
    <div class="flex justify-between border-b pb-4 px-4">
        <h1 class="text-2xl">All your Todos</h1>
        <a href="/todos/create" class="mx-5 py-2 text-blue-400"><span class="fas fa-plus-circle"></span></a>
    </div>
    <x-alert />
    <ul style="" class="my-5">
        @forelse ($todos as $todo)
                <li class="flex justify-between py-2 px-2">
                    <div>
                        @include('todos.complete-button')
                    </div>
                    @if ($todo->completed)
                        {{-- <span class="far fa-trash"></span> --}}
                        <p class="line-through">{{$todo->title}}</p>
                    @else
                        {{-- <span class="far fa-trash"></span> --}}
                        <a class="cursor-pointer " href="{{route('todo.show' ,[$todo->id])}}" >{{$todo->title}}</a>
                    @endif
                    <div>
                        <a href="{{'/todos/'.$todo->id.'/edit'}}" class=" py-1 px-1 text-white text-pink-400"><span class="far fa-edit"></span></a>

                        <span class="fas fa-trash text-red-500  px-2 cursor-pointer" onclick="event.preventDefault();
                        if(confirm('Do You really Want to Delete ' + '{{$todo->title}}')){
                            document.getElementById('delete-{{$todo->id}}').submit();
                        }">
                            <form action="{{route('todo.delete',['delete'=>$todo->id])}}" style="display: hidden;" method="post" id="delete-{{$todo->id}}">
                                @csrf
                                @method('put')
                            </form>

                        </span>
                    </div>
                </li>
                @empty
                    <p>No task available, Create One</p>
        @endforelse
    </ul>
@endsection
