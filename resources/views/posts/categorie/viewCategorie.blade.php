@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <ol>
          <li>Category ID:   {{ $category->id }}</li>
          <li>Category Name: {{ $category->name }}</li>
          <li>Category Slug: {{ $category->slug }}</li>
        </ol>
      
  </div>
 </div>
</div>

@endsection