@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      	
          <h2>Name:  {{ $student->name }} </h2>
          <h2>Email: {{ $student->email }} </h2>
          <h2>Phone: {{ $student->phone }} </h2>
              
            
  </div>
 </div>
</div>

@endsection