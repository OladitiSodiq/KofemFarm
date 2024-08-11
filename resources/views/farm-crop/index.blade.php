@extends('layout')
@section('content')
    {{-- <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="fas fa-leaf"></i>Farm Crops</h1>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link " href="{{route('farm.index')}}"><i class="fas fa-tree"></i>farm</a>
                </li>
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link " href="{{route('lease.index')}}"><i class="fas fa-coins px-1"></i>Farm Leases</a>-->
                <!--</li>-->
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('farm-crop.index')}}"><i class="fas fa-leaf"></i>Farm Crop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register.index')}}"><i class="fas fa-book"></i>Farm Activities</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link " href="{{route('farm-tools-mapping.index')}}"><i class="fas fa-tools px-1"></i>Farm Tools</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link " href="{{route('farmUpload.index')}}"><i class="fas fa-upload px-1"></i>Farm Upload</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('note.index')}}"><i class="fas fa-pen"></i>Farm Notes</a>
                </li>
            </ul>
            <div class="row pt-3">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body"><a class="small text-white stretched-link" href="{{route('farm-crop.create')}}">
                            </a>Add farm Crop</div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th class="col-md-2"><i class="fas fa-id-badge me-1"></i>Farm </th>
                            <th class="col-md-2"><i class="fas fa-id-card me-1"></i>Crop </th>
                            <th class="col-md-2"><i class="fas fa-hourglass-start me-1"></i>Planted on</th>
                            <th class="col-md-2"><i class="fas fa-male me-1"></i>Harvest by</th>
                            <!-- <th><i class="fas fa-calendar-alt me-1"></i>year planted </th>
                            <th><i class="fas fa-question-circle"></i>status </th> -->
                            <th class="col-md-2"><i class="fas fa-hammer me-1"></i>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($farm_crops as $farm_crop)
                                @php
                                  
                                    $farmname = \App\Models\Farm::where('id',$farm_crop->farm_id)->first();
                                    $cropname = \App\Models\Crop::where('id',$farm_crop->crop_id)->first();
                                @endphp
                            <tr>
                                <td class="col-md-2"> {{$farmname->name}}</td>
                                
                                <td class="col-md-2">{{$cropname->name ?? ''}}</td>
                                <td class="col-md-2">{{$farm_crop->planted_on}}</td>
                                <td class="col-md-2">{{$farm_crop->harvest_by}}</td>
                                <!-- <td>{{$farm_crop->year_planted}}</td>
                                <td>{{$farm_crop->status}}</td> -->
                                <td class="col-md-2"><a class="btn btn-outline-primary " href="{{route('farm-crop.edit', $farm_crop)}}"><i class="fas fa-edit"></i>Edit</a></td>
                                <!-- <td>
                                    <form method="post" action="{{route('farm-crop.destroy',$farm_crop)}}">
                                        @csrf
                                        @method('delete')
                                        <button  type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger">
                                            <i class="fas fa-trash"></i>delete</button>
                                    </form>
                                </td> -->
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main> --}}


    <div class="row">
        <div class="col-md-8 mt-3 mt-md-0">
            <p class="heading-1">View Farm Crop</p>
            <p class="">Review the crops planted on your farms along with their planting and expected harvest dates. Keep track of your crop schedules to ensure timely management and harvesting.</p>
        </div>
        <div class="col-md-4 d-flex align-items-center justify-content-end mt-3 mt-md-0">
            <a href="{{  route('farm-crop.create') }}" class="btn bg-success text-white p-2 px-4">
                Add crop<i class="fa-regular fa-add ps-2"></i>
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
                    <th class="py-3">Planted on</th>
                    <th class="py-3">Harvested by</th>
                    <th class="py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($farm_crops as $farm_crop)
                    @php
                    
                        $farmname = \App\Models\Farm::where('id',$farm_crop->farm_id)->first();
                        $cropname = \App\Models\Crop::where('id',$farm_crop->crop_id)->first();
                    @endphp
                    <tr>
                        <td class="py-3">1.</td>
                        <td class="py-3">{{$farmname->name}}</td>
                        <td class="py-3">{{$cropname->name ?? ''}}</td>
                        <td class="py-3">{{$farm_crop->planted_on}}</td>
                        <td class="py-3">{{$farm_crop->harvest_by}}</td>
                        <td class="py-3">
                            
                        
                            @if (Auth::user()->role_id == 2)
                            <a href="{{route('farm-crop.edit', $farm_crop)}}" class="p-2 text-white bg-primary d-inline-block d-lg-inline text-center "><i class="fa-regular fa-edit px-2 px-lg-0 pe-lg-2"></i>Edit</a>
                        
                            <a href="" class="p-2 me-2 text-white bg-danger d-inline-flex " onclick="event.preventDefault(); if (confirm('Are you sure you want to delete?')) document.getElementById('delete-form-{{ $farm_crop->id }}').submit();"><i class="fa-regular fa-trash"></i></a>
                            @endif
    
                            <form id="delete-form-{{ $farm_crop->id }}" method="post" action="{{ route('farm-crop.destroy', $farm_crop) }}" style="display: none;">
                                @csrf
                                @method('delete')
                            </form>
                        
                        </td>
                    </tr>
                @endforeach
                

                {{-- <td class="col-md-2"> {{$farmname->name}}</td>
                                
                                <td class="col-md-2">{{$cropname->name ?? ''}}</td>
                                <td class="col-md-2">{{$farm_crop->planted_on}}</td>
                                <td class="col-md-2">{{$farm_crop->harvest_by}}</td>
                                <!-- <td>{{$farm_crop->year_planted}}</td>
                                <td>{{$farm_crop->status}}</td> -->
                                <td class="col-md-2"><a class="btn btn-outline-primary " href="{{route('farm-crop.edit', $farm_crop)}}"><i class="fas fa-edit"></i>Edit</a></td>
                                <!-- <td>
                                    <form method="post" action="{{route('farm-crop.destroy',$farm_crop)}}">
                                        @csrf
                                        @method('delete')
                                        <button  type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger">
                                            <i class="fas fa-trash"></i>delete</button>
                                    </form>
                                </td> --> --}}
            </tbody>
        </table>
           
            
    </div>

@endsection
