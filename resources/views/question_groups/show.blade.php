@extends('layouts.sbadmin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $questionGroup->name }} | {{ $questionGroup->status == 'active' ? 'Active' : 'Inactive' }}</h1>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-primary shadow h-100 py-2">
                <h2 class="h3 pl-2 mb-0 text-gray-800">Question List</h2>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Question</th>
                                <th scope="col">
                                    <a href="{{ route('question_groups.addquestion', $questionGroup->id) }}"
                                        class="btn btn-primary btn-sm">Add Question</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questionGroup->questionGroupDetails()->orderBy('sequence','asc')->get() as $questionGroupDetail)
                                <tr>
                                    <th scope="row">{{ $questionGroupDetail->question->id }}</th>
                                    <td>{{ $questionGroupDetail->question->question }}</td>
                                    <td>
                                        <a href="{{ route('questions.show', $questionGroupDetail->question->id) }}"
                                            class="btn btn-info btn-sm">Manage</a>
                                        <a href="{{ route('questions.edit', $questionGroupDetail->question->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('questions.destroy', $questionGroupDetail->question->id) }}" method="POST"
                                            style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
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
