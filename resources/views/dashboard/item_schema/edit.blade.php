@extends('layouts.app')

@section('title', 'Редактирование схемы #' . $itemSchema->id)

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

    <form method="post" action="{{ route('item-schema.update', ['id' => $itemSchema->id]) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field("PUT") }}

        @include('dashboard.item_schema._form')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Полный или относительный URL-адрес:</strong>
                    <input type="checkbox" name="is_full_url" value="1" {{ $itemSchema->is_full_url?"checked":"" }} />
                </div>
            </div>
        </div>

        @include('layouts._button')

    </form>

@endsection