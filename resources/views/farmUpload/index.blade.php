@extends('layout')
@section('content')
    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="fas fa-book"></i>Farm Tools</h1>
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
                    <a class="nav-link " href="{{route('register.index')}}"><i class="fas fa-book"></i>Farm Activities</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link " href="{{route('farm-tools-mapping.index')}}"><i class="fas fa-tools px-1"></i>Farm Tools</a>
                </li> -->

                <li class="nav-item">
                    <a class="nav-link active" href="{{route('farmUpload.index')}}"><i class="fas fa-upload px-1"></i>Farm Upload</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="{{route('note.index')}}"><i class="fas fa-pen"></i>Farm Notes</a>
                </li>
            </ul>
            <div class="row pt-3">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body"><a class="small text-white stretched-link" href="{{route('farmUpload.create')}}">
                            </a>Add Farm Live Uploads</div>
                    </div>
                </div>
            </div>

            <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Farm Live Uploads </h3>
                    
                        <div class="card-tools">
                            <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                             -->
                    
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="activites" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Farm Name - Crop Name</th>
                                    <th>Activity</th>
                                    <th>File Type</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($registers as $register)
                                    @php
                                        $farm_register  =\App\Models\farm_register::where('id',$register->activity_id)->first();
                                        $farm_crop_id  =\App\Models\Farm_crop::where('id',$farm_register->farm_crop_id)->first();
                                        $category  =\App\Models\Category::where('id',$farm_register->category_id)->first();

                                        $farmname = \App\Models\farm::where('id',$farm_crop_id->farm_id)->first();
                                        $cropname = \App\Models\crop::where('id',$farm_crop_id->crop_id)->first();
                                    @endphp

                                    <tr>
                                        <td>{{$farmname->name}} - {{$cropname->name}} </td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$register->type}}</td>
                                    </tr>
                                @endforeach
                            
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Farm Name - Crop Name</th>
                                    <th>Activity</th>
                                    <th>File Type</th>
                                
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
            
            </div>


          
    </main>

@endsection
