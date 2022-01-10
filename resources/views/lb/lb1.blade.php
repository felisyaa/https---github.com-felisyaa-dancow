@extends('layouts.satu.main')
@section('content')
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <table border="2" class="table" style="width: 50%;">
            <tr>
                <th>Rank</th>
                <th>Username</th>
                <th>Score</th>
            </tr>
            @foreach ($lbs as $lb)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $lb->username }}</td>
                    <td>{{ $lb->score }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</header>
@endsection