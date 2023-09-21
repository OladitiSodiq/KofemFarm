@extends('adminLayout')

@section('title', ucwords($farm->name))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('farm.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('farm.index') }}"><i class="fa fa-dashboard"></i> Merchants</a></li>
        <li class="active">{{ $farm->id }}</li>
    </ol>
@endsection

@section('content')
   


    <div class="content-wrapper" style=" margin-left: 0px !important;">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1> {{ $farm->name }} Detail</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Project Detail</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

      
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Projects Detail</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>


              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#farmNotes">
                Farm Notes
                </button>
            
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                <div class="row">
                  <div class="col-12 col-sm-4">
                    <div class="info-box bg-light">
                      <div class="info-box-content">
                        <span class="info-box-text text-center text-muted" >Total Assets amount spent</span>
                        <span class="info-box-number text-center text-muted mb-0" id="totalassetLabel">0</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-4">
                    <div class="info-box bg-light">
                      <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Total Activity amount spent</span>
                        <span class="info-box-number text-center text-muted mb-0" id="totalCostLabel">0</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-4">
                    <div class="info-box bg-light">
                      <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Estimated project duration</span>
                        <span class="info-box-number text-center text-muted mb-0">20</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <h4>Recent Notes</h4>

                  
                    
                       

                        @php 
                                $notes = \App\Models\farm_note::where('farm_id',$farm->id)->get();
                        @endphp

                          @if( $notes)

                            @foreach($notes as $note)
                              <div class="post">
                                
                                <p>
                                  {{$note->notes}}
                                </p>

                    
                              </div>
                            @endforeach
                          @endif
                      

                      

                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                <h3 class="text-primary"><i class="fas fa-paint-brush"></i>{{$farm->name}}</h3>
                <p class="text-muted">{{$farm->description}}</p>
            
                <div class="text-muted">
                  <p class="text-sm">Location
                    <b class="d-block">{{$farm->location}}</b>
                  </p>
                  <p class="text-sm">size (Acres)
                    <b class="d-block">{{$farm->size}}</b>
                  </p>

                  <p class="text-sm">Status
                    <b class="d-block">
                      @if($farm->status == 'NA')
                      <i class="fa fa-circle" style="color: red"></i>  {{$farm->status}}
                      @elseif($farm->status == 'Active')
                      <i class="fa fa-circle" style="color: green"></i>  {{$farm->status}}
                      @endif  
                    
                  </b>
                  </p>
                </div>

                <h5 class="mt-5 text-muted">Actions</h5>
                <!-- <ul class="list-unstyled">
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                  </li>
                  <li>
                    <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                  </li>
                </ul> -->
                <div class="text-center mt-5 mb-3">
                  <a href="{{route('farm-crop.create')}}" class="btn btn-sm btn-primary">Add files</a>
                  <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
      


        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Farm Crop </h3>
          
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
                </button>


                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#farmCrops">
                Farm Crop
                </button>
                
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="crop" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Farm Name</th>
                <th>Crop Name</th>
                <th>Farm Size(Acres)</th>
                <th>Planted Date</th>
                
              </tr>
              </thead>
              <tbody>
              
              </tbody>
              <tfoot>
              <tr>
                <th>Farm Name</th>
                <th>Crop Name</th>
                <th>Farm Size(Acres)</th>
                <th>Planted Date</th>
              
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>


        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Farm Activities </h3>
           
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
                </button>


                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#farmactivities">
                Farm Activities
                </button>
                
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="activites" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Farm Name</th>
                <th>Crop Name</th>
                <th>Farm Activities</th>
                <th>Cost</th>
                <th>Date</th>
                
              </tr>
              </thead>
              <tbody>
              
              </tbody>
              <tfoot>
              <tr>
                <th>Farm Name</th>
                <th>Crop Name</th>
                <th>Farm Activities</th>
                <th>Cost</th>
                <th>Date</th>

              
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>



        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Farm Assets Used </h3>
          
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
                </button>
                

               

                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#farmAssetss">
                Farm Assets
                </button>
                
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="farmAssets" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Date</th>
                <th>Assets</th>
                <th>Farm</th>
                <th>Stock</th>
                <th>Farm Activities</th>
                <th>Amount</th>

                
              </tr>
              </thead>
              <tbody>
              
              </tbody>
              <tfoot>
              <tr>
                <th>Date</th>
                <th>Assets</th>
                <th>Farm</th>
                <th>Stock</th>
                <th>Farm Activities</th>
                <th>Amount</th>


              
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>



        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Gallery</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#farmupload">
                        Farm Upload
                    </button></li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4 class="card-title">Gallery</h4>


                  
                  </div>
                  <div class="card-body">
                    <div>
                  
                      <div class="btn-group w-100 mb-2">
                        <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> All items </a>
                        
                      
                        @php
                            
                            $farm_uploads  =\App\Models\FarmUpload::where('farm_id',$farm->id)->get();
                          $ind=0;
                        @endphp

                        @foreach($farm_uploads as $farm_upload)
                          @php
                            $farm_register  =\App\Models\farm_register::where('id',$farm_upload->activity_id)->first();
                            $farm_crop_id  =\App\Models\Farm_crop::where('id',$farm_register->farm_crop_id)->first();
                            $category  =\App\Models\Category::where('id',$farm_register->category_id)->first();
                          @endphp
                          <a class="btn btn-info" href="javascript:void(0)" data-filter="{{$category->id}}"> {{$category->name}} </a>
                        @endforeach
                        
                      
                      </div>
                      <div class="mb-2">
                        <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Shuffle items </a>
                        <div class="float-right">
                          <select class="custom-select" style="width: auto;" data-sortOrder>
                            <option value="index"> Sort by Position </option>
                            <option value="sortData"> Sort by Custom Data </option>
                          </select>
                          <div class="btn-group">
                            <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending </a>
                            <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>

                      <div class="filter-container p-0 row">
                      @foreach($farm_uploads as $farm_upload)
                        @php
                          $farm_register  =\App\Models\farm_register::where('id',$farm_upload->activity_id)->first();
                          $farm_crop_id  =\App\Models\Farm_crop::where('id',$farm_register->farm_crop_id)->first();
                          $category  =\App\Models\Category::where('id',$farm_register->category_id)->first();
                        @endphp
                        <div class="filtr-item col-sm-2" data-category="{{$category->id}}" data-sort="white sample">
                          <a href="{{ $farm_upload->file_path}}" data-toggle="lightbox" data-title="{{$category->name}}">
                            <img src="{{ $farm_upload->file_path}}" class="img-fluid mb-2" alt="white sample"/>
                          </a>
                        </div>
                      @endforeach
                    
                      </div>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- /.container-fluid -->
        </section>

      </section>



      <div class="modal fade" id="farmupload">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Upload Media</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" action="{{route('farmUpload.store')}}"  enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <select required class="form-select" aria-label="Default select example" name="farm_register_id" id="farm_crop_id">
                            <option value="" selected> select Farm Tools</option>

                            @php
                            $farm_registers  =\App\Models\farm_register::where('farm_id',$farm->id)->get();
                            @endphp
                            @foreach($farm_registers as $farm_register)

                            @php


                            $FarmCrop  =\App\Models\Farm_crop::where('id',$farm_register->farm_crop_id)->first();


                            $category  =\App\Models\Category::where('id',$farm_register->category_id)->first();
                                $farmname = \App\Models\farm::where('id',$FarmCrop->farm_id)->first();
                                $cropname = \App\Models\crop::where('id',$FarmCrop->crop_id)->first();
                            @endphp
                                <option value="{{$farm_register->id}},{{$farmname->id}}">
                              
                                  
                                {{$farmname->name}}.-.{{$cropname->name}}.-.{{ $category->name}}
                            
                            </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="col-md-3">
                    </div>
                    
                </div>
            
                    
                
                <div class="row mb-3">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <label for="media_type">Upload Media Type:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="media_type" value="image" checked>
                            <label class="form-check-label">Image</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="media_type" value="video">
                            <label class="form-check-label">Video</label>
                        </div>
                    </div>

                    <div class="col-md-3">
                    </div>
                </div>

                <div class="row mb-3 media-type image-fields">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <label for="image_upload">Upload Image:</label>
                        <input type="file" class="form-control" id="image_upload" name="image_upload">
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>

                <!-- Video Upload Fields (Initial State: Hidden) -->
                <div class="row mb-3 media-type video-fields" style="display: none;">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <label for="video_upload">Upload Video:</label>
                        <input type="file" class="form-control" id="video_upload" name="video_upload">
                    </div>

                    <div class="col-md-3">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                    <div class="d-grid"><button  type="submit" class="btn btn-primary btn-block">Upload Image/Video</button></div>


                    </div>
                    <div class="col-md-3">
                    </div>
                </div>

                    

                
              </form>
            </div>
            
          </div>
        </div>
      </div>


      <div class="modal fade" id="farmNotes">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Farm Notes</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('note.store')}}">
                    <Input name="farm_id" value="{{$farm->id}}" type="hidden
                    ">
                    
                    <div class="form-floating mb-3">
                        <textarea required class="form-control" id="describe"
                                  type="text"
                                  placeholder="write a brief something "
                                  name="notes"></textarea>
                    </div>
                    <div class="mt-4 mb-0">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-block"
                                    href="{{route('note.store')}}"> Note
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
          </div>
        </div>
      </div>


    
   
      <div class="modal fade" id="farmAssetss">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('save.storeStock') }}" method="POST" style="display: inline-block;" class="form-inline">
              @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!-- <input type="hidden" name="action" value="remove">
                <input type="number" name="stock" class="form-control form-control-sm col-4" min="1"> -->
                <!-- <input type="submit" class="btn btn-xs btn-danger" value="REMOVE"> -->


                  <div class="row mb-3">
                      <div class="col-md-6">
                          <select required class="form-select" aria-label="Default select example" name="asset_id" id="asset_id">
                              <option value="" selected> select Assets </option>


                             



                                
                              @php
                                $Assets  =\App\Models\Asset::all();
                                
                              @endphp
                              @foreach($Assets as $Asset)
                                  <option value="{{$Asset->id}}">
                                
                                  {{$Asset->name}}
                              
                              </option>
                              @endforeach
                          </select>

                      </div>

                    
                


                     
                        <div class="col-md-6">
                            <select required class="form-select" aria-label="Default select example" name="activity_id" id="activity_id">
                                <option value="" selected> select Farm Activity</option>

                                @php
                                  $FarmCrops =   $farmData = DB::table('farm_crops')
                                    ->join('crops', 'farm_crops.crop_id', '=', 'crops.id')
                                    ->join('farms', 'farm_crops.farm_id', '=', 'farms.id')
                                    ->join('farm_registers', 'farm_crops.id', '=', 'farm_registers.farm_crop_id')

                                    ->join('categories','farm_registers.category_id' , '=', 'categories.id'  )

                                    ->where('farm_crops.farm_id', $farm->id)
                                    ->select('farms.id as farmid', 'farms.name as farmnae' ,'crops.name as cropname','categories.name as operations','farm_registers.id as id')->get();
          
                                  @endphp



                                  
                              
                                @foreach($FarmCrops as $FarmCrop)
                              
                              
                                    <option value="{{$FarmCrop->id}}">
                                  
                                      
                                    {{$FarmCrop->farmnae}}.-.{{$FarmCrop->cropname}}.-.{{ $FarmCrop->operations}}
                                
                                </option>

                              
                                @endforeach
                            </select>

                        </div>
                      </div>
                      
                  </div>
                  <div class="row mb-3">
                      <div class="col-md-6">
                          <div class="">
                              <input required class="form-control" id="inputdate" type="text" placeholder="Enter the date" name="quantity"  />
                              <label for="inputdate">Quantity</label>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="">
                              <input required class="form-control" id="inputAsset" type="text" placeholder="" name="inputAsset"/>
                             
                          </div>
                      </div>

                      <input id="stockid" name="stockid" type="hidden">
                      <input id="farm_id" name="farm_id" type="hidden" value="{{$farm->id}}">

                      <input id="assetprice" name="assetprice" type="hidden">

                      
                  </div>


                  <div class="mt-4 mb-0">
                      <div class="d-grid"><button  type="submit" class="btn btn-primary btn-block">Create farm Crop</button></div>
                  </div>
            </form>



            
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
      </div>


      <div class="modal fade" id="farmCrops">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" action="{{route('farm-crop.store')}}">
                  @csrf
                  <div class="row mb-3">
                          <input name="farm_id" type="hidden" value="{{$farm->id}}" >
                   
                      <div class="col-md-6">
                          <select class="form-select" aria-label="Default select example" name="crop_id">
                              <option value="" selected> select crop</option>
                              @php
                                $crops = \App\Models\Crop::all();
                              @endphp
                              @foreach($crops as $crop)
                                  <option value="{{$crop->id}}">{{$crop->name}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="row mb-3">
                      <div class="col-md-6">
                          <div class="form-floating mb-3 mb-md-0">
                              <input required class="form-control" id="inputdate" type="date" placeholder="Enter the date" name="planted_on"  />
                              <label for="inputdate">plated on</label>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-floating mb-3 mb-md-0">
                              <input required class="form-control" id="inputDuration" type="text" placeholder="who harvested" name="harvest_by"/>
                              <label for="inputDuration">harvested by</label>
                          </div>
                      </div>
                  </div>
                  <div class="row mb-3">
                      <div class="col-md-6">
                          <div class="form-floating mb-3 mb-md-0">
                              <input required class="form-control" id="inputFirstName" type="number" placeholder="year planted" name="year_planted" />
                              <label for="inputFirstName"> Year planted </label>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-floating mb-3 mb-md-0">
                              <input required class="form-control" id="inputDuration" type="string" placeholder="State the status" name="status"/>
                              <label for="inputDuration">Status</label>
                          </div>
                      </div>
                  </div>

                  <div class="mt-4 mb-0">
                      <div class="d-grid"><button  type="submit" class="btn btn-primary btn-block">Create farm Crop</button></div>
                  </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>


      <div class="modal fade" id="farmactivities">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('register.store')}}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <select required class="form-select" aria-label="Default select example" name="farm_crop_id" id="farm_crop_id">
                                <option value="" selected> select Farm Crop</option>
                                @php
                                  $FarmCrops = DB::table('farm_crops')
                                          ->join('crops', 'farm_crops.crop_id', '=', 'crops.id')
                                          ->join('farms', 'farm_crops.farm_id', '=', 'farms.id')
                                          ->where('farm_crops.farm_id', $farm->id)
                                          ->select( 'farms.name as farmnae' ,'crops.name as cropname','farm_crops.id as id')
                                          

                                          ->get();
                                @endphp
                                @foreach($FarmCrops as $FarmCrop)
                                    <option value="{{$FarmCrop->id}}">
                                  
                                      
                                    {{$FarmCrop->farmnae}}.-.{{$FarmCrop->cropname}}
                                
                                </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-6 mb-3 mb-md-0">
                            <select required class="form-select" aria-label="Default select example" id="category_id" name="category_id">
                              @php
                            
                                $categories = \App\Models\Category::all();
                           
                              @endphp
                                <option value="" selected> select category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input required class="form-control" id="inputdate" type="text" placeholder="Enter the date" name="total_cost"  />
                                <label for="inputdate">total cost</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input required class="form-control" id="inputDuration" type="text"    placeholder="who harvested" name=""/>
                                <label for="inputDuration">Farm Land Size</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <textarea required class="form-control" id="inputFirstName" type="number" placeholder="year planted" name="description"></textarea>
                                <label for="inputFirstName">Description</label>
                            </div>
                        </div>

                        

                    <div class="mt-4 mb-0">
                        <div class="d-grid"><button  type="submit" class="btn btn-primary btn-block">Create Activities</button></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

    </div>
    
  <script>



  $(document).ready(function() {

    var farmId = "{{ $farm->id }}"; 


    $.ajax({
        url: '/get-farm-data',
        type: 'GET',
        data: { 'farm_id': farmId},
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            $('#crop').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "data": data.data, // Use the fetched data
                "columns": [
                    // Define your columns here
                    { data: 'farmnae' },
                    { data: 'cropname' },
                    { data: 'farmsize' },
                    { data: 'datepalnted' },
                   
                    // Add more columns as needed
                   // Name of the farm from the other table
                ],
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#crop_wrapper .col-md-6:eq(0)');
        }
    });




    $.ajax({
        url: '/get-activities-data',
        type: 'GET',
        data: { 'farm_id': farmId},
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
          var table =   $('#activites').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "data": data.data, // Use the fetched data
                "columns": [
                    // Define your columns here
                    { data: 'farmnae' },
                    { data: 'cropname' },
                    { data: 'operations' },
                    { data: 'cost' },
                    { data: 'date' },
                   
                    // Add more columns as needed
                   // Name of the farm from the other table
                ],
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            });

            // Calculate and display the total cost
            var totalCost = table.column(3).data().reduce(function(a, b) {
                return a + parseFloat(b);
            }, 0);

            $('#totalCostLabel').text('#' + totalCost.toFixed(2));

            table.buttons().container().appendTo('#activites_wrapper .col-md-6:eq(0)');
        }
      });

      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $.ajax({
        url: '/get-assets-data',
        type: 'GET',
        data: { 'farm_id': farmId},
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
          var tablesss =   $('#farmAssets').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "data": data.data, // Use the fetched data
                "columns": [
                    // Define your columns here
                    { data: 'date' },
                    { data: 'assets'
                    },
                    { data: 'farm' },
                    { data: 'stock' },
                    { data: 'farmactivities' },
                    { data: 'amount' },
                   
                    // Add more columns as needed
                   // Name of the farm from the other table
                ],
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            });

            // Calculate and display the total cost
            var totalCost = tablesss.column(5).data().reduce(function(a, b) {
                return a + parseFloat(b);
            }, 0);

            $('#totalassetLabel').text('#' + totalCost.toFixed(2));

            tablesss.buttons().container().appendTo('#farmAssets_wrapper .col-md-6:eq(0)');
        }
      });

      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });




    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  });



   
