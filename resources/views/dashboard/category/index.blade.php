@extends('layouts.app')

@section('title', 'Категории')

@section('content')

    <a href="{{ route('categories.create') }}" class="btn btn-warning pull-right">Добавить</a>

    @if(count($categories) > 0)

        <table class="table table-bordered">

            <tr>
                <td>Заголовок</td>
                <td>Время</td>
                <td>Действия</td>
            </tr>

            @foreach($categories as $cat)
                <tr>
                    <td>{{ $cat->title }}</td>
                    <td>{{ $cat->created_at }}</td>
                    <td>
                        <form onsubmit="if( confirm('Удалить?') ){ return true }else{ return false }" action="{{ route('categories.destroy', $cat->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                        
                            <a class="btn btn-primary" href="{{ url('dashboard/categories/' . $cat->id . '/edit') }}">
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

        @if(count($categories) > 0)
            <div class="pagination">
                <?php echo $categories->render();  ?>
            </div>
        @endif

    @else
        <i>Категории отсутствуют</i>
    @endif

@endsection