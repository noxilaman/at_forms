@extends('layouts.sbadmin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Harvester Maintain') }}</h1>
        <a href="{{ route('maintains.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-file fa-sm text-white-50"></i> {{ __('Create') }}</a>
    </div>

    <!-- Content Row -->
    <div class="row">


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ __(session('success')) }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ __(session('error')) }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('ID') }}</th>
                                <th scope="col">{{ __('Maintain Date') }}</th>
                                <th scope="col">{{ __('Harvester') }} / {{ __('Driver') }}</th>
                                <th scope="col">{{ __('Status') }}</th>
                                <th scope="col">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($maintains as $maintain)
                                <tr>
                                    <th scope="row">{{ $maintain->id }}</th>
                                    <td>{{ $maintain->maintain_date }}</td>
                                    <td>{{ $maintain->harvester->name }} / {{ $maintain->driver->name }}</td>
                                    <td>{{ __($maintain->status) }}</td>
                                    <td>
                                        <a href="{{ route('maintains.survey', $maintain->id) }}"
                                            class="btn btn-secondary btn-sm">{{ __('Survey') }}</a>
                                        <a href="{{ route('maintains.edit', $maintain->id) }}"
                                            class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
                                        <a href="{{ route('maintains.show', $maintain->id) }}" class="btn btn-info btn-sm">{{ __('View') }}</a>
                                        <form action="{{ route('maintains.destroy', $maintain->id) }}" method="POST"
                                            style="display: inline" onsubmit="return confirm('{{ __('Are you sure you want to delete this Hrvester Maintain?') }}');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                    </table>
                    {{ $maintains->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

@endsection
