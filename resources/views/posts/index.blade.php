@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Articulos
                    <a href="{{route('posts.create')}}" class="" >
                       <button type="button" class="btn btn-lg btn-primary float-right">
                        <i class="bi bi-plus-circle-fill"></i>
                        Crear
                       </button>

                </a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <table class="table">
                <thead> <!-- Encabezado de la tabla -->
                    <tr>

                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Fecha</th>
                        <th colspan="2">&nbsp;</th>


                    </tr>

                </thead>
                <tbody> <!-- Contenido de la tabla -->
                    @foreach ($posts as $post ) <!-- Este foreach nos servira para colocar de forma dinamica todo el contenido-->
                        <tr>
                            <td>
                                {{$post->id}}
                            </td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->created_at->format('d M Y')}}</td>

                            <td>



                            <a href="{{ route('posts.edit', $post)}}" class=" ">
                                 <button class="btn btn-secondary btn-sm" type="button">
                                    <i class="bi bi-pencil-square"></i>
                                    Editar
                                 </button>
                            </a>
                            </td>
                            <td>
                            <form action=" {{route("posts.destroy", $post)}} " method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit"
                                onclick="return confirm('¿Desea Eliminar?')">
                                <i class="bi bi-trash-fill"></i>
                                Eliminar
                                </button>


                            </form>

                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
