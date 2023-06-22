@extends('layouts.account')
@section('container')

<body>
    <div class="box">
        <div class="container">
            <div class="top">
                <span>Assets Management</span>
                <header>Registration</header>
            </div>
            <form action="/registration" method="post">
                @csrf
                <div class="input-field">
                    <input type="text" class="form-control" placeholder="Name" name="name">
                    <i class='bx bx-user'></i>

                </div>
                <div class="input-field">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    <i class='bx bx-user'></i>

                </div>
                <div class="input-field">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <i class='bx bx-lock-alt'></i>

                </div>

                <button type="submit" class="submit">Registration</button>

            </form>
            <div class="two-col">
                <div class="two">
                    <label><a href="#" onclick="history.go(-1)">Kembali </a></label>
                </div>

            </div>
        </div>
    </div>
</body>
@endsection