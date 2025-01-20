@extends('layouts.sbadmin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Harvester Maintain View') }}</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="maintain_date"><strong>{{__('Maintain Date')}}</strong>:</label>
                            {{ $maintain->maintain_date }}
                        </div>

                        <div class="col-md-4">
                            <label for="question_set_id"><strong>{{ __('Question Set') }}</strong>:</label>
                            {{ $maintain->questionSet->name }}
                        </div>
                        <div class="col-md-4">
                            <label for="harvester_id"><strong>{{ __('Harvester') }}</strong>:</label>
                            {{ $maintain->harvester->name }}
                        </div>
                        <div class="col-md-4">
                            <label for="driver_id"><strong>{{ __('Driver') }}</strong>:</label>
                            {{ $maintain->driver->name }}
                        </div>

                        <div class="col-md-4">
                            <label for="mechanic_id"><strong>{{ __('Mechanic') }}</strong>:</label>
                            {{ $maintain->mechanic->name ?? '-' }}
                        </div>
                        <div class="col-md-4">
                            <label for="status"><strong>{{ __('Status') }}</strong>:</label>
                            {{ __($maintain->status) }}
                        </div>
                        <div class="col-md-12">
                            <label for="description"><strong>{{ __('Description') }}</strong></label>
                            <p>{{ $maintain->description }}</p>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-2 mt-2">
        <h3 class="h3 mb-0 text-gray-800">แบบประเมิน</h3>
    </div>
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('Question') }}</th>
                                <th>{{ __('Score') }}</th>
                                <th>{{ __('Note') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($maintain->maintainDetails()->orderBy('sequence')->get() as $maintainDetail)
                                <tr>
                                    <td>{{ $maintainDetail->question->question }}</td>
                                    <td>{{ $maintainDetail->answer1 }}</td>
                                    <td>{{ $maintainDetail->note1 }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
@endsection
