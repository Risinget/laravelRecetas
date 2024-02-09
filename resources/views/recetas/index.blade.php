@extends('layouts.app')


@section('botones')
    

    <a href="{{ route('recetas.create') }}" class="btn btn-primary mr-2 text-white">Crear Receta</a>

@endsection


@section('content')
    

<h2 class="text-center mb-5">Administra tus Recetas</h2>

<div class="col-md-10 mx-auto bg-white p-3">


<div
    class="table-responsive"
>
    <table
        class="table"
    >
        <thead>
            <tr>
                <th scope="col" class="bg-red-app">Column 1</th>
                <th scope="col" class="bg-red-app">Column 2</th>
                <th scope="col" class="bg-red-app">Column 3</th>
            </tr>
        </thead>
        <tbody>
            <tr class="">
                <td scope="row">R1C1</td>
                <td>R1C2</td>
                <td>R1C3</td>
            </tr>
            <tr class="">
                <td scope="row">Item</td>
                <td>Item</td>
                <td>Item</td>
            </tr>
        </tbody>
    </table>
</div>



 
</div>

@endsection