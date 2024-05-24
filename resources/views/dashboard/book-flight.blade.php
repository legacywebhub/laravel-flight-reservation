@extends('dashboard.layout')

@section('title')
{{ $company->name }} | Book Flight
@endsection

@section('content')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h3 class="font-weight-bold my-2">Make Flight Reservation</h3>
        <p class="card-description"></p>
        <form class="forms-sample" action="{{ route('book-flight') }}" method="POST">
          @csrf
          <input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id }}">
          <input type="hidden" name="seat_id" class="form-control" value="{{ $seat->id }}">
          <div class="form-group">
            <label>Flight ID</label>
            <input type="text" name="flight_id" class="form-control" value="{{ $seat->flight->id }}" readonly>
          </div>
          <div class="form-group">
            <label>Seat Number</label>
            <input type="text" name="seat_number" class="form-control" value="{{ $seat->seat_number }}" readonly>
          </div>
          <div class="form-group">
            <label>Class</label>
            <input type="text" name="seat_class" class="form-control" value="{{ $seat->seat_class }}" readonly>
          </div>
          <button class="btn btn-primary me-2">Proceed</button>
          <a href="{{ route('dashboard') }}" class="btn btn-light">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection