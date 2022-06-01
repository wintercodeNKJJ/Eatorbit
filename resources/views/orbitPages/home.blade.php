@extends('orbitPages.homePage')
@section('content')
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

                    <!-- best dishes aticles -->
                    @for ($i = 0; $i <3 ; $i++)
                    <!-- best dishes aticles -->
                    <div class="item_title">
                        @switch($i)
                            @case(0)
                                <h1>Best Dishes</h1>
                                @break
                            @case(1)
                                <h1>Best Restaurant</h1>
                            @break
                            @default
                                <h1>Best Item</h1>
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
                            @case(1)
                                            @foreach ($restaurants as $restaurant)
                                            @if ($restaurant->id < 4)
                                            <!-- item 1 -->
                                                <div class="item">
                                                    <img src="{{ asset('images/restimage/'. $restaurant->profile .'.jpeg') }}" class="item_image">
                                                    <div class="item_description">
                                                        <div class="item_name">
                                                            <h2>{{ $restaurant->name }}</h2>
                                                        </div>
                                                        <div class="item_details">
                                                            <p>{{ $restaurant->location }}</p>
                                                            <p>{{ $restaurant->manager->name }}</p>
                                                            <p class="last">stars/rating{{ $restaurant->profile }}</p>
                                                        </div>
                                                        <div class="item_options">
                                                            <h3>4.3</h3>
                                                            <form action="{{ route('home.reserve') }}">
                                                                <input value="{{ $restaurant->id }}" name="id" type="hidden">
                                                                <button type="submit" name="command" id="plt_command">Reserve</button>
                                                            </form>
                                                            <form action="{{ route('home.menu') }}">
                                                                <input value="{{ $restaurant->id }}" name="id" type="hidden">
                                                                <button type="submit" name="visit_plates" id="plt_visit">Menu</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                @break
                            @case(0)
                                
                                    <!-- item 1 -->
                                    @foreach ($dishes as $dish)
                                    @if ($dish->id < 4)
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
                                        @endif
                                    @endforeach
                            @break
                            @default
                            @foreach ($restaurants as $restaurant)
                            @if ($restaurant->id > 4 && $restaurant->id < 10)
                            <!-- item 1 -->
                                <div class="item">
                                    <img src="{{ asset('images/restimage/'. $restaurant->profile .'.jpeg') }}" class="item_image">
                                    <div class="item_description">
                                        <div class="item_name">
                                            <h2>{{ $restaurant->name }}</h2>
                                        </div>
                                        <div class="item_details">
                                            <p>{{ $restaurant->location }}</p>
                                            <p>{{ $restaurant->manager->name }}</p>
                                            <p class="last">stars/rating {{ $restaurant->profile }}</p>
                                        </div>
                                        <div class="item_options">
                                            <h3>4.3</h3>
                                            <form action="{{ route('home.reserve') }}">
                                                <input value="{{ $restaurant->id }}" name="id" type="hidden">
                                                <button type="submit" name="command" id="plt_command">Reserve</button>
                                            </form>
                                            <form action="{{ route('home.menu') }}">
                                                <input value="{{ $restaurant->id }}" name="id" type="hidden">
                                                <button type="submit" name="visit_plates" id="plt_visit">Menu</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                                
                                <!-- item 1 -->
                                @foreach ($dishes as $dish)
                                @if ($dish->id > 4 && $dish->id < 10)
                                    <!-- item 1 -->
                                    <div class="item">
                                        <img src="{{ asset('images/dishes/'. $dish->profile .'.jpeg') }}" class="item_image">
                                        <div class="item_description">
                                            <div class="item_name">
                                                <h2>{{ $dish->name }}</h2>
                                            </div>
                                            <div class="item_details">
                                                <p>{{ $dish->description }}</p>
                                                <p># of people{{ $dish->profile }}</p>
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
                <img src="{{ asset('images/newsimage/61 best.jpeg') }}"></img>
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

@endsection