@extends('layouts.main')

<head>
    <link rel="stylesheet" href="/style/details.css">
</head>
@section ('container')
<section class="mainDetail">
    <div class="card">
        <div class="row">
            <div class="imgContainer">
                @if ($asset->image)
                <img class="imgDetail" src="/storage/{{$asset->image}}" alt="..." />
                @else
                <img class="imgDetail"
                    src="https://i.pinimg.com/originals/41/d3/ff/41d3ffd56e5d6968a393ece81b20f428.jpg" alt="..." />
                @endif
            </div>
            <div class="textDetail">
                <div class="als">
                    <span>{{ $asset->category->name }}</span>
                    <span>||</span>
                    <span>{{ $asset->location }}</span>
                    <span>||</span>
                    <span>{{ $asset->serial_number }}</span>
                </div>
                <h1 class="detailName">{{$asset->nama_aset}}</h1>
                <div class="st">
                    <span class="status {{ $asset->status->name }}">{{ $asset->status->name}}</span>
                    <span>{{ $asset->type }}</span>
                </div>
                <p class="desc">{{$asset->description}}</p>
                <div class="als">
                    <span>Ditambahkan Oleh : </span>
                    <span>{{$asset->user->name }}</span>
                </div>
                <div>
                    <span>Pembelian Pada : </span>
                    <span id="formatted-date"></span>
                </div>
                @php
                $harga = number_format($asset->price,0,',','.');
                @endphp
                <div class="price">
                    Rp.{{ $harga }},00
                </div>
            </div>
        </div>
    </div>


</section>
<script>
    var updated_at = "{{$asset->date_buyed}}";
    var tanggal = new Date(updated_at);
    var options = { year: 'numeric', month: 'long', day: 'numeric' };
    var formattedDate = tanggal.toLocaleDateString('id-ID', options);

    document.getElementById("formatted-date").textContent = formattedDate;
</script>
@endsection