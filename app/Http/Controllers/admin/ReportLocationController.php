<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ReportLocation;
use Illuminate\Http\Request;

class ReportLocationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ReportLocation::create([
            'nama_lokasi' => $request->nama_lokasi,
        ]);

        return redirect()->back()->with('success', 'Lokasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ReportLocation $ReportLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReportLocation $id)
    {
        $lokasi = ReportLocation::findOrFail($id);

        return view('admin.manajemen-pelaporan.lokasi.edit', compact('lokasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        ReportLocation::where('id', $id)->update([
            'nama_lokasi' => $request->nama_lokasi,
        ]);

        return redirect(route('admin.manajemen-pelaporan.index'))->with('success', 'Lokasi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        ReportLocation::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Lokasi berhasil dihapus');
    }
}
