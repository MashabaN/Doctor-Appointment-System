@extends('Layouts.AppLayout')
@section('Pages')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
        <a href="/medicalHistory/create" class="btn btn-outline-success">
            <span data-feather="plus" class="align-text-center"></span>
        </a>
    </div>
    <div class="table">
        <table class="table table-striped table-sm align-middle">
            <thead>
                <tr>
                    <th class="text-center" scope="col">No.</th>
                    <th class="text-center" scope="col">Condition</th>
                    <th class="text-center" scope="col">Surgeries</th>
                    <th class="text-center" scope="col">Medication</th>
                    <th class="text-center" scope="col">Formation</th>
                    <th class="text-center" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @if ($medicalHistories !== null && $medicalHistories->count() > 0)
                    @foreach ($medicalHistories as $medicalHistory)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}.</td>
                            <td>{{ $medicalHistory->condition }}</td>
                            <td>{{ $medicalHistory->surgeries }}</td>
                            <td>{{ $medicalHistory->medication }}</td>
                            <td class="text-center">
                                {{ $medicalHistory->created_at->locale('en_US')->isoFormat('dddd, D MMMM Y D\a\t\e HH:m:s') }}
                            </td>
                            <td class="text-end">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item"
                                                href="/medicalHistory/{{ $medicalHistory->id }}/edit">
                                                <span data-feather="edit-2" class="align-text-center"></span> Change
                                            </a>
                                        </li>
                                        <li>
                                            <form action="/medicalHistory/{{ $medicalHistory->id }}" method="POST"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button
                                                    onclick="return confirm('Are You Sure You Want to Take This Action?')"
                                                    class="dropdown-item">
                                                    <span data-feather="trash"></span> Delete
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="5">You Don't Have a Medical History Yet.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
