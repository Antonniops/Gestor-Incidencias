<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //Obtenemos los tickets del usuario que ha iniciado sesion
        $tickets = User::find(\Auth::user()->id)->tickets;

        //Ordenadas por prioridad
        $tickets = $tickets->sortBy('prioridad');

        return view('tickets/tickets', ['tickets' => $tickets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //Cargamos las prioriodades y categorias para el select
        $prioridades = ['low', 'medium', 'high'];
        $categorias = ['Tecnología', 'Ciencia', 'Arte', 'Deporte', 'Cine'];

        return view('tickets/create', ['prioridades' => $prioridades, 'categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validamos el formulario
        $validatedData = $request->validate([
            'titulo'=>'required',
            'categoria' => 'required|in:Tecnología,Ciencia,Arte,Deporte,Cine',
            'prioridad' => 'required|in:low,medium,high',
            'mensaje' => 'required'
        ]);
    

        //Creamos el ticket segun los datos del formulario
        $p = new Ticket;

        $p->titulo = $request->input('titulo');
        $p->categoria = $request->input('categoria');
        $p->prioridad = $request->input('prioridad');
        $p->mensaje = $request->input('mensaje');

        $p->status = 'open';
        $p->user = \Auth::user()->id;

        $p->save();

        return redirect()->action('TicketController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //Mostramos ticket por id
        $ticket = Ticket::findOrFail($ticket->id);

        return view('tickets/detalles', ['ticket' => $ticket]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
