<!DOCTYPE html>
<html>
<head>
    <title>Custom Registration</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-2" style="margin-bottom: 200px!important;">


@if(Session::has('sticky_error'))

 <div class="container mt-2">
   <div class="row justify-content-center">
    <div class="col-md-8">

        <div class="alert alert-danger mt-2">

            <!-- show the msg by using get method,has method use for checking -->

            <p>{{ Session::get('sticky_error') }}</p>
            

        </div>

    </div>
 </div>
</div>

@endif



@if ($errors->any())
    <div class="container mt-2">
    <div class="row justify-content-center">
    <div class="col-md-8">

    <div class="alert alert-danger mt-2">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

  </div>
 </div>
</div>
@endif

  <div class="row justify-content-center mb-5 mt-5">
     <div class="col-md-8">
         <div class="card">
           <div class="card-header">{{ __('Register') }}</div>
             <div class="card-body">
               <form method="POST" action="{{ route('custom-login') }}">
          @csrf
       

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

            </div>
        </div>


        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control " name="password" >
            </div>
        </div>

       

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
            </div>
  </div>
   </form>
     </div>
      </div>
         </div>
          </div>
            </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>