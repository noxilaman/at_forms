@extends('layouts.sbadmin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Edit') }} {{ __('Harvester Plan') }} # {{ $harvestLog->id }} / {{ $cropList[$harvestLog->crop_id] }}</h1>
    </div>

    <!-- Content Row -->
    <div class="row">


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <form action="{{ route('harvest_logs.update', $harvestLog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="harvest_date" class="col-form-label font-weight-bold">{{ __('Harvest Date') }}</label>
                                    <input type="date" class="form-control" id="harvest_date" name="harvest_date"
                                        value="{{ old('harvest_date', $harvestLog->harvest_date) }}">
                                    @error('harvest_date')
                                        <span class="help-block
                                            @error('harvest_date')
                                                has-error
                                            @enderror">{{ $message }}</span>
                                    @enderror

                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="harvester_id" class="col-form-label font-weight-bold">{{ __('Harvester') }}</label>
                                    <select class="form-control" id="harvester_id" name="harvester_id">
                                        @foreach ($harvesterList as $harvesterid => $harvester)
                                            <option value="{{ $harvesterid }}"
                                                {{ old('harvester_id', $harvestLog->harvester_id) == $harvesterid ? 'selected' : '' }}>
                                                {{ $harvester }}</option>
                                        @endforeach
                                    </select>
                                    @error('harvester_id')
                                        <span class="help-block has-error">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="crop_id" class="col-form-label font-weight-bold">{{ __('Crop') }}</label>
                                    <select class="form-control" id="crop_id" name="crop_id">
                                        @foreach ($cropList as $cropid => $crop)
                                            <option value="{{ $cropid }}"
                                                {{ old('driver_id', $harvestLog->crop_id) == $cropid ? 'selected' : '' }}>
                                                {{ $crop }}</option>
                                        @endforeach
                                    </select>
                                    @error('crop_id')
                                        <span class="help-block has-error">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="driver_id" class="col-form-label font-weight-bold">{{ __('Driver') }}</label>
                                    <select class="form-control" id="driver_id" name="driver_id">
                                        @foreach ($driverList as $driverid => $driver)
                                            <option value="{{ $driverid }}"
                                                {{ old('driver_id', $harvestLog->driver_id) == $driverid ? 'selected' : '' }}>
                                                {{ $driver }}</option>
                                        @endforeach
                                    </select>
                                    @error('driver_id')
                                        <span class="help-block has-error">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="area" class="col-form-label font-weight-bold">{{ __('Area') }}</label>
                                    <input type="text" class="form-control" id="area" name="area"
                                        value="{{ old('area', $harvestLog->area) }}">
                                    @error('area')
                                        <span class="help-block has-error">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="farmer_name" class="col-form-label font-weight-bold">{{ __('Farmer Name') }}</label>
                                    <input type="text" class="form-control" id="farmer_name" name="farmer_name"
                                        value="{{ old('farmer_name', $harvestLog->farmer_name) }}">
                                    @error('farmer_name')
                                        <span class="help-block has-error">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="land_code" class="col-form-label font-weight-bold">{{ __('Land Code') }}</label>
                                    <input type="text" class="form-control" id="land_code" name="land_code"
                                        value="{{ old('land_code', $harvestLog->land_code) }}">
                                    @error('land_code')
                                        <span class="help-block has-error">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="area_size" class="col-form-label font-weight-bold">{{ __('Area Size') }}</label>
                                    <input type="number" step="0.1" class="form-control" id="area_size" name="area_size"
                                        value="{{ old('area_size', $harvestLog->area_size) }}">
                                    @error('area_size')
                                        <span class="help-block has-error">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="start_time" class="col-form-label font-weight-bold">{{ __('Start Time Harvest') }}</label>
                                <input type="datetime-local" class="form-control" id="start_time" name="start_time" value="{{ old('start_time', $harvestLog->start_time) }}">
                                @error('start_time')
                                    <span class="help-block has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="end_time" class="col-form-label font-weight-bold">{{ __('End Time Harvest') }}</label>
                                <input type="datetime-local" class="form-control" id="end_time" name="end_time" value="{{ old('end_time', $harvestLog->end_time) }}">
                                @error('end_time')
                                    <span class="help-block has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="yield" class="col-form-label font-weight-bold">{{ __('Yield') }}</label>
                                    <input type="number" step="0.1" class="form-control" id="yield" name="yield"
                                        value="{{ old('yield', $harvestLog->yield) }}">
                                    @error('yield')
                                        <span class="help-block has-error">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="fuel_litres" class="col-form-label font-weight-bold">{{ __('Fuel Litres') }}</label>
                                    <input type="number" step="0.1" class="form-control" id="fuel_litres" name="fuel_litres"
                                        value="{{ old('fuel_litres', $harvestLog->fuel_litres) }}">
                                    @error('fuel_litres')
                                        <span class="help-block has-error">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="weather" class="col-form-label font-weight-bold">{{ __('Weather') }}</label>
                                    <select class="form-control" id="weather" name="weather">
                                        <option value="sunny" {{ old('weather', $harvestLog->weather) == 'sunny' ? 'selected' : '' }}>{{ __('Sunny') }}</option>
                                        <option value="rainy" {{ old('weather', $harvestLog->weather) == 'rainy' ? 'selected' : '' }}>{{ __('Rainy') }}</option>
                                    </select>
                                    @error('weather')
                                        <span class="help-block has-error">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="progress_status" class="col-form-label font-weight-bold">{{ __('Progress') }}</label>
                                <select class="form-control" id="progress_status" name="progress_status">
                                    <option value="Planning" {{ old('progress_status', $harvestLog->progress_status) == 'Planning' ? 'selected' : '' }}>{{ __('Planning') }}</option>
                                    <option value="Ready" {{ old('progress_status', $harvestLog->progress_status) == 'Ready' ? 'selected' : '' }}>{{ __('Ready') }}</option>
                                    <option value="On-Progress" {{ old('progress_status', $harvestLog->progress_status) == 'On-Progress' ? 'selected' : '' }}>{{ __('On-Progress') }}</option>
                                    <option value="Hold" {{ old('progress_status', $harvestLog->progress_status) == 'Hold' ? 'selected' : '' }}>{{ __('Hold') }}</option>
                                    <option value="Ignore" {{ old('progress_status', $harvestLog->progress_status) == 'Ignore' ? 'selected' : '' }}>{{ __('Ignore') }}</option>
                                    <option value="Finish" {{ old('progress_status', $harvestLog->progress_status) == 'Finish' ? 'selected' : '' }}>{{ __('Finish') }}</option>
                                </select>
                                @error('progress_status')
                                    <span class="help-block has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="status" class="col-form-label font-weight-bold">{{ __('Status') }}</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="active" {{ old('status', $harvestLog->status) == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                    <option value="inactive" {{ old('status', $harvestLog->status) == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                </select>
                                @error('status')
                                    <span class="help-block has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="picture" class="col-form-label font-weight-bold">{{ __('Upload Picture') }}</label>
                                <input type="file" class="form-control" id="picture" name="picture">
                                @error('picture')
                                    <span class="help-block has-error">{{ $message }}</span>
                                @enderror
                                @if ($harvestLog->picture_path)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $harvestLog->picture_path) }}" alt="Thumbnail" class="img-thumbnail" style="max-width: 200px;">
                                    </div>
                                @endif
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-8">
                                <label for="note" class="col-form-label font-weight-bold">{{ __('Note') }}</label>
                                <textarea class="form-control" id="note" name="note" rows="3">{{ old('note', $harvestLog->note) }}</textarea>
                                @error('note')
                                    <span class="help-block has-error">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>


                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>

                        <a href="{{ route('harvest_logs.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

@endsection
