@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <a href="{{ route('addStudent') }}" class="btn btn-success">Add Student</a>
        <hr>
        <table class="table table-striped table-bordered table-striped">
          <thead>
            <tr class="bg-info">
          
              <th scope="col">No.</th>
              <th scope="col">Student Name</th>
              <th scope="col">Student Email</th>
              <th scope="col">Student Phone</th>
              
              <th scope="col">EDIT</th>
              <th scope="col">DELETE</th>
              <th scope="col">View</th>
            </tr>
          </thead>

          <tbody>
           @php
              $i=1;
           @endphp
          @foreach ($student as $row)
           
             <tr class="text-center">
          
              <th scope="row">{{ $i }}</th>
              <td>{{ $row->name }}</td>
              <td>{{ $row->email }}</td>
              <td>{{ $row->phone }}</td>
                            
          
              <td><a href="{{ URL::to('/student/editStudent/'.$row->id) }}"><button type="button" class="btn btn-info">Edit</button></a></td>

              <td><a href="{{ URL::to('/student/deleteStudent/'.$row->id) }}" id="delete"><button type="button" class="btn btn-danger">Delete</button></a></td>
              
              <td><a href="{{ URL::to('/student/viewStudent/'.$row->id) }}"><button type="button" class="btn btn-warning">View</button></a></td>
             
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