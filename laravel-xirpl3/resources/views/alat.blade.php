<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center> <h1>{{$alat}} </h1> 
    @foreach ($data as $value)
    <table border="1">
       <tr> <td>Nama barang: {{$value ['nama_barang']}} </td></tr>
        <tr> <td>Harga barang: {{$value ['harga']}} </td></tr>
        <tr> <td>jumlah barang: {{$value ['jumlah']}} </td></tr>
        @php $total = $value['jumlah'] * $value['harga']; @endphp
        <tr> <td>Subtotal: {{$total}} </td><br></tr>
        <footer>@if ($total > 150000)
        <tr> <td> keterangan: get diskon 5% </tr></td>
       <tr> @else
        <td>keterangan: tidak dapat diskon</td></tr>
        @endif
        </footer>

        @endforeach
    </table></center>
</body>
</html>