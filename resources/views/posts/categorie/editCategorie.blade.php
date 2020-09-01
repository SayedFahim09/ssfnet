@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <form action="{{ url('/posts/categorie/updateCategorie/'.$category->id) }}" method="post">
        @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Categorie Name</label>
              <input type="text" class="form-control" value="{{ $category->name }}" placeholder="Categorie Name" name="name" >
              
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug Name</label>
              <input type="text" class="form-control" value="{{ $category->slug }}" placeholder="Slug Name" name="slug" >
           </div>
          </div>
          
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
        </form>
  </div>
 </div>
</div>

@endsection