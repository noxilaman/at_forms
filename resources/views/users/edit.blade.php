@extends('layouts.sbadmin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User Edit</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group
                            @error('name')
                                has-error
                            @enderror">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                            @error('name')
                                <span class="help-block
                                    @error('name')
                                        has-error
                                    @enderror">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('username')
                                has-error
                            @enderror">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}" required>
                            @error('username')
                                <span class="help-block
                                    @error('username')
                                        has-error
                                    @enderror">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('email')
                                has-error
                            @enderror">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <span class="help-block
                                    @error('email')
                                        has-error
                                    @enderror">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('password')
                                has-error
                            @enderror">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" autocomplete="new-password">
                            @error('password')
                                <span class="help-block
                                    @error('password')
                                        has-error
                                    @enderror">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('password_confirmation')
                                has-error
                            @enderror">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" autocomplete="new-password">
                            @error('password_confirmation')
                                <span class="help-block
                                    @error('password_confirmation')
                                        has-error
                                    @enderror">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group
                            @error('groupname')
                                has-error
                            @enderror">
                            <label for="groupname">Group Name</label>
                            <select class="form-control" id="groupname" name="groupname">
                                <option value="admin" {{ old('groupname', $user->groupname) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ old('groupname', $user->groupname) == 'user' ? 'selected' : '' }}>User</option>
                            </select>
                            @error('groupname')
                                <span class="help-block
                                    @error('groupname')
                                        has-error
                                    @enderror">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->
@endsection
