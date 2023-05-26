@extends('layouts.main')

@section('title', 'Task')

@section('content')
    <div class="task">
        <x-status />

        <div class="input-group my-3">
            <input type="text" class="form-control" placeholder="Find task.." id="key">
            {{-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#taskModal" id="button-add"><i
                    class="bi bi-plus"></i> Add</button> --}}
        </div>

        @include('tasks.modal-add')


        <div class="list my-3" id="container-list">
            @foreach ($doneTask as $item)
                <div class="card">
                    <div class="card-header bg-success">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{ $item->title }}
                            </div>
                            <div>
                                {{ $item->status }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p>{{ $item->description }}
                                </p>
                            </div>
                            <div class="col-md-6 text-end">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-success btn-sm">
                                        <i class="bi bi-info"></i></button>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editModal">
                                        <i class="bi bi-pencil"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm">
                                        <i class="bo bi-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('tasks.modal-edit')
            @endforeach
        </div>

    </div>
@endsection
