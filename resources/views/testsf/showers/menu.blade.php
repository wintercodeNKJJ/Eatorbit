@extends('testsf.page')

@section('content')
    <a href="{{ route('info.index') }}">back</a>
    <div>
        <h1>Showing Menu informations</h1>
        @foreach ($clients as $item)
            <p>{{ $item->restaurant->name }}</p>
            <p>{{ $item->price }}</p>
        @endforeach
    </div>
@endsection