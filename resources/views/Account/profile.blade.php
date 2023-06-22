@extends('layouts.main')
<head>
    <link rel="stylesheet" href="/style/profile.css">
</head>
@section ('container')

<section class="mainprofile">
<div class="content-wrapper"> 
<div class="main">
<div class="wrapper">
                <div class="box">
                    <div class ="cardImage">
                        <div class="card-body">  
                            <div class="imgContainer">
                                @if ($user->profile->image)
                                <img class="imgDetail" src="/storage/{{$user->profile->image}}" alt="..." />
                                @else
                                <img class="imgDetail" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." />
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="cardText">
                        <div class="card-body">
                                <div class="row">
                                    <div class='header'>Full Name</div>
                                    <div class='text'>{{ $user->name }}</div>
                                </div>
                            <hr>
                                <div class="row">
                                    <div class='header'>Email</div>
                                    <div class='text'>{{ $user->email }}</div>
                                </div>
                            <hr>
                                <div class="row">
                                    <div class='header'>Role</div>
                                    <div class='text'>{{ $user->role }}</div>
                                </div>
                            <hr>
                                <div class="row">
                                    <div class='header'>Jenis Kelamin</div>
                                    <div class='text'>{{ $user->profile->kelamin }}</div>
                                </div>
                            <hr>
                                <div class="row">
                                    <div class='header'>Agama</div>
                                    <div class='text'>{{ $user->profile->agama }}</div>
                                </div>
                            <hr>
                                <div class="row">
                                    <div class='header'>Posisi</div>
                                    <div class='text'>{{ $user->profile->jabatan }}</div>
                                </div>
                            <hr>
                                <div class="row">
                                    <div class='header'>Alamat</div>
                                    <div class='text'>{{ $user->profile->alamat }}</div>
                                </div>
                            <hr>
                            <div class="row">
                                <button class="transparent-btn" onclick="window.location.href='/profile/{name}/edit'">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
 </section>

@endsection

