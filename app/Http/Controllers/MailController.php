<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\New_;

class MailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');    
    }

    public function enviar (Request $request, $numero)
    {
        $user = $request->user();
        $correo = New TestMail($user, $numero);
        Mail::to($user)->send($correo);

        return "Se envio el correo";
    }
}
