<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'issued_by',
        'ticket_name',
        'ticket_type',
        'ticket_details',
        'ticket_priority',
        'comments',
        'send_to',
        'user_id',
    ];
}
