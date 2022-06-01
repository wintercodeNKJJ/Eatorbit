<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./styles/disposition.css" rel="stylesheet" type="text/css" />
    <link href="./styleslogin.css" type="text/css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <header class="home-img-header">
        <nav>
            <div class="nav_page_icon">
                <a id="page_icon" href="./home_page.html"></a>
                <!-- <h3>EatOrbit</h3> -->
            </div>
            <div class="nav_buttons">
                <div class="Site_name">
                    <h3>Good Food</h3>
                </div>
                <div class="buttons">
                    <a href="./home_page.html" class="current-page">Home</a>
                    <a href="./profile.html">Profile</a>
                    <a href="./login.html">Logout</a>
                </div>
            </div>
            <div class="nav_search_bar">
                <input type="text" placeholder="Search">
            </div>
        </nav>
        <div class="header_background"></div>
        <div class="middle">
            <h1>MANAGE YOUR RESTAURANTS</h1>
            <hr>
            <p>welcome</p>
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

                    <!-- best dishes aticles -->
                    <article id="Best_Dishes">
                        <div class="item_title">
                            <h1>Best Dishes</h1>
                        </div>

                        <!-- item 1 -->
                        <div class="item">
                            <img src="./images/Premium Vector Retro restaurant logo.jpeg" class="item_image">
                            <div class="item_description">
                                <div class="item_name">
                                    <h2>Authentic dail good</h2>
                                </div>
                                <div class="item_details">
                                    <p>it a restaurant descroption</p>
                                    <p>Restaurant capacity</p>
                                    <p class="last">stars/rating</p>
                                </div>
                                <div class="item_options">
                                    <h3>4.3</h3>
                                    <form action="./reservation.html">
                                        <button name="command" id="plt_command">Reserve</button>
                                    </form>
                                    <form action="./menu.html">
                                        <button name="visit_plates" id="plt_visit">Menu</button>
                                    </form>
                                    <form action="./menu.html">
                                        <button name="visit_plates" id="plt_visit">Delet</button>
                                    </form>
                                    <form action="./1editrestaurant.html">
                                        <button name="visit_plates" id="plt_visit">eddit</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- item 2 -->
                        <div class="item">
                            <img src="./images/Fresh Food Logo Template Download on Pngtree.jpeg" class="item_image">
                            <div class="item_description">
                                <div class="item_name">
                                    <h2>Fresh Food</h2>
                                </div>
                                <div class="item_details">
                                    <p>it a restaurant descroption</p>
                                    <p>Restaurant capacity</p>
                                    <p class="last">stars/rating</p>
                                </div>
                                <div class="item_options">
                                    <h3>4.3</h3>
                                    <form action="./reservation.html">
                                        <button name="command" id="plt_command">Reserve</button>
                                    </form>
                                    <form action="./menu.html">
                                        <button name="visit_plates" id="plt_visit">Menu</button>
                                    </form>
                                    <form action="./menu.html">
                                        <button name="visit_plates" id="plt_visit">Delet</button>
                                    </form>
                                    <form action="./1editrestaurant.html">
                                        <button name="visit_plates" id="plt_visit">eddit</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- item 3 -->
                        <div class="item">
                            <img src="./images/Premium Vector Vintage retro rustic old skillet cast iron for traditional food dish cuisine classic restaurant kitchen logo design.jpeg" class="item_image">
                            <div class="item_description">
                                <div class="item_name">
                                    <h2>Rustic Family</h2>
                                </div>
                                <div class="item_details">
                                    <p>it a restaurant descroption</p>
                                    <p>Restaurant capacity</p>
                                    <p class="last">stars/rating</p>
                                </div>
                                <div class="item_options">
                                    <h3>4.3</h3>
                                    <form action="./reservation.html">
                                        <button name="command" id="plt_command">Reserve</button>
                                    </form>
                                    <form action="./menu.html">
                                        <button name="visit_plates" id="plt_visit">Menu</button>
                                    </form>
                                    <form action="./menu.html">
                                        <button name="visit_plates" id="plt_visit">Delet</button>
                                    </form>
                                    <form action="./1editrestaurant.html">
                                        <button name="visit_plates" id="plt_visit">eddit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="dish-Add">
                            <form action="./1addrestaurant.html">
                                <button>Add Restaurant</button>
                            </form>
                        </div>
                    </article>

                    <article id="Best_Dishes" class="dishes">
                        <div class="item_title">
                            <h1>Menu</h1>
                        </div>

                        <div class="resMenuitem">
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
                        </div>
                    </article>

                    <div class="dish-Add">
                        <form action="./1adddish.html">
                            <button>Add Meal</button>
                        </form>
                        <form>
                            <button>Select</button>
                        </form>
                    </div>
                    
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
                    <img src="./newsimage/61 best.jpeg"></img>
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
                    <img src="./newsimage/River Wok Logo Design.png"></img>
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