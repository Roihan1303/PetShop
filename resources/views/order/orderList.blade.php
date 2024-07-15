@extends('master')

@section('content')
    <main class="py-3 bg-light">
        <div class="container">
            <h1>List Order</h1>
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
                                            <th>Nama Pembeli</th>
                                            <th>Jenis Hewan</th>
                                            <th>Jenis Kelamin</th>
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
                                                <td>{{ $order->users->name }}</td>
                                                <td>{{ $order->hewan->jenis_hewan }}</td>
                                                <td>{{ $order->hewan->jenis_kelamin }}</td>
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
    <script>
        $(document).ready(function() {
            // DataTable Initialization
            $('.table').DataTable();

            // Delete Button On Click
            $('.delete-hewan button.deleteButton').click((e) => {
                e.preventDefault();

                const hewanId = $(e.target).data('hewan-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(`#deleteForm_${hewanId}`).submit();
                    }
                });
            });
        });
    </script>
@endsection
