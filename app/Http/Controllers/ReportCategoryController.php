<?php

namespace App\Http\Controllers;

use App\Models\ReportCategory;
use Illuminate\Http\Request;

class ReportCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        ReportCategory::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ReportCategory $reportCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReportCategory $id)
    {
        $category = ReportCategory::findOrFail($id);

        return view('admin.manajemen-pelaporan.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        ReportCategory::where('id', $id)->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect(route('manajemen-pelaporan.index'))->with('success', 'Kategori berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReportCategory $reportCategory)
    {
        //
    }
}
