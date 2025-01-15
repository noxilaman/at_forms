@extends('layouts.sbadmin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Farmer</h1>
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
                                <th scope="col">ID</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($farmers as $farmer)
                                <tr>
                                    <th scope="row">{{ $farmer->id }}</th>
                                    <td>{{ $farmer->fname }} {{ $farmer->lname }}</td>
                                    <td>{{ $farmer->citizenid }}</td>
                                    <td>
                                        <a href="{{ route('farmers.show', $farmer->id) }}" class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                            @endforeach

                    </table>
                    {{ $farmers->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
@endsection
