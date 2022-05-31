<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/styleslogin.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/disposition.css') }}" type="text/css" rel="stylesheet">
    <title>login</title>
</head>

<body>
    <div class="main-login">
        <div class="dispos">
            <div class="login_box">
                <div class="head-b">
                    <h2>Login</h2>
                </div>
                <hr style="margin: 5px">
                <div class="body-b">
                    <div class="image">
                        <img src="{{ asset('images/homeP/goodfood.jpeg') }}" class="profile-im">
                    </div>

                    <form method="POST" action={{ route('verify') }}>
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
                            <input type="email" name="email" id="name" placeholder="user email">
                        </div>
                        <div class="input-group">
                            <label>password</label>
                            <input type="password" name="password" id="password" placeholder="password">
                        </div>
                        <div class="input-group">
                            <select name="role" id="role">
                                <option value="1" selected="selected">user</option>
                                <option value="2">Manager</option>
                            </select>
                        </div>
                        <div class="butn-b">
                            <button type="submit" class="btn">login</button>
                        </div>
                    </form>
                    <div class="register">
                        <a href="{{ route('door.resgister') }}">register</a>
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
