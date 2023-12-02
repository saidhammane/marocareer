<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name=" robots" content=" index, follow">
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Votre carrière est notre priorité" />
    <meta property="og:description" content="Le site de recrutement des centres d'appels au Maroc" />
    <meta property="og:image" content="https://marocareer.000webhostapp.com/img/logo_32_32.png" />
    <meta property="og:url" content="https://marocareer.000webhostapp.com/" />
    <meta property="og:site_name" content="marocareer" />
    <meta name="keywords" content="recherche d'emploi, opportunités d'emploi, offres de carrière, annonces d'emploi, postes vacants, chercheur d'emploi, 
        portail d'emploi, base de données d'emploi, annonces de travail, possibilités d'emploi, candidatures, moteur de recherche d'emploi, 
        site d'offres d'emploi, marché du travail, chasse à l'emploi, demandeurs d'emploi, site d'annonces d'emploi, trouver un emploi, 
        plateforme de recherche d'emploi, correspondance d'emploi, site de publication d'emploi">
    <!-- <meta name="google-site-verification" content="QVLLhWTmyC-ICoj3EKYwb6vcM5e2NbwuUNm65V8O9-g">
    <meta name="google-adsense-account" content="ca-pub-9270875061752923">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9270875061752923" crossorigin="anonymous"></script> -->
    <link rel="canonical" href="https://marocareer.tech/" />
    @include('partials.header')
    <title>MaroCareer</title>
</head>

<body>
    <div class="loader-content">
        <div class="loader"></div>
    </div>
    <div id="all-pages" class="invisible">
        @yield('content')
    </div>
    <script>
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.querySelector('.loader-content').style.display = 'none';
                document.querySelector('#all-pages').classList.remove('invisible');
            }, 1000);
        });
    </script>
    @include('partials.script')
</body>

</html>