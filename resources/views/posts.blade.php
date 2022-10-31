@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 ">
         @foreach ($posts as $post )
             <div class="card mb-4">
            <div class="card-body shadow-lg p-3 mb-1"> <!-- agremos una sombra a cada post: shadow-lg p-3 mb-1-->
                             <h4 class="card-title">{{ $post->title}}</h4>
                             <p class="card-text">
                                {{ $post->get_excerpt }}

                                <a href="{{ route('post',$post)}}">leer mas</a>

                             </p>
                             <p class="text-muted mb-0">
                                <em>
                                    &ndash; {{   $post->user->name }}
                                </em>
                                {{$post->created_at->format('d M Y')}}
                             </p>

                       </div>
                 </div>

            @endforeach


            <!--Escribimos $posts que es el que trae todos los post  y llamamos al metodo links -->
            {{ $posts->links()}}


        </div>
    </div>
</div>
@endsection
