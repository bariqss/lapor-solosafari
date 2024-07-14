<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Location;
use App\Models\Report;
use App\Models\ReportCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $reports = Report::all();
        $categories = ReportCategory::all();

        return view('user.riwayat-laporan.index', compact('reports', 'categories'));
    }

    public function create()
    {
        $reports = Report::all();
        $categories = ReportCategory::all();
        return view('user.laporan.create', compact('reports', 'categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'judul' => 'required',
            'id_user' => 'required',
            'tanggal' => 'required',
            'kategori' => 'required',
            'level' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|max:1024',
        ]);

        $fileName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('assets/images'), $fileName);

        $location = Location::create([
            'latitude' => $request['latitude'],
            'longitude' => $request['longitude'],
        ]);

        $report = Report::create([
            'name' => $request->judul,
            'id_user' => Auth::user()->id,
            'date' => $request->tanggal,
            'id_category' => $request->kategori,
            'level' => $request->level,
            'id_location' => $location->id,
            'description' => $request->deskripsi,
        ]);

        // dd($report);


        Image::create([
            'name_image' => $fileName,
            'id_report' => $report->id,
        ]);

        return redirect(route('user.riwayat-laporan.riwayat'))->with('success', 'Laporan berhasil dikirim');
    }

    public function show(string $id)
    {
        $location = Location::where('id', $id)->firstOrFail();
        $categories = ReportCategory::all();
        $report = Report::where('id', $id)->firstOrFail();
        return view('user.laporan.view', compact('report', 'categories', 'location'));
    }
}
