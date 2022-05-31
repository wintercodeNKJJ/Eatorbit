@extends('testsf.page')

@section('content')
    <a href="{{ route('info.index') }}">back</a>
    <div>
        <h1>Showing client informations</h1>
        @foreach ($clients as $item)
            <hr>
            <p>{{ $item->name }}</p>
            <form method="GET" action="{{ route('info.modify') }}">
                <input type="hidden" value="{{ $item->id }}" name="id">
                <button type="submit">modify</button>
            </form>
            <img src="{{ asset('images/clients/'.$item->profilePicture) }}" style="height: 100px; width: 150px;" alt="none">
            <h4>reserves</h4>
            @forelse ($item->reserves as $item2)
                <p>restaurant: {{ $item2->restaurant->name }}</p>
                <p>date: {{ $item2->Targetdate }}</p>
                <p>price: {{ $item2->cost }}FCFA</p>
                <p></p>
            @empty
                <p>no reservation</p>
            @endforelse

            @forelse ($item->commands as $item3)
                <hr>
                <p>name: {{ $item3->menu->restaurant->name }}</p>
                <p>price: {{ $item3->cost }}FCFA</p>
                <p>date: {{ $item3->created_at }}</p>
            @empty
                <p>no command</p>
            @endforelse
            <hr>
        @endforeach
    </div>
@endsection