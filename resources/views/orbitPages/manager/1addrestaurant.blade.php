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
                <a id="page_icon" href="{{ route('manager.home') }}"></a>
                <!-- <h3>EatOrbit</h3> -->
            </div>
            <div class="nav_buttons">
                <div class="Site_name">
                    <h3>Good Food</h3>
                </div>
                <div class="buttons">
                    <a href="{{ route('manager.home') }}"
                        class="{{ Request::is('Mhome') ? 'current-page' : '' }}">Manager Home</a>
                    <a href="{{ route('managerlogout') }}">Logout</a>
                </div>
            </div>
            <div class="nav_search_bar">
                <input type="text" placeholder="Search">
            </div>
        </nav>
        <div class="header_background"></div>
        <div class="middle-command">
            <h1 style="color: aliceblue;">CREATE RESTAURANT</h1>
            <hr>
            <p style="color: aliceblue;">dished</p>
        </div>

        <form>
            <div class="command-main-pos">
                <div class="citem">
                    <img src="./restimage/Premium Vector Retro restaurant logo.jpeg" class="citem_image">
                    <div class="citem_description">
                        
                        <div class="citem_name">
                            <h2>Restaurant name</h2>
                        </div>
                        <div class="citem_details">
                            <div class="citem_info">
                                <label for="im" style="font-family: Arial, Helvetica, sans-serif;">Change
                                    image:</label>
                                <input type="file" name="im" id="images"><br><br>
                                <label style="font-family: Arial, Helvetica, sans-serif;">Restaurant description:</label>
                                <br>
                                <textarea style="width: 250px; height: 100px;"></textarea>
                            </div>
                            <div class="citem_input">
                                <div class="cform">
                                    <div class="cinput-group">
                                        <label class="naming">Restaurant name:</label>
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
                                    {{-- <script>
                                        $(function() {
                                            // Multiple images preview with JavaScript
                                            var previewImages = function(input, imgPreviewPlaceholder) {
                                                if (input.files) {
                                                    var filesAmount = input.files.length;
                                                    for (i = 0; i < filesAmount; i++) {
                                                        var reader = new FileReader();
                                                        reader.onload = function(event) {
                                                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                                                imgPreviewPlaceholder);
                                                        }
                                                        reader.readAsDataURL(input.files[i]);
                                                    }
                                                }
                                            };
                                            $('#images').on('change', function() {
                                                previewImages(this, 'div.citem_image');
                                            });
                                        });
                                    </script> --}}
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
