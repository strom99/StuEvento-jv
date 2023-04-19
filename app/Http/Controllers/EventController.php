<?php

namespace App\Http\Controllers;

use App\Http\Requests\Event as RequestsEvent;
use App\Http\Requests\EventRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Event;
use App\Models\User;
use App\Models\UserEventsAttendee;
use Doctrine\DBAL\Schema\View;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $user = auth()->user()->getAuthIdentifier();
        $events = Event::where('user_id', $user)->get();
        return view('eventos', [
            'eventos' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        $user = auth()->user()->getAuthIdentifier();
        $message = null;
        try {
            $event = new Event();
            $event->title = $request->title;
            $event->description = $request->description;
            $event->location = $request->location;
            $event->date = $request->date;
            $event->user_id = $user;
            $event->created_at = $request->created_at;
            $event->updated_at = $request->updated_at;

            // if ($event->save()) {
            //     // almacenar relacion evento - usuario
            //     $relacion = new UserEventsAttendee();
            //     $relacion->user_id = $user;
            //     $relacion->event_id = $event->id;

            //     if ($relacion->save()) {
            //         $message = 'Event created successfully';
            //     } else {
            //         $message = 'Opss..';
            //     }

            if ($event->save()) {
                $message = 'Event created successfully';
            } else {
                $message = 'Opss..';
            }
        } catch (Exception $e) {
            $message = $e->getMessage();
        }
        return redirect()->back()->with([
            'message' => $message
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = null;
        $event = Event::find($id);
        $asistents = UserEventsAttendee::where('event_id', $event->id)->get();

        foreach ($asistents as $asistente) {
            $user[] = User::find($asistente->user_id);
        }

        return view('event', [
            'event' => $event,
            'asistents' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function register(String $id)
    {
        try {
            // participantes
            $parts = null;
            $noregisted = null;
            $event = Event::find($id);
            $asistents = UserEventsAttendee::where('event_id', $event->id)->get();

            foreach ($asistents as $asistente) {
                $parts[] = User::find($asistente->user_id);
            }

            // usuarios que se pueden agregar
            $users = User::all();

            // Recuperar datos diferentes entre los dos arrays
            $noregisted = $users->filter(function ($user) use ($parts) {
                return !collect($parts)->pluck('id')->contains($user->id);
            });
        } catch (Exception $e) {
            $noregisted = $e->getMessage();
        }

        return view('registerUser')->with([
            'event' => $event,
            'asistents' => $parts,
            'noregisted' => $noregisted
        ]);
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
