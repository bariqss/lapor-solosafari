<?php

namespace App\Http\Controllers\operator;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Notification;
use App\Models\Report;
use App\Models\ReportCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $laporanMasuk = DB::table('reports')->count();
        $laporanDitangani = DB::table('reports')->where('status', '2')->count();
        $laporanTertangani = DB::table('reports')->where('status', '3')->count();
        $laporanDitolak = DB::table('reports')->where('validasi', '2')->count();

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

        $reports = Report::paginate(15);

        return view('operator.manajemen-laporan.index', compact('reports', 'laporanMasuk', 'laporanDitangani', 'laporanTertangani', 'laporanDitolak', 'chartData'));
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
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $location = Location::where('id', $id)->firstOrFail();
        $categories = ReportCategory::all();
        $report = Report::where('id', $id)->firstOrFail();

        // dd($report->penanganan);

        return view('operator.manajemen-laporan.view', compact('report', 'location', 'categories'));
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
        // dd('update');
        $report = Report::where('id', $id)->firstOrFail();

        Report::where('id', $id)->update([
            'validasi' => $request->validasi,
            'level' => $request->level,
            'status' => $request->status,
        ]);

        $all_petugas = User::where('role', UserRole::PETUGAS)->get();

        foreach ($all_petugas as $petugas) {
            Notification::create([
                'user_id' => $petugas->id,
                'report_id' => $report->id,
                'status' => 'Anda mendapat tugas penanganan'
            ]);
        }

        return redirect()->route('operator.manajemen-laporan.view', $report->id)->with('success', 'Laporan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Report::where('id', $request->report_id)->delete();

        return redirect()->back()->with('success', 'Laporan berhasil dihapus');
    }
}
