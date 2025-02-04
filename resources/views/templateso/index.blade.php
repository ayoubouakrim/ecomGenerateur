<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <!-- PrimeIcons CSS -->

</head>
<body>

<h1>Choisissez un template</h1>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<ul>
    @foreach($templates as $template)
        <li>
            <form action="{{ route('templateso.choose') }}" method="POST">
                @csrf
                <input type="hidden" name="templateName" value="{{ $template }}">
                <button type="submit">{{ $template }}</button>
            </form>
        </li>
    @endforeach
</ul>
</body>
</html>
