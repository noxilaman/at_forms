@extends('layouts.sbadmin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> {{ __('List') }} {{ __('Harvester Issues') }} / {{ $cropList[$harvestLog->crop_id] }}</h1>

    </div>

    <!-- Content Row -->
    <div class="row">


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Harvester / Driver</th>
                                <th scope="col">Farmer / Land Size</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <th scope="row">{{ $harvestLog->id }}</th>
                                    <td>{{ $harvestLog->harvest_date }}</td>
                                    <td>{{ $harvestLog->harvester->name }} / {{ $harvestLog->driver->name }}</td>
                                    <td>{{ $harvestLog->farmer_name }} / {{ $harvestLog->area_size }}</td>
                                    <td>{{ $harvestLog->progress_status }} / {{ $harvestLog->status }}</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-md-12 mb-12">

            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Issues</th>
                                <th scope="col">Status</th>
                                <th scope="col"><a href="{{ route('harvest_logs.createissue',$harvestLog->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-file fa-sm text-white-50"></i> Create</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($harvestIssues as $harvestIssue)
                                <tr>
                                    <th scope="row">{{ $harvestIssue->id }}</th>
                                    <td>{{ $harvestIssue->issue }}</td>
                                    <td>{{ $harvestIssue->status }}</td>
                                    <td>
                                        <a href="{{ route('harvest_logs.showissue', $harvestIssue->id) }}"
                                            class="btn btn-secondary btn-sm">{{ __('View') }}</a>
                                        <a href="{{ route('harvest_logs.editissue', $harvestIssue->id) }}"
                                            class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
                                        <form action="{{ route('harvest_logs.destroyissue', $harvestIssue->id) }}" method="POST"
                                            style="display: inline" onsubmit="return confirm('Are you sure you want to delete this harvest Issue?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                    </table>
                    {{ $harvestIssues->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

@endsection
