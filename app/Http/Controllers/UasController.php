<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Uas;

class UasController extends Controller
{
    public function index()
    {
        $uasList = Uas::all();
        return view('uas.index', compact('uasList'));
    }

    public function create()
    {
        return view('uas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required|unique:uas,npm',
            'nama' => 'required',
            'alamat' => 'nullable',
        ]);

        Uas::create([
            'npm' => $request->npm,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('uas.index')
            ->with('success', 'Data UAS berhasil ditambahkan.');
    }

    public function show(Uas $uas)
    {
        return view('uas.show', compact('uas'));
    }

    public function edit(Uas $uas)
    {
        return view('uas.edit', compact('uas'));
    }

    public function update(Request $request, Uas $uas)
    {
        $request->validate([
            'npm' => 'required|unique:uas,npm,' . $uas->id,
            'nama' => 'required',
            'alamat' => 'nullable',
        ]);

        $uas->update([
            'npm' => $request->npm,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('uas.index')
            ->with('success', 'Data UAS berhasil diperbarui.');
    }

    public function destroy(Uas $uas)
    {
        $uas->delete();
        return redirect()->route('uas.index')
            ->with('success', 'Data UAS berhasil dihapus.');
    }
}
