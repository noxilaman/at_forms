@extends('layouts.sbadmin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Harvester') }} {{ __('Edit') }} {{ __('#:id', ['id' => $harvester->id]) }}</h1>
    </div>

    <!-- Content Row -->
    <div class="row">


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <form action="{{ route('harvesters.update', $harvester->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group
                            @error('name')
                                has-error
                            @enderror">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $harvester->name) }}">
                            @error('name')
                                <span class="help-block
                                    @error('name')
                                        has-error
                                    @enderror">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="form-group
                            @error('description')
                                has-error
                            @enderror">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea class="form-control" id="description" name="description"
                                rows="3">{{ old('description', $harvester->description) }}</textarea>
                            @error('description')
                                <span class="help-block
                                    @error('description')
                                        has-error
                                    @enderror">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group
                            @error('start_date')
                                has-error
                            @enderror">
                            <label for="start_date">{{ __('Start Date') }}</label>
                            <input type="date" class="form-control" id="start_date" name="start_date"
                                value="{{ old('start_date', $harvester->start_date) }}">
                            @error('start_date')
                                <span class="help-block
                                    @error('start_date')
                                        has-error
                                    @enderror">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group
                            @error('status')
                                has-error
                            @enderror">
                            <label for="status">{{ __('Status') }}</label>
                            <select class="form-control" id="status" name="status">
                                <option value="active" {{ old('status', $harvester->status) == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                <option value="inactive" {{ old('status', $harvester->status) == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                            </select>
                            @error('status')
                                <span class="help-block
                                    @error('status')
                                        has-error
                                    @enderror">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        <a href="{{ route('harvesters.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

@endsection
