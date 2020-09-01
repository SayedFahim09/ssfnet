@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <a href="{{ route('addCategorie') }}" class="btn btn-warning">Add Categorie</a>
        <a href="{{ route('allCategorie') }}" class="btn btn-success">All Categorie</a>
        <a href="{{ route('allPost') }}" class="btn btn-info">All Post</a>
       
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

  <form action="{{ route('insertPost') }}" method="post" enctype="multipart/form-data">
    @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Title</label>
              <input type="text" class="form-control" placeholder="Title" name="title">
              
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Details</label>
              <textarea rows="3" class="form-control" placeholder="Details"name="details"></textarea>
           </div>
          </div>
          
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Image</label>
              <input type="file" class="form-control" name="image">
            
            </div>
          </div>

          <br>
          <div class="control-group">
            <div class="form-group">
              <label>Categories ID</label>
              <select class="form-control" name="categories_id">

                @foreach ($category as $row)
                  <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
                
              </select>
           </div>
          </div>
          
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Submit</button>
        </form>
  </div>
 </div>
</div>

@endsection