<form method="POST">
    Ваше имя:<br>
    <input type="text" name="author"/><br>
    Ваш email:<br>
    <input type="text" name="email"/><br>
    Ваше сообщение:<br>
    <textarea name="content"></textarea><br>
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <input type="submit" value="Отправить"/>
</form>

@if(Session::has('message'))
{{Session::get('message')}} <!-- здесь будем выводить сообщения об успешности добавления комментария -->
@endif