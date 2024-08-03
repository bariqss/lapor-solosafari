<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\ImagePenanganan;
use App\Models\Location;
use App\Models\Report;
use App\Models\ReportCategory;
use App\Models\ReportPenanganan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::paginate(10);
        $categories = ReportCategory::all();

        return view('petugas.laporan.index', compact('reports', 'categories'));
    }

    public function riwayat()
    {
        $reports = ReportPenanganan::paginate(10);

        return view('petugas.laporan-tertangani.index', compact('reports'));
    }

    public function create(string $id)
    {
        $report = Report::where('id', $id)->firstOrFail();
        return view('petugas.laporan.create', compact('report'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        // dd($user);
        // dd($request->all());

        $request->validate([
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
        ]);

        // dd($request);
        $fileName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('assets/images'), $fileName);

        $report = ReportPenanganan::create([
            'id_user' => $user->id,
            'id_report' => $request->id_report,
            'date' => $request->tanggal,
            'deskripsi_penanganan' => $request->deskripsi,
        ]);

        // dd($report);

        ImagePenanganan::create([
            'name_image' => $fileName,
            'id_reportpenanganan' => $report->id,
        ]);
        // dd($report);

        return redirect(route('user.riwayat-laporan.riwayat'))->with('success', 'Laporan berhasil dikirim');
    }

    public function show(string $id)
    {
        $location = Location::where('id', $id)->firstOrFail();
        $categories = ReportCategory::all();
        $report = Report::where('id', $id)->firstOrFail();

        return view('petugas.laporan.view', compact('report', 'location', 'categories'));
    }
}
