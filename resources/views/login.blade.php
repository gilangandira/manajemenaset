@extends('layouts.account')
@section('container')




<body>
    @if (session('error'))
    <script>alert("{{ session('error') }}");</script>
    @endif
    <div class="box">
        <div class="container">
            <div class="top">
                <span>Assets Management</span>
                <header>Login</header>
            </div>
            <form action="login" method="POST">
                @csrf
                <div>
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    <i class='bx bx-user'></i>
                </div>
                <div>
                    <input type="Password" class="form-control" placeholder="Password" name="password">
                    <i class='bx bx-lock-alt'></i>
                </div>
                <div><button type="submit" class="submit btn-primary" name="submit">Login</button></div>

                
            </form>

        </div>
    </div>
</body>

@endsection