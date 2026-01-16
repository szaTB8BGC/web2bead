@extends('layouts.arcana')

@section('title', 'Főoldal')

@section('content')
    <section>
        <header>
            <h2>Üdvözöljük a Nemzeti Parkok weboldalán!</h2>
            <p>Fedezze fel Magyarország legszebb túraútvonalait és településeit.</p>
        </header>
        <p>
            Ez a projekt a Webprogramozás 2 kurzus beadandó feladata. 
            A weboldal Laravel keretrendszer segítségével készült, 
            és az adatokat (Nemzeti Parkok, utak, települések) TXT fájlokból importáltuk.
        </p>
        <ul class="actions">
            <li><a href="{{ route('database.index') }}" class="button">Adatbázis megtekintése</a></li>
        </ul>
    </section>
@endsection