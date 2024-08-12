<?php

namespace App\Http\Controllers;

use App\Models\ReportCategory;
use App\Models\ReportLocation;
use Illuminate\Http\Request;

class PelaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ReportCategory::paginate(5, ['*'], 'list_category');
        $locations = ReportLocation::paginate(10, ['*'], 'list_lokasi');
        // $locations = DB::table('reports')->where('status', '2')->count();


        return view('admin.manajemen-pelaporan.index', compact('categories', 'locations'));
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
