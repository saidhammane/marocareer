<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name=" robots" content=" index, follow">
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Votre carrière est notre priorité" />
    <meta property="description" content="Le site de recrutement des centres d'appels au Maroc" />
    <meta property="og:description" content="Le site de recrutement des centres d'appels au Maroc" />
    <meta property="og:image" content="https://marocareer.tech/img/logo_32_32.png" />
    <meta property="og:url" content="https://marocareer.tech" />
    <meta property="og:site_name" content="marocareer" />
    <meta name="keywords" content="recherche d'emploi, opportunités d'emploi, offres de carrière, annonces d'emploi, postes vacants, chercheur d'emploi, 
        portail d'emploi, base de données d'emploi, annonces de travail, possibilités d'emploi, candidatures, moteur de recherche d'emploi, 
        site d'offres d'emploi, marché du travail, chasse à l'emploi, demandeurs d'emploi, site d'annonces d'emploi, trouver un emploi, 
        plateforme de recherche d'emploi, correspondance d'emploi, site de publication d'emploi">
        <link rel="canonical" href="https://marocareer.tech/" />
    <meta name="google-site-verification" content="QVLLhWTmyC-ICoj3EKYwb6vcM5e2NbwuUNm65V8O9-g">
    <meta name="google-adsense-account" content="ca-pub-9270875061752923">
    @include('partials.header')
    <title>MaroCareer</title>
</head>

<body>
    <div class="loader-content">
        <div class="loader"></div>
    </div>
    <div id="all-pages" class="d-none">
        @yield('content')
    </div>
    @include('partials.script')
</body>

</html>