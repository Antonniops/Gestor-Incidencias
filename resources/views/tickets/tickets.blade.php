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
                    <th scope="col">Status</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $tk)
                  <tr>
                    <td><a href="/ticket/{{$tk->id}}">{{$tk->titulo}}</a></td>
                    <td>{{$tk->categoria}}</td>
                    <td>{{$tk->prioridad}}</td>
                    <td>{{$tk->mensaje}}</td>
                    @if ($tk->status == "open")
                    <td>
                        <span class="bg-success">Open</span>
                    </td>
   

                    @else
                    <td>
                      <span class="bg-danger">Closed</span>
                    </td>

                    @endif

                  </tr>
                  @endforeach
                </tbody>
              </table>

              <a href="/ticket/create" class="btn btn-primary">Añadir ticket</a>
        </div>
  

@endsection