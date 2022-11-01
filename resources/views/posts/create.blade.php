@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow p-2 mb-0 ">
            <div class="card">
                <div class="card-header text-center">

                    <div class="mx-auto">
                        Crear articulos
                    </div>
                </div>

                <div class="card-body ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                     <form

                     action="{{ route('posts.store')}}"
                     method="POST"
                     enctype="multipart/form-data"
                     >
                     <div class="form-group">
                        <label>titulo</label>
                        <input type="text" name="title" class="form-control" required>
                     </div>
                     <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="file">
                     </div>
                     <div class="form-group">
                        <label>Contenido</label>
                        <textarea name="body" id="" rows="6" class="form-control" required></textarea>
                     </div>
                     <div class="form-group">
                        <label>Contenido-embebido</label>
                        <textarea name="iframe" class="form-control"></textarea>
                     </div>
                     <!-- Configuracion del boton enviar -->
                     <div class="form-group">
                        @csrf
                        <button class="btn  btn-secondary btn-lg ">

                         <i class="bi bi-file-earmark-arrow-up-fill"></i>
                         Enviar
                        </button>
                     </div>


                    </form> <!-- fin del form-->


                </div>
            </div>

        </div>
    </div>
</div>
@endsection
