<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $fillable = [
        'to',
        'from',
        'subject',
        'message',
        'read',
        'label',
        'read',
        'status'
    ];

    public static function create($request)
    {
        $email = new Email();
        $email['to'] = $request['to'];
        $email['from'] = $request['from'];
        $email['subject'] = $request['subject'];
        $email['message'] = $request['message'];
        $email['status'] = 'send';
        $email['label'] = 'other';
        $email['label_name'] = 'enviado';

        if ($email->save()) {
            return $email;
        }

        return false;
    }
}
