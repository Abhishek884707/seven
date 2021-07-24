<div>
    @if (Session::has('message'))
    {{$slot}}
    <div class="py-2 px-4 bg-green-300">{{Session::get('message')}}</div>
    @elseif (Session::has('error'))
    {{$slot}}
        <div class="py-2 px-4 bg-red-300">{{Session::get('error')}}</div>
    @endif

    @if ($errors->any())
        <div class="py-2 px-4 bg-red-300">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
