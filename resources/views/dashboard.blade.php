@extends('layout')
@section('content')
<div class="row px-3 px-md-0 gap-2 flex-md-row-reverse">
    <div class="col">
        <div class="row">
            <p class="">Wallet Balance</p>
            <h3 class="text-success fw-bold">N438,000.00</h3>
        </div>
        <div class="row gap-2 align-items-baseline">
            
            <!-- Fund Wallet Button trigger modal -->
            <button type="button" class="col col-md-12 btn btn-primary mb-3 mb-md-0" data-bs-toggle="modal" data-bs-target="#fundwallet">
                <i class="fa-regular fa-wallet pe-2"></i>Fund Wallet
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="fundwallet" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="fundwalletLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header  text-primary">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row ">
                            <div class="col mt-3 mt-md-0">
                                <h2 class="fw-bolder text-primary">Fund Wallet</h2>
                                <p class="">Add funds to your wallet by entering the desired amount. Ensure your wallet is adequately funded to facilitate smooth transactions and farm operations.</p>
                            </div>
                        </div>

                        <div class="mt-4">
                           <form action="" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="category Name" required>
                                <label for="floatingInputGrid">Enter Amounts</label>
                              </div>
        
                            <div class="col">
                                <button type="submit" class="btn btn-primary w-100">Fund Wallet</button>
                            </div>
        
                           </form>
                               
                                
                        </div>
                    </div>
                   
                </div>
                </div>
            </div>

            <button type="button" class="col col-md-12 btn btn-outline-warning mb-3 mb-md-0" data-bs-toggle="modal" data-bs-target="#assignstaff">
                <i class="fa-regular fa-pen pe-2"></i>Assign Staff
            </button>
            
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
                           <form action="" method="post">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="staffName" placeholder="farm-size" required>
                                <label for="staffName">Staff ID</label>
                            </div>

                            <div class="form-floating mb-3">
                                <select class="form-select" id="assignedFarm" aria-label="Floating label select example" required>
                                <option disabled selected>Please select...</option>
                                <option value="1">Farm 1</option>
                                <option value="2">Farm 2</option>
                                <option value="3">Farm 3</option>
                                <option value="4">Farm 4</option>
                                </select>
                                <label for="assignedFarm">Assigned Farm</label>
                            </div>
        
                            <div class="col">
                                <button type="submit" class="btn btn-warning w-100">Assign Farm</button>
                            </div>
        
                           </form>
                               
                                
                        </div>
                    </div>
                   
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9 mb-2">
        <div class="row">
            <div class="col px-0">
                <div class="card mb-3 border-black text-center h-100">
                    <div class="card-header bg-dark py-3"></div>
                    <div class="card-body">
                        <p class="card-text">Total Farm</p>
                        <h2 class="card-title mt-1 fw-bold">12</h2>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card mb-3 border-secondary text-center h-100">
                    <div class="card-header bg-secondary py-3"></div>
                    <div class="card-body">
                        <p class="card-text">Total Crop</p>
                        <h2 class="card-title mt-1 fw-bold">24</h2>
                    </div>
                </div>
            </div>
            
            <div class="col px-0">
                <div class="card mb-3 border-success text-center h-100">
                    <div class="card-header bg-success py-3"></div>
                    <div class="card-body">
                        <p class="card-text">Total Expenses</p>
                        <h2 class="card-title mt-1 fw-bold"><span class="naira">N</span>30,000</h2>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
    
    
    
</div>

<div class="row mt-3 px-3 px-md-0">
    <div class="card border-danger px-0">
        <div class="card-header bg-danger py-3"></div>
        <div class="col-md-11 col-lg-8 px-0 my-2 px-3">
            <p class="fs-3 fw-bold">Farm Expenses</p>
            <p>Visualize your farm's spending with this bar chart, showing a breakdown of expenses. Easily track and manage your costs to improve financial planning and efficiency.</p>
        </div>
        <canvas id="myChart" class="ps-3"></canvas>
    </div>
</div>

<div class="row mt-3 px-3 px-md-0 row-cols-md-2 ">
    <div class="col-sm px-0 pe-md-1 mb-3">
        <div class="card border-dark px-0">
            <div class="card-header bg-dark py-3"></div>
            <div class="col px-3 my-2">
                <p class="fs-3 fw-bold">List of Farms</p>
                <p class="mb-2">Quick view of all the farms registered in your system.</p>
            </div>
            
            <table class="table table-hover">
                <thead class="table-success">
                    <tr>
                        <th class="py-3">S/N</th>
                        <th class="py-3">Farm Name</th>
                        <th class="py-3">Farm Location</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counterf = 1;
                    @endphp
                    @foreach($farms as $farm)
                    <tr>
                        <td class="py-3">{{ $counterf++ }}.</td>
                        <td class="py-3">{{ $farm->name }}</td>
                        <td class="py-3">{{ $farm->location }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>

    <div class="col-sm px-0 ps-md-1 mb-3">
        <div class="card border-dark px-0">
            <div class="card-header bg-dark py-3"></div>
            <div class="col px-3 my-2">
                <p class="fs-3 fw-bold">List of Crops</p>
                <p class="mb-2"> Quick view on each crop in the farm.</p>
            </div>
            
            <table class="table table-hover">
                <thead class="table-success">
                    <tr>
                        <th class="py-3">S/N</th>
                        <th class="py-3">Crop Name</th>
                        <th class="py-3">Crop Duration</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1;
                    @endphp
                    @foreach($crops as $crop)
                    <tr>
                        <td class="py-3">{{ $counter++}}</td>
                        <td class="py-3">{{ $crop->name }}</td>
                        <td class="py-3">{{ $crop->duration }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
    
</div>

<script src="{{asset('assets/resources/Chart.js/chart.umd.js')}}"></script>
<script>
    const ctx = document.getElementById('myChart');
  
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Farm 1', 'Farm 2', 'Farm 3', 'Farm 4', 'Farm 5', 'Farm 6', 'Farm 7'],
        datasets: [{
          label: 'Expenses in Thousands Naira',
          data: [12, 19, 3, 8, 5, 7, 15],
          backgroundColor: [
            'rgba(255, 99, 132)',
            'rgba(255, 159, 64)',
            'rgba(255, 205, 86)',
            'rgba(75, 192, 192)',
            'rgba(54, 162, 235)',
            'rgba(153, 102, 255)',
            'rgba(201, 203, 207)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        indexAxis: 'y',
       
      }
    });
</script>
@endsection
