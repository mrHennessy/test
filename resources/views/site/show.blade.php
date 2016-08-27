<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Блог</title>
    <meta name="description" value="{{$article->meta_description}}">
    <meta name="keywords" valeu="{{$article->meta_keywords}}">
</head>
<body>
<h2>{{$article->title}}</h2>
<img src="{{ $article->preview }}" height="200" width="200" alt="Картинка"/><br/>
<small>Дата статьи: {{$article->updated_at}}</small>
<div>
    {{$article->content}}
</div>
<div class="comments">
    <ul>
        @foreach($comments as $comment)
        <li>Автор: {{$comment->author}}<br>{{$comment->content}}</li>
        @endforeach
    </ul>
</div>
@if($article->comments_enable==1)
@include('site.comment')
@endif
</body>
</html>