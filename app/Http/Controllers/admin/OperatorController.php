<?php

namespace App\Http\Controllers\admin;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OperatorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $operators = User::where('role', UserRole::OPERATOR)->paginate(10);

        return view('admin.manajemen-akun.index', compact('operators'));
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
        $validated = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => UserRole::OPERATOR,
        ]);

        $user->sendEmailVerificationNotification();

        return redirect()->back()->with('success', 'Operator berhasil didaftarkan');
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
    public function destroy(Request $request)
    {
        User::where('id', $request->operator_id)->delete();

        return redirect()->back()->with('success', 'Operator berhasil dihapus');
    }


    public function verify(Request $request)
    {
        $email = $request->input('email');

        $user = User::where('email', $email)->first();

        if ($user && !$user->hasVerifiedEmail()) {
            $user->email_verified_at = Carbon::now();
            $user->save();

            return back()->with('resent', 'Email verification has been successfully sent.');
        }

        return back()->with('error', 'Invalid email or email is already verified.');
    }

    public function resendVerify(Request $request)
    {
        $email = $request->input('email');

        $user = User::where('email', $email)->first();

        if ($user && !$user->hasVerifiedEmail()) {
            $user->sendEmailVerificationNotification();

            return back()->with('resent', 'Email verification has been successfully sent.');
        }

        return back()->with('error', 'Invalid email or email is already verified.');
    }
}
