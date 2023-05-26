<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    {{-- Icon --}}
    {{-- <script src="https://unpkg.com/feather-icons"></script> --}}

    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="login-page vh-100 d-flex justify-content-center align-items-center"
        style="background-image: url('{{ asset('assets/images/frame 767.png') }}');">

        <div class="card">

            <div class="card-header text-center">
                <h2>Log In</h2>

                @if (Session::has('status'))
                    <div class="alert alert-warning" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
            </div>


            <div class="card-body">

                <form action="" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com"
                            name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Input Your Password"
                            name="password" required>
                    </div>
                    <div class="pb-4">
                        <div class="form-check d-flex justify-content-between">
                            <div>
                                <input type="checkbox" class="form-check-input" id="Check">
                                <label class="form-check-label" for="Check">
                                    Remember me
                                </label>
                            </div>
                            <div>
                                <a href="">Forgot Password?</a>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="button-login btn btn-primary">Sign In</button>
                </form>

                <div class="my-3 text-center">
                    <label>Do you have an account ?<a href="/register">Sign Up</a></label>
                </div>

                {{-- <div class="mx-3 my-2">
                    @if (Session::has('status'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                </div> --}}
            </div>

        </div>
    </div>


    {{-- Javascript --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    {{-- Icon Javascript --}}
    {{-- <script>
        feather.replace()
    </script> --}}

</body>

</html>

<style>
    .login-page {
        background-color: #ecf1ff;
    }

    .card {
        width: 85%;
        border-radius: 20px;
    }

    @media (min-width: 768px) {
        .card {
            width: 35%;
        }
    }


    .button-login {
        width: -webkit-fill-available;
        border-radius: 12px;
    }
</style>
