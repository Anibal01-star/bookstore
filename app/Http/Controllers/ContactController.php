<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

 public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
    ]);

    $contactMessage = ContactMessage::create([
        'user_id' => auth()->id(),
        'name' => $validated['name'],
        'email' => $validated['email'],
        'message' => $validated['message'],
    ]);

    Mail::to(env('MAIL_USERNAME'))
        ->send(new ContactMessageMail($contactMessage));

    return back()->with(
        'success',
        'Pesan berhasil dikirim kepada admin.'
    );
    }
}