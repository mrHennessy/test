@extends('admin.main')
@section('content')
<form method="POST" action="{{action('CategoriesController@update',['categories'=>$category->id])}}"/>
Название категории<br>
<input type="text" name="title" value="{{$category->title}}"/><br>
<input type="hidden" name="_method" value="put"/>
<input type="hidden" name="_token" value="{{csrf_token()}}"/>
<input type="submit" value="Сохранить">
@if(Session::has('message'))
{{Session::get('message')}}
@endif
</form>
@endsection