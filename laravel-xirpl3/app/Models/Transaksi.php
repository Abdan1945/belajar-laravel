<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'id_pelanggan',
        'id_produk',
        'jumlah',
        'total_harga'
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'detail_transaksi', 'id_transaksi','id_produk')
            ->withPivot('jumlah','sub_total')
            ->withTimestamps();
    }
}
