@extends('testsf.page')

@section('content')
    <a href="{{ route('info.index') }}">back</a>
    <div>
        <h1>Showing Manager informations</h1>
        @foreach ($clients as $item)
            <p>{{ $item->name }}</p>
            <div><b>Manager restaurants</b><br>
                @forelse ($item->restaurants as $item2)
                    <p>{{ $item2->name }}</p>
                    <p>news</p>
                    <p>manager: {{ $item2->manager->name }}</p>
                    <hr>
                    <ul>
                        @if ($item2->notice != null)
                            <li><p>name: {{ $item2->notice->name }}</p>
                                <p>subject: {{ $item2->notice->subject }}</p>
                            </li>
                        @else
                            <li>No news</li>
                        @endif
                    </ul>
                    <hr>
                    <p>Menu</p>
                    <hr>
                    <ul>
                        @forelse ($item2->menus as $item3)
                            <li><a style="text-decoration: none;" href="{{ route('info.buy') }}">{{ $item3->meal->name }} price:...... {{ $item3->price }}FCFA</a></li>
                        @empty
                            <li>no meal</li>
                        @endforelse
                    </ul>
                    <p>{{ $item2->location }}</p>
                @empty
                    <p>No restaurant</p>
                @endforelse
                <hr>
            </div>
        @endforeach
    </div>
@endsection