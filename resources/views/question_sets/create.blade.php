@extends('layouts.sbadmin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Question Set Create') }}</h1>
    </div>

    <!-- Content Row -->
    <div class="row">


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <form action="{{ route('question_sets.store') }}" method="POST">
                        @csrf
                        <div class="form-group
                            @error('name')
                                has-error
                            @enderror">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
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
                                rows="3">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="help-block
                                    @error('description')
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
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                            </select>
                            @error('status')
                                <span class="help-block
                                    @error('status')
                                        has-error
                                    @enderror">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        <a href="{{ route('question_sets.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

@endsection
