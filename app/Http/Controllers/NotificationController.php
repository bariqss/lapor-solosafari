<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function get()
    {
        /** @var \App\Models\User */
        $user = Auth::user();
        $notifications = Notification::where([['is_read', false], ['user_id', $user->id]])->get();

        return
            response()->json([
                'code' => 200,
                'message' => 'success',
                'data' => $notifications,
            ]);
    }


    public function show(Notification $id)
    {
        /** @var \App\Models\User */
        $user = Auth::user();
        $notification = $id;
        $report = $notification->report;
        $id->is_read = true;
        $id->save();

        return redirect()->route('petugas.laporan.view', $report->id);
    }
}
