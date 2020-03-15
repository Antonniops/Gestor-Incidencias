@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
            <h5 class="card-title">{{$ticket->titulo}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$ticket->categoria}}</h6>
            <p class="card-text">Prioridad: {{$ticket->prioridad}}</p>
            <p class="card-text">Status: {{$ticket->status}}</p>
            <p class="card-text">{{$ticket->mensaje}}</p>
        
            <a href="/ticket" class="card-link">Volver a tickets</a>
        
            </div>
        </div>
    </div>

  

@endsection