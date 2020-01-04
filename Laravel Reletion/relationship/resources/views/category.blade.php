@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            

            <!-- code for showing individual category-->

                 <div class="card card-body">

                <h2> Category = {{ $category->name }} </h2>

                    
                @foreach($category->posts as $post)


                <div class="card card-body mt-2">

            <!-- Akta categoryr under e jatho post ache sob one to many reletion er maddome niye astechi-->
                
                <h3>{{ $post->title }} in <mark><small>{{ $post->category->name }}</small></mark></h3>

                <div>
                    
                    {{ $post->description }}

                </div>

                </div>

                @endforeach

                              

            </div>

        </div>
    </div>
</div>
@endsection
