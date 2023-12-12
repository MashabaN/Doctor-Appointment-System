@extends('Layouts.AppLayout')
@section('Pages')
    <div class="d-flex justify-content-start flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="/" class="btn btn-outline-primary me-3">
            <span data-feather="chevron-left" class="align-text-center"></span>
        </a>
        <h1 class="h2">{{ $title }}</h1>
    </div>
    <div class="card mx-auto" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ \Carbon\Carbon::parse($diagnose->appointment->date)->locale('en_US')->isoFormat('dddd, d MMMM Y') }}
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">Doctor's Name: {{ $diagnose->doctor->name }}</h6>
            <p class="card-text">Diagnosis : {{ $diagnose->diagnosis }}</p>
            <p class="card-text">Prescription : {{ $diagnose->prescription }}</p>

            <!-- Add diagnosis text bar -->
            <form action="/diagnose/{{ $diagnose->id }}" method="POST" class="mt-3">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="new_diagnosis" class="form-label">Add Diagnosis</label>
                    <input type="text" class="form-control @error('new_diagnosis') is-invalid @enderror" id="new_diagnosis" name="new_diagnosis" value="{{ old('new_diagnosis') }}">
                    @error('new_diagnosis')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-warning">Add Diagnosis</button>
            </form>
        </div>
    </div>
@endsection

