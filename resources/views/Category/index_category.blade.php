@extends('layouts.main')
@extends('layouts.table')

<head>
<!-- <link rel="stylesheet" href="style/style.css">   -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"> -->


</head>
@section ('container')
<body>
@if (session('success'))
    <script>alert("{{ session('success') }}");</script>
@endif

@if (session('error'))
    <script>alert("{{ session('error') }}");</script>
@endif

                         

    <div class="content-wrapper">
        <div class="detailsTable">
                  
        <div class="cardHeader">
                        <h2>Daftar Asset</h2>
                    </div>
                <div class="btn-group">
                <button onclick="showPopup()" class="topButton">Tambah kategori</button>
                </div>    
                
                <div class="recentTable">
                    <table class="row-border" id="example" width="100%">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Category</td>
                                <td style="font-weight: bold; pointer-events: none; color: white;"> </td>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                                $nomor=1;
                                @endphp
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{$nomor++}}</td>
                            <td>{{$category->name}}</td>
                            <td><form onsubmit="return confirm('Yakin Mau Hapus Data')"action="/categories/{{$category->id}}" method='post'>
                                @csrf
                                @method('DELETE')
                                <button type='submit'>Hapus</button>
                            </form></td>
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
                        <span><label for="name">Name</label></span>
                        <span><button onclick="hidePopup()">&times;</button></span>
                    </div>
                    <form class="form" action="/categories" method="post">
                    @csrf
                            <div class="input-container">
                                
                                <input type="text" class="input" id='name' name='name' >
                            <div class="input-container"><button type="submit" class="submit btn" id='btn'>Registration</button></div>
                    </form>
                </div> 

    <script>
    function showPopup() {
      document.getElementById("popupOverlay").style.display = "flex";
    }

    function hidePopup() {
      document.getElementById("popupOverlay").style.display = "none";
    }

    function submitForm() {
      var name = document.getElementById("name").value;
      var email = document.getElementById("email").value;
      
      // Lakukan sesuatu dengan data yang diinput
      console.log("Name:", name);
      console.log("Email:", email);
      
      hidePopup(); // Menutup pop-up setelah mengirim data
    }
  </script>




</body>

@endsection