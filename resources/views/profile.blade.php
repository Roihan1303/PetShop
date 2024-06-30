@extends('master')

@section('content')
    <main class="py-3 bg-light">
        <div class="container">
            <h1>My Profile</h1>
            <hr>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg"
                                alt="" class="img-fluid rounded-center mb-3">
                            <h3>{{ auth()->user()->name }}</h3>
                            <p class="text-muted">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md mb-3">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('updateProfile', ['user' => auth()->user()->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <h3>Edit Profile</h3>
                                <hr>
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="{{ auth()->user()->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ auth()->user()->email }}" required>
                                </div>
                                <h3>Change Password</h3>
                                <hr>
                                <div class="mb-3">
                                    <label for="password">New Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <button class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    @if (session('message'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire("{{ session('message') }}", '', 'success');
            });
        </script>
    @endif
@endsection
