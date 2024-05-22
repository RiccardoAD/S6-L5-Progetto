@extends("template.base")

@section("title", "Error" )


  
@section("content")
<h1 class="my-5 text-center">Error loading!</h1>
<div class="row justify-content-center">
  <div class="col-10 mx-auto mb-5">


    <p class="text-center">Go back to  <a href="{{route ('welcome')}}">Homepage</a></p>

   
  </div>
</div>
    
@endsection
