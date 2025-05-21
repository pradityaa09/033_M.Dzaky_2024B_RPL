<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
{
    $barangs = Barang::all();
    return view('barang.index', compact('barangs'));
}

public function create()
{
    return view('barang.create');
}

public function store(Request $request)
{
    Barang::create($request->all());
    return redirect()->route('barang.index')->with('success', 'Data berhasil ditambah!');
}

public function edit($id)
{
    $barang = Barang::findOrFail($id);
    return view('barang.edit', compact('barang'));
}

public function update(Request $request, $id)
{
    $barang = Barang::findOrFail($id);
    $barang->update($request->all());
    return redirect()->route('barang.index')->with('success', 'Data berhasil diupdate!');
}

public function destroy($id)
{
    $barang = Barang::findOrFail($id);
    $barang->delete();
    return redirect()->route('barang.index')->with('success', 'Data berhasil dihapus!');
}
}
