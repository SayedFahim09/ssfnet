@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <a href="{{ url('resource') }}" class="btn btn-info">All Post</a>
      <hr><br>
      <h3>Student Update</h3>
      
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      
      <form action="{{ url('resource/'.$student->id) }}" method="post">
        @csrf
        @method('PUT')
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Name</label>
              <input type="text" class="form-control" value="{{ $student->name }}" placeholder="Student Name" name="name" >
              
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Email</label>
              <input type="text" class="form-control" value="{{ $student->email }}" placeholder="Student Email" name="email" >
           </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Phone</label>
              <input type="text" class="form-control" value="{{ $student->phone }}" placeholder="Student Phone" name="phone" >
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