<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ReportCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $jumlahuser = DB::table('users')->where('role', 'user')->count();
        $jumlahoperator = DB::table('users')->where('role', 'operator')->count();
        $jumlahpetugas = DB::table('users')->where('role', 'petugas')->count();

        return view('admin.index', compact('jumlahpetugas', 'jumlahoperator', 'jumlahuser'));
    }
}
