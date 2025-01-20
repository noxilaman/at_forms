@extends('layouts.sbadmin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('View') }} {{ __('Harvester Plan') }} / {{ $cropList[$harvestIssue->harvestLog->crop_id] }}</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('Date')}}</th>
                                <th scope="col">{{__('Harvester')}} / {{__('Driver')}}</th>
                                <th scope="col">{{__('Farmer')}} / {{__('Land Size')}}</th>
                                <th scope="col">{{__('Status')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <th scope="row">{{ $harvestIssue->harvestLog->id }}</th>
                                    <td>{{ $harvestIssue->harvestLog->harvest_date }}</td>
                                    <td>{{ $harvestIssue->harvestLog->harvester->name }} / {{ $harvestIssue->harvestLog->driver->name }}</td>
                                    <td>{{ $harvestIssue->harvestLog->farmer_name }} / {{ $harvestIssue->harvestLog->area_size }}</td>
                                    <td>{{ __($harvestIssue->harvestLog->progress_status) }} / {{ __($harvestIssue->harvestLog->status) }}</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-12 pt-2">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="issue" class="col-form-label font-weight-bold">{{ __('Issue') }}</label>
                            <p class="form-control-plaintext">{{ $harvestIssue->issue }}</p>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="start_time" class="col-form-label font-weight-bold">{{ __('Start Time Issue') }}</label>
                            <p class="form-control-plaintext">{{ $harvestIssue->start_time }}</p>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="end_time" class="col-form-label font-weight-bold">{{ __('End Time Issue') }}</label>
                            <p class="form-control-plaintext">{{ $harvestIssue->end_time }}</p>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="status" class="col-form-label font-weight-bold">{{ __('Status') }}</label>
                            <p class="form-control-plaintext">{{ __($harvestIssue->status) }}</p>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <label for="picture" class="col-form-label font-weight-bold">{{ __('Picture') }}</label>
                            @if($harvestIssue->picture)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $harvestIssue->picture_path) }}" alt="Issue Picture" class="img-thumbnail" width="150">
                                </div>
                            @else
                                <p class="form-control-plaintext">{{ __('No picture uploaded') }}</p>
                            @endif
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-8">
                            <label for="description" class="col-form-label font-weight-bold">{{ __('Description') }}</label>
                            <p class="form-control-plaintext">{{ $harvestIssue->description }}</p>
                        </div>
                    </div>

                    <a href="{{ route('harvest_logs.issues',[$harvestIssue->harvestLog->id]) }}" class="btn btn-secondary">{{ __('Back') }}</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

@endsection
