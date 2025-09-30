<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center> <h1>{{$resto}} </h1> </center>
    @foreach ($data as $makanan)
        Nama Makanan: {{$makanan ['nama_makanan']}} <br>
        Harga Makanan: {{$makanan ['harga']}} <br>
        jumlah Makanan: {{$makanan ['jumlah']}} <br>
        @php $total = $makanan['jumlah'] * $makanan['harga']; @endphp
        Total Harga: {{$total}} 
        @if ($total > 50000)
        keterangan: get diskon 10%
        @elseif ($total > 30000)
        keterangan: get diskon 5%
        @else
        keterangan: tidak dapat diskon
        @endif
        <hr>

        @endforeach
</body>
</html>