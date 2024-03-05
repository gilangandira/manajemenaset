@extends('layouts.main')
@extends('layouts.table')

<style>
    .edit-btn {
        color: white;
        border-radius: 5px;
        border: none;
        width: 50px;
        background-color: var(--blue);
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        cursor: pointer;
    }

    .edit-btn i {
        margin-right: 5px;
    }

    .delete-btn {
        border-radius: 5px;
        border: none;
        width: 50px;
        color: white;

        background-color: red;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        cursor: pointer;
    }

    .edit-btn i {
        margin-right: 5px;
    }

    .inputformtext {
        width : 260;
        height: 70;
    }
    .inputformadmin {
        width : 260;
        padding: 5px;
        margin-top : 5px;
    }
</style>

@section ('container')

<body>
    @if (session('success'))
    <script>alert("{{ session('success') }}");</script>
    @endif

    @if (session('error'))
    <script>alert("{{ session('error') }}");</script>
    @endif
    <div class="detailsTable">
        <div class="cardHeader">
            <h2>Daftar User</h2>
        </div>
        <div class="btn-group">
            <a href="/registration"><button class="topButton" style='vertical-align:middle'>Tambah User</button></a>
        </div>


        <div class="recentTable">
            <table class="row-border" id="example" width="100%">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Admin</td>
                        <td>Email</td>
                        <td>Jenis Kelamin</td>
                        <td>Agama</td>
                        <td>Posisi</td>
                        <td>Alamat</td>
                        <td style="font-weight: bold; pointer-events: none; color: white;"></td>
                        <td style="font-weight: bold; pointer-events: none; color: white;"></td>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $nomor=1;

                    @endphp
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$nomor++}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{$user->email}}</td>
                        <td>{{ $user->profile->kelamin }}</td>
                        <td>{{ $user->profile->agama }}</td>
                        <td>{{ $user->profile->jabatan }}</td>
                        <td>{{ $user->profile->alamat }}</td>

                        <td>
                        <a href="/account/{{$user->id }}/edit"><button class="edit-btn"><ion-icon
                                            name="construct-outline" style="font-size: 20px;"></ion-icon></button></a>
                        </td>
                        <td>
                            <form onsubmit="return confirm('Yakin Mau Hapus Data')" action="/account/{{$user->id}}"
                                method='post'>
                                @csrf
                                @method('DELETE')
                                <button class="delete-btn" type='submit'><ion-icon name="trash-outline"
                                        style="font-size: 25px;"></ion-icon></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>

<div id="popupOverlay" class="overlayPopup">
        <div class="popup">
            <div class="close-btn">
                <span><label for="name">Edit Akun</label></span>
                <span><button onclick="hidePopup()">&times;</button></span>

            </div>
            <form class="form" action="/account/{{$user->id}}" method="post">
                @csrf
                @method('put')
                <div class="input-container">
                <div class="row">
                                    <div class='header'>Email</div>
                                    <div class='text'>
                                        <input class="inputform" type="text" name="email" id="email"
                                            value="{{ $user->email }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class='header'>Password</div>
                                    <div class='text'>
                                        <input class="inputform" type="password" name="password" id="password"
                                            value="">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
    <div class='header'>Role</div>
    <div class='text'>
        <select class="inputformadmin" name="is_admin" id="is_admin"> 
            <option value="0" {{ $user->is_admin == 0 ? 'selected' : '' }}>Karyawan</option>
            <option value="1" {{ $user->is_admin == 1 ? 'selected' : '' }}>Admin</option>
        </select>
    </div>
</div>

                                <hr>
                                <div class="row">
                                    <div class='header'>Jenis Kelamin</div>
                                    <div class='text'>
                                        <input class="inputform" type="text" name="kelamin" id="kelamin"
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
                                        <textarea class="inputformtext"
                                            name="alamat" id="alamat">{{ $user->profile->alamat }}</textarea>
                                    </div>
                                </div>
                                <button type="submit" onclick="submitForm('popupOverlay', {{ $user->id }})" class="submit btn" id='btn'>Update</button>

                    </div>
            </form>
        </div>
    </div>
</body>
<script>
    function showPopup() {
        document.getElementById("popupOverlay").style.display = "flex";
    }

    function hidePopup() {
        document.getElementById("popupOverlay").style.display = "none";
    }

//     function submitForm(overlayId, userId) {
//     var email = document.getElementById("email").value;
//     var password = document.getElementById("password").value;
//     var is_admin = document.getElementById("is_admin").value;
//     var alamat = document.getElementById("alamat").value;
//     var kelamin = document.getElementById("kelamin").value;

//     // Data yang akan dikirim ke server
//     var formData = {
//         email: email,
//         password: password,
//         is_admin: is_admin,
//         alamat: alamat,
//         kelamin: kelamin
//     };

//     // Kirim data menggunakan AJAX
//     $.ajax({
//         type: 'PUT',
//         url: '/account/{{$user->id',
//         data: formData,
//         success: function (data) {
//             // Handle respons dari server, misalnya menampilkan pesan sukses
//             alert("Data berhasil diperbarui: " + data.message);
//             // Sembunyikan overlay
//             hidePopup(overlayId);
//         },
//         error: function (data) {
//             // Handle error, misalnya menampilkan pesan kesalahan
//             alert("Terjadi kesalahan saat mengirim data: " + data.error);
//         }
//     });

//     // Mencegah form dari mengirim permintaan POST biasa
//     return false;
// }

</script>
@endsection
 