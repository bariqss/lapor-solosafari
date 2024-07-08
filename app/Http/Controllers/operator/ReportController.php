<?php

namespace App\Http\Controllers\operator;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Report;
use App\Models\ReportCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::all();

        return view('operator.manajemen-laporan.index', compact('reports'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $report = Report::where('id', $id)->firstOrFail();

        return view('operator.manajemen-laporan.view', compact('report', 'location'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $location = Location::where('id', $id)->firstOrFail();
        $categories = ReportCategory::all();
        $report = Report::where('id', $id)->firstOrFail();

        return view('operator.manajemen-laporan.edit', compact('report', 'categories', 'location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Report::where('id', $id)->update([
            'name' => $request->judul,
            'date' => $request->tanggal,
            'id_category' => $request->kategori,
            'level' => $request->level,
            'id_location' => $request->lokasi,
            'description' => $request->deskripsi,
        ]);

        return redirect(route('manajemen-laporan.index'))->with('success', 'Laporan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Report::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Laporan berhasil dihapus');
    }
}
