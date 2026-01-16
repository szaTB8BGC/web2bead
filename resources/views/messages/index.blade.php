@extends('layouts.arcana')
@section('title', 'Beérkezett üzenetek')
@section('content')
    <article>
        <header><h2>Beérkezett üzenetek</h2></header>
        <div class="table-wrapper">
            <table class="default">
                <thead>
                    <tr>
                        <th>Dátum</th>
                        <th>Küldő</th>
                        <th>Tárgy</th>
                        <th>Üzenet</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $msg)
                    <tr>
                        <td>{{ $msg->created_at->format('Y-m-d H:i') }}</td>
                        <td><strong>{{ $msg->name }}</strong><br>{{ $msg->email }}</td>
                        <td>{{ $msg->subject }}</td>
                        <td>{{ $msg->message }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </article>
@endsection