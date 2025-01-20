@extends('layouts.sbadmin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Maintain View</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="maintain_date"><strong>{{ __('Maintain Date') }}</strong>:</label>
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
                    <form action="{{ route('maintains.storesurvey', [$maintain->id]) }}" method="POST">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('Question') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Note/Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @csrf
                                @php
                                    $headerNo = 1;
                                    $prevHeader = '';
                                @endphp
                                @foreach ($maintain->maintainDetails()->orderBy('sequence')->get() as $maintainDetail)
                                    @if ($maintainDetail->questionGroup->name != $prevHeader)
                                        <tr>
                                            <td colspan="3" class="text-left">
                                                <strong>{{ $headerNo }}. {{ $maintainDetail->questionGroup->name }}</strong>
                                            </td>
                                        </tr>

                                        @php
                                            $headerNo++;
                                            $prevHeader = $maintainDetail->questionGroup->name;
                                        @endphp
                                    @endif
                                    <tr>
                                        <td>{{ $maintainDetail->question->question }}</td>
                                        <td>
                                            <select class="form-control" id="answer1_{{ $maintainDetail->id }}" name="answer1_{{ $maintainDetail->id }}">
                                                <option value="">{{ __('Select Status') }}</option>
                                                <option value="normal" {{ $maintainDetail->answer1 == "normal" ? 'selected' : '' }}>{{__('normal')}}</option>
                                                <option value="unusual" {{ $maintainDetail->answer1 == "unusual" ? 'selected' : '' }}>{{__('unusual')}}</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="note1_{{ $maintainDetail->id }}" name="note1_{{ $maintainDetail->id }}" value="{{ $maintainDetail->note1 }}">
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
@endsection
