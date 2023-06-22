@extends('layouts.main')
@extends('layouts.table')

<head>
    <link rel="stylesheet" href="/style/home.css">
</head>

@section ('container')

<body id="content-wrapper">
    <div class="cardChart">
        <div class="cardBox">
            <div class="card">
                <div>
                    <h2 class="numbers">Welcome !!</h2>
                    <h3>{{$currentUserName}}</h3>
                </div>
                <div class="iconBx">
                    <ion-icon name="happy"></ion-icon>
                </div>
            </div>
            @php
            $dataCount=count($assets)
            @endphp
            <div class="card">
                <div>
                    <div class="numbers">{{$dataCount}}</div>
                    <div class="cardName">Jumlah Aset</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="bar-chart-outline"></ion-icon>
                </div>
            </div>
            @php
            $totalPrice = 0;
            $idr = 0;
            @endphp

            @foreach ($assets as $asset)
            @php
            $totalPrice += $asset->price;
            $idr = number_format($totalPrice,0,',','.');
            @endphp
            @endforeach
            <div class="card">
                <div>
                    <div class="numbers">Rp.{{$idr}}</div>
                    <div class="cardName">Total Aset</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="cash-outline"></ion-icon>
                </div>
            </div>



        </div>
    </div>


    <div class="details">
        <div class="recentAssets">
            <div class="cardHeader">
                <h2>Daftar Asset</h2>
                <a href="/assets" class="btn">View All</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <td>Nama</td>
                        <td>Nomor Seri</td>
                        <td>Lokasi</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 0 @endphp
                    @foreach ($assets->sortByDesc('created_at') as $asset)
                    @if ($count <8) <tr>
                        <td><a href="/{{ $asset['serial_number']}}" class="text-decoration-none">{{ $asset->nama_aset
                                }}</a></td>
                        <td>{{ $asset->serial_number}}</td>
                        <td>{{ $asset->location }}</td>
                        <td>
                            <span class="status {{ $asset->status->name }}">{{ $asset->status->name}}</span>
                        </td>
                        </tr>
                        @endif
                        @php $count++ @endphp
                        @endforeach

                </tbody>

            </table>
        </div>


        <div class="accountList">
            <div class="cardHeader">
                <h2>List Account</h2>
            </div>

            <table>
                @foreach ($users as $user)
                <tr>
                    <td width="60px">
                        <div class="imgBx">
                            <div>
                                @if ($user->profile->image)
                                <div><img class="imgDetail" src="/storage/{{$user->profile->image}}" alt="..." /></div>
                                @else
                                <img class="imgDetail" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg"
                                    alt="..." />
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>
                        <div>{{$user->name}}</div>
                        <div>{{$user->profile->jabatan}}</div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    </div>

    <script src="js/main.js"></script>
    <script src="{{ $categoryChart->cdn() }}"></script>
    {{ $categoryChart->script() }}
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

@endsection