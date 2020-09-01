@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <a href="{{ route('Post') }}" class="btn btn-success">Write Post</a>
        <hr>
        <table class="table table-striped table-bordered table-striped">
          <thead>
            <tr class="bg-info">
          
              <th scope="col">ID</th>
              <th scope="col">Category</th>
              <th scope="col">Title</th>
              <th scope="col">Image</th>
              
              <th scope="col">EDIT</th>
              <th scope="col">DELETE</th>
              <th scope="col">View</th>
            </tr>
          </thead>

          <tbody>
           @php
              $i=1;
           @endphp
          @foreach ($post as $row)
           
             <tr class="text-center">
          
              <th scope="row">{{ $i }}</th>
              <td>{{ $row->name }}</td>
              <td>{{ $row->title }}</td>
              <td><img src="{{ URL::to($row->image) }}" style="height: 40px; width:  70px;"></td>
              
          
              <td><a href="{{ URL::to('/posts/editPost/'.$row->id) }}"><button type="button" class="btn btn-info">Edit</button></a></td>

              <td><a href="{{ URL::to('/posts/deletePost/'.$row->id) }}" id="delete"><button type="button" class="btn btn-danger">Delete</button></a></td>
              
              <td><a href="{{ URL::to('/posts/viewPost/'.$row->id) }}"><button type="button" class="btn btn-warning">View</button></a></td>
             
            </tr>

           @php
             $i++;
           @endphp
          @endforeach

          </tbody>

        </table>
  
  </div>
 </div>
</div>

@endsection