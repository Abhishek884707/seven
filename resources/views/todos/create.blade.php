@extends('todos.layout')

@section('content')

<h1 class="text-2xl border-b pb-4">What next You need TO-DO</h1>
        <x-alert >
            <h1>place to show alert</h1>
        </x-alert>
        <form method="POST" action="/todos/create" class="py-5">
            @csrf
            <input type="text" name="title" id="" class="p-2 border round" placeholder="Title"> <br> <br>


            <textarea name="description" id="description" class="border round p-2" placeholder="Description"></textarea> <br> <br>

            <div id="step-cointainer">
                <h2 class="mb-4 mt-2 step-heading">Add Steps for Task <span class="fas fa-plus cursor-pointer p-3" id="stepbtn"></span></h2>
            </div>

            <script>
                $(document).ready(function(){
                    $('#stepbtn').on('click',function(){
                        // console.log('Yes working');
                        $('#step-container').append('<input type="text" name="title" id="" class="p-2 border round" placeholder="Title"> <br> <br>');
                    });
                });
            </script>
            <input type="submit" value="create" class="p-2 mb-4 border rounded-lg cursor-pointer">
            <hr>
        </form>
        <a href="/todos" class="m-5 py-1 px-1 rounded bg-red-400 text-white border">Back</a>
@endsection
