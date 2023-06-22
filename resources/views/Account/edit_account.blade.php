@extends('layouts.main')
<head>
    <link rel="stylesheet" href="/style/profile.css">
</head>
@section ('container')
<section class="mainprofile">
    <div class="box">
        <div class ="cardImage"> 
            <div class="card-body">
                <div class="imgContainer">
                    
                    @if ($asset->image)
                        <img class="imgDetail" src="/storage/{{$asset->image}}" alt="..." />
                    @else
                        <img class="imgDetail" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." />
                    @endif
                </div>
            </div>
        </div>
        <div class="cardText">
            <div class="card-body">
                <form action="/account" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class='header'>Full Name</div>
                            <div class='text'>
                                <input type="text" name="name" value="{{ $user->name }}">
                            </div>
                        </div>
                    <hr>
                    <div class="row">
                        <div class='header'>Email</div>
                            <div class='text'>
                                <input type="email" name="email" value="{{ $user->email }}">
                            </div>
                        </div>
                    <hr>
                    <div class="row">
                        <div class='header'>Admin</div>
                            <div class='text'>
                                <input type="text" name="is_admin" value="{{ $user->is_admin }}">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class='header'>Jenis Kelamin</div>
                            <div class='text'>
                                <input type="text" name="kelamin" value="{{ $user->profile->kelamin }}">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class='header'>Agama</div>
                            <div class='text'>
                                <input type="text" name="agama" value="{{ $user->profile->agama }}">
                            </div>
                        </div>
                    <hr>
                    <div class="row">
                        <div class='header'>Posisi</div>
                            <div class='text'>
                                <input type="text" name="jabatan" value="{{ $user->profile->jabatan }}">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class='header'>Alamat</div>
                            <div class='text'>
                                <textarea name="alamat">{{ $user->profile->alamat }}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="">
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

