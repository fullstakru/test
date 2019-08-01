@extends('layouts.app')

@section('title', 'Сайты')

@section('content')

    <a href="{{ route('websites.create') }}" class="btn btn-warning pull-right">Добавить</a>

    @if(count($websites) > 0)

        <table class="table table-bordered">
            
            <tr>
                <td>Название сайта</td>
                <td>URL-адрес</td>
                <td>Действия</td>
            </tr>

            @foreach($websites as $website)
                <tr>
                    <td>{{ $website->title }}</td>
                    <td><a href="{{ $website->url }}">{{ $website->url }}</a> </td>
                    <td>
                        <form onsubmit="if( confirm('Удалить?') ){ return true }else{ return false }" action="{{ route('websites.destroy', $website->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                        
                            <a class="btn btn-primary" href="{{ url('dashboard/websites/' . $website->id . '/edit') }}">
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

        @if(count($websites) > 0)
            <div class="pagination">
                <?php echo $websites->render();  ?>
            </div>
        @endif

    @else
        <i>Сайты отсутствуют</i>
    @endif

@endsection