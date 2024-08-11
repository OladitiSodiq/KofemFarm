@extends('layout')

@section('title', ucwords($farm->name))



@section('content')
   

<div class="p-3 p-md-4 p-lg-5">
  <div class="row flex-md-row-reverse">
      <div class="col-md-3 px-3">
          <div class="row">
              <p class="heading-1">{{ $farm->name }}</p>
              <p>{{ $farm->description }}</p>
          </div>
          <div class="row my-3">
              <div class="col">
                  <h5 class="fw-bold textp">Location</h5>
                  <p>{{ $farm->location }}</p>
              </div>
              <div class="col">
                  <h5 class="fw-bold textp">Size &#40;Acres&#41;</h5>
                  <p>{{ $farm->size }}</p>
              </div>
          </div>


          @if ($farm->staff_id == 0 )
            @if (Auth::user()->role_id == 1)
                <div class="row gap-2 gap-md-0 g-1">
                    <button type="button" class="col col-md-12 btn btn-outline-success mb-3 mb-md-1" data-bs-toggle="modal" data-bs-target="#assignstaff">
                        <i class="fa-regular fa-pen pe-2"></i>Assign Staff 
                    </button>
                </div>
            @endif
         @else
            <div class="col">
                <h5 class="fw-bold textp">Staff Assigned</h5>
                <p>{{ $farm->user?->name }}</p>
            </div>
         @endif 

         <div class="row gap-2 gap-md-0 g-1">
            <button type="button" class="col col-md-12 btn btn-outline-success mb-3 mb-md-1" data-bs-toggle="modal" data-bs-target="#farmassetsmo">
                <i class="fa-regular fa-pen pe-2"></i>Farm Assets
        </div>


        <div class="modal fade" id="farmassetsmo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="assignstaffLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header  text-primary">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row ">
                        <div class="col mt-3 mt-md-0">
                            <h2 class="fw-bolder text-warning">Add  Assets</h2>
                            <p class="">Register new assets for your farm by providing detailed information. Keep track of your farm equipment and resources to ensure efficient asset management and maintenance.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <form method="post"  action="{{ route('save.storeStock') }}" >
                            @csrf
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
               
                    
                            <div class="form-floating mb-3">
                               
                                <select class="form-select"  id="floatingSelect" aria-label="Floating label select example" name="asset_id" id="asset_id" required>
                                    <option disabled selected>Please select...</option>
                                    @php
                                        $Assets  =\App\Models\Asset::all();
                                        
                                    @endphp
                                    @foreach($Assets as $Asset)
                                        <option value="{{$Asset->id}}">{{$Asset->name}}</option>
                                    @endforeach
                                </select>
                                <label for="assetsName">Farm Assets Name</label>
                            </div>
                    
                            <div class="form-floating mb-3">
                               
                                <select class="form-select"  id="floatingSelect" aria-label="Floating label select example" name="activity_id" id="activity_id" required>
                                    <option disabled selected>Please select...</option>
                    
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
                                        <option value="{{$FarmCrop->id}}"> {{$FarmCrop->farmnae}}.-.{{$FarmCrop->cropname}}.-.{{ $FarmCrop->operations}}</option>
                                    @endforeach
                                </select>
                                <label for="assetsName">Farm Activity </label>
                            </div>
                    
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="assetsQuantity" name="quantity" placeholder="category Name" required>
                                <label for="assetsQuantity">Quantity</label>
                            </div>
                    
                            <div class="form-floating mb-3">
                                <input required class="form-control" id="inputAsset" disabled type="text" placeholder="" name="inputAsset">
                                <label for="assetsDescription">Available Farm Assets</label>
                            </div>
                    
                            <input id="stockid" name="stockid" type="hidden">
                            <input id="farm_id" name="farm_id" type="hidden" value="{{$farm->id}}">
                    
                            <input id="assetprice" name="assetprice" type="hidden">
                    
                            <div class="col">
                                <button type="submit" class="btn btn-success w-100">Add Farm Assets</button>
                            </div>
                    
                       </form>
                           
                            
                    </div>
                </div>
               
            </div>
            </div>
        </div>
      </div>
          
        <!-- Modal -->
        <div class="modal fade" id="assignstaff" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="assignstaffLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header  text-primary">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row ">
                            <div class="col mt-3 mt-md-0">
                                <h2 class="fw-bolder text-warning">Assign Staff</h2>
                                <p class="">Allocate staff members to specific farm to ensure efficient operations.</p>
                            </div>
                        </div>

                        <div class="mt-4">
                            <form method="post" action="{{route('farm.staffrole')}}">
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" disabled value="{{ $farm->name }}" id="staffName" >
                                <label for="staffName">Farm</label>
                            </div>

                            <input type="hidden" value="{{ $farm->id }}" name="farm_id">

                            <div class="form-floating mb-3">
                                <select class="form-select" id="assignedstaff" name="assignedstaff" aria-label="Floating label select example" required>
                                    <option disabled selected>Please select...</option>
                                    @php
                                        $staffs = \App\Models\User::where('role_id',2)->where('is_assigned',0)->get();
                                    @endphp
                                    @foreach ( $staffs as $staff)
                                        <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                    @endforeach
                                
                            
                                </select>
                                <label for="assignedFarm">Assigned Staff</label>
                            </div>
        
                            <div class="col">
                                <button type="submit" class="btn btn-warning w-100">Assign Staff</button>
                            </div>
        
                        </form>
                            
                                
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
  </div>

      <div class="col-md-9">
          <div class="row gap-md-2">
              <div class="col px-md-0">
                  <div class="card mb-3 border-success text-center">
                      <div class="card-header bg-success py-3"></div>
                      <div class="card-body">
                          <p class="card-text">Total Assets Amt spent</p>
                          <h2 class="card-title mt-1 fw-bold" id="totalassetLabel"><span class="naira" >N</span></h2>
                      </div>
                  </div>
              </div>

              <div class="col px-md-0">
                  <div class="card mb-3 border-warning text-center">
                      <div class="card-header bg-warning py-3"></div>
                      <div class="card-body">
                          <p class="card-text">Totl. Activity Amt spent</p>
                       
                          <h2 class="card-title mt-1 fw-bold" id="totalCostLabel"></h2>
                      </div>
                  </div>
              </div>
              
              <div class="col px-md-0">
                  <div class="card mb-3 border-info text-center">
                      <div class="card-header bg-info py-3"></div>
                      <div class="card-body">
                          <p class="card-text">Farm Balance</p>
                          <h2 class="card-title mt-1 fw-bold"><span class="">
                            
                            ₦{{ number_format($farm->balance / 1000, 2) }}K
                        </span></h2>
                      </div>
                  </div>
              </div>
          </div>

          <div class="row px-md-0 px-3 ">
              <div class="card">
                  <div class="card-body">
                      <h3 class="fw-bold">Recent Notes</h3>
                      <ul class="list-group list-group-flush">


                        @php 
                        $notes = \App\Models\farm_note::where('farm_id',$farm->id)->get();
                        @endphp

                        @if( $notes)

                            @foreach($notes as $note)
                           
                               
                                <li class="list-group-item px-0"> {{$note->notes}}.</li>
                            @endforeach
                        @endif



                  </div>
                </div>
          </div>

      </div>
  </div>

  <!-- Farm Crop -->


  <div class="row mt-4 px-3 px-md-0">
    <div class="accordion card px-0 border-success border-2 overflow-hidden" id="farmcrops">
        <div class="card-header p-0">
            <button class="accordion-button collapsed bg-success" type="button" data-bs-toggle="collapse" data-bs-target="#farm-crops" aria-expanded="false" aria-controls="farm-upload">
                <h5 class="text-white">Farm Crops</h5>
            </button>
        </div>
        <div id="farm-crops" class="accordion-collapse collapse" data-bs-parent="#farmcrops">
            <div class="accordion-body card-body bg-white">
                <div class="mt-4 table-responsive">
                    <table class="table table-hover" id="crop">
                        <thead class="table-success">
                            <tr>
                             
                                <th class="py-3">Farm Name</th>
                                <th class="py-3">Crop Name</th>
                                <th class="py-3">Farm Size &#40;Acres&#41;</th>
                                <th class="py-3">Planted Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            

                        </tbody>
                    </table>
                    
                        
                </div>
            </div>
        </div>
    </div>
    
