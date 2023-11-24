<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        .button-41 {

            background-color: initial;
            border-radius: 5px;
            box-shadow: rgba(0, 0, 0, 0.1) 0 2px 4px;
            color: #FFFFFF;
            cursor: pointer;
            display: inline-block;
            font-family: Inter, -apple-system, system-ui, Roboto, "Helvetica Neue", Arial, sans-serif;
            height: 100%;
            line-height: 44px;
            outline: 0;
            overflow: hidden;
            padding: 0 20px;
            pointer-events: auto;
            position: relative;
            text-align: center;
            touch-action: manipulation;
            user-select: none;
            -webkit-user-select: none;
            vertical-align: top;
            white-space: nowrap;

            z-index: 9;
            border: 0;
        }

        .GreenButton {
            background-image: linear-gradient(-180deg, #00D775, #00BD68);
        }

        .RedButton {
            background-image: linear-gradient(-180deg, #fc0303, #bd0000);

        }

        .GreenButton:hover {
            background: #00bd68;
        }

        .RedButton:hover {
            background: #bd0000;

        }

        .ag-format-container {
            width: 1142px;
            margin: 0 auto;
        }

        .ag-courses_box {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;

            padding: 50px 0;
        }

        .ag-courses_item {
            -ms-flex-preferred-size: calc(33.33333% - 30px);
            flex-basis: calc(33.33333% - 30px);

            margin: 0 15px 30px;

            overflow: hidden;

            border-radius: 28px;
        }

        .ag-courses-item_link {
            display: block;
            padding: 30px 20px;
            background-color: #121212;

            overflow: hidden;

            position: relative;
        }

        .ag-courses-item_link:hover,
        .ag-courses-item_link:hover .ag-courses-item_date {
            text-decoration: none;
            color: #FFF;
        }

        .ag-courses-item_link:hover .ag-courses-item_bg {
            -webkit-transform: scale(10);
            -ms-transform: scale(10);
            transform: scale(10);
        }

        .ag-courses-item_title {
            min-height: 87px;
            margin: 0 0 25px;

            overflow: hidden;

            font-weight: bold;
            font-size: 30px;
            color: #FFF;

            z-index: 2;
            position: relative;
        }

        .ag-courses-item_date-box {
            font-size: 18px;
            color: #FFF;

            z-index: 2;
            position: relative;
        }

        .ag-courses-item_date {
            font-weight: bold;
            color: #f9b234;

            -webkit-transition: color .5s ease;
            -o-transition: color .5s ease;
            transition: color .5s ease
        }

        .ag-courses-item_bg {
            height: 128px;
            width: 128px;
            background-color: #f9b234;

            z-index: 1;
            position: absolute;
            top: -75px;
            right: -75px;

            border-radius: 50%;

            -webkit-transition: all .5s ease;
            -o-transition: all .5s ease;
            transition: all .5s ease;
        }

        .ag-courses-item_bg {
            background-color: #3ecd5e;
        }



        @media only screen and (max-width: 979px) {
            .ag-courses_item {
                -ms-flex-preferred-size: calc(50% - 30px);
                flex-basis: calc(50% - 30px);
            }

            .ag-courses-item_title {
                font-size: 24px;
            }
        }

        @media only screen and (max-width: 767px) {
            .ag-format-container {
                width: 96%;
            }

        }

        @media only screen and (max-width: 639px) {
            .ag-courses_item {
                -ms-flex-preferred-size: 100%;
                flex-basis: 100%;
            }

            .ag-courses-item_title {
                min-height: 72px;
                line-height: 1;

                font-size: 24px;
            }

            .ag-courses-item_link {
                padding: 22px 40px;
            }

            .ag-courses-item_date-box {
                font-size: 16px;
            }
        }

        .card-img {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            height: 150px;
            width: 100%;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{url('/Dashboard')}}"><img src="{{ asset('img/logo.png') }}" width="30px" height="30px" style="border-radius: 50%;" alt="Logo"> Voucher App</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <div class="navbar-nav mx-auto">
            <p class="nav-link active">Voucher</p>
        </div>
        <div class="navbar-nav ms-auto">
            <a class="nav-link active" href="{{url('/History')}}">History</a>
        </div>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading  ">Kategori</div>
                        <?php
                        foreach ($kategori as $data) {
                        ?>
                            <a class="nav-link " href="/Dashboard/<?= $data->kategory ?>">
                                <div class=" button-41 GreenButton" style="margin-right: 4%; text-align:center; width: 70%;"><?= $data->kategory ?></div>
                                <div class=" button-41 GreenButton" style="text-align:center;width: 30%;"><?= $data->num ?></div>
                            </a>
                        <?php
                        }
                        ?>
                        <a class="nav-link " href="/Dashboard">
                            <div class=" button-41 GreenButton" style=" text-align:center; width: 100%;">Clear</div>

                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <a class="nav-link " onclick="Logout()">
                        <div class=" button-41 RedButton" style="margin-right: 4%; text-align:center; width: 100%;">Log Out</div>
                    </a>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            @yield ('container')
        </div>
    </div>
    <script>
        function Logout() {

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                }
            });
            // ID = 6
            $.ajax({
                url: "{{url('/LogOut')}}",
                type: "post",
                dataType: "json",
                success: function(Response) {
                    window.location.replace("{{url('/')}}");

                },
                error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });


        }
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>


</body>

</html>