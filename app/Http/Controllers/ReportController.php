<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Report;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;
use Symfony\Component\Finder\Iterator\FilenameFilterIterator;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // public function laporan()
    // {
    //     $reports = Report::all();

    //     return view('user.laporan.index', compact('reports'));
    // }

    public function index()
    {
        $reports = Report::paginate(5);

        return view('user.laporan.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.laporan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required',
            'kategori' => 'required',
            'level' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|max:1024',
        ]);
        $fileName = time() . '.' . $request->gambar->Storage::extension();
        $request->gambar->move(public_path('assets/images'));

        $report = Report::create([
            'name' => $request->judul,
            'date' => $request->tanggal,
            'category' => $request->kategori,
            'level' => $request->level,
            'lokasi' => $request->lokasi,
            'description' => $request->deskripsi,
        ]);

        Image::create([
            'name_image' => $fileName,
        ]);

        return redirect(route('user.laporan.index'))->with('success', 'Laporan berhasil dikirim');
    }

    /**
     * Display the specified resource.
     */
    public function show(String_ $id)
    {
        $report = Report::where('id', $id)->first();

        return view('user.laporan.view', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
