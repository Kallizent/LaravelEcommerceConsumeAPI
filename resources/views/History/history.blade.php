@extends('layout.mainRightSide')
@section('container')
<main style="position:sticky; float:left">
    <div class="container-fluid px-4">
        <h1 class="mt-4">History</h1>
        <!-- <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol> -->

        <div class="row">

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Voucher List
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Tanggal Claim</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($voucher as $data) {
                            ?>
                                <tr>
                                    <td><?= $data->nama ?></td>
                                    <td><?= $data->tanggal_claim ?></td>
                                    <td>
                                        <a class="nav-link " onclick="Remove(<?= $data->id ?>)">
                                            <div class=" button-41 GreenButton" style=" text-align:center; width: 100%;">Remove</div>
                                        </a>
                                    </td>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <script>
            function Remove(id) {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // ID = 6
                $.ajax({
                    url: "{{url('/HistoryRemove')}}",
                    type: "post",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(Response) {
                        if (Response.status) {

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
        </script>
        <script src="{{asset('js/datatables-simple-demo.js')}}"></script>
</main>
@endsection