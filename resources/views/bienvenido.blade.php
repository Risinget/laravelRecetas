<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
@php
    $variable = 'Texto Escrito en laravel';
    $arrayName = array('xd','BV','pbv');
@endphp

@foreach ($arrayName as $item)
    {{ $item }}
    <br>
@endforeach
{{ $variable }}

</body>
</html>