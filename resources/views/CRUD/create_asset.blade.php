@extends('layouts.main')

<head>
  <link rel="stylesheet" href="/style/tambahaset.css">
</head>
@section ('container')
<section class="mainDetail">
  <div class="content-wrapper">
    <div class="main">
      <div class="wrapper">
        <form action="/assets/" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="box">
            <div class="cardImage">
              <div class="card-body">
                <div class="imgContainer">
                <img class="imgDetail" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEX09PTMzMzJycnPz8/d3d3V1dXi4uLo6Ojw8PDx8fH39/ft7e3Y2NjQ0NDp6enb29uHE20LAAACaklEQVR4nO3b6W6CQBhGYUTWD9T7v9uylLIN6jCk8Cbn+deEGo6DMOAYRQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIJyFiuzshLesStJAdVZdufEV38LFydkZm6w+IrBJrK86itkxgU1ifnaKmz363QvUvsbjmoNYdjuXPPMQz6R7lfLsGKeq3bd76LvfHwnFIXt0tOKYwjuF51kVtjMUbzqFVmR1/cpK30idwv7qH98yz0SVwvI+XP19JygqhY9xehMnXokihfl0/hZ77a5I4WM2zXz5DKJI4XwKvjHLNGeGRmE1L7w7N7fKeRLSKCy+KGwCnedZjcJofruXuo7SbpwdiRqFlk4D42y9rf0eyOtEjcL5BzFeb2rV5oRApNAmj6QcjyRs8g4sE0UKJ4nxemJq8yGeJ6oURpY/uic26frppy0uJvNEmcI2JM/yovlz8cxlGbhIFCrcsA6cX0/kC52Bt3hMlC90Bk5HUbzQPYL9KA6b6BXmk8/YZuCYqFdYj/f47wL/EtUKrR6/LXsfOCSKFbaBQ+KnwGa79sqpVWjp7x1Ec6B+DhQsHAK7xM+BeoVjYLPzr499eoXTwO+IFfoHihXuWbWgVVh792kV7lt3IlRoe0ZQqvCLax+FZ8c4UUghheebFu6jU1gk++gU7l3t3f2rRmGAyxcGr329cuEh60stunBh2Z3y6yxM/wX52S1u/bf3Ryzzdq9tuIDnYWv1q7NTNlhy0O8t/Nb6/SfLbnHoYbpjSep/sjLfOZ0ZXfTXJKPgH69deAABAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABDyA0uAKIxQw0bjAAAAAElFTkSuQmCC" id="imagePreview">
                  <img class="imgDetail" src="#" id="imagePreview">
            
                </div>
              </div>
            </div>
            <div class="cardText">
              <div class="titleAsset">Ganti Data Aset</div>
              <div class="card-body">
                <div class="row">
                  <div class='header'>Nama Aset</div>
                  <div class='text'>
                    <input class="inputform" type="text" name="nama_aset">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="header">Category</div>
                  <div class="text">
                    <select class="custom-select" name='category_id'>
            
                      @foreach ($categories as $category)
                      <option value="{{$category->id }}">{{$category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class='header'>Status</div>
                  <div class="text">
                    <select name='status_id' class="custom-select">
                
                      @foreach ($statuses as $status)
                      <option value="{{ $status->id }}">{{ $status->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class='header'>Type</div>
                  <div class='text'>
                    <input class="inputform" type="text" name="type">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class='header'>Lokasi</div>
                  <div class='text'>
                    <input class="inputform" type="text" name="location" >
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class='header'>Serial Number</div>
                  <div class='text'>
                    <input class="inputform" type="text" name="serial_number">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class='header'>Deskripsi</div>
                  <div class='text'>
                    <textarea class="inputdesc" name="description"></textarea>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class='header'>Harga</div>
                  <div class='text'>
                    <input class="inputform" type="number" name="price" >
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class='header'>Dibeli Pada</div>
                  <div class='text'>
                    <input class="dateform" type="date" name="date_buyed" >
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