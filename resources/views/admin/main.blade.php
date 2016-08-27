<!DOCTYPE html>
<html>
<head>
    <meta charaset="utf-8"/>
    <title>Админка</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <script src="{{asset('js/jquery-3.1.0.min.js')}}"></script>
    <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({
            selector: '#editor'
        });
    </script>
</head>
<body>
<div id="header">
    <h1>Админка</h1>
    <div id="content">@yield('content')</div>
</body>
</html>