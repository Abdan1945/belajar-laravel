<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Nama : {{ $nama }} <br>
    Nilai : {{ $nilai }} <br>
    Grading :
    @if($nilai > 90)
        A
    @elseif($nilai > 80)
        B
    @elseif($nilai > 70 )
        C
    @elseif($nilai > 60 )
        D
    @elseif($nilai > 60)
        E
</body>
</html>