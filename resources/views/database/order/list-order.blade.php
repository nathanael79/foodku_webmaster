@foreach ($orders as $data)
    <div class="col-md-12" id="data-order-{{$data->id}}">
        <div class="box box-primary">
            <div class="box-header with-border">                                
                <h3 class="box-title"><b>Order #{{ $data->id }}-{{ $data->tanggal }}</b></h3>
                <h4>Nama Pelanggan : <b>{{ $data->pelanggan }}</b></h4>
                <button data-id="{{ $data->id }}" style="float: right; position: absolute; right: 20px; top: 20px;" class="btn btn-danger btn-remove-order">Hapus Order</button>
            </div>
            <div class="box-body" style="padding: 10px 30px">
                <div class="row">
                    <div class="col-md-12">
                        @php
                            $pesanan = DB::table('q_ordermenu_details')->where('id_order', $data->id)->get();
                        @endphp
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Menu</th>
                                    <th>Jumlah Pesanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $ps)
                                    <tr>
                                        <td>{{ $ps->nama_menu }}</td>
                                        <td>{{ $ps->kuantitas }}</td>
                                    </tr>
                                @endforeach
                            </tbody>                                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach