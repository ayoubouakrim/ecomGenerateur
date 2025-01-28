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
<form id="templateForm" method="POST" action="{{ route('save.template') }}">
    @csrf
    <div class="canvas-wrapper">
        <input type="hidden" name="template_name" id="template_name" value="">
        <input type="hidden" name="template_filepath" id="template_filepath" value="">

        <!-- Template 1 -->
        <a href="#" class="canvas" onclick="selectTemplate('simpletemplate')">
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
            </div>
        </a>

        <!-- Template 2 -->
        <a href="#" class="canvas" onclick="selectTemplate('sidebartemplate')">
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
                <strong class="canvas_copy_title">Template</strong>
            </div>
        </a>


</div>
</form>

<script>
    function selectTemplate(templateName) {
        // Mettre à jour les champs cachés
        document.getElementById('template_name').value = templateName;
        document.getElementById('template_filepath').value = templateName; // Le chemin est le même que le nom

        // Soumettre automatiquement le formulaire
        document.getElementById('templateForm').submit();
    }
</script>

</body>
</html>
