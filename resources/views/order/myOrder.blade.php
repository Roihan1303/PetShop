@extends('master')

@section('content')
    <main class="py-3 bg-light">
        <div class="container">
            <h1>My Order</h1>
            <hr>
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table align-middle">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th></th>
                                            <th>Jenis Hewan</th>
                                            <th>Alamat</th>
                                            <th>Pembayaran</th>
                                            <th>Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataOrder as $order)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset('storage/images/' . $order->hewan->gambar) }}"
                                                        alt="" width="150" class="rounded"></td>
                                                <td>{{ $order->hewan->jenis_hewan }}</td>
                                                <td>{{ $order->alamat }}</td>
                                                <td>{{ $order->pembayaran }}</td>
                                                <td>Rp{{ $order->total_harga }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('assets/js/datatables.min.js') }}"></script>
@endsection
