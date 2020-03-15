@extends('layouts.app')

@section('content')

        <div class="container">
           
            <form action="/ticket" method="POST" class="mb-3">
                @csrf

                

                <div class="form-group">
                  <label for="titulo">Título</label>
                  <input type="text" class="form-control" id="titulo" placeholder="Título" name="titulo">
                </div>

                @error('titulo')
                    <div class="alert alert-danger">Debes introducir el título</div>
                 @enderror

                <div class="form-group">
                    <label for="categoria">Categorias</label>
                    <select class="form-control" id="categoria" name="categoria">
                        @foreach ($categorias as $cat)
                             <option>{{$cat}}</option>
                        @endforeach
                    </select>
                </div>

                @error('categoria')
                <div class="alert alert-danger">Debes introducir la categoría</div>
             @enderror

                <div class="form-group">
                    <label for="prioridad">Prioridad</label>
                    <select class="form-control" id="prioridad" name="prioridad">
                        @foreach ($prioridades as $pri)
                             <option>{{$pri}}</option>
                        @endforeach
                    </select>
                </div>

                @error('prioridad')
                <div class="alert alert-danger">Debes introducir la prioridad</div>
             @enderror

                <div class="form-group">
                    <label for="mensaje">Mensaje</label>
                    <textarea class="form-control" id="mensaje" rows="3" name="mensaje"></textarea>
                </div>

                @error('mensaje')
                <div class="alert alert-danger">Debes introducir un mensaje</div>
             @enderror

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>

              <a href="/ticket">Volver</a>
        </div>
  

@endsection