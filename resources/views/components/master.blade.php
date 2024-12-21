<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">--}}
    <title>Generator | {{ $title }}</title>
    <!-- Inclure le CSS personnalisé -->
{{--    <link rel="stylesheet" href="{{ asset('css/login.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('css/register.css') }}">--}}
    @stack('styles')


    <!-- Inclure PrimeIcons pour les icônes -->
    <link rel="stylesheet" href="https://unpkg.com/primeicons/primeicons.css"/>
</head>
<body>

{{--    @include('partials.nav')--}}




    <div>
{{--        <div class="row my-3">--}}
{{--            @include('partials.flashbag')--}}

{{--        </div>--}}
        {{ $slot }}
    </div>

<script>
    function toggleSignUpMode() {
        document.querySelector('.container').classList.toggle('sign-up-mode');
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>--}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>

@stack('scripts')

</body>
</html>
