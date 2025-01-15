@extends('layouts.sbadmin')
@section('content')
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Crops</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Active</th>
                                                <th scope="col">Actions</th>
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
                                                        {{ $activeCrop->status }}
                                                    @else
                                                        inactive
                                                    @endif
                                                    </a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('crops.show', $crop->id) }}" class="btn btn-primary">View</a>
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
