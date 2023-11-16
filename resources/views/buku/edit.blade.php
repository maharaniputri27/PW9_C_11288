<?php
date_default_timezone_set('Asia/Jakarta');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Atma Library</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .dropdown-menu {
            background: rgba(255, 255, 255, 0.8);
            /* Mengatur latar 
                belakang transparan */
            border: 1px solid #ccc;
            /* Garis tepi */
            border-radius: 10px;
            /* Sudut membulat */
            padding: 15px;
        }

        .carousel-caption {
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(255, 255, 255, 0.5);
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 15px;
            height: 90px;
            text-align: center;
        }

        .text-black {
            color: black;
        }

        .card {
            width: 80%;
            margin-left: 150px;
            background: rgba(255, 255, 255, 0.8);
            margin-top: 50px;
        }

        body {
            background: url('https://wallpapers.com/images/high/zigzag-river-aesthetic-landscape-zrf9jzxpxx736bd0.webp');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="text-center">
            <h4><b>Atma Library</b></h4>
            <h6>{{ date('Y-m-d') }}</h6>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul></ul>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Buku Saya</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('pinjam')}}">Pinjam</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('kembalikan')}}">Kembalikan</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a>210711288</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="rounded-circle mb-3" style="width: 100px;" alt="Avatar" />

                           

                        </div>

                        <div class="dropdown-divider"></div>
                        <div>
                            <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
                            <a class="dropdown-item" href="{{ route('actionLogout') }}"><i class="fa fa-user"></i> Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('buku.update',['buku' => $buku->id_buku]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="from-row">
                                        <button type="button" class="btn btn-primary btn-lg" style="background-color: #00A86B; color: black; border: none;">Tambah Buku Saya</button>
                                    </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Judul Buku</label>
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul',$buku->judul) }}" placeholder="Masukkan Judul Buku">
                                        @error('judul')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-bold">Penulis</label>
                                        <input type="text" class="form-control @error('penulis') is-invalid @enderror" name="penulis" value="{{ old('penulis',$buku->penulis) }}" placeholder="Masukkan Penulis">
                                        @error('penulis')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>