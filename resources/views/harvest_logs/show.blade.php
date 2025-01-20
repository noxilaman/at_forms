@extends('layouts.sbadmin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('View') }} {{ __('Harvester Plan') }} # {{ $harvestLog->id }} / {{ $cropList[$harvestLog->crop_id] }}</h1>
    </div>

    <!-- Content Row -->
    <div class="row">


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="harvest_date" class="col-form-label font-weight-bold">{{ __('Harvest Date') }}</label>
                            <p>{{ $harvestLog->harvest_date }}</p>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="harvester_id" class="col-form-label font-weight-bold">{{ __('Harvester') }}</label>
                            <p>{{ $harvesterList[$harvestLog->harvester_id] }}</p>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="crop_id" class="col-form-label font-weight-bold">{{ __('Crop') }}</label>
                            <p>{{ $cropList[$harvestLog->crop_id] }}</p>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="driver_id" class="col-form-label font-weight-bold">{{ __('Driver') }}</label>
                            <p>{{ $driverList[$harvestLog->driver_id] }}</p>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="area" class="col-form-label font-weight-bold">{{ __('Area') }}</label>
                            <p>{{ $harvestLog->area }}</p>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="farmer_name" class="col-form-label font-weight-bold">{{ __('Farmer Name') }}</label>
                            <p>{{ $harvestLog->farmer_name }}</p>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="land_code" class="col-form-label font-weight-bold">{{ __('Land Code') }}</label>
                            <p>{{ $harvestLog->land_code }}</p>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="area_size" class="col-form-label font-weight-bold">{{ __('Area Size') }}</label>
                            <p>{{ $harvestLog->area_size }}</p>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="start_time" class="col-form-label font-weight-bold">{{ __('Start Time Harvest') }}</label>
                            <p>{{ $harvestLog->start_time }}</p>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="end_time" class="col-form-label font-weight-bold">{{ __('End Time Harvest') }}</label>
                            <p>{{ $harvestLog->end_time }}</p>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="yield" class="col-form-label font-weight-bold">{{ __('Yield') }}</label>
                            <p>{{ $harvestLog->yield }}</p>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="fuel_litres" class="col-form-label font-weight-bold">{{ __('Fuel Litres') }}</label>
                            <p>{{ $harvestLog->fuel_litres }}</p>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="weather" class="col-form-label font-weight-bold">{{ __('Weather') }}</label>
                            <p>{{ __($harvestLog->weather) }}</p>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="progress_status" class="col-form-label font-weight-bold">{{ __('Progress') }}</label>
                            <p>{{ __($harvestLog->progress_status) }}</p>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="status" class="col-form-label font-weight-bold">{{ __('Status') }}</label>
                            <p>{{ __($harvestLog->status) }}</p>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="picture" class="col-form-label font-weight-bold">{{ __('Picture') }}</label>
                            <p>
                                @if($harvestLog->picture)
                                    <img src="{{ asset('storage/' . $harvestLog->picture_path) }}" alt="{{ $harvestLog->picture }}" class="img-thumbnail" style="max-width: 150px;">
                                @else
                                    {{ __('No picture available') }}
                                @endif
                            </p>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-8">
                            <label for="note" class="col-form-label font-weight-bold">{{ __('Note') }}</label>
                            <p>{{ $harvestLog->note }}</p>
                        </div>
                        <div class="col-12 mt-3">
                            <a href="{{ route('harvest_logs.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

@endsection
