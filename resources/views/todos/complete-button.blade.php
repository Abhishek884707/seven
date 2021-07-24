<div class="">
    @if ($todo->completed)
        <span onclick="event.preventDefault; console.log('Hello Dude'); document.getElementById('checkunhide-{{$todo->id}}').submit();" class="far fa-check-circle px-2 text-green-400 cursor-pointer">
            <form style="display: hidden;" action="{{route('todo.incompleted',['incomplete'=>$todo->id])}}" id="checkunhide-{{$todo->id}}" method="post">
            @csrf
            @method('put')
            </form>
        </span>
    @else
        <span onclick="event.preventDefault(); console.log('Hello'); document.getElementById('checkHide-{{$todo->id}}').submit();" class="far fa-check-circle px-2 text-gray-400 cursor-pointer">
            <form style="display: hidden;" action="{{route('todo.completed',['complete'=>$todo->id])}}" method="post" id="checkHide-{{$todo->id}}">
                @csrf
                @method('put')
            </form>
        </span>
    @endif
</div>
