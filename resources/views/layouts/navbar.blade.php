<nav class="navbar navbar-expand-lg navbar">
    <div class="container">
        {{-- <a class="navbar-brand" href="/dashboard">Todolist</a> --}}
        {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> --}}
        <div class="ms-auto">
            {{-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/task">
                        Task
                        {{ Auth::user() }}
                    </a>
                </li>
            </ul> --}}
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle signin-button" id="navbarDropdown"
                        data-bs-toggle="dropdown">{{ Auth::user()->name }}&nbsp;&nbsp;
                        <img src="{{ asset('storage/image_req/' . Auth::user()->image) }}"
                            style="
                            vertical-align: middle;
                            width: 50px;
                            height: 50px;
                            border-radius: 50%;
                          "
                            class="avatar">
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/logout" class="dropdown-item">Sign Out</a>
                            <a href="#" class="dropdown-item">Help</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
