@extends('layouts.sbadmin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Create') }}  {{ __('Harvester Issues') }} / {{ $cropList[$activeCrops->crop_id] }}</h1>
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
                                    <th scope="row">{{ $harvestLog->id }}</th>
                                    <td>{{ $harvestLog->harvest_date }}</td>
                                    <td>{{ $harvestLog->harvester->name }} / {{ $harvestLog->driver->name }}</td>
                                    <td>{{ $harvestLog->farmer_name }} / {{ $harvestLog->area_size }}</td>
                                    <td>{{ __($harvestLog->progress_status) }} / {{ __($harvestLog->status) }}</td>
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
                    <form action="{{ route('harvest_logs.storeissue',$harvestLog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="issue" class="col-form-label font-weight-bold">{{ __('Issue') }}</label>
                                    <input type="text" class="form-control" id="issue" name="issue"
                                        value="{{ old('issue') }}">
                                    @error('issue')
                                        <span class="help-block has-error">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="start_time" class="col-form-label font-weight-bold">{{ __('Start Time Issue') }}</label>
                                <input type="datetime-local" class="form-control" id="start_time" name="start_time" value="{{ old('start_time') }}">
                                @error('start_time')
                                    <span class="help-block has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="end_time" class="col-form-label font-weight-bold">{{ __('End Time Issue') }}</label>
                                <input type="datetime-local" class="form-control" id="end_time" name="end_time" value="{{ old('end_time') }}">
                                @error('end_time')
                                    <span class="help-block has-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <label for="status" class="col-form-label font-weight-bold">{{ __('Status') }}</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
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
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-8">
                                <label for="description" class="col-form-label font-weight-bold">{{ __('Description') }}</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="help-block has-error">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">{{__('Submit')}}</button> <a href="{{ route('harvest_logs.issues',[$harvestLog->id]) }}" class="btn btn-secondary">{{ __('Back') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

@endsection
