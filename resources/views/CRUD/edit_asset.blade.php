@extends('layouts.main')

<head>
  <link rel="stylesheet" href="/style/tambahaset.css">
</head>
@section ('container')
<section class="mainDetail">
  <div class="content-wrapper">
    <div class="main">
      <div class="wrapper">
        <form action="/assets/{{$asset-> serial_number }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="box">
            <div class="cardImage">
              <div class="card-body">
                <div class="imgContainer">
                  <input type="hidden" name="oldImage" value="{{ $asset->image }}">
                  @if ($asset->image)
                  <img class="imgDetail" src="/storage/{{$asset->image}}" alt="Priview Image" id="imagePreview">
                  @else
                  <img class="imgDetail" src="#" id="imagePreview">
                  @endif
                </div>
              </div>
            </div>
            <div class="cardText">
              <div class="titleAsset">Ganti Data Aset</div>
              <div class="card-body">
                <div class="row">
                  <div class='header'>Nama Aset</div>
                  <div class='text'>
                    <input class="inputform" type="text" name="nama_aset" value="{{ $asset->nama_aset }}">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="header">Category</div>
                  <div class="text">
                    <select class="custom-select" name='category_id'>
                      <option value="{{$asset->category->id}}">{{$asset->category->name}}</option>
                      @foreach ($categories as $category)
                      <option value="{{$category->id }}">{{$category->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class='header'>Status</div>
                  <div class="text">
                    <select name='status_id' class="custom-select">
                      <option value="{{$asset->status->id}}">{{$asset->status->name}}</option>
                      @foreach ($statuses as $status)
                      <option value="{{ $status->id }}">{{$status->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class='header'>Type</div>
                  <div class='text'>
                    <input class="inputform" type="text" name="type" value="{{ $asset->type }}">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class='header'>Lokasi</div>
                  <div class='text'>
                    <input class="inputform" type="text" name="location" value="{{ $asset->location }}">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class='header'>Serial Number</div>
                  <div class='text'>
                    <input class="inputform" type="text" name="serial_number" value="{{ $asset->serial_number }}">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class='header'>Deskripsi</div>
                  <div class='text'>
                    <textarea class="inputdesc" name="description">{{ $asset->description }}</textarea>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class='header'>Harga</div>
                  <div class='text'>
                    <input class="inputform" type="number" name="price" value="{{ $asset->price }}">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class='header'>Dibeli Pada</div>
                  <div class='text'>
                    <input class="dateform" type="date" name="date_buyed" value="{{ $asset->date_buyed }}">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="header">Foto</div>
                  <input class="fileform" type="file" id="image" name="image" onchange="previewImage()">
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
  $(document).ready(function () {
    $("#datepicker").datepicker({
      dateFormat: "yy-mm-dd" // Specify the desired date format
    });
  });
</script>

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