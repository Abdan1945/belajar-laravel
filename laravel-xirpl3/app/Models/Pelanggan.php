<?php
        namespace App\Models;

        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;

        class Pelanggan extends Model
        {
            use HasFactory;

            protected $table = 'pelanggans'; // atau 'pelanggan' sesuai nama tabel kamu

            // Tambahkan semua kolom yang bisa diisi
            protected $fillable = [
                'nama',
                'alamat',
                'no_hp',
        ];
    }