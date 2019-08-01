@extends('layouts.app')

@section('title', 'Добавление ссылки')

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

    <form method="post" action="{{ route('links.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        
        @include('dashboard.link._form')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Сайт:</strong>
                    <select name="website_id" class="form-control">

                        <option value="">Выбрать</option>
                        
                        @foreach($websites as $website)
                            <option value="{{ $website->id }}">{{ $website->title }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Категория:</strong>
                    <select name="category_id" class="form-control">
                        
                        <option value="">Выбрать</option>

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
        </div>

        @include('layouts._button')

    </form>
 
@endsection