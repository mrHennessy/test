@extends('admin.main')
@section('content')
<form method="POST" action="{{action('CategoriesController@store')}}"/>
Название категории<br>
<input type="text" name="title"/><br>
<input type="hidden" name="_token" value="{{csrf_token()}}"/>
<input type="submit" value="Сохранить">
@if(Session::has('message'))
{{Session::get('message')}}
@endif
</form>
@endsection