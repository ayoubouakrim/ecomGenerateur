<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <!-- PrimeIcons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/primeicons@6.0.1/primeicons.css">
    <link rel="stylesheet" href="{{ asset('css/templatespage.css') }}">
</head>
<body>
<div class="canvas-wrapper">
    <!-- Première carte avec vidéo -->
    <a href="#" class="canvas">
        <div class="canvas_border">
            <svg>
                <defs>
                    <linearGradient id="grad-orange" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:rgb(253,137,68);stop-opacity:1"></stop>
                        <stop offset="100%" style="stop-color:rgb(153,75,23);stop-opacity:1"></stop>
                    </linearGradient>
                </defs>
                <rect id="rect-grad" class="rect-gradient" fill="none" stroke="url(#grad-orange)" stroke-linecap="square" stroke-width="4" stroke-miterlimit="30" width="100%" height="100%"></rect>
            </svg>
        </div>
        <div class="canvas_img-wrapper">
            <!-- Vidéo de démonstration -->
            <video class="canvas_video" autoplay loop muted>
                <source src="assets/templates/template_without_sidebar.mp4" type="video/mp4">
                Votre navigateur ne supporte pas la lecture des vidéos.
            </video>
        </div>
        <div class="canvas_copy canvas_copy--left">
            <span class="canvas_copy_subtitle">Template 1</span>
            <strong class="canvas_copy_title">Simple</strong>
            <strong class="canvas_copy_title">Template</strong>
{{--            <span class="canvas_copy_details">Détails et informations</span>--}}
        </div>
    </a>
    <!-- Deuxième carte avec vidéo -->
    <a href="#" class="canvas">
        <div class="canvas_border">
            <svg>
                <defs>
                    <linearGradient id="grad-orange" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:rgb(253,137,68);stop-opacity:1"></stop>
                        <stop offset="100%" style="stop-color:rgb(153,75,23);stop-opacity:1"></stop>
                    </linearGradient>
                </defs>
                <rect id="rect-grad" class="rect-gradient" fill="none" stroke="url(#grad-orange)" stroke-linecap="square" stroke-width="4" stroke-miterlimit="30" width="100%" height="100%"></rect>
            </svg>
        </div>
        <div class="canvas_img-wrapper">
            <!-- Vidéo de démonstration -->
            <video class="canvas_video" autoplay loop muted>
                <source src="assets/templates/bootstrap-4-sidebar-menu.mp4" type="video/mp4">
                Votre navigateur ne supporte pas la lecture des vidéos.
            </video>
        </div>
        <div class="canvas_copy">
            <span class="canvas_copy_subtitle">Template 2</span>
            <strong class="canvas_copy_title">SideBar</strong>
            <strong class="canvas_copy_title">Tempate</strong>
{{--            <span class="canvas_copy_details">Détails et informations</span>--}}
        </div>
    </a>
</div>
</body>
</html>

{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Login & Register</title>--}}
{{--    <!-- PrimeIcons CSS -->--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/primeicons@6.0.1/primeicons.css">--}}
{{--    <link rel="stylesheet" href="{{ asset('css/templatespage.css') }}">--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="canvas-wrapper">--}}
{{--    <a href="#" class="canvas">--}}
{{--        <div class="canvas_border">--}}
{{--            <svg>--}}
{{--                <defs>--}}
{{--                    <linearGradient id="grad-orange" x1="0%" y1="0%" x2="100%" y2="0%">--}}
{{--                        <stop offset="0%" style="stop-color:rgb(253,137,68);stop-opacity:1"></stop>--}}
{{--                        <stop offset="100%" style="stop-color:rgb(153,75,23);stop-opacity:1"></stop>--}}
{{--                    </linearGradient>--}}
{{--                </defs>--}}
{{--                <rect id="rect-grad" class="rect-gradient" fill="none" stroke="url(#grad-orange)" stroke-linecap="square" stroke-width="4" stroke-miterlimit="30" width="100%" height="100%"></rect>--}}
{{--            </svg>--}}
{{--        </div>--}}
{{--        <div class="canvas_img-wrapper">--}}
{{--            <img class="canvas_img" src="https://blog.codepen.io/wp-content/uploads/2012/06/Button-Black-Large.png" alt="">--}}
{{--        </div>--}}
{{--        <div class="canvas_copy canvas_copy--left">--}}
{{--            <span class="canvas_copy_subtitle">Heading</span>--}}
{{--            <strong class="canvas_copy_title">Hello</strong>--}}
{{--            <strong class="canvas_copy_title">World</strong>--}}
{{--            <span class="canvas_copy_details">Details and stuff</span>--}}
{{--        </div>--}}
{{--    </a>--}}
{{--    <a href="#" class="canvas">--}}
{{--        <div class="canvas_border">--}}
{{--            <svg>--}}
{{--                <defs>--}}
{{--                    <linearGradient id="grad-orange" x1="0%" y1="0%" x2="100%" y2="0%">--}}
{{--                        <stop offset="0%" style="stop-color:rgb(253,137,68);stop-opacity:1"></stop>--}}
{{--                        <stop offset="100%" style="stop-color:rgb(153,75,23);stop-opacity:1"></stop>--}}
{{--                    </linearGradient>--}}
{{--                </defs>--}}
{{--                <rect id="rect-grad" class="rect-gradient" fill="none" stroke="url(#grad-orange)" stroke-linecap="square" stroke-width="4" stroke-miterlimit="30" width="100%" height="100%"></rect>--}}
{{--            </svg>--}}
{{--        </div>--}}
{{--        <div class="canvas_img-wrapper">--}}
{{--            <img class="canvas_img" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/249772/Twitter_Logo_Blue.png" alt="">--}}
{{--        </div>--}}
{{--        <div class="canvas_copy">--}}
{{--            <span class="canvas_copy_subtitle">Heading</span>--}}
{{--            <strong class="canvas_copy_title">Simple</strong>--}}
{{--            <strong class="canvas_copy_title">Template</strong>--}}
{{--            <span class="canvas_copy_details">Details and stuff</span>--}}
{{--        </div>--}}
{{--    </a>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}
