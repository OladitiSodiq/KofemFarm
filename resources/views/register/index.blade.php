@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-8 mt-3 mt-md-0">
            <p class="heading-1">Farm Activities</p>
            <p class="">Track and manage all activities on your farm, including crop type, activity category, total cost, and date created. Stay organized and keep detailed records of your farm operations for better planning and analysis.</p>
        </div>
        <div class="col-md-4 d-flex align-items-center justify-content-end mt-3 mt-md-0">
            <a href="{{route('farm_register.create')}}" class="btn bg-success text-white p-2 px-4">
                Add Farm Activities<i class="fa-regular fa-add ps-2"></i>
            </a>
        </div>
    </div>
    <div class="mt-4 table-responsive">
        <table class="table table-hover align-middle" id="example">
            <thead class="table-dark">
                <tr>
                    <th class="py-3">S/N</th>
                    <th class="py-3">Farm Name</th>
                    <th class="py-3">Farm Crop</th>
                    <th class="py-3">Category</th>
                    <th class="py-3">Total Cost</th>
                    <th class="py-3">Date Created</th>
                    <th class="py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($farm_registers as $farm_register)
                @php
                    $farm_crop_id  =\App\Models\Farm_crop::where('id',$farm_register->farm_crop_id)->first();


                    $category  =\App\Models\Category::where('id',$farm_register->category_id)->first();

                    $farmname = \App\Models\Farm::where('id',$farm_crop_id->farm_id)->first();
                    $cropname = \App\Models\Crop::where('id',$farm_crop_id->crop_id)->first();
                @endphp
                <tr>
                    <td class="py-3">1.</td>
                    <td class="py-3">{{$farmname->name}} </td>
                    <td class="py-3">{{$cropname->name}}</td>
                    <td class="py-3">{{$category->name}}</td>
                    <td class="py-3">{{$farm_register->total_cost}}</td>
                  
                    <td class="py-3">{{$farm_register->created_at}}</td>
                    <td class="py-3">
                        @if (Auth::user()->role_id == 2)
                        <a href="{{route('farm_register.edit', $farm_register)}}" class="pe-lg-3 p-2 me-lg-2 text-white bg-primary d-inline-block mb-3  text-center"><i class="fa-regular fa-edit px-2"></i>Edit</a>
                        {{-- <a href="#" class="pe-lg-3 p-2 me-lg-2 text-white bg-danger d-inline-block mb-3 text-center"><i class="fa-regular fa-trash px-2"></i>Delete</a> --}}
                        <a href="" class="p-2 me-2 text-white bg-danger d-inline-flex " onclick="event.preventDefault(); if (confirm('Are you sure you want to delete?')) document.getElementById('delete-form-{{ $farm_register->id }}').submit();"><i class="fa-regular fa-trash"></i></a>
                            @endif
    
                            <form id="delete-form-{{ $farm_register->id }}" method="post" action="{{ route('farm_register.destroy', $farm_register) }}" style="display: none;">
                                @csrf
                                @method('delete')
                            </form>
                    </td>
                </tr>
                @endforeach

                
            </tbody>
        </table> 
    </div>

@endsection
