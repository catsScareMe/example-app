<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <script>window.Laravel = { csrfToken: 'csrf_token()}}' }</script> 
    <title>Random</title>
</head>
<body>
    <div id="app">
    @foreach ($allRandom as $random)
        @if ($random->flag == false)
            <h1> {{ $random->values }} </h1>
            <spirals :data = "{{ $random->breakdowns->pluck('values')}}" ></spirals>
        @endif
    @endforeach
    </svg>
    </div>
    <script src= "{{ asset('js/app.js') }}"></script>
</body>
</html>