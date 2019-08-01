@extends('layouts.app')

@section('title', 'Схемы')

@section('content')

    <a href="{{ route('item-schema.create') }}" class="btn btn-warning pull-right">Добавить</a>

    @if(count($itemSchemas) > 0)

        <table class="table table-bordered">

            <tr>
                <td>Название парсера</td>
                <td>Фильтер парсера</td>
                <td>Полный URL-адрес</td>
                <td>Селектор контента</td>
                <td>Действия</td>
            </tr>

            @foreach($itemSchemas as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->css_expression }}</td>
                    <td>{{ $item->is_full_url==1?"Да":"Нет" }}</td>
                    <td>{{ $item->full_content_selector }}</td>

                    <td>
                        <form onsubmit="if( confirm('Удалить?') ){ return true }else{ return false }" action="{{ route('item-schema.destroy', $item->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                        
                            <a class="btn btn-primary" href="{{ url('dashboard/item-schema/' . $item->id . '/edit') }}">
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

        @if(count($itemSchemas) > 0)
            <div class="pagination">
                <?php echo $itemSchemas->render();  ?>
            </div>
        @endif

    @else
        <i>Схемы отсутствуют</i>
    @endif

@endsection