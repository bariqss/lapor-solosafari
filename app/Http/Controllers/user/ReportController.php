<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::all();

        return view('user.riwayat-laporan.index', compact('reports'));
    }

    public function home()
    {
        $reports = Report::all();
        return view('user.index', compact('reports'));
    }

    public function create()
    {
        return view('user.laporan.index');
    }

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
        $fileName = time() . '.' . $request->gambar->extension();
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
            'id_report' => $report->id,
        ]);

        return redirect(route('laporan.home'))->with('success', 'Laporan berhasil dikirim');
    }


    public function view()
    {
        return view('user.laporan.view');
    }
}
