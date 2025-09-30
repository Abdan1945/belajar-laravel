<!DOCTYPE html>
<html>
<head>
    <title>Rata-rata Nilai Kelas</title>
</head>
<body>
    <h2>Daftar Nilai Siswa</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Nama</th>
            <th>Nilai</th>
        </tr>
        @php 
            $total = 0; 
            $jumlah = count($siswa);
        @endphp
        @foreach ($siswa as $s)
            <tr>
                <td>{{ $s['nama'] }}</td>
                <td>{{ $s['nilai'] }}</td>
            </tr>
            @php $total += $s['nilai']; @endphp
        @endforeach
    </table>

    @php $rata = $total / $jumlah; @endphp

    <p><strong>Rata-rata Nilai: {{ number_format($rata, 2) }}</strong></p>
    <p>Status Kelas: 
        @if ($rata >= 75)
            Lulus
        @else
            Remedial
        @endif
    </p>
</body>
</html>
