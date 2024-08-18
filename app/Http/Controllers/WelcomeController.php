<?php

namespace App\Http\Controllers;
use App\Models\Event;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = Event::orderBy('date', 'desc')->paginate(20);

        return view('welcome', compact('events'));
    }
}