</div>

  <!-- Farm Activities -->

  <div class="row mt-4 px-3 px-md-0">
    <div class="accordion card px-0 border-warning border-2 overflow-hidden" id="farmactivities">
        <div class="card-header p-0">
            <button class="accordion-button collapsed bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#farm-activities" aria-expanded="false" aria-controls="farm-activities">
                <h5 class="text-white">Farm Activities</h5>
            </button>
        </div>
        <div id="farm-activities" class="accordion-collapse collapse" data-bs-parent="#farmactivities">
            <div class="accordion-body card-body bg-white">
                <div class="mt-4 table-responsive">
                    <table class="table table-hover" id="activites">
                        <thead class="table-warning">
                            <tr>
                             
                                <th class="py-3">Farm Name</th>
                                <th class="py-3">Crop Name</th>
                                <th class="py-3">Farm Activities</th>
                                <th class="py-3">Cost</th>
                                <th class="py-3">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            

                        </tbody>
                    </table>
                    
                        
                </div>
            </div>
        </div>
    </div>    
</div>


  <!-- Farm Assets Used -->

  <div class="row mt-4 px-3 px-md-0">
    <div class="accordion card px-0 border-primary border-2 overflow-hidden" id="farmassets">
        <div class="card-header p-0">
            <button class="accordion-button collapsed bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#farm-assets" aria-expanded="false" aria-controls="farm-assets">
                <h5 class="text-white">Farm Assets Used</h5>
            </button>
        </div>
        <div id="farm-assets" class="accordion-collapse collapse" data-bs-parent="#farmassets">
            <div class="accordion-body card-body bg-white">
                <div class="mt-4 table-responsive">
                    <table class="table table-hover" id="farmAssetss">
                        <thead class="table-info">
                            <tr>
                               
                                <th class="py-3">Date</th>
                                <th class="py-3">Assets</th>
                                <th class="py-3">Farm</th>
                                <th class="py-3">Stock</th>
                                <th class="py-3">Farm Activities</th>
                                <th class="py-3">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            

                        </tbody>
                    </table>
                    
                        
                </div>
            </div>
        </div>
    </div>    
