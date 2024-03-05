@extends('layouts.main')

<head>
    <link rel="stylesheet" href="/style/profile.css">
</head>
@section ('container')
<section class="mainprofile">
    <div class="content-wrapper">
        <div class="main">
            <div class="wrapper">
                <form action="/account/{{$user->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="box">
                        <div class="cardImage">
                            <div class="card-body">
                                <div class="imgContainer">
                                    <input type="hidden" name="oldImage" value="{{ $user->profile->image }}">
                                    @if ($user->profile->image)
                                    <img class="imgDetail" src="/storage/{{$user->profile->image}}"
                                        alt="Priview Image" id="imagePreview">
                                    @else
                                    <img class="imgDetail" src="#" id="imagePreview">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="cardText">
                            <div class="card-body">
                                <div class="row">
                                    <div class='header'>Nama</div>
                                    <div class='text'>
                                        <input class="inputform" type="text" name="name"
                                            value="{{ $user->name }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class='header'>Email</div>
                                    <div class='text'>
                                        <input class="inputform" type="text" name="email"
                                            value="{{ $user->email }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class='header'>Password</div>
                                    <div class='text'>
                                        <input class="inputform" type="password" name="password"
                                            value="">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
    <div class='header'>Role</div>
    <div class='text'>
        <select class="inputform" name="is_admin">
            <option value="1">Admin</option>
            <option value="0">Karyawan</option>
        </select>
    </div>
</div>
<hr>
                                <div class="row">
                                    <div class='header'>Jenis Kelamin</div>
                                    <div class='text'>
                                        <input class="inputform" type="text" name="kelamin"
                                            value="{{ $user->profile->kelamin }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class='header'>Agama</div>
                                    <div class='text'>
                                        <input class="inputform" type="text" name="agama"
                                            value="{{ $user->profile->agama }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class='header'>Posisi</div>
                                    <div class='text'>
                                        <input class="inputform" type="text" name="jabatan"
                                            value="{{ $user->profile->jabatan }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class='header'>Alamat</div>
                                    <div class='text'>
                                        <textarea class="inputform"
                                            name="alamat">{{ $user->profile->alamat }}</textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">

                                    <input class="form-control" type="file" id="image" name="image"
                                        onchange="previewImage()">
                                </div>
                                <div class="row">
                                    <div class="">
                                        <button type="submit" class="transparent-btn">Simpan</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</section>
<script>
  function previewImage() {
    var input = document.getElementById('image');
    var imagePreview = document.getElementById('imagePreview');

    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        imagePreview.src = e.target.result;
        imagePreview.style.display = 'block';
      }
      reader.readAsDataURL(input.files[0]);
    } else {
      imagePreview.src = '#';
      imagePreview.style.display = 'none';
    }
  }
</script>
@endsection