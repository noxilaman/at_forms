@extends('layouts.sbadmin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Mechanic Management') }}</h1>
        <a href="{{ route('mechanics.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Status') }}</th>
                                <th scope="col">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mechanics as $mechanic)
                                <tr>
                                    <th scope="row">{{ $mechanic->id }}</th>
                                    <td>{{ $mechanic->name }}</td>
                                    <td>{{ __($mechanic->status) }}</td>
                                    <td>
                                        <a href="{{ route('mechanics.edit', $mechanic->id) }}"
                                            class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
                                        <form action="{{ route('mechanics.destroy', $mechanic->id) }}" method="POST"
                                            style="display: inline" onsubmit="return confirm('{{ __('Are you sure you want to delete this mechanic?') }}');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                    </table>
                    {{ $mechanics->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

@endsection
