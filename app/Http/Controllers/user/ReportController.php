<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Location;
use App\Models\Report;
use App\Models\ReportCategory;
use App\Models\ReportLocation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $reportsChart = Report::selectRaw('MONTH(date) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month');

        $months = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        $data = array_fill(1, 12, 0);
        foreach ($reportsChart as $month => $count) {
            $data[$month] = $count;
        }

        $chartData = [
            'labels' => array_values($months),
            'data' => array_values($data)
        ];

        $reports = Report::where(function ($q) use ($request) {
            if (isset($request->level)) {
                $q->where('level', $request->query('level'));
            }
            if (isset($request->status)) {
                $q->where('status', $request->query('status'));
            }
        })->paginate(10);

        // dd($chartData['counts']);

        return view('user.dashboard', compact('reports', 'chartData'));
    }

    public function riwayat()
    {
        $reports = Report::paginate(10);
        $categories = ReportCategory::all();

        return view('user.riwayat-laporan.index', compact('reports', 'categories'));
    }

    public function create()
    {
        $reports = Report::all();
        $categories = ReportCategory::all();
        $locations = ReportLocation::all();
        return view('user.laporan.create', compact('reports', 'categories', 'locations'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        // dd($user);
        // dd($request->all());

        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required',
            'kategori' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'nama_lokasi' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
        ]);

        // dd($request);
        $fileName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('assets/images'), $fileName);

        $location = Location::create([
            'latitude' => $request['latitude'],
            'longitude' => $request['longitude'],
        ]);
        // dd($location);

        $report = Report::create([
            'id_user' => $user->id,
            'name' => $request->judul,
            'date' => $request->tanggal,
            'id_category' => $request->kategori,
            'id_location' => $location->id,
            'id_report_location' => $request->nama_lokasi,
            'description' => $request->deskripsi,
        ]);

        // dd($report);

        Image::create([
            'name_image' => $fileName,
            'id_report' => $report->id,
        ]);
        // dd($report);

        return redirect(route('user.riwayat-laporan.riwayat'))->with('success', 'Laporan berhasil dikirim');
    }

    public function edit(string $id)
    {
        $colocation = Location::where('id', $id)->firstOrFail();
        $categories = ReportCategory::all();
        $report = Report::where('id', $id)->firstOrFail();
        $locations = ReportLocation::all();

        return view('user.laporan.edit', compact('report', 'categories', 'colocation', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd('update');
        dd($request->all());

        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'nama_lokasi' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
        ]);

        // $report = Report::where('id', $id)->firstOrFail();

        if (isset($request->gambar)) {
            $fileName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('assets/images'), $fileName);
            Report::where('id', $id)->update([
                'name' => $request->judul,
                'id_category' => $request->kategori,
                'id_report_location' => $request->nama_lokasi,
                'description' => $request->deskripsi,
                'gambar' => $fileName,
            ]);
        } else {
            Report::where('id', $id)->update([
                'name' => $request->judul,
                'id_category' => $request->kategori,
                'id_report_location' => $request->nama_lokasi,
                'description' => $request->deskripsi,
            ]);
        }

        return redirect()->route('user.dashboard')->with('success', 'Laporan berhasil diupdate');
    }

    public function view($id)
    {
        $location = Location::where('id', $id)->firstOrFail();
        $categories = ReportCategory::all();
        $report = Report::where('id', $id)->firstOrFail();

        return view('user.laporan.view', compact('report', 'categories', 'location'));
    }
}
