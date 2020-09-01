@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        
        <table class="table table-striped table-bordered table-striped">
          <thead>
            <tr class="bg-info">
          
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Category</th>
              
              <th scope="col">EDIT</th>
              <th scope="col">DELETE</th>
              <th scope="col">View</th>
            </tr>
          </thead>

          <tbody>

          @foreach ($categorie as $row)
            
             <tr>
          
              <th scope="row">{{ $row->id }}</th>
              <td>{{ $row->name }}</td>
              <td>{{ $row->slug }}</td>
              
          
              <td><a href="{{ URL::to('/posts/categorie/editCategorie/'.$row->id) }}"><button type="button" class="btn btn-success">Edit</button></a></td>

              <td><a href="{{ URL::to('/posts/categorie/deleteCategorie/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a></td>


              <td><a href="{{ URL::to('/posts/categorie/viewCategorie/'.$row->id) }}"><button type="button" class="btn btn-warning">View</button></a></td>
             
            </tr>


          @endforeach
           
          
          </tbody>

        </table>
  
  </div>
 </div>
</div>

@endsection