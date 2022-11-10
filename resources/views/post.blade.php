@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


             <div class="card mb-4">
            <div class="card-body">
                             <h4 class="card-title">{{ $post->title}}</h4>
                             <p class="card-text">{{ $post-> body }}</p>
                             <p class="text-muted mb-0">
                                @if ($post->image)

                                <div class="row">
                                    <div class="col-6 mx-auto text-center">
                                        <img src="{{$post->get_image}}" class="card-img">

                                    </div>
                                </div>
                                @endif


                                @if ($post->iframe)

                                <div class="embed-responsive embed-responsive-16by9">
                                    {!! $post->iframe !!}

                                  </div>

                                @elseif ($post->image  )

                                @endif

                             </p>

                             <em>
                                &ndash; {{   $post->user->name }}
                            </em>
                            {{$post->created_at->format('d M Y')}}

                       </div>
                 </div>




        </div>
    </div>
</div>
@endsection
