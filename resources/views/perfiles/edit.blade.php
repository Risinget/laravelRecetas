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
    <h1 class="text-center">Editar mi perfil</h1>
    <div class="row justify-content-center mt-5">

        <div class="col-md-10 bg-white p-3">

            <form method="POST" enctype="multipart/form-data" action="{{ route('perfiles.update', ['perfil'=>$perfil->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Nombre</label>

                    <input type="text" name="nombre"
                        class="form-control  @error('nombre')
                        is-invalid
                    @enderror"
                        id="nombre" placeholder="Tu nombre" value="{{ $perfil->usuario->name }}">

                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="url">Sitio Web</label>

                    <input type="text" name="url"
                        class="form-control  @error('url')
                        is-invalid
                    @enderror"
                        id="url" placeholder="Tu url" value="{{ $perfil->usuario->url }}">

                    @error('url')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group mt-3" >
                    <label for="biografia">Tu Biografia</label>
                    <input type="hidden" id="biografia" name="biografia" value="{{ $perfil->biografia }}">
                    <trix-editor input='biografia' class="form-control @error('biografia') is-invalid @enderror"></trix-editor>
                    @error('biografia')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong> {{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group mt-3" >
                    <label for="imagen">Tu imagen</label>
                    <input type="file" id="imagen" class="form-control @error('imagen') is-invalid @enderror" name="imagen">
                
                    @if ( $perfil->imagen)
                        
                        <div class="mt-4">
                            <p>Imagen Actual:</p>
                            <img src="/storage/{{ $perfil->imagen }}" alt="" style="width: 300px">
                        </div>


                        @error('imagen')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong> {{ $message }}</strong>
                            </span>
                        @enderror
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-3 text-light">Guardar Perfil</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@show
