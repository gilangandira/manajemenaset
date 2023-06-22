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
                            <button class="edit-btn" onclick="showPopup()"><ion-icon name="build-sharp"
                                    style="font-size: 25px;"></ion-icon></button>
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
                <span><label for="name">0 : User</label></span>
                <span><label for="name">1 : Admin</label></span>
                <span><button onclick="hidePopup()">&times;</button></span>

            </div>
            <form class="form" action="/account/{{$user->id}}" method="post">
                @csrf
                @method('put')
                <div class="input-container">
                    <input type="text" class="input" name='is_admin' id="is_admin">
                    <div class="input-container"><button type="submit" class="submit btn" id='btn'>Registration</button>
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

    function submitForm() {
        var admin = document.getElementById("is_admin").value;

        // Lakukan sesuatu dengan data yang diinput
        console.log("is_admin:", admin);

        hidePopup(); // Menutup pop-up setelah mengirim data
    }
</script>
@endsection