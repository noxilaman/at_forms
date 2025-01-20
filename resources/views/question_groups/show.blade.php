@extends('layouts.sbadmin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $questionGroup->name }} | {{ __($questionGroup->status) }}</h1>
        <a href="{{ route('question_groups.index') }}" class="btn btn-secondary btn-sm">{{ __('Back') }}</a>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-primary shadow h-100 py-2">
            <h2 class="h3 pl-2 mb-0 text-gray-800">{{ __('Question List') }}</h2>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ __(session('success')) }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ __(session('error')) }}
                    </div>
                @endif
                <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('Question') }}</th>
                    <th scope="col">
                        <a href="{{ route('question_groups.addquestion', $questionGroup->id) }}"
                        class="btn btn-primary btn-sm">{{ __('Add Question') }}</a>
                    </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questionGroup->questionGroupDetails()->orderBy('sequence','asc')->get() as $questionGroupDetail)
                    <tr>
                        <th scope="row">{{ $questionGroupDetail->sequence }}</th>
                        <td>{{ $questionGroupDetail->question->question }}</td>
                        <td>
                        @if($questionGroupDetail->sequence != 1)
                        <a href="{{ route('question_groups.moveup_question', $questionGroupDetail->id) }}"
                            class="btn btn-primary btn-sm">{{ __('Move Up') }}</a>
                        @endif
                        @if ($questionGroupDetail->sequence != $questionGroup->questionGroupDetails()->count())
                            <a href="{{ route('question_groups.movedown_question', $questionGroupDetail->id) }}"
                            class="btn btn-info btn-sm">{{ __('Move Down') }}</a>
                        @endif
                        <a href="{{ route('question_groups.remove_question',  $questionGroupDetail->id) }}"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('{{ __('Are you sure you want to delete this question?') }}');">{{ __('Remove') }}</a>
                        </td>
                    </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
