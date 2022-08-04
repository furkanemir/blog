
@extends('front.layouts.master')
@section('title')
    Anasayfa
@endsection
@section('content')
    <div class="col-md-9">
        <!-- Post preview-->
    @foreach($data['articles'] as $article)
        <div class="post-preview">
            <a href="{{route('single', [$article->slug])}}">
                <h2 class="post-title">{{$article->title}}</h2>
              <img src="{{$article->image}}" />
                <h3 class="post-subtitle">{!! ($article->content) !!}</h3>
            </a>
            <p class="post-meta">

                <a href="#!">{{$article->getCategory->name}}</a>
                {{$article->created_at}}
            </p>
        </div>
    @endforeach
        {{$data['articles']->links('pagination::bootstrap-4')}}
        <!-- Divider-->
        <hr class="my-4" />
        <!-- Pager-->
        <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
    </div>

      @include('front.widgets.categoryWidget')

@endsection
