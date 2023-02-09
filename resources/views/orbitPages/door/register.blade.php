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
                </div>
                <hr style="margin: 5px">
                <div class="body-b">
                    <div class="image">
                        <img src="{{ asset('images/homeP/goodfood.jpeg') }}" class="profile-im" >
                    </div>
                    <form method="POST" action="{{ route('verifyRegister') }}" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <div style="color: red; font-family:Arial, Helvetica, sans-serif;">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="input-group">
                            <label>name</label>
                            <input type="text" name="name" id="name" placeholder="user name">
                        </div>
                        <div class="input-group">
                            <label>phone</label>
                            <input type="tel" name="phone" id="phone" placeholder="phone number">
                        </div>
                        <div class="input-group">
                            <label>password</label>
                            <input type="password" name="password" id="password" placeholder="password">
                        </div>
                        <div class="input-group">
                            <label>password confimation</label>
                            <input type="password" name="password" id="password" placeholder="password confirm">
                        </div>
                        <div class="input-group">
                            <label>mail</label>
                            <input type="email" name="email" id="email" placeholder="email adress">
                        </div>
                        <div class="input-group">
                            <label>adress</label>
                            <input type="text" name="address" id="address" placeholder="personal adress">
                        </div>
                        <div class="input-group">
                            <label>payment mode</label>
                            <select name="payment" id="payment">
                                <option value="orange Money" selected="selected">Orange Money</option>
                                <option value="MTN Mobile Money">Mtn Mobile Money</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <input name="profilePicture" type="file" required>
                            <select name="role" id="role" >
                                <option value="1" selected="selected">user</option>
                                <option value="2">Manager</option>
                            </select>
                        </div>
                        <div class="butn-b">
                            <button type="submit" class="btn">register</button>
                        </div>
                    </form>
                    <div class="register">
                        <a href="{{ route('door.login') }}">Login</a>
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
