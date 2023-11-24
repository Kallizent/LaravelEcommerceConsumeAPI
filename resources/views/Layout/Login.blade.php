<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="" />
    <title>Login</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="Username" type="text" placeholder="username" />
                                            <label for="Username">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="Password" type="password" placeholder="Password" />
                                            <label for="Password">Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="btn btn-primary" style="width: 100%;" href="#" onclick="login()">Login</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="{{url('/Register')}}">Register</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
    <script>
        function login() {
            error = false;
            if ($.trim($("#Username").val()) == "") {
                alert("Username tidak boleh kosong");
                error = true;
            }
            if ($.trim($("#Password").val()) == "") {
                alert("password tidak boleh kosong");
                error = true;
            }
            $username = $('#Username').val();
            $password = $('#Password').val();
            // $.trim($("#UploadFile").val())
            if (!error) {

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // ID = 6
                $.ajax({
                    url: "{{url('/CheckLogin')}}",
                    type: "post",
                    data: {
                        username: $username,
                        password: $password
                    },
                    dataType: "json",
                    success: function(Response) {
                        if (Response.status == "success") {

                            // location.reload()
                            window.location.replace("{{url('/Dashboard')}}");
                        } else {
                            alert(Response.message);

                        }

                    },
                    error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.Message);
                    }
                });


            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>