<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <form method="post" action="{{ route('info.stor') }}" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                        <div style="width: 600px; border-color: red; color: red;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            <input type="hidden" value="{{ $client->id }}" name="id">
            <div>
                <label for="image"><h4>add image</h4></label>
                <input type="file" name="image" required>
            </div>
            <div>
                <label for="name"><h4>name</h4></label>
                <input type="text" name="name" value="{{ $client->name }}" required>
            </div>
            <div>
                <label for="number"><h4>number</h4></label>
                <input type="text" name="number" value="{{ $client->phone }}" required>
            </div>
            <div>
                <label for="address"><h4>address</h4></label>
                <input type="text" name="address" value="{{ $client->address }}" required>
            </div>
            <div>
                <button type="submit">Add</button>
            </div>
        </form>
    </div>
</body>
</html>