
@extends('orbitPages.homePage')
@section('content')
<div class="container resturant-img">
    <div class="containt">
        <div class="main">
            <aside class="sidenav">
                <div class="sidelinks">
                    <a href="#Best_Dishes">Cameroonian</a>
                    <a href="#Best_Restaurants">Italian</a>
                    <a href="#Best_categories">Europian</a>
                    <a href="#">Ivory coast</a>
                </div>
            </aside>
            <section class="main_containt resturant-main">

                <!-- best dishes aticles -->
                @for ($i = 0; $i < 3; $i++)
                <div class="item_title">
                    @switch($i)
                        @case(0)
                            <h1 style="color: black;">Cameroonian</h1>
                            @break
                        @case(1)
                            <h1 style="color: black;">Italian</h1>
                        @break
                        @default
                            <h1 style="color: black;">Europian</h1>
                    @endswitch
                </div>
                <article id="{{ ($i==0) ? 'Best_Dishes' : '' }}{{ ($i==1) ? 'Best_Restaurants' : '' }}{{ ($i==2) ? 'Best_categories' : '' }}">
                    {{-- <div class="item_title">
                        @switch($i)
                            @case(0)
                                <h1>Cameroonian</h1>
                                @break
                            @case(1)
                                <h1>Italian</h1>
                            @break
                            @default
                                <h1>Europian</h1>
                        @endswitch
                    </div> --}}

                    <!-- item 1 -->
                    @foreach ($restaurants as $restaurant)
                        <div class="item">
                            <img src="./images/Premium Vector Retro restaurant logo.jpeg" class="item_image">
                            <div class="item_description">
                                <div class="item_name">
                                    <h2>{{ $restaurant->name }}</h2>
                                </div>
                                <div class="item_details">
                                    <p>{{ $restaurant->location }}</p>
                                    <p>{{ $restaurant->manager->name }}</p>
                                    <p class="last">stars/rating</p>
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
                    @endforeach
                    
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
@endsection