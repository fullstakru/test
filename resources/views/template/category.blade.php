@extends('layouts.app')

@section('title', $category->title)

@section('content')
 
    @if(count($articles) > 0)

        @foreach($articles as $article)
            <div class="row">
                <div class="col-md-12">

                    @if(!empty($article->image))
                        <img src="{{ $article->image  }}" class="pull-left img-responsive thumb margin10 img-thumbnail" width="200" />
                    @endif

                    <h4>
                        <a href="{{ url('article-details/' . $article->id) }}">{{ $article->title }}</a>
                    </h4>
                    
                    <span class="label label-info">{{$article->category->title}}</span>

                    @if(!empty($article->excerpt))
                        <article>
                            <p>{!! $article->excerpt !!}</p>
                        </article>
                    @endif

                    <em>Источник: </em><a class="label label-danger" href="{{ $article->source_link }}" target="_blank">{{ $article->website->title }}</a>
                    <a class="btn btn-warning pull-right" href="{{ url('article-details/' . $article->id) }}">Читать полностью</a>
                </div>
            </div>
            <hr/>
        @endforeach

            @if(count($articles) > 0)
                <div class="pagination">
                    <?php echo $articles->render();  ?>
                </div>
            @endif

    @else
        <i>В этой категории статьи отсутствуют</i>
    @endif
 
@endsection