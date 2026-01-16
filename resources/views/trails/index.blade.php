@extends('layouts.arcana')

@section('title', 'Túraútvonalak kezelése')

@section('content')
    <article>
        <header>
            <h2>Túraútvonalak Karbantartása</h2>
            <p>Itt módosíthatod vagy törölheted a meglévő útvonalakat.</p>
            <ul class="actions">
                <li><a href="{{ route('trails.create') }}" class="button">Új útvonal hozzáadása</a></li>
            </ul>
        </header>

        @if(session('success'))
            <div style="background: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border-radius: 5px;">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-wrapper">
            <table class="default">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Név</th>
                        <th>Település</th>
                        <th>Hossz</th>
                        <th>Műveletek</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trails as $trail)
                    <tr>
                        <td>{{ $trail->azon }}</td>
                        <td>{{ $trail->nev }}</td>
                        <td>{{ $trail->settlement->nev ?? '—' }}</td>
                        <td>{{ $trail->hossz }} km</td>
                        <td style="white-space: nowrap;">
                            <a href="{{ route('trails.edit', $trail->azon) }}" class="button mb-1">Szerkeszt</a>
                            
                            <form action="{{ route('trails.destroy', $trail->azon) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button alt" onclick="return confirm('Biztosan törlöd?')">Töröl</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </article>
@endsection