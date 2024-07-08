<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Location;
use App\Models\Report;
use App\Models\ReportCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Torann\GeoIP\GeoIP;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::all();

        return view('user.dashboard', compact('reports'));
    }

    public function riwayat()
    {
        $report = Report::all();
        return view('user.riwayat-laporan.index', compact('report'));
    }

    public function create()
    {
        $reports = Report::all();
        $categories = ReportCategory::all();
        return view('user.laporan.create', compact('reports', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required',
            'kategori' => 'required',
            'level' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'deskripsi' => 'required',
            'gambar' => 'required|max:1024',
        ]);

        // $report->return_date = Carbon::parse($report->return_date)->format('d/m/Y');

        $fileName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('assets/images'), $fileName);

        $location = Location::create([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        $report = Report::create([
            'name' => $request->judul,
            'date' => $request->tanggal,
            'id_category' => $request->kategori,
            'level' => $request->level,
            'id_location' => $location->id,
            'description' => $request->deskripsi,
        ]);

        Image::create([
            'name_image' => $fileName,
            'id_report' => $report->id,
        ]);

        return redirect(route('manajemen-laporan.index'))->with('success', 'Laporan berhasil dikirim');
    }

    public function show(string $id)
    {
        $report = Report::where('id', $id)->firstOrFail();
        return view('user.laporan.view', compact('report'));
    }
}
