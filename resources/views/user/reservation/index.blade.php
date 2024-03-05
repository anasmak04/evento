<div class="container">

        <h1>Mes Réservations</h1>
        <ul>
            @foreach ($reservations as $reservation)
                <li>{{ $reservation->name }} - {{ $reservation->pivot->created_at->format('d/m/Y') }}</li>
            @endforeach
        </ul>
    </div>

