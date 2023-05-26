<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

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
                <h2>Registration</h2>

                @if (Session::has('status'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
            </div>


            <div class="card-body">

                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Input Your Full Name"
                            name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="example@gmail.com"
                            name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="email" placeholder="+628XXXXXXXXXX"
                            name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Input Your Password"
                            name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password"
                            placeholder="Input Your Password" name="confirm_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="image_req" class="form-label">Upload Image</label>
                        <input class="form-control" type="file" id="image_req" name="image_req">
                    </div>
                    <div class="mb-3">
                        <label for="file_req" class="form-label">Upload CV</label>
                        <input class="form-control" type="file" id="file_req" name="file_req">
                    </div>

                    <button type="submit" class="button-login btn btn-primary">Sign Up</button>
                </form>

                <div class="my-3 text-center">
                    <label>Already have an account ?<a href="/">Sign In</a></label>
                </div>

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
