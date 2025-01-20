@extends('layouts.sbadmin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Mechanic Edit #:id', ['id' => $mechanic->id]) }}</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <form action="{{ route('mechanics.update', $mechanic->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group
                            @error('name')
                                has-error
                            @enderror">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $mechanic->name) }}">
                            @error('name')
                                <span class="help-block
                                    @error('name')
                                        has-error
                                    @enderror">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group
                            @error('nickname')
                                has-error
                            @enderror">
                            <label for="nickname">{{ __('Nickname') }}</label>
                            <input type="text" class="form-control" id="nickname" name="nickname" value="{{ old('nickname', $mechanic->nickname) }}">
                            @error('nickname')
                                <span class="help-block
                                    @error('nickname')
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
                                rows="3">{{ old('description', $mechanic->description) }}</textarea>
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
                                <option value="active" {{ old('status', $mechanic->status) == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                <option value="inactive" {{ old('status', $mechanic->status) == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                            </select>
                            @error('status')
                                <span class="help-block
                                    @error('status')
                                        has-error
                                    @enderror">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        <a href="{{ route('mechanics.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

@endsection
