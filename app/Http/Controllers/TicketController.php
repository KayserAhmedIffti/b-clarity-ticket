<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'issued_by' => 'required|string|max:255',
            'ticket_name' => 'required|string|max:255',
            'ticket_type' => 'required|string|max:255',
            'ticket_details' => 'required|string',
            'ticket_priority' => 'required|in:Low,Medium,High,Urgent',
            'comments' => 'nullable|string',
            'send_to' => 'required|string|max:255',
        ]);

        $ticket = new \App\Models\Ticket([
            'issued_by' => $request->issued_by,
            'ticket_name' => $request->ticket_name,
            'ticket_type' => $request->ticket_type,
            'ticket_details' => $request->ticket_details,
            'ticket_priority' => $request->ticket_priority,
            'comments' => $request->comments,
            'send_to' => $request->send_to,
            'user_id' => Auth::id(), // Link to authenticated user
        ]);
        $ticket->save();

        return response()->json(['message' => 'Ticket created successfully'], 201);
    }
}
