@extends('layout')
@section('content')
    {{-- <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Crops</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Crops</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body"><a class="small text-white stretched-link" href="{{route('crop.create')}}">
                            </a>Add crop</div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                </div>
                <div class="card-body">


                <table id="datatablesSimple" class="table table-bordered table-responsive">
        <thead>
            <tr>
          
                <th>Name</th>
                <th>Duration</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($crops as $crop)
            <tr>
                
                <td>{{$crop->name}}</td>
                <td>{{$crop->duration}}</td>
                @if (Auth::check() && Auth::user()->name == "Admin")
                  


                    <td><a class="btn btn-outline-primary " href="{{route('crop.edit',$crop)}}"><i class="fas fa-edit "></i>Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('crop.destroy',$crop)}}">
                            @csrf
                            @method('delete')
                            <button type="submit"  onclick="confirm('are you sure?')" class="btn btn-outline-danger   ">
                                <i class="fas fa-trash"></i>delete</button>
                        </form>
                    </td>

                  
                
                @endif
            </tr>
        @endforeach
          
            <!-- Add more rows as needed -->
        </tbody>
    </table>
                    
                </div>
            </div>
        </div>
    </main>

<script>
// Wait for the DOM to be ready
document.addEventListener("DOMContentLoaded", function() {
    // Get references to the form and link
    const deleteForm = document.getElementById('deleteForm');
    const deleteLink = document.getElementById('deleteLink');

    // Add a click event listener to the link
    deleteLink.addEventListener('click', function(event) {
        // Prevent the default link behavior (navigation)
        event.preventDefault();

        // Ask for confirmation before submitting the form
        const confirmation = confirm('Are you sure?');

        // If the user confirms, submit the form
        if (confirmation) {
            deleteForm.submit();
        }
    });
});
</script> --}}


<div class="row">
    <div class="col-md-8 mt-3 mt-md-0">
        <p class="heading-1">View Crops</p>
        <p class="">Browse and manage your crops, including their names, durations, and descriptions. Use the action buttons to edit or delete crop details as needed for effective crop management.</p>
    </div>
    <div class="col-md-4 d-flex align-items-center justify-content-end mt-3 mt-md-0">
        <a href="add-crops.html" class="btn bg-success text-white p-2 px-4">
            Create Crop<i class="fa-regular fa-add ps-2"></i>
        </a>
    </div>
</div>
<div class="mt-4 table-responsive">
    <table class="table table-hover" id="example">
        <thead class="table-dark">
            <tr>
                <th class="py-3">S/N</th>
                <th class="py-3">Crop Name</th>
                <th class="py-3">Crop Duration</th>
                <th class="py-3">Crop Description</th>
                <th class="py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($crops as $crop)
                <tr>
                    <td class="py-3">1.</td>
                    <td class="py-3">{{$crop->name}}</td>
                    <td class="py-3">{{$crop->duration}}</td>
                    <td class="py-3" style="width: 40%;"> {{$crop->description}} </td>
                    
                    
                    @if (Auth::check() && Auth::user()->role_id == 2)

                        <td class="py-3">
                            <a href="{{route('crop.edit',$crop)}}" class="pe-lg-3 p-2 me-lg-2 text-white bg-primary d-inline-block mb-3  text-center"><i class="fa-regular fa-edit px-2"></i>Edit</a>
                        
                            <form method="post" action="{{route('crop.destroy',$crop)}}">
                                @csrf
                                @method('delete')
                                <button type="submit"  onclick="confirm('are you sure?')" class="pe-lg-3 p-2 me-lg-2 text-white bg-danger d-inline-block mb-3 text-center">
                                    <i class="fas fa-trash"></i>delete</button>
                            </form>
                        </td>         
                    @endif
                </tr>
            @endforeach

          

    

            
        </tbody>
    </table>    
</div>
@endsection
