@extends('master')

@section('content')
    <main class="py-3 bg-light">
        <div class="container">
            <h1>List Hewan</h1>
            <hr>
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="mb-3">
                        <a href="{{ route('hewan.create') }}" class="btn btn-primary">Add New</a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table align-middle">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th></th>
                                            <th>Jenis Hewan</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $hewan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset('storage/images/' . $hewan->gambar) }}"
                                                        alt="" width="150" class="rounded"></td>
                                                <td>{{ $hewan->jenis_hewan }}</td>
                                                <td>{{ $hewan->jenis_kelamin }}</td>
                                                <td>Rp{{ $hewan->harga }}</td>
                                                <td>
                                                    <a href="{{ route('hewan.show', ['hewan' => $hewan->id]) }}"
                                                        class="btn btn-sm btn-warning mb-3">Edit</a>
                                                    <form class="d-inline-block delete-hewan"
                                                        action="{{ route('hewan.destroy', ['hewan' => $hewan->id]) }}"
                                                        method="POST" id="deleteForm_{{ $hewan->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger mb-3 deleteButton"
                                                            data-hewan-id="{{ $hewan->id }}">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
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

    @if (session('message'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire("{{ session('message') }}", '', 'success');
            });
        </script>
    @endif
@endsection
