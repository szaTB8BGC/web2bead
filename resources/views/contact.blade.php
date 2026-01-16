@extends('layouts.arcana')

@section('title', 'Kapcsolat')

@section('content')
    <article>
        <header>
            <h2>Vedd fel velünk a kapcsolatot!</h2>
            <p>Kérdésed van a Nemzeti Parkokkal vagy a túraútvonalakkal kapcsolatban? Írj nekünk!</p>
        </header>

        @if(session('success'))
            <div style="background: #d4edda; color: #155724; padding: 15px; margin-bottom: 20px; border-radius: 5px; border: 1px solid #c3e6cb;">
                {{ session('success') }}
            </div>
        @endif

        <section>
            <form method="POST" action="{{ route('contact.store') }}">
                @csrf {{-- Biztonsági token, enélkül nem engedi a mentést a Laravel --}}
                
                <div class="row gtr-50">
                    <div class="col-6 col-12-mobilep">
                        <input type="text" name="name" id="name" placeholder="Teljes név" required />
                    </div>
                    <div class="col-6 col-12-mobilep">
                        <input type="email" name="email" id="email" placeholder="Email cím" required />
                    </div>
                    <div class="col-12">
                        <input type="text" name="subject" id="subject" placeholder="Üzenet tárgya" required />
                    </div>
                    <div class="col-12">
                        <textarea name="message" id="message" placeholder="Írd le üzenetedet..." rows="5" required></textarea>
                    </div>
                    <div class="col-12">
                        <ul class="actions">
                            <li><input type="submit" class="button" value="Üzenet küldése" /></li>
                        </ul>
                    </div>
                </div>
            </form>
        </section>
    </article>
@endsection