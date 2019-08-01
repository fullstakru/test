@extends('layouts.app')

@section('title', 'Добавление сайта')

@section('content')

    @if(session('error')!='')
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('websites.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('dashboard.website._form')
    </form>
 
@endsection