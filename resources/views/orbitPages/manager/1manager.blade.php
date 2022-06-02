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
    <header class="home-img-header">
            <nav>
                <div class="nav_page_icon">
                    <a id="page_icon" href="{{ route('manager.home') }}"></a>
                    <!-- <h3>EatOrbit</h3> -->
                </div>
                <div class="nav_buttons">
                    <div class="Site_name">
                        <h3>Good Food</h3>
                    </div>
                    <div class="buttons">
                        <a href="{{ route('manager.home') }}" class="{{ Request::is('Mhome') ? 'current-page' : '' }}">Manager Home</a>
                        <a href="{{ route('managerlogout') }}">Logout</a>
                    </div>
                </div>
                <div class="nav_search_bar">
                    <h1>{{ $manager->name }}</h1>
                </div>
            </nav>
            <img class="profile-im2" src="{{ asset('images/managers/'.$manager->profilePicture.'.jpeg') }}">
            <div class="middle-profile">
                <h1>{{ $manager->name }}</h1>
                <hr>
                <p>{{ $manager->email }}</p>
                <h2>{{ $manager->address }}</h2>
                <h2>{{ $manager->phone }}</h2>
            </div>
    
        </header>
    <div class="container home-img">
        <div class="containt">
            <div class="main">
                <aside class="sidenav">
                    <div class="sidelinks">
                        <a href="#Best_Dishes">Best Dishes</a>
                        <a href="#Best_Restaurants">Best Restaurants</a>
                        <a href="#Best_Items">Best Items</a>
                        <a href="#">New Dishes</a>
                    </div>
                </aside>
                <section class="main_containt home-main">

                    <div class="item_title">
                        <h1>Your Restaurants</h1>
                    </div>
                    <!-- best dishes aticles -->
                    <article id="Best_Dishes">

                        @forelse ($manager->restaurants as $restaurant )
                            <!-- item 1 -->
                        <div class="item">
                            <img src="{{ asset('images/restimage/'. $restaurant->profile .'.jpeg') }}" class="item_image">
                            <div class="item_description">
                                <div class="item_name">
                                    <h2>{{ $restaurant->name }}</h2>
                                </div>
                                <div class="item_details">
                                    <p>{{ $restaurant->location }}</p>
                                    <p>{{ $restaurant->name }}</p>
                                    <p class="last">{{ $restaurant->openHour }}hr</p>
                                </div>
                                <div class="item_options">
                                    <h3>4.3</h3>
                                    <form method="POST" action="{{ route('manager.reserves') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $restaurant->id }}">
                                        <button type="submit" name="command" id="plt_command">Reserve</button>
                                    </form>
                                    <form method="POST" action="{{ route('manager.menu') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $restaurant->id }}">
                                        <button type="submit" name="visit_plates" id="plt_visit">Menu</button>
                                    </form>
                                    <form method="POST" action="{{ route('manager.delet') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $restaurant->id }}">
                                        <button type="submit" name="visit_plates" id="plt_visit">Delet</button>
                                    </form>
                                    <form method="POST" action="{{ route('manager.edit') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $restaurant->id }}">
                                        <button type="submit" name="visit_plates" id="plt_visit">eddit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class="item_title">
                                <h1>NO RESTAUARNTS</h1>
                            </div>
                        @endforelse

                    </article>
                    <div class="dish-Add">
                        <form method="POST" action="{{ route('manager.addr') }}">
                            @csrf
                            <button type="submit">Add Restaurant</button>
                        </form>
                    </div>

                    <div class="item_title">
                        <h1>Menu or Reservations</h1>
                    </div>
                    <article id="Best_Dishes" class="dishes listedRM">

                        {{-- <div class="resMenuitem">
                            <img src="./dishes/Product Details.jpeg" class="resMenu_image">
                            <div class="dish_description">
                                <div class="dish_name">
                                    <h2>Dish name</h2>
                                    <div class="dish_details">
                                        <p>this is a first dish descroption</p>
                                        <!-- <p># of people</p>
                                        <p class="last">stars/rating</p> -->
                                    </div>
                                </div>
                                
                                <div class="dish_options">
                                    <h3>-$</h3>
                                    <form action="./1editdish.html">
                                        <button name="command" id="plt_command">Edit dish</button>
                                    </form>
                                    <form action="./dishes.html">
                                        <button name="visit_plates" id="plt_visit">Delet Dishes</button>
                                    </form>
                                </div>
                            </div>
                        </div> --}}

                        @if(isset($Menu)||isset($restaurants))
                            @if(isset($Menu))
                                @foreach ($Menu->menus as $menu)
                                    <div class="resMenuitem">
                                        <img src="{{ asset('images/dishes/'. $menu->meal->profile .'.jpeg') }}" class="resMenu_image">
                                        <div class="dish_description">
                                            <div class="dish_name">
                                                <h2>name:{{ $menu->meal->name }}</h2>
                                                <div class="dish_details">
                                                    <p>{{ $menu->meal->description }}</p>
                                                    <!-- <p># of people</p>
                                                    <p class="last">stars/rating</p> -->
                                                </div>
                                            </div>
                                            
                                            <div class="dish_options">
                                                <h3>{{ $menu->price }}$</h3>
                                                <form method="POST" action="{{ route('manager.editdish') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $menu->id }}">
                                                    <button id="plt_command">Edit dish</button>
                                                </form>

                                                <form method="POST" action="{{ route('manager.deletdish') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $menu->id }}">
                                                    <button id="plt_visit">Delet Dishes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            @if(isset($restaurants))
                                @foreach ($restaurants->reserves as $reserve)
                                    <div class="resMenuitem">
                                        <img src="{{ asset('images/clients/'. $reserve->client->profilePicture .'.jpeg') }}" class="resMenu_image">
                                        <div class="dish_description">
                                            <div class="dish_name">
                                                <h2>{{ $reserve->client->profilePicture }}{{ $reserve->client->name }}</h2>
                                                <div class="dish_details">
                                                    <p>address:{{ $reserve->client->address }}</p>
                                                    <!-- <p># of people</p>
                                                    <p class="last">stars/rating</p> -->
                                                </div>
                                            </div>
                                            
                                            <div class="dish_options">
                                                <h3>{{ $reserve->cost }}$</h3>
                                                <form method="POST" action="{{ route('manager.deletreserve') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $reserve->id }}">
                                                    <button name="visit_plates" id="plt_visit">Delet reserve</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                @if (count($manager->restaurants)>0)
                                    @foreach ($manager->restaurants[0]->menus as $menu)
                                    <div class="resMenuitem">
                                        <img src="{{ asset('images/dishes/'. $menu->meal->profile .'.jpeg') }}" class="resMenu_image">
                                        <div class="dish_description">
                                            <div class="dish_name">
                                                <h2>name:{{ $menu->meal->name }}</h2>
                                                <div class="dish_details">
                                                    <p>{{ $menu->meal->description }}</p>
                                                    <!-- <p># of people</p>
                                                    <p class="last">stars/rating</p> -->
                                                </div>
                                            </div>
                                            
                                            <div class="dish_options">
                                                <h3>{{ $menu->price }}FCFA</h3>
                                                <form method="POST" action="{{ route('manager.editdish') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $menu->id }}">
                                                    <button name="command" id="plt_command">Edit dish</button>
                                                </form>
                                                <form method="POST" action="{{ route('manager.deletdish') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $menu->id }}">
                                                    <button name="visit_plates" id="plt_visit">Delet dish</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                <div class="item_title">
                                    <h1>NOTHING TO DISPLAY</h1>
                                </div>
                                @endif
                            @endif
                        @endif

                    </article>

                    <div class="dish-Add">
                        <!-- permits to add a dish to a particular restaurant -->
                        <form method="POST" action="{{ route('manager.addmeal') }}">
                            @csrf
                            <input value="{{ (isset($Menu)) ? $Menu->id : '' }}" type="hidden" name="id">
                            <button>Add Meal</button>
                        </form>
                        {{-- <form>
                            <button>Select</button>
                        </form> --}}
                    </div>
                    
                </section>
            </div>
        </div>
        <div class="containNews">
            <div class="news-box">
                <div class="top-description">
                    <img src="{{ asset('images/newsimage/Keto Delivered - Artisan Goodies for Keto Foodies.jpeg') }}"></img>
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
                    <img src="{{ asset('images/newsimage/61 best.jpeg') }}">
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
                    <img src="{{ asset('images/newsimage/River Wok Logo Design.png') }}"></img>
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