@extends('master')

@section('content')
    <main class="py-3 bg-light">
        <div class="container">
            <h1>Edit Hewan</h1>
            <hr>
            <form class="row" action="{{ route('hewan.update', ['hewan' => $hewan->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('storage/images/' . $hewan->gambar) }}" alt=""
                                class="img-fluid img-thumbnail mb-3" id="image-preview">
                            <div>
                                <label for="image" class="form-label">Gambar Hewan</label>
                                <input class="form-control" name="image" type="file" id="image" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md">
                    <div class="card">
                        <div class="card-body">
                            <h3>Detail Hewan</h3>
                            <hr>
                            <div class="mb-3">
                                <label for="hewan">Jenis Hewan</label>
                                <input type="text" name="jenis_hewan" id="hewan" class="form-control"
                                    value="{{ $hewan->jenis_hewan }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" id="harga" class="form-control"
                                    value="{{ $hewan->harga }}" required>
                            </div>
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <script>
        const imgInput = document.getElementById('image')
        const imgPreview = document.getElementById('image-preview')

        imgInput.onchange = evt => {
            const [file] = imgInput.files
            if (file) {
                imgPreview.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
