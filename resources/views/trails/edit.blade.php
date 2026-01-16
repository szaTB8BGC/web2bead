@extends('layouts.arcana')

@section('title', 'Útvonal szerkesztése')

@section('content')
    <article>
        <header>
            <h2>"{{ $trail->nev }}" szerkesztése</h2>
            <p>Itt módosíthatod a túraútvonal adatait.</p>
        </header>

        <form method="POST" action="{{ route('trails.update', $trail->azon) }}">
            @csrf
            @method('PUT') {{-- Ez kritikus a CRUD módosításhoz! --}}
            
            <div class="row gtr-50">
                <div class="col-12">
                    <label for="nev">Útvonal neve:</label>
                    <input type="text" name="nev" id="nev" value="{{ $trail->nev }}" required />
                </div>
                <div class="col-6 col-12-mobilep">
                    <label for="hossz">Hossz (km):</label>
                    <input type="number" step="0.1" name="hossz" id="hossz" value="{{ $trail->hossz }}" required />
                </div>
                <div class="col-6 col-12-mobilep">
                    <label for="allomas">Állomások száma:</label>
                    <input type="number" name="allomas" id="allomas" value="{{ $trail->allomas }}" />
                </div>
                <div class="col-6 col-12-mobilep">
                    <label for="ido">Időtartam:</label>
                    <input type="text" name="ido" id="ido" value="{{ $trail->ido }}" />
                </div>
                <div class="col-6 col-12-mobilep">
                    <label for="vezetes">Szakvezetés:</label>
                    <select name="vezetes" id="vezetes">
                        <option value="0" {{ !$trail->vezetes ? 'selected' : '' }}>Nincs szakvezetés</option>
                        <option value="1" {{ $trail->vezetes ? 'selected' : '' }}>Van szakvezetés</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="telepulesid">Település:</label>
                    <select name="telepulesid" id="telepulesid" required>
                        @foreach($settlements as $s)
                            <option value="{{ $s->id }}" {{ $trail->telepulesid == $s->id ? 'selected' : '' }}>
                                {{ $s->nev }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <ul class="actions">
                        <li><input type="submit" value="Módosítások mentése" class="button" /></li>
                        <li><a href="{{ route('trails.index') }}" class="button alt">Vissza a listához</a></li>
                    </ul>
                </div>
            </div>
        </form>
    </article>
@endsection