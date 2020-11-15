@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <?php /** @var \App\Models\Article[] $articles */ ?>
                @foreach($articles as $article)
                    <div class="title">
                        <a href="{{ $article->path() }}"><h2>{{ $article->title }}</h2></a>
                        <p><img src="/images/banner.jpg" alt="" class="image image-full"/></p>
                        <p>{{ $article->excerpt }}</p>
                    </div>
                @endforeach
            </div>
        </div>
@endsection