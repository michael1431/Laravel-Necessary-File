@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    
                    <h2>Add New Post</h2>
                    <form action="{{ route('post.store') }}" method="post">
                        @csrf

                        <label for="">Enter Post Title</label><br>
                        <input type="text" name="title" class="form-control">

                        <label for="">Enter Post Description</label><br>

                    <textarea name="description" class="form-control" rows="5"></textarea>

                        <label for="">Category</label><br>

                        <select class="form-control select2" name="category_id">

                            @foreach($categories as $category)

                            <option value="{{ $category->id }}">{{ $category->name }}</option>

                            @endforeach

                        </select>   


                        <label for="">Tag</label><br>

                        <select class="form-control select2-multi" name="tags[]" multiple>

                            @foreach($tags as $tag)

                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>

                            @endforeach

                        </select>  

                       

                        <input type="submit" class="mt-2 btn btn-success" value="Publish">        



                    </form>

                </div>
            </div>

            <!-- code for showing all the post -->

                 <div class="card card-body">

                <h2> All Post </h2>

              
                <!-- code for see all the post by the user who post this -->

                @foreach($user->posts as $post)


                <div class="card card-body mt-2">

            <!-- Post model tekhe just category name ta access kortechi eleoquent reletion er maddome jekhane amra one to one relation korchi-->
                
                <h3>
                    {{ $post->title }} in 
                    <mark>
                        <small>

                   <a href="{{ route('category', $post->category->id)}}"> {{ $post->category->name }}</a>

                        </small>

                    </mark>

                </h3>

                <div>
                    
                    {{ $post->description }}

                </div>

                <hr>
                <div>
                    
                    <!-- show the tag of the post-->
                    <!-- akta post er onek gulo tag takte pare,so sob tag show kortechi oi post er -->

                    @foreach($post->tags as $tag)

                    <span class="badge badge-primary">

                        {{ $tag->name }}

                    </span>





                    @endforeach

                </div>

                </div>

                @endforeach

                              

            </div>

        </div>
    </div>
</div>
@endsection


@section('scripts')


 <script>
    // select2 class er maddome amra multiple tag select korte parbo
    // r kono jinis select box tekhe search diye niye aste parbo

    // many to many reletion er ketre akta post er jonno multiple tag takbe 
    // jekane tag table ta alada, abar akta tag er onek gulo post takte pare
    // so ata many to many reletion
    // abar akta tag er just akta category takhe


    $('.select2').select2();
    $('.select2-multi').select2();


 </script> 





@endsection
