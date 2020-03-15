@extends('layouts.app')

@section('content')

        <div class="container">
           
            <table class="table">
                <thead>
                  <tr>
            
                    <th scope="col">Titulo</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Prioridad</th>
                    <th scope="col">Mensaje</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Status</th>
                    <th scope="col">Cerrar Ticket</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $tk)
                  <tr>
                    <td><a href="/ticket/{{$tk->id}}">{{$tk->titulo}}</a></td>
                    <td>{{$tk->categoria}}</td>
                    <td>{{$tk->prioridad}}</td>
                    <td>{{$tk->mensaje}}</td>
                    <td>{{$tk->name}}</td>
                    @if ($tk->status == "open")
                    <td>
                        <span class="bg-success">Open</span>
                    </td>
   

                    @else
                    <td>
                      <span class="bg-danger">Closed</span>
                    </td>

                    @endif

                    @if ($tk->status == "open")
                        <form action="/admin/close/{{$tk->id}}" method="POST">

                            @method('PUT')
                            @csrf

                    <td>
                        <button class="btn btn-danger" type="submit">Close</button>
                    </td>
                    </form>

                    @else
                    <td>
                        <button class="btn btn-danger" disabled>X</button>
                    </td>

                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>

        </div>
  

@endsection