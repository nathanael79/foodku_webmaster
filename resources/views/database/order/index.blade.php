@extends('adminlte::page')

@section('title', 'Order List Webmaster')

@section('content')
    <div class="content">
        <section class="content-header">
            <h1>
                Order<br>
                <small style="padding-left: 0">Daftar semua order yang ada</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="<?= url('dashboard')?>">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-file-text-o"></i> Order
                    </a>
                </li>
            </ol>
        </section>

        <section class="content container-fluid main-content-container">
            <div class="row" id="loading" style="display: none">
                <div class="col-md-12 text-center" style="height: 40px">
                    <i class="fa fa-refresh fa-spin" style="font-size: 20px"></i>
                </div>
            </div>
            <div class="row" id="order-container">
                
            </div>
        </section>
    </div>

    <script type="text/javascript">

        $(document).on('click', '.btn-remove-order', function() {
            const dis = $(this);
            $.ajax({
                url: '/database/order/delete',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    id: $(this).attr('data-id')
                },
                success: function(res){
                    console.log("Order berhasil diubah menjadi selesai");
                    dis.parent().parent().parent().fadeOut(300, function(){ $(this).remove();});
                }
            });
        });

        function fetch_data(){
            $('#loading').show();
            setInterval(function(){
                $.ajax({
                    url: '/database/order/fetch_data',
                    type: 'GET',
                    dataType: 'html',                
                    success: function(res){
                        $('#order-container').html(res);
                        $('#loading').hide();
                    }
                });
            }, 1000);
        }

        fetch_data();

        setInterval(function(){
            fetch_data();
        }, 10000);

    </script>

@endsection