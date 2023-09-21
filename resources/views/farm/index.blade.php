@extends('layout')
@section('content')
    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4"><i class="fas fa-tree"></i> Farm</h1>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('farm.index')}}"><i class="fas fa-tree"></i>farm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('lease.index')}}"><i class="fas fa-coins px-1"></i>Farm Leases</a>
                </li>
                @if (Auth::user()->name =="Admin")
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('farm-crop.index')}}"><i class="fas fa-leaf"></i>Farm Crop</a>
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
                @endif
            </ul>

            <div class="row pt-3">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body"><a class="small text-white stretched-link" href="{{route('farm.create')}}">
                            </a>Add farm</div>
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
                     

                            <th class="col-md-3"><i class="fas fa-pen me-1"></i>Name</th>
                  
                            <th class="col-md-3"><i class="fas fa-crop me-1"></i>size (Acres)</th>
                            <th class="col-md-3"><i class="fas fa-location me-1"></i>location</th>
                            <!-- <th class="col-md-1"><i class="fas fa-calendar-check me-1"></i>created on</th> -->
                            <th class="col-md-3"><i class="fas fa-hammer me-1"></i>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                      
                            <th class="col-md-3">Name</th>
                          
                            <th class="col-md-3">size</th>
                            <th class="col-md-3">location</th>

                            <!-- <th class="col-md-1">created on</th> -->
                            <th class="col-md-3">Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($farms as $farm)
                        <tr>
                            
                            <td class="col-md-3"> 
                                @if($farm->status == 'NA')
                                <i class="fa fa-circle" style="color: red"></i>
                                @elseif($farm->status == 'Active')
                                <i class="fa fa-circle" style="color: green"></i>
                                @endif
                                
                                
                                {{ $farm->name }}</td>
                            <td class="col-md-3">{{ $farm->size }}</td>
                            <td class="col-md-3">{{ $farm->location }}</td>
                            <!-- <td class="col-md-1">{{ $farm->created_on }}</td> -->
                            <td class="col-md-3">

                            @if (Auth::user()->name =="Admin")
                                <a class="btn btn-primary" href="{{ route('farm.edit', $farm) }}"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-danger delete-confirm"
                                    onclick="event.preventDefault(); if (confirm('Are you sure you want to delete?')) document.getElementById('delete-form-{{ $farm->id }}').submit();">
                                    <i class="fas fa-trash"></i>Delete
                                </a>
                            @endif
                                <a class="btn btn-warning" href="{{ route('farm.show', $farm) }}"><i class="fas fa-eye px-lg-2"></i></a>
                               
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
    </div>
</main>
@endsection