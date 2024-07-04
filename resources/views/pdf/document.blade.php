<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style type="text/css">
    @font-face {
        font-family: 'Sarabun';
        src: url('{{ storage_path('fonts/Sarabun/Sarabun-Regular.ttf') }}') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'Sarabun';
        src: url('{{ storage_path('fonts/Sarabun/Sarabun-Bold.ttf') }}') format('truetype');
        font-weight: bold;
        font-style: normal;
    }
   

</style>
<head>
    <title>{{ $title }}</title>
</head>
<body>
<h1>{{ $title }}</h1>
<p>{{ $content }}</p>
</body>
</html>
