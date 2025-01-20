@extends('layouts.sbadmin')
@section('content')
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{ __('Crop Management') }}</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-12 mb-12">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">{{ __('ID') }}</th>
                                                <th scope="col">{{ __('Name') }}</th>
                                                <th scope="col">{{ __('Description') }}</th>
                                                <th scope="col">{{ __('Status') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($crops as $crop)
                                                <tr>
                                                    <th scope="row">{{ $crop->id }}</th>
                                                    <td>{{ $crop->name }}</td>
                                                    <td>{{ $crop->details }}</td>
                                                    <td>
                                                        <a href="{{ route('crops.activate', $crop->id) }}"
                                                            class="btn btn-primary">
                                                        @if ($activeCrop->crop_id == $crop->id)
                                                        {{ __('Active') }}
                                                    @else
                                                        {{ __('Inactive') }}
                                                    @endif
                                                    </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                    </table>
                                    {{ $crops->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    @endsection
