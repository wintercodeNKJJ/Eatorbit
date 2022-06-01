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
    <header class="profile-img-header">
        <nav>
            <div class="nav_page_icon">
                <a id="page_icon" href=".{{ route('home.home') }}"></a>
                <!-- <h3>EatOrbit</h3> -->
            </div>
            <div class="nav_buttons">
                <div class="Site_name">
                    <h3>Good Food</h3>
                </div>
                <div class="buttons">
                    <a href="{{ route('home.home') }}">Home</a>
                    <a href="{{ route('home.restaurant') }}" class="current-page">Restaurant</a>
                    <a href="{{ route('home.dishes') }}">Dishes</a>
                    <a href="{{ route('home.profile') }}" >Profile</a>
                    <a href="{{ route('clientlogout') }}">Logout</a>
                </div>
            </div>
            <div class="nav_search_bar">
                {{-- <input type="text" placeholder="Search"> --}}
                <h1>{{ $client->name }}</h1>
            </div>
        </nav>
        <img class="profile-im-menu" src="./images/Premium Vector Retro restaurant logo.jpeg"></img>
        <div class="middle-profile">
            <h1>{{ $restaurant->name }} Menu</h1>
            <hr>
            <p>{{ $restaurant->manager->name }}</p>
            <h2>{{ $restaurant->location }}</h2>
            <h2>{{ $restaurant->manager->phone }}</h2>
            <h2 style="color: white;">Open:{{ $restaurant->openHour }}</h2>
            <h2 style="color: white;">Close:{{ $restaurant->closeHour }}</h2>
            <h2>Speciality</h2>
        </div>

    </header>
    <div class="container home-img">
        <div class="containt">
            <div class="main">
                <aside class="sidenav">
                    <div class="sidelinks">
                        <a href="#Best_Dishes">Breakfast</a>
                        <a href="#Best_Restaurants">lunch/Supper</a>
                        <a href="#Best_Items">Bivrages</a>
                        <a href="#">Back to top</a>
                    </div>
                </aside>
                <section class="main_containt home-main">

                    <!-- best dishes aticles -->
                    @for ($i = 0; $i < 3; $i++)
                    <div class="item_title">
                        @switch($i)
                            @case(0)
                                <h1>Breakfast</h1>
                                @break
                            @case(1)
                                <h1>lunch/Supper</h1>
                            @break
                            @default
                                <h1>Bivrages</h1>
                        @endswitch
                    </div>
                    <article id="{{ ($i==0) ? 'Best_Dishes' : '' }}{{ ($i==1) ? 'Best_Restaurants' : '' }}{{ ($i==2) ? 'Best_categories' : '' }}">
                        @switch($i)
                            @case(0)
                                    @foreach ($restaurant->menus as $menu)
                                    @if ($menu->price >= 5000)
                                        <!-- item 1 -->
                                        <div class="item">
                                            <img src="./pics/dish.jpeg" class="item_image">
                                            <div class="item_description">
                                                <div class="item_name">
                                                    <h2>{{ $menu->meal->name }}</h2>
                                                </div>
                                                <div class="item_details">
                                                    <p>{{ $menu->meal->description }}</p>
                                                    <p>{{ $menu->restaurant->manager->name }}</p>
                                                    <p class="last">stars/rating</p>
                                                </div>
                                                <div class="item_options">
                                                    <h3>{{ $menu->price }}FCFA</h3>
                                                    <form action="{{ route('home.command') }}">
                                                        <input value="{{ $menu->id }}" name="id" type="hidden">
                                                        <button name="command" id="plt_command">Command</button>
                                                    </form>
                                                    {{-- <form action="./dishes.html">
                                                        <button name="visit_plates" id="plt_visit">Visit Dishes</button>
                                                    </form> --}}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @endforeach
                                @break
                            @case(1)
                                @foreach ($restaurant->menus as $menu)
                                @if ($menu->price >= 3000 && $menu->price < 5000)
                                    <!-- item 1 -->
                                    <div class="item">
                                        <img src="./pics/dish.jpeg" class="item_image">
                                        <div class="item_description">
                                            <div class="item_name">
                                                <h2>{{ $menu->meal->name }}</h2>
                                            </div>
                                            <div class="item_details">
                                                <p>{{ $menu->meal->description }}</p>
                                                <p>{{ $menu->restaurant->manager->name }}</p>
                                                <p class="last">stars/rating</p>
                                            </div>
                                            <div class="item_options">
                                                <h3>{{ $menu->price }}FCFA</h3>
                                                <form action="{{ route('home.command') }}">
                                                    <input value="{{ $menu->id }}" name="id" type="hidden">
                                                    <button name="command" id="plt_command">Command</button>
                                                </form>
                                                {{-- <form action="./dishes.html">
                                                    <button name="visit_plates" id="plt_visit">Visit Dishes</button>
                                                </form> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @endforeach
                            @break

                            @default
                                @foreach ($restaurant->menus as $menu)
                                @if ($menu->price >= 0 && $menu->price < 3000)
                                    <!-- item 1 -->
                                    <div class="item">
                                        <img src="./pics/dish.jpeg" class="item_image">
                                        <div class="item_description">
                                            <div class="item_name">
                                                <h2>{{ $menu->meal->name }}</h2>
                                            </div>
                                            <div class="item_details">
                                                <p>{{ $menu->meal->description }}</p>
                                                <p>{{ $menu->restaurant->manager->name }}</p>
                                                <p class="last">stars/rating</p>
                                            </div>
                                            <div class="item_options">
                                                <h3>{{ $menu->price }}FCFA</h3>
                                                <form method="GET" action="{{ route('home.command') }}">
                                                    <input value="{{ $menu->id }}" type="hidden" name="id">
                                                    <button type="submit" name="command" id="plt_command">Command</button>
                                                </form>
                                                {{-- <form action="./dishes.html">
                                                    <button name="visit_plates" id="plt_visit">Visit Dishes</button>
                                                </form> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @endforeach
                        @endswitch
                    </article>
                    <hr style="margin: 5px;">
                    @endfor
                </section>
            </div>
        </div>
        <div class="containNews">
            <div class="news-box">
                <div class="top-description">
                    <img src="./images/Keto Delivered - Artisan Goodies for Keto Foodies.jpeg"></img>
                    <div class="description">
                        <label class="news-title">
                            <h4>This is some side info</h4>
                        </label>
                        <label>
                            <p>this is some other side info
                                so as th make things moe intresting
                            </p>
                        </label>
                        <label>
                            <p>Conserning the news</p>
                        </label>
                    </div>
                </div>
                <div class="bottom-description">
                    <i><small>this is some bottom information</small></i>
                </div>
            </div>
            <div class="news-box">
                <div class="top-description">
                    <img src="./images/61 best.jpeg"></img>
                    <div class="description">
                        <label>
                            <h4 class="news-title">This is some side info</h4>
                        </label>
                        <label>
                            <p>this is some other side info
                                so as th make things moe intresting
                            </p>
                        </label>
                        <label>
                            <p>Conserning the news</p>
                        </label>
                    </div>
                </div>
                <div class="bottom-description">
                    <i><small>this is some bottom information</small></i>
                </div>
            </div>
            <div class="news-box">
                <div class="top-description">
                    <img src="./images/River Wok Logo Design.png"></img>
                    <div class="description">
                        <label>
                            <h4 class="news-title">This is some side info</h4>
                        </label>
                        <label>
                            <p>this is some other side info
                                so as th make things moe intresting
                            </p>
                        </label>
                        <label>
                            <p>Conserning the news</p>
                        </label>
                    </div>
                </div>
                <div class="bottom-description">
                    <i><small>this is some bottom information</small></i>
                </div>
            </div>
        </div>
    </div>
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