</script>	
<script type="text/javascript">
        $(document).ready(function () {
            $('#farm_crop_id').change(function () {
                var farmCropId = $(this).val();
                var inputDuration = $('#inputDuration');

                if (farmCropId) {
                    $.ajax({
                        url: '/get-duration/' + farmCropId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            inputDuration.val(data + " Acres");
                            inputDuration.prop('readonly', true);
                        },
                        error: function () {
                            inputDuration.val('');
                            inputDuration.prop('readonly', false);
                        }
                    });
                } else {
                    inputDuration.val('');
                    inputDuration.prop('readonly', false);
                }
            });



            $('#asset_id').change(function () {
                var assetid = $(this).val();
                var inputAsset = $('#inputAsset');
                var stockid = $('#stockid');
                var assetprice= $('#assetprice');

                stockid

                if (assetid) {
                    $.ajax({
                        url: '/get-assets-details/' + assetid,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                          stockid.val(data.stockid);
                          // console.log(data);
                            assetprice.val(data.price);
                            inputAsset.val("Price: "+data.price+" Quantity:"+data.current_stock);
                            inputAsset.prop('readonly', true);
                        },
                        error: function () {
                            inputAsset.val('');
                            inputAsset.prop('readonly', false);
                        }
                    });
                } else {
                    inputAsset.val('');
                    inputAsset.prop('readonly', false);
                }
            });
        });








        
</script>
@endsection

@push('script')


@endpush
