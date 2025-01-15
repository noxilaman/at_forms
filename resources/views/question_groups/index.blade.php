@extends('layouts.sbadmin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Question Group</h1>
        <a href="{{ route('question_groups.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-file fa-sm text-white-50"></i> Create</a>
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
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questionGroups as $questionGroup)
                                <tr>
                                    <th scope="row">{{ $questionGroup->id }}</th>
                                    <td>{{ $questionGroup->name }}</td>
                                    <td>{{ $questionGroup->status }}</td>
                                    <td>
                                        <a href="{{ route('question_groups.show', $questionGroup->id) }}"
                                            class="btn btn-info btn-sm">Manage</a>
                                        <a href="{{ route('question_groups.edit', $questionGroup->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('question_groups.destroy', $questionGroup->id) }}" method="POST"
                                            style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                    </table>
                    {{ $questionGroups->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

@endsection
