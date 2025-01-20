@extends('layouts.sbadmin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Harvester Maintain Create') }}</h1>
    </div>

    <!-- Content Row -->
    <div class="row">


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <form action="{{ route('maintains.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="maintain_date">{{ __('Maintain Date') }}</label>
                                <input type="date" class="form-control" id="maintain_date" name="maintain_date"
                                    value="{{ old('maintain_date') }}">
                                @error('maintain_date')
                                    <span class="help-block
                                        @error('maintain_date')
                                            has-error
                                        @enderror">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="question_set_id">{{ __('Question Set') }}</label>
                                <select class="form-control" id="question_set_id" name="question_set_id">
                                    @foreach ($questionSetList as $questSetId => $questSetName)
                                        <option value="{{ $questSetId }}">{{ $questSetName }}</option>
                                    @endforeach
                                </select>
                                @error('question_set_id')
                                    <span class="help-block @error('question_set_id') has-error @enderror">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="harvester_id">{{ __('Harvester') }}</label>
                                <select class="form-control" id="harvester_id" name="harvester_id">
                                    @foreach ($harvesterList as $harvesterid => $harvestername)
                                        <option value="{{ $harvesterid }}">{{ $harvestername }}</option>
                                    @endforeach
                                </select>
                                @error('harvester_id')
                                    <span class="help-block @error('harvester_id') has-error @enderror">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="driver_id">{{ __('Driver') }}</label>
                                <select class="form-control" id="driver_id" name="driver_id">
                                    @foreach ($driverList as $driverid => $drivername)
                                        <option value="{{ $driverid }}">{{ $drivername }}</option>
                                    @endforeach
                                </select>
                                @error('driver_id')
                                    <span class="help-block @error('driver_id') has-error @enderror">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="mechanic_id">{{ __('Mechanic') }}</label>
                                <select class="form-control" id="mechanic_id" name="mechanic_id">
                                    <option value="">{{ __('Select Mechanic') }}</option>
                                    @foreach ($mechanicList as $mechanicid => $mechanicname)
                                        <option value="{{ $mechanicid }}">{{ $mechanicname }}</option>
                                    @endforeach
                                </select>
                                @error('mechanic_id')
                                    <span class="help-block @error('mechanic_id') has-error @enderror">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="status">{{ __('Status') }}</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="active">{{ __('Active') }}</option>
                                    <option value="inactive">{{ __('Inactive') }}</option>
                                </select>
                                @error('status')
                                    <span class="help-block @error('status') has-error @enderror">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea class="form-control" id="description" name="description"
                                    rows="3">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="help-block @error('description') has-error @enderror">{{ $message }}</span>
                                @enderror
                            </div>



                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        <a href="{{ route('maintains.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

@endsection
