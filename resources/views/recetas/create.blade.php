@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
@endsection

@section('botones')
    

    <a href="{{ route('recetas.index') }}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold"><svg class="icono" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg>
Volver</a>

@endsection


@section('content')
    <h2 class="text-center mb-5">Crear nueva Receta</h2>

    <div class="row justify-content-center mt-5">

        <div class="col-md-8">
            
            <form method="POST" action="{{ route('recetas.store') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="titulo">Título Receta</label>
                    <input type="text" name="titulo" class="form-control  @error('titulo')
                        is-invalid
                    @enderror" id="titulo" placeholder="Título Receta" value="{{ old('titulo') }}">
                
                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="categoria">Categoria</label>


                    <select name="categoria" class="form-control @error('categoria')
                        is-invalid
                    @enderror" id="categoria" >
                        <option value="">--Selecione--</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('categoria') == $categoria->id ? 'selected' : '' }}> {{ $categoria->nombre }}</option>
                        @endforeach
                    </select>

                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3" >
                    <label for="preparacion">Preparación</label>
                    <input type="hidden" id="preparacion" name="preparacion" value="{{ old('preparacion') }}">
                    <trix-editor input='preparacion' class="form-control @error('preparacion') is-invalid @enderror"></trix-editor>
                    @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3" >
                    <label for="ingredientes">Ingredientes</label>
                    <input type="hidden" id="ingredientes" name="ingredientes" value="{{ old('ingredientes') }}">
                    <trix-editor input='ingredientes' class="form-control @error('ingredientes') is-invalid @enderror"></trix-editor>
                    @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3" >
                    <label for="imagen">Imagen</label>
                    <input type="file" id="imagen" class="form-control @error('imagen') is-invalid @enderror" name="imagen">
                
                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>



                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-3 text-light">Agregar Receta</button>
                </div>
            </form>

        </div>
    </div>
@endsection

@section('scripts')
      <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@show