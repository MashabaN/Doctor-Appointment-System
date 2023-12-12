@extends('Layouts.AppLayout')

@section('Pages')
    <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="/appointment" class="btn btn-outline-primary me-3">
            <span data-feather="arrow-left" class="align-text-center"></span>
        </a>
        <h1 class="h2">{{ $title }}</h1>
    </div>
    <div class="row ">
        <div class="col-12 col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form id="complaintForm" action="/complaint/{{ $complaint->id }}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="form-group mb-3">
                            <label for="concerns">Complaint</label>
                            <textarea required name="concerns" id="concerns" class="form-control @error('concerns') is-invalid @enderror"
                                      cols="30" rows="5" autofocus>{{ old('concerns', $complaint->concerns) }}</textarea>
                            @error('concerns')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="symptoms">Symptoms</label>
                            <textarea name="symptoms" id="symptoms" class="form-control @error('symptoms') is-invalid @enderror"
                                      cols="30" rows="5">{{ old('symptoms', $complaint->symptoms) }}</textarea>
                            @error('symptoms')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Add new textboxes for updating data on Enter key press -->
                        <div class="form-group mb-3">
                            <label for="updateConcern">Update Concern</label>
                            <input type="text" id="updateConcern" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="updateSymptoms">Update Symptoms</label>
                            <input type="text" id="updateSymptoms" class="form-control">
                        </div>

                        <div class="text-center">
                            <button type="button" onclick="updateComplaint()" class="btn btn-outline-warning">
                                <span data-feather="save" class="align-text-bottom"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        // Function to update complaint on Enter key press
        function updateComplaint() {
            // Set values from textboxes to corresponding textarea fields
            $('#concerns').val($('#updateConcern').val());
            $('#symptoms').val($('#updateSymptoms').val());

            // Submit the form
            $('#complaintForm').submit();
        }
    </script>
@endsection
