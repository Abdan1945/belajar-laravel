<?php
namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('pelanggan')->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        // 🔹 ambil semua pelanggan untuk dropdown
        $pelanggans = Pelanggan::all();
        $transaksi = Transaksi::all();
        return view('transaksi.create', compact('pelanggans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_transaksi' => 'required|unique:transaksis,kode_transaksi|max:20',
            'tanggal'        => 'required|date',
            'pelanggan_id'   => 'required|exists:pelanggans,id',
            'total_harga'    => 'required|numeric|min:0',
        ]);

        Transaksi::create($validated);

        $pelanggans->transaksi()->attach($request->transaksi);
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function show(Transaksi $transaksi)
    {
        return view('transaksi.show', compact('transaksi'));
    }

    public function edit(Transaksi $transaksi)
    {
        $pelanggans = Pelanggan::all();
        return view('transaksi.edit', compact('transaksi', 'pelanggans'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $validated = $request->validate([
            'kode_transaksi' => 'required|max:20|unique:transaksis,kode_transaksi,' . $transaksi->id,
            'tanggal'        => 'required|date',
            'pelanggan_id'   => 'required|exists:pelanggans,id',
            'total_harga'    => 'required|numeric|min:0',
        ]);

        $transaksi->update($validated);

        $transaksi->pelanggan()->sync($request->pelanggan);
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}
