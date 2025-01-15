@extends('layouts.sbadmin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> {{ __('List') }} {{ __('Harvester Plan') }} / {{ $cropList[$activeCrops->crop_id] }}</h1>
        <a href="{{ route('harvest_logs.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-file fa-sm text-white-50"></i> Create</a>
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
                                <th scope="col">Issues</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($harvestLogs as $harvestLog)
                                <tr>
                                    <th scope="row">{{ $harvestLog->id }}</th>
                                    <td>{{ $harvestLog->harvest_date }}</td>
                                    <td>{{ $harvestLog->harvester->name }} / {{ $harvestLog->driver->name }}</td>
                                    <td>{{ $harvestLog->farmer_name }} / {{ $harvestLog->area_size }}</td>
                                    <td>{{ $harvestLog->progress_status }} / {{ $harvestLog->status }}</td>
                                    <td>
                                        <a href="{{ route('harvest_logs.issues', $harvestLog->id) }}" class="btn btn-info btn-sm">
                                            {{ $harvestLog->harvestIssues()->count() }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('harvest_logs.show', $harvestLog->id) }}"
                                            class="btn btn-secondary btn-sm">{{ __('View') }}</a>
                                        <a href="{{ route('harvest_logs.edit', $harvestLog->id) }}"
                                            class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
                                        <form action="{{ route('harvest_logs.destroy', $harvestLog->id) }}" method="POST"
                                            style="display: inline" onsubmit="return confirm('Are you sure you want to delete this harvest log?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $harvestLogs->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

@endsection