</div>


 

   <!-- Farm Upload -->
   <div class="row mt-4 px-3 px-md-0">
      <div class="card px-0 border-secondary">
          <div class="card-header bg-secondary text-white">
              <h5 class="">Farm Gallery</h5>
          </div>
          <div class="card-body">
              <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">

                @php
                            
                    $farm_uploads  =\App\Models\FarmUpload::where('farm_id',$farm->id)->get();
                    $ind=0;
                @endphp

                @foreach($farm_uploads as $farm_upload)
                    @php
                        $farm_register = \App\Models\farm_register::where('id', $farm_upload->activity_id)->first();
                        $farm_crop_id = \App\Models\Farm_crop::where('id', $farm_register->farm_crop_id)->first();
                        $category = \App\Models\Category::where('id', $farm_register->category_id)->first();
                    @endphp
                 <div class="col">
                    <div class="card">
                        @if($farm_upload->type == "image")
                        <img src="{{ $farm_upload->file_path }}" class="card-img-top" alt="..."
                            data-toggle="modal" data-target="#mediaModal" data-media="{{ $farm_upload->file_path }}" data-type="image">
                
                        @elseif($farm_upload->type == "video")
                        <video controls class="img-fluid mb-2" alt="white sample"
                            data-toggle="modal" data-target="#mediaModal" data-media="{{ $farm_upload->file_path }}" data-type="video">
                            <source src="{{ $farm_upload->file_path }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <p class="card-text">{{ $farm_upload->description }}</p>
                            <p class="card-text"><small class="text-body-secondary">{{ $farm_upload->created_at }}</small></p>
                        </div>
                    </div>
                </div>
                
                <!-- Modal -->
                <div class="modal fade" id="mediaModal" tabindex="-1" role="dialog" aria-labelledby="mediaModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediaModalLabel">Media Preview</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Media will be dynamically inserted here -->
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- JavaScript to handle media preview in the modal -->
               
                
                @endforeach
                 
              </div>
          </div>
      </div>    
  </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#mediaModal').on('show.bs.modal', function (e) {
            var mediaSrc = $(e.relatedTarget).data('media');
            var mediaType = $(e.relatedTarget).data('type');
            var modalBody = $(this).find('.modal-body');
            
            if (mediaType === 'image') {
                modalBody.html('<img src="' + mediaSrc + '" class="img-fluid" alt="...">');
            } else if (mediaType === 'video') {
                modalBody.html('<video controls class="img-fluid mb-2" alt="white sample"><source src="' + mediaSrc + '" type="video/mp4">Your browser does not support the video tag.</video>');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {

      var farmId = "{{ $farm->id }}"; 

      $.ajax({
          // url: '/Farm'+'/get-farm-data',
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
        //   url: '/Farm'+'/get-activities-data',
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

          

              $('#totalCostLabel').text('₦' + (totalCost / 1000).toLocaleString('en-NG', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + 'K');

            //   $('#totalCostLabel').text('₦' + totalCost.toLocaleString('en-NG', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));


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
        //   url: '/Farm'+'/get-assets-data',
          url: '/get-assets-data',
          type: 'GET',
          data: { 'farm_id': farmId},
          dataType: 'json',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(data) {
            var tablesss =   $('#farmAssetss').DataTable({
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

          
            //   $('#totalassetLabel').text('₦' + totalCost.toLocaleString('en-NG', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));

              $('#totalassetLabel').text('₦' + (totalCost / 1000).toLocaleString('en-NG', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + 'K');

          


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
                        url: '/Farm'+'/get-duration/' + farmCropId,
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
                        url: '/Farm'+'/get-assets-details/' + assetid,
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
            
            
             var filterContainer = $('.filter-container');

            // Handle category filter clicks
            $('.btn-filter').on('click', function() {
              var categoryId = $(this).data('filter');
        
              // Hide all items
              filterContainer.find('.filtr-item').hide();
        
              // Show items of the selected category
              if (categoryId === 'all') {
                filterContainer.find('.filtr-item').show();
              } else {
                filterContainer.find('.filtr-item[data-category="' + categoryId + '"]').show();
              }
            });
        });








        
</script>

<script>
  $(document).ready(function() {
    // Initialize the filterable container
   
  });
</script>
<script>
  
  $(document).ready(function(){
      $('[data-bs-toggle="collapse"]').click(function(){
          $('#farmCropCollapse').collapse('toggle');
      });
  });
</script>
@endsection

@push('script')


@endpush
