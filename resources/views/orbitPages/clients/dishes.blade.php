{{-- <!DOCTYPE html>
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
    <header class="dish-img-header">
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
                    <a href="./login.html">Logout</a>
                </div>
            </div>
            <div class="nav_search_bar">
                <input type="text" placeholder="Search">
            </div>
        </nav>
        <div class="header_background"></div>
        <div class="middle">
            <h1>MAKE YOUR CHOICE</h1>
            <hr>
            <p>Enjoy your meal</p>
        </div>

    </header> --}}

    @extends('orbitPages.homePage')
    @section('content')
    <div class="container dish-img">
        <div class="containt">
            <div class="main">
                <aside class="sidenav">
                    <div class="sidelinks">
                        <a href="#Best_Dishes">Meat Dishes</a>
                        <a href="#Best_Restaurants">Vegetables dishes</a>
                        <a href="#Best_categories">Pasta Dishes</a>
                        <a href="#">Back to top</a>
                    </div>
                </aside>
                <section class="main_containt dish-main">

                    @for ($i = 0; $i <3 ; $i++)
                        <!-- best dishes aticles -->
                        <div class="item_title">
                            @switch($i)
                                @case(0)
                                    <h1>Meat dishes</h1>
                                    @break
                                @case(1)
                                    <h1>Vegetables Dishes</h1>
                                @break
                                @default
                                    <h1>Pasta Dishes</h1>
                            @endswitch
                        </div>
                        <article id="{{ ($i==0) ? 'Best_Dishes' : '' }}{{ ($i==1) ? 'Best_Restaurants' : '' }}{{ ($i==2) ? 'Best_categories' : '' }}">
                            {{-- <div class="item_title">
                                @switch($i)
                                    @case(0)
                                        <h1>Meat dishes</h1>
                                        @break
                                    @case(1)
                                        <h1>Vegetables Dishes</h1>
                                    @break
                                    @default
                                        <h1>Pasta Dishes</h1>
                                @endswitch
                            </div> --}}
                            @foreach ($dishes as $dish)
                                <!-- item 1 -->
                                <div class="item">
                                    <img src="{{ asset('images/dishes/'. $dish->profile .'.jpeg') }}" class="item_image">
                                    <div class="item_description">
                                        <div class="item_name">
                                            <h2>{{ $dish->name }}</h2>
                                        </div>
                                        <div class="item_details">
                                            <p>{{ $dish->description }}</p>
                                            <p># of people</p>
                                            <p class="last">stars/rating</p>
                                        </div>
                                        <div class="item_options">
                                            <h3>-$</h3>
                                            <form method="GET" action="{{ route('home.resList') }}">
                                                <input type="hidden" value="{{ $dish->id }}" name="id">
                                                <button name="command" id="plt_command">Restaurants</button>
                                            </form>
                                            {{-- <form action="./dishes.html">
                                                <button name="visit_plates" id="plt_visit">Visit Dishes</button>
                                            </form> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </article>
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

    @endsection