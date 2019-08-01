@extends('layouts.app')

@section('title', 'Ссылки')

@section('content')

    <div class="alert alert-success" style="display: none"></div>
    <a href="{{ route('links.create') }}" class="btn btn-warning pull-right">Добавить</a>

    @if(count($links) > 0)

        <table class="table table-bordered">

            <tr>
                <td>URL-адрес</td>
                <td>Фильтер</td>
                <td>Сайт</td>
                <td>Категория</td>
                <td><strong>Схема</strong></td>
                <td><strong>Парсер</strong></td>
                <td>Действия</td>
            </tr>

            @foreach($links as $link)
                <tr data-id="{{ $link->id }}">
                	
                    <td>{{ $link->url }}</td>
                    <td>{{ $link->main_filter_selector }}</td>
                    <td>{{ $link->website->title }}</td>

                    <td>
                    	<strong>
                    		<span class="label label-info">{{ $link->category->title }}</span>
                    	</strong>
                    </td>

                    <td>
                        <select class="item_schema" data-id="{{ $link->id }}" data-original-schema="{{$link->item_schema_id}}">
                            <option value="" disabled selected>Выбрать</option>

                            @foreach($itemSchemas as $item)
                                <option value="{{$item->id}}" {{ $item->id==$link->item_schema_id?"selected":"" }}>{{$item->title}}</option>
                            @endforeach

                        </select>

                        <button type="button" class="btn btn-info btn-sm btn-apply" style="display: none">Сохранить</button>
                    </td>

                    <td>
                        @if($link->item_schema_id != "" && $link->main_filter_selector != "")
                            <button type="button" class="btn btn-primary btn-scrape" title="pull the latest items">Парсить <i class="glyphicon glyphicon-repeat fast-right-spinner" style="display: none"></i></button>
                        @else
                            <span style="color: red">Сначала заполните фильтер схемы</span>
                        @endif
                    </td>

                    <td>
                        <form onsubmit="if( confirm('Удалить?') ){ return true }else{ return false }" action="{{ route('links.destroy', $link->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                        
                            <a class="btn btn-primary" href="{{ url('dashboard/links/' . $link->id . '/edit') }}">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>

                            <button type="submit" class="btn btn-danger">
                                <i class="glyphicon glyphicon-trash"></i>
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach

        </table>

        @if(count($links) > 0)
            <div class="pagination">
                <?php echo $links->render();  ?>
            </div>
        @endif

    @else
        <i>Ссылки отсутствуют</i>
    @endif
 
@endsection
 
@section('script')
	@include('dashboard.link._ajax')
@endsection