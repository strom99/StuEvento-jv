<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\UserEventsAttendee;
use Illuminate\Http\Request;

class UserEventsAttendeeController extends Controller
{
    public function storeAttendee(Request $data, String $id)
    {
        $message = null;
        $user = User::find($data->get('user'));

        // almacenar relacion evento - usuario
        $relacion = new UserEventsAttendee();
        $relacion->user_id = $user->id;
        $relacion->event_id = $id;

        if ($relacion->save()) {
            $message = 'Event created successfully';
        } else {
            $message = 'Opss..';
        }

        return redirect()->back()->with([
            'message' => $message
        ]);
    }
}
