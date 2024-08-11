@extends('layout')
@section('content')
  

<div class="container-fluid p-3 p-md-4 p-lg-5">
    <div class="row">
        <div class="col-md-8 mt-3 mt-md-0">
            <p class="heading-1">Farm Overview</p>
            <p class="paragraph">Explore detailed information about your registered farms here. Stay updated with the latest data and insights to manage your farm operations effectively.</p>
        </div>
        <div class="col-md-4 d-flex align-items-center justify-content-end mt-3 mt-md-0">
            <a href="{{route('farm.create')}}" class="btn bg-success text-white p-2 px-4">
                Add Farm<i class="fa-regular fa-add ps-2"></i>
            </a>
        </div>
    </div>
    <div class="mt-4 table-responsive">
        <table class="table table-hover align-middle" id="example">
            <thead class="table-dark">
                <tr>
                    
                    <th class="py-3">Farm Name</th>
                    @if (Auth::user()->role_id == 2)
                    <th class="py-3">Assigned Staff</th>
                    @endif
                    <th class="py-3">Farm Size (Acres)</th>
                    <th class="py-3">Farm Location</th>


                    <th class="py-3">Created Date</th>
                    <th class="py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($farms as $farm)
               
                <tr>
                    
                    <td class="py-3"> {{ $farm->name }}</td>
                    @if (Auth::user()->role_id == 2)
                    <td class="py-3"> {{ $farm->user?->name }}</td>
                    @endif
                    <td class="py-3"> {{ $farm->size }}</td>
                    <td class="py-3"> {{ $farm->location }}</td>
                    <td class="py-3"> {{ $farm->created_on }}</td>

                   

                    <td class="py-3 text-center text-lg-start">
                        <a href="{{ route('farm.show', $farm) }}" class="p-2 me-2 text-white bg-warning  mb-3 mb-lg-0 d-inline-flex "><i class="fa-regular fa-eye"></i></a>
                        @if (Auth::user()->role_id == 2)
                        <a href="{{ route('farm.edit', $farm) }}" class="p-2 me-2 text-white bg-primary  mb-3 mb-lg-0 d-inline-flex "><i class="fa-regular fa-edit"></i></a>
                        <a href="" class="p-2 me-2 text-white bg-danger d-inline-flex " onclick="event.preventDefault(); if (confirm('Are you sure you want to delete?')) document.getElementById('delete-form-{{ $farm->id }}').submit();"><i class="fa-regular fa-trash"></i></a>
                        @endif

                        <form id="delete-form-{{ $farm->id }}" method="post" action="{{ route('farm.destroy', $farm) }}" style="display: none;">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
           
            
        </div>
    </div>
    
@endsection