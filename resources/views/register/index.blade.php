@extends('layout')
@section('content')
    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="fas fa-book"></i>Farm Activities</h1>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link " href="{{route('farm.index')}}"><i class="fas fa-tree"></i>farm</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link " href="{{route('lease.index')}}"><i class="fas fa-coins px-1"></i>Farm Leases</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('farm-crop.index')}}"><i class="fas fa-leaf"></i>Farm Crop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('register.index')}}"><i class="fas fa-book"></i>Farm Activities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('farm-tools-mapping.index')}}"><i class="fas fa-tools px-1"></i>Farm Tools</a>
                </li>

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
                        <div class="card-body"><a class="small text-white stretched-link" href="{{route('register.create')}}">
                            </a>Add Farm Activities</div>
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
                            <th class="col-md-3"><i class="fas fa-address-card me-1"></i>Farm Crop </th>
                            <th  class="col-md-3"><i class="fas fa-object-ungroup me-1"></i>Category </th>
                            <th  class="col-md-3"><i class="fas fa-coins me-1"></i>Total Cost</th>
                          

                            <th  class="col-md-3"><i class="fas fa-calendar-check me-1"></i>Date created</th>
                            <th  class="col-md-3" colspan="3"><i class="fas fa-hammer me-1"></i>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th class="col-md-3">Farm Crop</th>
                            <th class="col-md-3">Category</th>
                            <th class="col-md-3">Total Cost</th>
                          
                           
                            <th class="col-md-3">Date created</th>
                            <th class="col-md-3">Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($registers as $register)
                                @php
                                    $farm_crop_id  =\App\Models\Farm_crop::where('id',$register->farm_crop_id)->first();


                                    $category  =\App\Models\Category::where('id',$register->category_id)->first();

                                    $farmname = \App\Models\farm::where('id',$farm_crop_id->farm_id)->first();
                                    $cropname = \App\Models\crop::where('id',$farm_crop_id->crop_id)->first();
                                @endphp
                            <tr>
                                <td>{{$farmname->name}} - {{$cropname->name}} </td>
                                <td>{{$category->name}}</td>
                                <td>{{$register->total_cost}}</td>
                          
                              
                                <td>{{$register->created_at}}</td>
                                <td><a class="btn btn-primary " href="{{route('register.edit', $register)}}"><i class="fas fa-edit"></i>Edit</a></td>
                                <td>
                                    <form method="post" action="{{route('register.destroy',$register)}}">
                                        @csrf
                                        @method('delete')
                                        <button  type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

@endsection
