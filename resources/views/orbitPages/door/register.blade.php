<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/styleslogin.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/disposition.css') }}" type="text/css" rel="stylesheet">
    <title>Register</title>
</head>

<body>
    <div class="main-login">
        <div class="dispos">
            <div class="login_box">
                <div class="head-b">
                    <h2>Register</h2>
                    <select name="role" id="role">
                        <option value="1" selected="selected">user</option>
                        <option value="2">Manager</option>
                    </select>
                </div>
                <hr style="margin: 5px">
                <div class="body-b">
                    <div class="image">
                        <img src="{{ asset('images/homeP/goodfood.jpeg') }}" class="profile-im">
                    </div>
                    <form action="{{ route('door.resgister') }}">
                        <div class="input-group">
                            <label>name</label>
                            <input name="name" id="name" placeholder="user name">
                        </div>
                        <div class="input-group">
                            <label>phone</label>
                            <input name="password" id="password" placeholder="phone number">
                        </div>
                        <div class="input-group">
                            <label>password</label>
                            <input name="password" id="password" placeholder="password">
                        </div>
                        <div class="input-group">
                            <label>password confimation</label>
                            <input name="password" id="password" placeholder="password confirm">
                        </div>
                        <div class="input-group">
                            <label>mail</label>
                            <input name="password" id="password" placeholder="email adress">
                        </div>
                        <div class="input-group">
                            <label>adress</label>
                            <input name="password" id="password" placeholder="personal adress">
                        </div>
                        <div class="input-group">
                            <label>payment mode</label>
                            <input name="payment" id="payment">
                        </div>
                        <div class="butn-b">
                            <button type="submit" class="btn">register</button>
                        </div>
                    </form>
                    <div class="register">
                        <a href="{{ route('door.resgister') }}">Login</a>
                    </div>
                </div>
                <div class="foot-b">
                    <hr>
                    <small>massage to users &copy</small>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
