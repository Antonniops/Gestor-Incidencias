<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index(){

        //Obtenemos todos los tickets y los usuarios creadores
        $tickets = Ticket::select('tickets.id', 'titulo', 'categoria', 'prioridad', 'mensaje', 'status', 'users.name')
        ->join('users', 'tickets.user', '=', 'users.id')
        ->get();


        //Tickets ordenados por estados
        $tickets = $tickets->sortByDesc('status');

        return view('tickets/admin_tickets', ['tickets' => $tickets]);
    }

    public function close($id){

        //Buscamos el ticket que deseamos cerrar
        $ticket = Ticket::findOrFail($id);

        //Actualizamos el estado y lo cerramos
        $ticket->status = 'close';
        $ticket->save();

        return redirect('/admin/tickets');
    }
}
