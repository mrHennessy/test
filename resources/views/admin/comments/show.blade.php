@extends('admin.main')
@section('content')
<table>
    <tr>
        <td>Автор</td>
        <td>Email</td>
        <td>Комментарий</td>
        <td>Дата</td>
        <td>Статус</td>
        <td>Действие</td>
    </tr>
    @foreach($comments as $comment)
    <tr>
        <td>{{$comment->author}}</td>
        <td>{{$comment->email}}</td>
        <td>{{$comment->content}}</td>
        <td>{{$comment->created_at}}</td>
        <td>{{$comment->public}}</td>
        <td><a href="{{action('CommentsController@delete',['id'=>$comment->id])}}">Удалить</a>
            <a href="{{action('CommentsController@published',['id'=>$comment->id])}}">Опубликовать</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection