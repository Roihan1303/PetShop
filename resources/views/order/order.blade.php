@extends('master')
@section('content')
    <main class="py-3 bg-light">
        <div class="container">
            <h1>Order</h1>
            <hr>
            <form action="{{ route('order.store', ['hewan' => $hewan->id]) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-8 mb-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-lg-3 mb-3 m-md-0">
                                        <img src="{{ asset('storage/images/' . $hewan->gambar) }}" alt=""
                                            class="img-fluid rounded">
                                    </div>
                                    <div class="col">
                                        <h3 class="m-0">{{ $hewan->jenis_hewan }}</h3>
                                        <h5>{{ $hewan->jenis_kelamin }}</h5>
                                        <p>Rp. {{ $hewan->harga }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md mb-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h3>Shipping</h3>
                                <hr>
                                <div class="mb-3">
                                    <label for="alamat">Address</label>
                                    <select class="form-select" name="alamat" id="alamat">
                                        <option value="Blimbing">Blimbing</option>
                                        <option value="Kedungkandang">Kedungkandang</option>
                                        <option value="Klojen">Klojen</option>
                                        <option value="Lowokwaru">Lowokwaru</option>
                                        <option value="Sukun">Sukun</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="pembayaran">Payment Method</label>
                                    <select class="form-select" name="pembayaran" id="pembayaran">
                                        <option value="COD">COD</option>
                                        <option value="Cedit/Debit">Cedit/Debit</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h3>Overview</h3>
                                <ul class="list-group mb-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Price
                                        <span class="badge bg-primary">Rp. {{ $hewan->harga }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Shipping Cost
                                        <span class="badge bg-primary">Rp. 10.000</span>
                                    </li>
                                </ul>
                                <hr>
                                <p class="m-0">Grand Total :</p>
                                <input type="hidden" name="harga" value="{{ $hewan->harga + 10000 }}">
                                <h3 class="text-primary">Rp. {{ $hewan->harga + 10000 }}</h3>
                                <hr>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary">
                                        Buy
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
