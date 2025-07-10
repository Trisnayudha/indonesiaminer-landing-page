<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExhibitionController extends Controller
{
    public function index()
    {
        return view('exhibition.index');
    }

    public function emailSubscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
        ]);

        // Example: store the subscribed email to database or mailing list table
        // \App\Models\Subscriber::create(['email' => $validated['email']]);

        return response()->json([
            'message' => 'Successfully subscribed.',
            'data' => $validated['email']
        ]);
    }

    public function traffic(Request $request)
    {
        $data = [
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->input('url'),
            'event' => $request->input('event'),
        ];

        // Example: save traffic data to database
        // \App\Models\Traffic::create($data);

        return response()->json([
            'message' => 'Traffic recorded.',
            'data' => $data
        ]);
    }
}
