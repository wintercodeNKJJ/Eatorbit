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
    <header class="profile-img-header">
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
                    <a href="{{ route('home.restaurant') }}" >Restaurant</a>
                    <a href="{{ route('home.dishes') }}">Dishes</a>
                    <a href="{{ route('home.profile') }}" class="current-page">Profile</a>
                    <a href="./login.html">Logout</a>
                </div>
            </div>
            <div class="nav_search_bar">
                <input type="text" placeholder="Search">
            </div>
        </nav>
        <img class="profile-im2" src="./pics/pp.jpg"></img>
        <div class="middle-profile">
            <h1>Jordan Junior</h1>
            <hr>
            <p>Profile info</p>
            <h2>Adress</h2>
            <h2>Email</h2>
            <h2>Number</h2>
            <h2>payment mode</h2>
        </div>

    </header> --}}
    

@extends('orbitPages.homePage')
@section('content')
<div class="container home-img">
    <div class="containt">
        <div class="main">
            <aside class="sidenav">
                <div class="sidelinks">
                    <a href="#Best_Dishes">Commands</a>
                    <a href="#Best_Restaurants">Reservations</a>
                    <a href="#Best_categories">Canceled</a>
                    <a href="#">Back to top</a>
                </div>
            </aside>
            <section class="main_containt home-main">

                @for ($i = 0; $i <3 ; $i++)
                    <!-- best dishes aticles -->
                    <div class="item_title">
                        @switch($i)
                            @case(0)
                                <h1>Commands</h1>
                                @break
                            @case(1)
                                <h1>Reservations</h1>
                            @break
                            @default
                                <h1>Canceled</h1>
                        @endswitch
                    </div>
                    <article id="{{ ($i==0) ? 'Best_Dishes' : '' }}{{ ($i==1) ? 'Best_Restaurants' : '' }}{{ ($i==2) ? 'Best_categories' : '' }}">
                        {{-- <div class="item_title">
                            @switch($i)
                                @case(0)
                                    <h1>Commands</h1>
                                    @break
                                @case(1)
                                    <h1>Reservations</h1>
                                @break
                                @default
                                    <h1>Canceled</h1>
                            @endswitch
                        </div> --}}
                        @switch($i)
                            @case(0)
                                    @foreach ($client->commands as $command)
                                    @if ($command->status == 'good')
                                        <!-- item 1 -->
                                        <div class="item">
                                            <img src="{{ asset('images/dishes/'. $command->menu->meal->profile .'.jpeg') }}" class="item_image">
                                            <div class="item_description">
                                                <div class="item_name">
                                                    <h2>{{ $command->menu->meal->name }}</h2>
                                                </div>
                                                <div class="item_details">
                                                    <p>{{ $command->menu->meal->description }}</p>
                                                    <p>Restaurant:<br>{{ $command->menu->restaurant->name }}</p>
                                                    <p class="last">stars/rating {{ $command->menu->restaurant->manager->id }}</p>
                                                </div>
                                                <div class="item_options">
                                                    <h3>{{ $command->menu->price }}FCFA</h3>
                                                    <form method="POST" action="{{ route('home.deletCom') }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input value="{{ $command->id }}" name="id" type="hidden">
                                                        <button type="submit" id="plt_commandD">Delet</button>
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
                                @foreach ($client->reserves as $reserve)
                                @if ($reserve->status == 'good')
                                    <!-- item 1 -->
                                    <div class="item">
                                        <img src="{{ asset('images/restimage/'. $reserve->restaurant->profile .'.jpeg') }}" class="item_image">
                                        <div class="item_description">
                                            <div class="item_name">
                                                <h2>{{ $reserve->restaurant->name }}</h2>
                                            </div>
                                            <div class="item_details">
                                                <p>{{ $reserve->restaurant->location }}</p>
                                                <p>Restaurant:<br>{{ $reserve->restaurant->name }}</p>
                                                <p class="last">stars/rating{{ $reserve->restaurant->manager->id }}</p>
                                            </div>
                                            <div class="item_options">
                                                <h3>{{ $reserve->cost }}FCFA</h3>
                                                <form method="POST" action="{{ route('home.deletRes') }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input value="{{ $reserve->id }}" name="id" type="hidden">
                                                    <button type="submit" id="plt_commandD">Delet</button>
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
                                @foreach ($client->reserves as $reserve)
                                @if ($reserve->status == 'complited')
                                    <!-- item 1 -->
                                    <div class="item">
                                        <img src="{{ asset('images/restimage/'. $reserve->restaurant->profile .'.jpeg') }}" class="item_image">
                                        <div class="item_description">
                                            <div class="item_name">
                                                <h2>{{ $reserve->restaurant->name }}</h2>
                                            </div>
                                            <div class="item_details">
                                                <p>{{ $reserve->restaurant->location }}</p>
                                                <p>Restaurant:<br>{{ $reserve->restaurant->name }}</p>
                                                <p class="last">stars/rating{{ $reserve->restaurant->manager->id }}</p>
                                            </div>
                                            <div class="item_options">
                                                <h3>{{ $reserve->cost }}FCFA</h3>
                                                    <form method="POST" action="{{ route('home.deletCom') }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input value="{{ $reserve->id }}" name="id" type="hidden">
                                                        <button type="submit" id="plt_commandD">Delet</button>
                                                    </form>
                                                {{-- <form action="./dishes.html">
                                                    <button name="visit_plates" id="plt_visit">Visit Dishes</button>
                                                </form> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @endforeach
                                
                                @foreach ($client->commands as $command)
                                    @if ($command->status == 'complited')
                                        <!-- item 1 -->
                                        <div class="item">
                                            <img src="{{ asset('images/dishes/'. $command->menu->meal->profile .'.jpeg') }}" class="item_image">
                                            <div class="item_description">
                                                <div class="item_name">
                                                    <h2>{{ $command->menu->meal->name }}</h2>
                                                </div>
                                                <div class="item_details">
                                                    <p>{{ $command->menu->meal->description }}</p>
                                                    <p>Restaurant: <br> {{ $command->menu->restaurant->name }}</p>
                                                    <p class="last">stars/rating{{ $command->menu->restaurant->manager->id }}</p>
                                                </div>
                                                <div class="item_options">
                                                    <h3>{{ $command->menu->price }}FCFA</h3>
                                                    <form method="POST" action="{{ route('home.deletCom') }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input value="{{ $command->id }}" name="id" type="hidden">
                                                        <button type="submit" id="plt_command">Delet</button>
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