@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div class="card-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                               <p>{{Session::get('message')}}</p>
                            </div>
                        @elseif (Session::has('error'))
                            <div class="alert alert-danger">
                                <p>{{Session::get('error')}}</p>
                            </div>
                        @endif
                        <form action="/upload" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="image" id="">
                            <input type="submit" value="upload">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
