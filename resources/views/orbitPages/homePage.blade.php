<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/styleslogin.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/disposition.css') }}" type="text/css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <header class="{{ Request::is('home*') ? 'home-img-header' : '' }}{{ Request::is('restaurant*') ? 'resturant-img-header' : '' }}{{ Request::is('dishes*') ? 'dish-img-header' : '' }}{{ Request::is('profile*') ? 'profile-img-header' : '' }}">
        <nav>
            <div class="nav_page_icon">
                <a id="page_icon" href="{{ route('home.home') }}"></a>
                <!-- <h3>EatOrbit</h3> -->
            </div>
            <div class="nav_buttons">
                <div class="Site_name">
                    <h3>Good Food</h3>
                </div>
                <div class="buttons">
                    <a href="{{ route('home.home') }}" class="{{ Request::is('home') ? 'current-page' : '' }}">Home</a>
                    <a href="{{ route('home.restaurant') }}" class="{{ Request::is('restaurant*') ? 'current-page' : '' }}">Restaurant</a>
                    <a href="{{ route('home.dishes') }}" class="{{ Request::is('dishes*') ? 'current-page' : '' }}">Dishes</a>
                    <a href="{{ route('home.profile') }}" class="{{ Request::is('profile*') ? 'current-page' : '' }}">Profile</a>
                    <a href="{{ route('clientlogout') }}">Logout</a>
                </div>
            </div>
            <div class="nav_search_bar">
                {{-- <input type="text" placeholder="Search"> --}}
                <h1>{{ $client->name }}</h1>
            </div>
        </nav>
        <div class="header_background"></div>

        <!-- showing head containing the reservation part -->

            <img class="profile-im2" style="display: {{ Request::is('profile') ? '' : 'none' }};" src="{{ asset('images/clients/'.$client->profilePicture.'.jpeg') }}" alt="none">

            <div class="{{ Request::is('profile') ? 'middle-profile' : 'middle' }}">
                <h1>{{ Request::is('restaurant') ? 'THE BEST RESTAURANTS' : '' }}
                    {{ Request::is('dishes') ? 'MAKE YOUR CHOICE' : '' }}
                    {{ Request::is('profile') ? $client->name : '' }}
                    {{ Request::is('home') ? 'DELICIOUSLY GOOD' : '' }}
                </h1>
                <hr>
                <p>{{ Request::is('restaurant') ? 'Profile info' : '' }}
                    {{ Request::is('dishes') ? 'Enjoy your meal' : '' }}
                    {{ Request::is('profile') ? 'Take a look' : '' }}
                    {{ Request::is('home') ? 'welcome' : '' }}
                </p>
                <h2>{{ Request::is('profile') ? $client->address : '' }}</h2>
                <h2>{{ Request::is('profile') ? $client->email : '' }}</h2>
                <h2>{{ Request::is('profile') ? $client->phone : '' }}</h2>
                <h2>{{ Request::is('profile') ? 'payment mode' : '' }}</h2>
            </div>
        
    </header>
    @yield('content')
    <footer>
        <div class="col">
            <p>contact 653395861</p>
            <p>about this page</p>
            <p>comments</p>
            <p>eddidtion</p>
        </div>
        <div class="col">
            <p>contact us</p>
            <p>Staf</p>
            <p>logo</p>
        </div>
        <div class="col">
            <p>Restaurants</p>
            <p>Dishes</p>
            <p>copyright&copy</p>
        </div>
    </footer>
</body>

</html>