<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function create()
    {
        return view('messages.contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email'],
            'subject' => ['required', 'string', 'max:100'],
            'message' => ['required', 'string', 'min:10'],
        ]);

        Message::create($validated);

        return back()->with('success', 'Üzenete sikeresen elküldve!');
    }

    // Üzenetek listázása – csak bejelentkezve
    public function index()
    {
      $messages = Message::latest()->get(); 

        return view('messages.index', compact('messages'));
    }
}