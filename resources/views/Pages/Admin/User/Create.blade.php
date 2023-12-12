@extends('Layouts.AppLayout')
@section('Pages')
    <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="/user" class="btn btn-outline-primary me-3">
            <span data-feather="arrow-left" class="align-text-center"></span>
        </a>
        <h1 class="h2">{{ $title }}</h1>
    </div>
    <div class="row ">
        <div class="col-12 col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="/user" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                autofocus required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">Complete Address</label>
                            <input type="text" name="address" id="address"
                                class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-select @error('role') is-invalid @enderror"
                                required>
                                <option selected disabled hidden>Select Role...</option>
                                <option @if (old('role') == 'admin') selected @endif value="admin">Admin</option>
                                <option @if (old('role') == 'doctor') selected @endif value="doctor">Doctor</option>
                                <option @if (old('role') == 'patient') selected @endif value="patient">Patient</option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror"
                                required>
                                <option selected disabled hidden>Select Gender...</option>
                                <option @if (old('gender') == 'M') selected @endif value="M">Male</option>
                                <option @if (old('gender') == 'F') selected @endif value="F">Female</option>
                                <option @if (old('gender') == 'L') selected @endif value="L">Lesbian</option>
                                <option @if (old('gender') == 'G') selected @endif value="G">Gay</option>
                                <option @if (old('gender') == 'B') selected @endif value="B">Bisexual</option>
                                <option @if (old('gender') == 'T') selected @endif value="T">Transgender
                                </option>
                                <option @if (old('gender') == 'N') selected @endif value="N">User Privacy
                                </option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-success">
                                <span data-feather="save" class="align-text-bottom"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
