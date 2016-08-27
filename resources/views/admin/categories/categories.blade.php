@extends('admin.main')
@section('content')
<table>
    <tr>
        <td>id</td>
        <td>Название</td>
        <td>Действие</td>
        <td>Действие</td>
    </tr>
    @foreach ($categories as $category)
    <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->title}} </td>
        <td><a href="{{action('CategoriesController@edit',['categories'=>$category->id])}}">Изменить</a></td>
        <td>
            <form method="POST" action="{{action('CategoriesController@destroy',['categories'=>$category->id])}}">
                <input type="hidden" name="_method" value="delete"/>
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <input type="submit" value="Удалить"/>
            </form>
        </td>
    </tr>
    @endforeach

    </table>
    </ul>
    @stop