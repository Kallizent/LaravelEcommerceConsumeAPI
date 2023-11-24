@extends('layout.main')
@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <!-- <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol> -->

        <div class="row">

            <?php
            foreach ($voucher as $inData) {
            ?>
                <div class="col-xl-4 col-md-6">

                    <div class="ag-courses_item" style="background-color: #121212;">

                        <div class="ag-courses-item_link">
                            <div class="card-img" style="background-image:url('<?= asset('img/' . $inData->foto) ?>')"></div>
                            <div class="ag-courses-item_bg"></div>
                        </div>
                        <div class="ag-courses-item_date-box">
                            <?= $inData->nama ?>

                        </div>
                        <div class="ag-courses-item_date-box">
                            Kategori:
                            <span class="ag-courses-item_date">
                                <?= $inData->kategori ?>
                            </span>

                        </div>
                        <!-- href="/ClaimVoucherUpdate/<?= $inData->id ?>" -->
                        <a class="button-41 GreenButton" onclick="Claim(<?= $inData->id ?>)" style="float: right;">Claim</a>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>

    </div>
    <script>
        function Claim(id) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                }
            });
            // ID = 6
            $.ajax({
                url: "{{url('/ClaimVoucherUpdate')}}",
                type: "post",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(Response) {
                    if (Response.status) {
                        alert(Response.message);
                        location.reload()
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
</main>
@endsection