<div class="navigation">

    <ul>
        <li>
            <a href="/">
                <span class="icon">
                    <ion-icon name="logo-rss"></ion-icon>
                </span>
                <span class="title">Misqot Sejahtera Indonesia</span>
            </a>
        </li>

        <li>
            <a href="/">
                <span class="icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="title">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="/assets" class="nav-link ">
                <span class="icon">
                    <ion-icon name="bar-chart-outline"></ion-icon>
                </span>
                <span class="title">Asset Management</span>
            </a>
        </li>

        @if ($currentUserAdmin == 1)
        <li>
            <a href="/account">
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">Account Management</span>
            </a>
        </li>
        @endif


        <li>
            <a href="/logout">
                <span class="icon">
                    <ion-icon name="log-out-outline"></ion-icon>
                </span>
                <span class="title">Sign Out</span>
            </a>
        </li>
    </ul>
</div>
<div class="content-wrapper">
    <div class="main">

        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline" style="color: #0044ff; font-size: 50px;"></ion-icon>
            </div>
            <div class="user">
                <a href="/profile/{{$currentUserName}}">
                    <div>
                        @if ($currentUserImage)
                        <div><img class="imgDetail" src="/storage/{{$currentUserImage}}" alt="..." /></div>
                        @else
                        <img class="imgDetail" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." />
                        @endif
                    </div>
                </a>

            </div>
        </div>