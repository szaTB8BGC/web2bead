@extends('layouts.arcana')

@section('title', 'Adatbázis - Nemzeti Parkok')

@section('content')
    <article>
        <header>
            <h2>Nemzeti Parkok és Túrautak</h2>
        </header>

        <h3>Nemzeti Parkok</h3>
        <table class="default">
            <thead>
                <tr><th>ID</th><th>Név</th></tr>
            </thead>
            <tbody>
                @foreach($parks as $park)
                <tr><td>{{ $park->id }}</td><td>{{ $park->nev }}</td></tr>
                @endforeach
            </tbody>
        </table>

        <h3 style="margin-top: 2em;">Összetett túraútvonal lista (Kapcsolt adatokkal)</h3>
        <table class="default">
            <thead>
                <tr>
                    <th>Útvonal neve</th>
                    <th>Település</th>
                    <th>Nemzeti Park</th>
                    <th>Hossz (km)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trails as $trail)
                <tr>
                    <td>{{ $trail->nev }}</td>
                    <td>{{ $trail->settlement->nev ?? 'Nincs adat' }}</td>
                    <td>{{ $trail->settlement->nationalPark->nev ?? 'Nincs adat' }}</td>
                    <td>{{ $trail->hossz }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </article>
@endsection