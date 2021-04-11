<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\UserDevice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function create($type)
    {
        $users = User::where('user_type', '!=', 'admin')->get()->pluck('username', 'id');

        return view('admin.notifications.create', compact('type', 'users'));
    }

    public function store(Request $request, $type)
    {
        if ($type == 'user' || $type == 'owner') {
            $request->validate([
                'user' => 'required',
                'message' => 'required',
            ]);

            $notifTitle = 'From Admin';
            $notifMessage = $request->message;

            if ($request->user == 'user') {
                $usersIds = User::where('user_type', getIntUserType($type))->get()->pluck('id')->toArray();
                $devicesTokens = UserDevice::whereIn('user_id', $usersIds)->where('is_open', true)->get()->pluck('device_token')->toArray();

                foreach ($usersIds as $id) {
                    saveNotification($id, $notifTitle, '2', $notifMessage);
                }
            } elseif ($request->user == 'owner') {
                $usersIds = User::where('user_type', 'owner')->get()->pluck('id')->toArray();
                $devicesTokens = UserDevice::whereIn('user_id', $usersIds)->where('is_open', true)->get()->pluck('device_token')->toArray();

                foreach ($usersIds as $id) {
                    saveNotification($id, $notifTitle, '2', $notifMessage);
                }
            } else {
                saveNotification($request->user, $notifTitle, '2', $notifMessage);

                $devicesTokens = UserDevice::where([['user_id', $request->user], ['is_open', true]])->get()->pluck('device_token')->toArray();
            }

            if ($devicesTokens) {
                sendMultiNotification($notifTitle, $notifMessage, $devicesTokens);
            }

            return redirect()->route('notifications.create', $type)->with('success', 'تم الإرسال بنجاح');
        }

        abort('404');
    }
}
