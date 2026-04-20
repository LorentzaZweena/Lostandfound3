<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Edit Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="{{ asset('css/profileEdit.css') }}">
</head>

<body>

<div class="modal-card shadow">

    <h4 class="fw-bold mb-4">My Profile</h4>

    <div class="row">
        <div class="col-md-4 text-center">
            <img src="{{ $user->profile_photo ? asset('storage/'.$user->profile_photo) : asset('img/pp.jpg') }}" class="profile-img mb-3">

            <form action="/profile/photo" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="photo" class="form-control mb-2">
                <button class="upload-btn w-100">Upload Photo</button>
            </form>
        </div>

        <div class="col-md-8">

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label class="small text-muted">FULL NAME</label>
                    <input type="text" name="name" class="form-control"
                        value="{{ old('name', $user->name) }}">
                </div>

                <div class="mb-3">
                    <label class="small text-muted">PHONE</label>
                    <input type="text" name="phone" class="form-control"
                        value="{{ old('phone', $user->phone ?? '') }}">
                </div>

                <div class="mb-4">
                    <label class="small text-muted">EMAIL ADDRESS</label>
                    <input type="email" name="email" class="form-control"
                        value="{{ old('email', $user->email) }}">
                </div>

                <h5 class="fw-bold mt-4">Authentication</h5>

                <div class="mb-3">
                    <label class="small text-muted">USER ID</label>
                    <input type="text" class="form-control"
                        value="{{ $user->email }}" readonly>
                </div>

                <div class="footer-actions d-flex justify-content-between mt-4">
                    <a href="/profile" class="btn btn-light px-4">
                        ✖ Cancel
                    </a>

                    <button type="submit" class="btn btn-success px-4">
                        ✔ Save
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
     <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>