@extends('admin.main')
@section('content')
<table>
    <tr>
        <td>id</td>
        <td>Миниатюра</td>
        <td>Название</td>
        <td>Действие</td>
        <td>Действие</td>
    </tr>
    @foreach ($articles as $article)
    <tr>
        <td>{{$article->id}}</td>
        <td><img width=20 height=20 src="{{$article->preview}}"></td>
        <td>{{$article->title}}</td>
        <td> <a href="{{action('ArticlesController@edit',['articles'=>$article->id])}}">Изменить</a></td>
        <td> <form method="POST" action="{{action('ArticlesController@destroy',['articles'=>$article->id])}}">
                <input type="hidden" name="_method" value="delete"/>
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <input type="submit" value="Удалить"/>
            </form>
        </td>
    </tr>
    @endforeach
    </ul>
    </table>
    @if(Session::has('message'))
    {{Session::get('message')}}
    @endif
    @endsection