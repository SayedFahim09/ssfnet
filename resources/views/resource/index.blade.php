@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <a href="{{ url('/resource/create') }}" class="btn btn-success">Add Student</a>
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
                            
          
              <td><a href="{{ URL::to('resource/'.$row->id.'/edit') }}"><button type="button" class="btn btn-info">Edit</button></a></td>

              <td>
                
                  <form action="{{ URL::to('resource/'.$row->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
                
              </td>

              <td><a href="{{ URL::to('resource/'.$row->id) }}"><button type="button" class="btn btn-warning">View</button></a></td>
             
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