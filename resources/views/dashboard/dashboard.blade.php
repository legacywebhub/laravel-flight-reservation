@extends('dashboard.layout')

@section('title')
{{ $company->name }} | Dashboard
@endsection

@section('content')
<style>
    .board {
      width: 100%;
      height: 60vh;
      border-radius: 30px;
      background-image: url("{{ asset('dashboard/images/people.svg') }}");
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
    }
    .board img {
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      width: 100%;
      height: 100%;
      position: absolute;
      top: 0;
      right: 0;
    }
    .weather-info {
      position: absolute;
      top: 30px;
      right: 25px;
    }
</style>
    

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="board">
            <div class="weather-info">
                <div class="d-flex justify-content-around">
                    <div class="mr-3">
                        <h2 class="mb-0 font-weight-normal"><i class="mdi mdi-brightness-6"></i>31<sup>C</sup></h2>
                    </div>
                    <div class="ml-2">
                        <h4 class="location font-weight-normal">Bangalore</h4>
                        <h6 class="font-weight-normal">India</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 grid-margin transparent">
        <div class="row">
        <div class="col-12 col-md-6 col-lg-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
            <div class="card-body">
                <h2 class="mb-4">Total Reservations</h2>
                <h4 class="fs-30 mb-2">4006</h4>
                <p>10.00% (30 days)</p>
            </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
            <div class="card-body">
                <h2 class="mb-4">Total Bookings</h2>
                <h4 class="fs-30 mb-2">61344</h4>
                <p>22.00% (30 days)</p>
            </div>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-12 col-md-6 col-lg-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue">
            <div class="card-body">
                <h2 class="mb-4">Number of Meetings</h2>
                <h4 class="fs-30 mb-2">34040</h4>
                <p>2.00% (30 days)</p>
            </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6 stretch-card transparent">
            <div class="card card-light-danger">
            <div class="card-body">
                <h2 class="mb-4">Number of Clients</h2>
                <h4 class="fs-30 mb-2">47033</h4>
                <p>0.22% (30 days)</p>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
{{-- <div class="row">
    <div class="col-12 col-xl-6 grid-margin stretch-card">
        <div class="row w-100 flex-grow">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <p class="card-title">Website Audience Metrics</p>
                <p class="text-muted">25% more traffic than previous week</p>
                <div class="row mb-3">
                <div class="col-md-7">
                    <div class="d-flex justify-content-between traffic-status">
                    <div class="item">
                        <p class="mb-">Users</p>
                        <h5 class="font-weight-bold mb-0">93,956</h5>
                        <div class="color-border"></div>
                    </div>
                    <div class="item">
                        <p class="mb-">Bounce Rate</p>
                        <h5 class="font-weight-bold mb-0">58,605</h5>
                        <div class="color-border"></div>
                    </div>
                    <div class="item">
                        <p class="mb-">Page Views</p>
                        <h5 class="font-weight-bold mb-0">78,254</h5>
                        <div class="color-border"></div>
                    </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <ul class="nav nav-pills nav-pills-custom justify-content-md-end" id="pills-tab-custom"
                    role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab-custom" data-toggle="pill"
                        href="#pills-health" role="tab" aria-controls="pills-home" aria-selected="true">
                        Day
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab-custom" data-toggle="pill" href="#pills-career"
                        role="tab" aria-controls="pills-profile" aria-selected="false">
                        Week
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab-custom" data-toggle="pill" href="#pills-music"
                        role="tab" aria-controls="pills-contact" aria-selected="false">
                        Month
                        </a>
                    </li>
                    </ul>
                </div>
                </div>
                <canvas id="audience-chart"></canvas>
            </div>
            </div>
        </div>
        <div class="col-md-6 stretch-card">
            <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                <p class="card-title">Weekly Balance</p>
                <p class="text-success font-weight-medium">20.15 %</p>
                </div>
                <div class="d-flex align-items-center flex-wrap mb-3">
                <h5 class="font-weight-normal mb-0 mb-md-1 mb-lg-0 me-3">$22.736</h5>
                <p class="text-muted mb-0">Avg Sessions</p>
                </div>
                <canvas id="balance-chart" height="130"></canvas>
            </div>
            </div>
        </div>
        <div class="col-md-6 stretch-card">
            <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                <p class="card-title">Today Task</p>
                <p class="text-success font-weight-medium">45.39 %</p>
                </div>
                <div class="d-flex align-items-center flex-wrap mb-3">
                <h5 class="font-weight-normal mb-0 mb-md-1 mb-lg-0 me-3">17.247</h5>
                <p class="text-muted mb-0">Avg Sessions</p>
                </div>
                <canvas id="task-chart" height="130"></canvas>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-12 col-xl-6 grid-margin stretch-card">
        <div class="row w-100 flex-grow">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <p class="card-title">Regional Load</p>
                <p class="text-muted">Last update: 2 Hours ago</p>
                <div class="regional-chart-legend d-flex align-items-center flex-wrap mb-1"
                id="regional-chart-legend"></div>
                <canvas height="280" id="regional-chart"></canvas>
            </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
            <div class="card-body pb-0">
                <div class="d-flex align-items-center mb-4">
                <p class="card-title mb-0 me-1">Today activity</p>
                <div class="badge badge-info badge-pill">2</div>
                </div>
                <div class="d-flex flex-wrap pt-2">
                <div class="me-4 mb-lg-2 mb-xl-0">
                    <p>Time On Site</p>
                    <h4 class="font-weight-bold mb-0">77.15 %</h4>
                </div>
                <div>
                    <p>Page Views</p>
                    <h4 class="font-weight-bold mb-0">14.15 %</h4>
                </div>
                </div>
            </div>
            <canvas height="150" id="activity-chart"></canvas>
            </div>
        </div>
        <div class="col-md-12 stretch-card">
            <div class="card">
            <div class="card-body pb-0">
                <p class="card-title">Server Status 247</p>
                <div class="d-flex justify-content-between flex-wrap">
                <p class="text-muted">Last update: 2 Hours ago</p>
                <div class="d-flex align-items-center flex-wrap server-status-legend mt-3 mb-3 mb-md-0">
                    <div class="item me-3">
                    <div class="d-flex align-items-center">
                        <div class="color-bullet"></div>
                        <h5 class="font-weight-bold mb-0">128GB</h5>
                    </div>
                    <p class="mb-">Total Usage</p>
                    </div>
                    <div class="item me-3">
                    <div class="d-flex align-items-center">
                        <div class="color-bullet"></div>
                        <h5 class="font-weight-bold mb-0">92%</h5>
                    </div>
                    <p class="mb-">Memory Usage</p>
                    </div>
                    <div class="item me-3">
                    <div class="d-flex align-items-center">
                        <div class="color-bullet"></div>
                        <h5 class="font-weight-bold mb-0">16%</h5>
                    </div>
                    <p class="mb-">Disk Usage</p>
                    </div>
                </div>
                </div>
            </div>
            <canvas height="170" id="status-chart"></canvas>
            </div>
        </div>
        </div>
    </div>
</div> --}}
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">This week's Flight</h4>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Flight ID</th>
                        <th>Departure Date</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($flights)
                        @foreach($flights as $flight)
                        <tr>
                            <td>{{$flight->id}}</td>
                            <td>{{Date('d M, Y H:i A', strtotime($flight->departure_time)) }}</td>
                            <td>{{$flight->origin->city.'/'.$flight->origin->country}}</td>
                            <td>{{$flight->destination->city.'/'.$flight->destination->country}}</td>
                            <td class="d-flex">
                                <a href="">View</a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>No Flights</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- row end -->
<div class="row">
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card bg-facebook d-flex align-items-center">
        <div class="card-body py-5">
            <div
            class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
            <i class="mdi mdi-facebook text-white icon-lg"></i>
            <div class="ms-3 ml-md-0 ml-xl-3">
                <h5 class="text-white font-weight-bold">2.62 Subscribers</h5>
                <p class="mt-2 text-white card-text">You main list growing</p>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card bg-google d-flex align-items-center">
        <div class="card-body py-5">
            <div
            class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
            <i class="mdi mdi-google-plus text-white icon-lg"></i>
            <div class="ms-3 ml-md-0 ml-xl-3">
                <h5 class="text-white font-weight-bold">3.4k Followers</h5>
                <p class="mt-2 text-white card-text">You main list growing</p>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card bg-twitter d-flex align-items-center">
        <div class="card-body py-5">
            <div
            class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
            <i class="mdi mdi-twitter text-white icon-lg"></i>
            <div class="ms-3 ml-md-0 ml-xl-3">
                <h5 class="text-white font-weight-bold">3k followers</h5>
                <p class="mt-2 text-white card-text">You main list growing</p>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- row end -->
@endsection