<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $today = now()->format('Y-m-d');
      $events = Event::whereDate('start_date', '>=', $today)
                      ->oldest('start_date')->limit(30)->get();
      return view('events.events', [
        'events' => $events,
      ]);
    }
    
    /**
     * Display a listing of the resource for CMS.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
      $today = now()->format('Y-m-d');
      $events = Event::whereDate('start_date', '>=', $today)
                      ->oldest('start_date')->get();
      return view('cms.events', [
        'events' => $events,
      ]);
    }
    
    public function getEvent(Event $event)
    {
      return view('events.event', [
        'event' => $event,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('cms.events_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, Event::rules());
      Event::create($request->all());
      return back()->with('successMessage', 'Event created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
      return view('cms.events_form', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
      $this->validate($request, Event::rules());
      Event::where('id', $event->id)->update($request->except(['_token','_method']));
      return back()->with('successMessage', 'Event updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
      $event->delete();
      return back()->with('successMessage', 'Event deleted successfully!');
    }
}
