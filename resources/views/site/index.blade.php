<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Блог</title>
</head>
<body>
@foreach($articles as $article)
<h2><a href="{{action('FrontController@show',['id'=>$article->id])}}">{{$article->title}}</a></h2>
<small>Дата статьи: {{$article->updated_at}}</small><br/>
<div>
    <img src="{{$article->preview}}" height="200" width="200"><br/>
    {{str_limit($article->content, 150)}} //str_limit - это еще один хелпер Laravel, который обрезает строку до указанного знака и в конце добавляем три точки
</div>
@endforeach
</body>
</html>