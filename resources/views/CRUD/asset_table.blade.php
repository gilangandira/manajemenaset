@extends('layouts.main')
@extends('layouts.table')
<style>
    .edit-btn {
        color: white;
        border-radius: 5px;
        border: none;
        width: 50px;
        background-color: var(--blue);
        font-size: 16px;
    }

  

    .delete-btn {
        border-radius: 5px;
        border: none;
        width: 50px;
        color: white;
        background-color: red;
        font-size: 16px;
        cursor: pointer;
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
            <h2>Daftar Asset</h2>
        </div>
        <div class="btn-group">
            <a href="/assets/create"><button class="topButton" style='vertical-align:middle'>Tambah Aset</button></a>
            <a href="/categories"><button class="topButton" style='vertical-align:middle'>Kategori</button></a>
        </div>


        <div class="recentTable">
            <table class="row-border" id="example" width="100%">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Category</td>
                        <td>Type</td>
                        <td>Location</td>
                        <td>Status</td>
                        <!-- <td style="font-weight: bold; pointer-events: none; color: white;"></td> -->
                        <td style="font-weight: bold; pointer-events: none; color: white;"></td>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $nomor=1;
                    @endphp
                    @foreach ($assets as $asset)
                    <tr>
                        <td>{{$nomor++}}</td>
                        <td><a class="text-decoration-none"
                                href='/assets/{{$asset->serial_number}}'>{{$asset->nama_aset}}</a></td>
                        <td>{{$asset->category->name}}</td>
                        <td>{{$asset->type}}</td>
                        <td>{{ $asset->location }}</td>


                        <td>
                            <span class="status {{ $asset->status->name }}">{{ $asset->status->name}}</span>

                        </td>

                        <td style="display: flex;">
                            <span>
                                <a href="/assets/{{$asset->serial_number}}/edit"><button class="edit-btn"><ion-icon
                                            name="construct-outline" style="font-size: 20px;"></ion-icon></button></a>
                            </span>
                            <span>||</span>
                            <span>
                                <form onsubmit="return confirm('Yakin Mau Hapus Data')"
                                    action="/assets/{{$asset->serial_number}}" method='post'>
                                    @csrf
                                    @method('DELETE')
                                    <button class="delete-btn" type='submit'><ion-icon name="trash-outline"
                                            style="font-size: 20px;"></ion-icon></button>
                                </form>
                            </span>


                        </td>
                        <!-- <td>
                            
                        </td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>


</body>

@endsection