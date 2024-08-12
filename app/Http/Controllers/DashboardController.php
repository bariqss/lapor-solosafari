<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
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

        return view('dashboard', compact('reports', 'chartData'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
