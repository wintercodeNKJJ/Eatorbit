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
    <header class="command-img-header">
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
                    <a href="./home_page.html">Home</a>
                    <a href="./restaurants.html">Restaurant</a>
                    <a href="./dishes.html" class="current-page">Dishes</a>
                    <a href="./profile.html">Profile</a>
                    <a href="./login.html">Logout</a>
                </div>
            </div>
            <div class="nav_search_bar">
                <input type="text" placeholder="Search">
            </div>
        </nav>
        <div class="header_background"></div>
        <div class="middle-command">
            <h1 style="color: aliceblue;">EDIT RESTAURANT</h1>
            <hr>
            <p style="color: aliceblue;">served</p>
        </div>

        <form>
            <div class="command-main-pos">
                <div class="citem">
                    <img src="./restimage/Fresh Food Logo Template Download on Pngtree.jpeg" class="citem_image">
                    <div class="citem_description">
                        <div class="citem_name">
                            <h2>Dish name</h2>
                        </div>
                        <div class="citem_details">
                            <div class="citem_info">
                                <label for="im" style="font-family: Arial, Helvetica, sans-serif;">Change
                                    inmage:</label>
                                <input type="file" name="im"><br><br>
                                <label style="font-family: Arial, Helvetica, sans-serif;">Plate description:</label>
                                <br>
                                <textarea style="width: 250px; height: 100px;"></textarea>
                            </div>
                            <div class="citem_input">
                                <div class="cform">
                                    <div class="cinput-group">
                                        <label class="naming">Meal name:</label>
                                        <input type="text" name="name" id="name" placeholder="Name" readonly="readonly">
                                    </div>
                                    <div class="cinput-group">
                                        <label>Price:</label>
                                        <input type="text" name="name" id="name" placeholder="Adress">
                                    </div>
                                    <div class="cinput-group">
                                        <label>contact:</label>
                                        <input type="text" name="name" id="name" placeholder="Contact">
                                    </div>
                                    <div class="citem_options">
                                        <button name="command" id="cplt_command">Command</button>
                                        <button name="visit_plates" id="cplt_visit">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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