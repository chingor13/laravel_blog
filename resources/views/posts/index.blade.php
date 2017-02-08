<!doctype html>
<html>
    <head>
        <title>Blog</title>
    </head>
    <body>
        <h1>Blog</h1>

        <ul>
            @foreach ($posts as $post)
                <li>{{ $post->title }}</li>
            @endforeach
        </ul>
    </body>
</html>
