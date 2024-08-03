<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {

        $petugas = User::all();

        return view('petugas.profile.index', compact('petugas'));
    }
}
