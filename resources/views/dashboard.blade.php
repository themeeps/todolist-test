@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

    <div class="dashboard">
        {{-- {{ $dataTask }} --}}

        <div class="container">
            <div class="row py-4">
                <div class="text-center">
                    @if (Session::has('status'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    {{-- {{ dd($monthCount) }}
                    {{ dd($months) }} --}}

                </div>

                <div class="col-md-8">

                    {{-- {{ Auth::user() }} --}}
                    <div class="card" style="border-radius:16px;">
                        <div class="mx-2 my-2">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>

                    <div class="card" style="border-radius:16px; margin-top:1rem">
                        <form action="task-create" method="post">
                            @csrf
                            <div class="mx-3 my-3">
                                <label for="task" class="form-label">Tasking</label>
                                <input type="text" class="form-control" id="task" placeholder="Input Your Task"
                                    name="task">
                            </div>
                            <div class="mx-3 my-3">
                                <label for="due_date" class="form-label">Due Date</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="date" class="form-control" id="due_date" name="due_date">
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <button class="btn btn-primary" type="submit">Add Tasking</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="my-3 mx-3">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active"
                                        style="border-radius:7px; margin:0.5rem; border: 1px solid; color: grey"
                                        id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button"
                                        role="tab" aria-controls="nav-all" aria-selected="true">All Task</button>

                                    <button class="nav-link"
                                        style="border-radius:7px; margin:0.5rem; border: 1px solid; color: blue"
                                        id="nav-open-tab" data-bs-toggle="tab" data-bs-target="#nav-open" type="button"
                                        role="tab" aria-controls="nav-open" aria-selected="true">Open</button>

                                    <button class="nav-link"
                                        style="border-radius:7px; margin:0.5rem; border: 1px solid; color: orange"
                                        id="nav-progress-tab" data-bs-toggle="tab" data-bs-target="#nav-progress"
                                        type="button" role="tab" aria-controls="nav-progress" aria-selected="true">On
                                        progress</button>

                                    <button class="nav-link"
                                        style="border-radius:7px; margin:0.5rem; border: 1px solid; color: green"
                                        id="nav-done-tab" data-bs-toggle="tab" data-bs-target="#nav-done" type="button"
                                        role="tab" aria-controls="nav-done" aria-selected="true">Done</button>

                                    <button class="nav-link"
                                        style="border-radius:7px; margin:0.5rem; border: 1px solid; color: red"
                                        id="nav-cancel-tab" data-bs-toggle="tab" data-bs-target="#nav-cancel" type="button"
                                        role="tab" aria-controls="nav-cancel" aria-selected="true">Cancel</button>
                                </div>
                            </nav>

                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active p-3" id="nav-all" role="tabpanel"
                                    aria-labelledby="nav-all-tab">
                                    <div class="card my-3 mx-2" style="border-radius:16px">
                                        <div class="card-header text-white bg-primary"
                                            style="border-radius: 16px 16px 0px 0px">
                                            <div class="d-flex justify-content-between">
                                                <h5>
                                                    Open
                                                </h5>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                        <li><a class="dropdown-item" href="#">Another action</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Something else
                                                                here</a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Separated link</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="mx-2">
                                                @foreach ($openTask as $item)
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <a style="font-weight:500"> {{ $item->task }} </a>
                                                            <p> {{ $item->due_date }} </p>
                                                        </div>
                                                        <div class="btn-group">
                                                            <a type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="bi bi-three-dots"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Action</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Another
                                                                        action</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Something
                                                                        else
                                                                        here</a></li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Separated
                                                                        link</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card my-3 mx-2" style="border-radius:16px">
                                        <div class="card-header text-white bg-warning"
                                            style="border-radius: 16px 16px 0px 0px">
                                            <div class="d-flex justify-content-between">
                                                <h5>
                                                    On Progress
                                                </h5>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-warning dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                        <li><a class="dropdown-item" href="#">Another action</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Something else
                                                                here</a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Separated link</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="mx-2">
                                                @foreach ($progressTask as $item)
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <a style="font-weight:500"> {{ $item->task }} </a>
                                                            <p> {{ $item->due_date }} </p>
                                                        </div>
                                                        <div class="btn-group">
                                                            <a type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="bi bi-three-dots"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Action</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Another
                                                                        action</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Something
                                                                        else
                                                                        here</a></li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Separated
                                                                        link</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card my-3 mx-2" style="border-radius:16px">
                                        <div class="card-header text-white bg-success"
                                            style="border-radius: 16px 16px 0px 0px">
                                            <div class="d-flex justify-content-between">
                                                <h5>
                                                    Done
                                                </h5>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                        <li><a class="dropdown-item" href="#">Another action</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Something else
                                                                here</a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Separated link</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="mx-2">
                                                @foreach ($doneTask as $item)
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <a style="font-weight:500"> {{ $item->task }} </a>
                                                            <p> {{ $item->due_date }} </p>
                                                        </div>
                                                        <div class="btn-group">
                                                            <a type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="bi bi-three-dots"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Action</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Another
                                                                        action</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Something
                                                                        else
                                                                        here</a></li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Separated
                                                                        link</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card my-3 mx-2" style="border-radius:16px">
                                        <div class="card-header text-white bg-danger"
                                            style="border-radius: 16px 16px 0px 0px">
                                            <div class="d-flex justify-content-between">
                                                <h5>
                                                    Cancel
                                                </h5>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                        <li><a class="dropdown-item" href="#">Another action</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Something else
                                                                here</a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Separated link</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="mx-2">
                                                @foreach ($cancelTask as $item)
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <a style="font-weight:500"> {{ $item->task }} </a>
                                                            <p> {{ $item->due_date }} </p>
                                                        </div>
                                                        <div class="btn-group">
                                                            <a type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="bi bi-three-dots"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Action</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Another
                                                                        action</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Something
                                                                        else
                                                                        here</a></li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Separated
                                                                        link</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    {{-- @foreach ($taskList as $item)
                                            <div class="card my-3">
                                                <div class="card-header {{ $item->status == 'done' ? 'bg-success' : '' }}">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            {{ $item->task }}
                                                        </div>
                                                        <div>
                                                            {{ $item->status }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p>{{ $item->due_date }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6 text-end">
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                                <button type="button" class="btn btn-success btn-sm">
                                                                    <i class="bi bi-info"></i></button>
                                                                <button type="button" class="btn btn-warning btn-sm"
                                                                    data-bs-toggle="modal" data-bs-target="#editModal">
                                                                    <i class="bi bi-pencil"></i></button>
                                                                <button type="button" class="btn btn-danger btn-sm">
                                                                    <i class="bo bi-trash"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @include('tasks.modal-edit')
                                        @endforeach --}}
                                </div>

                                <div class="tab-pane fade p-3" id="nav-open" role="tabpanel"
                                    aria-labelledby="nav-open-tab">
                                    <div class="card my-2 mx-2" style="border-radius:16px">
                                        <div class="card-header text-white bg-primary"
                                            style="border-radius: 16px 16px 0px 0px">
                                            <div class="d-flex justify-content-between">
                                                <h5>
                                                    Open
                                                </h5>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                        <li><a class="dropdown-item" href="#">Another action</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Something else
                                                                here</a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Separated link</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="mx-2">
                                                @foreach ($openTask as $item)
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <a style="font-weight:500"> {{ $item->task }} </a>
                                                            <p> {{ $item->due_date }} </p>
                                                        </div>
                                                        <div class="btn-group">
                                                            <a type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="bi bi-three-dots"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Action</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Another
                                                                        action</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Something
                                                                        else
                                                                        here</a></li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Separated
                                                                        link</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade p-3" id="nav-progress" role="tabpanel"
                                    aria-labelledby="nav-progress-tab">
                                    <div class="card my-3 mx-2" style="border-radius:16px">
                                        <div class="card-header text-white bg-warning"
                                            style="border-radius: 16px 16px 0px 0px">
                                            <div class="d-flex justify-content-between">
                                                <h5>
                                                    On Progress
                                                </h5>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-warning dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                        <li><a class="dropdown-item" href="#">Another action</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Something else
                                                                here</a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Separated link</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="mx-2">
                                                @foreach ($progressTask as $item)
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <a style="font-weight:500"> {{ $item->task }} </a>
                                                            <p> {{ $item->due_date }} </p>
                                                        </div>
                                                        <div class="btn-group">
                                                            <a type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="bi bi-three-dots"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Action</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Another
                                                                        action</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Something
                                                                        else
                                                                        here</a></li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Separated
                                                                        link</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade p-3" id="nav-done" role="tabpanel"
                                    aria-labelledby="nav-done-tab">
                                    <div class="card my-3 mx-2" style="border-radius:16px">
                                        <div class="card-header text-white bg-success"
                                            style="border-radius: 16px 16px 0px 0px">
                                            <div class="d-flex justify-content-between">
                                                <h5>
                                                    Done
                                                </h5>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                        <li><a class="dropdown-item" href="#">Another action</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Something else
                                                                here</a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Separated link</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="mx-2">
                                                @foreach ($doneTask as $item)
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <a style="font-weight:500"> {{ $item->task }} </a>
                                                            <p> {{ $item->due_date }} </p>
                                                        </div>
                                                        <div class="btn-group">
                                                            <a type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="bi bi-three-dots"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Action</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Another
                                                                        action</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Something
                                                                        else
                                                                        here</a></li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Separated
                                                                        link</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade p-3" id="nav-cancel" role="tabpanel"
                                    aria-labelledby="nav-cancel-tab">
                                    <div class="card my-3 mx-2" style="border-radius:16px">
                                        <div class="card-header text-white bg-danger"
                                            style="border-radius: 16px 16px 0px 0px">
                                            <div class="d-flex justify-content-between">
                                                <h5>
                                                    Canceled
                                                </h5>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                        <li><a class="dropdown-item" href="#">Another action</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Something else
                                                                here</a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Separated link</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="mx-2">
                                                @foreach ($cancelTask as $item)
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <a style="font-weight:500"> {{ $item->task }} </a>
                                                            <p> {{ $item->due_date }} </p>
                                                        </div>
                                                        <div class="btn-group">
                                                            <a type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="bi bi-three-dots"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Action</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Another
                                                                        action</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Something
                                                                        else
                                                                        here</a></li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Separated
                                                                        link</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" style="">
                    <div class="card" style="width: 18rem; border-radius: 16px 16px 5px 5px;">
                        <div class="card-body"
                            style=" border-radius: 16px 16px 0px 0px; background-color: #2E5DD6; text-align:center;">
                            <img style="background-color: white; border-radius:1rem" src="assets/images/clock.png"
                                alt="">
                            <h5 class="card-title text-white">10:50:20</h5>
                            <p class="card-text text-white">{{ $waktuSholat->data->jadwal->tanggal }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item list-group-item-primary">
                                <div class="d-flex justify-content-between">
                                    <span>
                                        Subuh :
                                    </span>
                                    <span>
                                        {{ $waktuSholat->data->jadwal->subuh }}
                                    </span>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-danger">
                                <div class="d-flex justify-content-between">
                                    <span>
                                        Dzuhur :
                                    </span>
                                    <span>
                                        {{ $waktuSholat->data->jadwal->dzuhur }}
                                    </span>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-primary">
                                <div class="d-flex justify-content-between">
                                    <span>
                                        Ashar :
                                    </span>
                                    <span>
                                        {{ $waktuSholat->data->jadwal->ashar }}
                                    </span>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-danger">
                                <div class="d-flex justify-content-between">
                                    <span>
                                        Maghrib :
                                    </span>
                                    <span>
                                        {{ $waktuSholat->data->jadwal->maghrib }}
                                    </span>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-primary">
                                <div class="d-flex justify-content-between">
                                    <span>
                                        Isya :
                                    </span>
                                    <span>
                                        {{ $waktuSholat->data->jadwal->isya }}
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
