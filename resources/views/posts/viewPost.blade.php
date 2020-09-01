@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      	
          <h2> {{ $view->title }} </h2>
          <img src="{{ URL::to($view->image) }}" height="340px;">
          <p> Category Name: {{ $view->name }} </p>
          <p> {{ $view->details }} </p>
            
  </div>
 </div>
</div>

@endsection