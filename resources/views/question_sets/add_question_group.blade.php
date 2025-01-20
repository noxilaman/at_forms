@extends('layouts.sbadmin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $questionSet->name }} | {{ $questionSet->status == 'active' ? __('Active') : __('Inactive') }}</h1>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-primary shadow h-100 py-2">
                <h2 class="h3 pl-2 mb-0 text-gray-800">{{ __('Add Question List') }}</h2>
                <div class="card-body">
                    <form action="{{ route('question_sets.storequestiongroup',$questionSet->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="question">{{ __('Question') }}</label>
                            <select class="form-control" id="question_group_id" name="question_group_id" required>
                                <option value="">{{ __('==Select==') }}</option>
                                @foreach($questionGroupList as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Add Question Group') }}</button>
                        <a href="{{ route('question_sets.show', $questionSet->id) }}" class="btn btn-secondary">{{ __('Back') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
