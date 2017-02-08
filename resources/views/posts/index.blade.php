@extends('layouts.master')

@section ('content')

<div class="blog-header">
  <div class="container">
    <h1 class="blog-title">The Bootstrap Blog</h1>
    <p class="lead blog-description">An example blog template built with Bootstrap.</p>
  </div>
</div>


<div class="container">

  <div class="row">

    <div class="col-sm-8 blog-main">

        @foreach ($posts as $post)
            <div class="blog-post">
                <h2 class="blog-post-title">{{ $post->title }}</h2>
                <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>
                {{ $post->body }}
            </div>
        @endforeach
    </div>

    <div class="col-sm-3 offset-sm-1 blog-sidebar">
        @include('posts.sidebar')
    </div><!-- /.blog-sidebar -->
  </div>
</div>

@endsection
