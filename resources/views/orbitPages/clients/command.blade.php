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
    <header class="command-img-header">
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
                    <a href="{{ route('home.home') }}">Home</a>
                    <a href="{{ route('home.restaurant') }}">Restaurant</a>
                    <a href="{{ route('home.dishes') }}" class="current-page">Dishes</a>
                    <a href="{{ route('home.profile') }}" >Profile</a>
                    <a href="{{ route('clientlogout') }}">Logout</a>
                </div>
            </div>
            <div class="nav_search_bar">
                {{-- <input type="text" placeholder="Search"> --}}
                <h1>{{ $client->name }}</h1>
            </div>
        </nav>
        <div class="header_background"></div>
        <div class="middle-command">
            <h1 style="color: aliceblue;">COMMAND IT HERE</h1>
            <hr>
            <p style="color: aliceblue;">welcome</p>
        </div>

        <div class="command-main-pos">
            <div class="citem">
                <img src="./dishes/jpeg(6).jpeg" class="citem_image">
                <div class="citem_description">
                    <div class="citem_name">
                        <h2>{{ $menu->meal->name }}</h2>
                    </div>
                    <div class="citem_details">
                        <div class="citem_info">
                            <p>{{ $menu->meal->description }}</p>
                            <p>{{ $menu->price }}</p>
                            <p class="clast">stars/rating</p>
                        </div>
                        <div class="citem_input">
                            <form method="POST" action="{{ route('home.storCommand') }}" class="cform">
                                @csrf
                                @if ($errors->any())
                                    <div style="width: 100%; border-color: red; color: red; font-family:Arial, Helvetica, sans-serif;">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="cinput-group">
                                    <label class="naming">name:</label>
                                    <input type="text" name="name" id="name" value="{{ $client->name }}" placeholder="Name" readonly="readonly">
                                </div>
                                <div class="cinput-group">
                                    <label>address:</label>
                                    <input type="text" name="address" value="{{ $client->address }}" id="name" placeholder="Adress" readonly="readonly">
                                </div>
                                <div class="cinput-group">
                                    <label>Date:</label>
                                    <input type="date" name="date" id="name">
                                </div>
                                <div class="cinput-group">
                                    <label>restaurant:</label>
                                    <input type="text" value="{{ $menu->restaurant->name }}" name="restaurant" id="name" placeholder="Restaurant" readonly="readonly">
                                </div>
                                <div class="cinput-group">
                                    <label>price:</label>
                                    <input type="text" name="price" value="{{ $menu->price }}" id="name" placeholder="Price" readonly="readonly">
                                </div>
                                <input type="hidden" name="idclt" value="{{ $client->id }}">
                                <input type="hidden" name="idmenu" value="{{ $menu->id }}">

                                <div class="citem_options">
                                    <button type="submit" id="cplt_command">Command</button>
                                    <a href="{{ route('home.dishes') }}">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

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