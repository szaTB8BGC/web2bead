@extends('layouts.arcana')

@section('title', 'Új útvonal')

@section('content')
    <article>
        <header>
            <h2>Új túraútvonal rögzítése</h2>
        </header>

        <form method="POST" action="{{ route('trails.store') }}">
            @csrf
            <div class="row gtr-50">
                <div class="col-12">
                    <input type="text" name="nev" placeholder="Útvonal neve" required />
                </div>
                <div class="col-6 col-12-mobilep">
                    <input type="number" step="0.1" name="hossz" placeholder="Hossz (km)" required />
                </div>
                <div class="col-6 col-12-mobilep">
                    <input type="number" name="allomas" placeholder="Állomások száma" />
                </div>
                <div class="col-6 col-12-mobilep">
                    <input type="text" name="ido" placeholder="Időtartam (pl. 3 óra)" />
                </div>
                <div class="col-6 col-12-mobilep">
                    <select name="vezetes">
                        <option value="0">Nincs szakvezetés</option>
                        <option value="1">Van szakvezetés</option>
                    </select>
                </div>
                <div class="col-12">
                    <select name="telepulesid" required>
                        <option value="">Válassz települést...</option>
                        @foreach($settlements as $s)
                            <option value="{{ $s->id }}">{{ $s->nev }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <ul class="actions">
                        <li><input type="submit" value="Létrehozás" class="button" /></li>
                        <li><a href="{{ route('trails.index') }}" class="button alt">Mégse</a></li>
                    </ul>
                </div>
            </div>
        </form>
    </article>
@endsection