@extends('layout')

@section('content')
    @include('partials.navbar')

    <style>
        .🤚 {
            --skin-color: #E4C560;
            --tap-speed: 0.6s;
            --tap-stagger: 0.1s;
            position: relative;
            width: 80px;
            height: 60px;
            margin-left: 80px;
        }

        .🤚:before {
            content: '';
            display: block;
            width: 180%;
            height: 75%;
            position: absolute;
            top: 70%;
            right: 20%;
            background-color: black;
            border-radius: 40px 10px;
            filter: blur(10px);
            opacity: 0.3;
        }

        .🌴 {
            display: block;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: var(--skin-color);
            border-radius: 10px 40px;
        }

        .👍 {
            position: absolute;
            width: 120%;
            height: 38px;
            background-color: var(--skin-color);
            bottom: -18%;
            right: 1%;
            transform-origin: calc(100% - 20px) 20px;
            transform: rotate(-20deg);
            border-radius: 30px 20px 20px 10px;
            border-bottom: 2px solid rgba(0, 0, 0, 0.1);
            border-left: 2px solid rgba(0, 0, 0, 0.1);
        }

        .👍:after {
            width: 20%;
            height: 60%;
            content: '';
            background-color: rgba(255, 255, 255, 0.3);
            position: absolute;
            bottom: -8%;
            left: 5px;
            border-radius: 60% 10% 10% 30%;
            border-right: 2px solid rgba(0, 0, 0, 0.05);
        }

        .👉 {
            position: absolute;
            width: 80%;
            height: 35px;
            background-color: var(--skin-color);
            bottom: 32%;
            right: 64%;
            transform-origin: 100% 20px;
            animation-duration: calc(var(--tap-speed) * 2);
            animation-timing-function: ease-in-out;
            animation-iteration-count: infinite;
            transform: rotate(10deg);
        }

        .👉:before {
            content: '';
            position: absolute;
            width: 140%;
            height: 30px;
            background-color: var(--skin-color);
            bottom: 8%;
            right: 65%;
            transform-origin: calc(100% - 20px) 20px;
            transform: rotate(-60deg);
            border-radius: 20px;
        }

        .👉:nth-child(1) {
            animation-delay: 0;
            filter: brightness(70%);
            animation-name: tap-upper-1;
        }

        .👉:nth-child(2) {
            animation-delay: var(--tap-stagger);
            filter: brightness(80%);
            animation-name: tap-upper-2;
        }

        .👉:nth-child(3) {
            animation-delay: calc(var(--tap-stagger) * 2);
            filter: brightness(90%);
            animation-name: tap-upper-3;
        }

        .👉:nth-child(4) {
            animation-delay: calc(var(--tap-stagger) * 3);
            filter: brightness(100%);
            animation-name: tap-upper-4;
        }

        @keyframes tap-upper-1 {

            0%,
            50%,
            100% {
                transform: rotate(10deg) scale(0.4);
            }

            40% {
                transform: rotate(50deg) scale(0.4);
            }
        }

        @keyframes tap-upper-2 {

            0%,
            50%,
            100% {
                transform: rotate(10deg) scale(0.6);
            }

            40% {
                transform: rotate(50deg) scale(0.6);
            }
        }

        @keyframes tap-upper-3 {

            0%,
            50%,
            100% {
                transform: rotate(10deg) scale(0.8);
            }

            40% {
                transform: rotate(50deg) scale(0.8);
            }
        }

        @keyframes tap-upper-4 {

            0%,
            50%,
            100% {
                transform: rotate(10deg) scale(1);
            }

            40% {
                transform: rotate(50deg) scale(1);
            }
        }
    </style>

    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-center">
                <div class="banner-content col-lg-12">
                    <h1 class="text-white">Emplois à {{ $city }} @if ($type != null)
                            - {{ $type }}
                        @endif
                    </h1>
                    <form class="serach-form-area">
                        <div class="row justify-content-center form-wrap">
                            <div class="col-lg-5 form-cols">
                                <div class="default-select" id="default-selects2">
                                    <select id="cities">
                                        <option>Toutes les villes</option>
                                        @if (isset($jobDataJsonCity))
                                            @php $jobDataCities = json_decode($jobDataJsonCity, true); @endphp
                                            @foreach ($jobDataCities as $job)
                                                @if ($job['jobCity'] == 'Ville')
                                                    @continue
                                                @endif
                                                <option value="{{ $job['jobCity'] }}">{{ $job['jobCity'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-5 form-cols">
                                <div class="default-select" id="default-selects2">
                                    <select id="type">
                                        <option>Type</option>
                                        @if (isset($jobDataJsonType))
                                            @php $jobDataTypes = json_decode($jobDataJsonType, true); @endphp
                                            @foreach ($jobDataTypes as $job)
                                                @if ($job['jobType'] == 'Type')
                                                    @continue
                                                @endif
                                                <option value="{{ $job['jobType'] }}">{{ $job['jobType'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-2 form-cols">
                                <button type="button" class="btn btn-info" id="searchBtnHome">
                                    <span class="lnr lnr-magnifier"></span> Rechercher
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Start feature-cat Area -->
    <section class="feature-cat-area pt-100" id="category">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-10">
                    <div class="title text-center">
                        <h2 class="mb-10">Nos offres</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End feature-cat Area -->
    <!-- Start post Area -->
    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center d-flex">
                <div class="col-lg-8 post-list">
                    @if (isset($jobDataJson))
                        @php $jobData = json_decode($jobDataJson, true); @endphp
                        @if (!empty($jobData))
                            @foreach ($jobData as $job)
                                <div class="single-post d-flex flex-row">
                                    <div class="thumb" style="padding: 24px;">
                                        <img src="{{ $job['jobImgLink'] }}" alt="{{ $job['jobTitle'] }}"
                                            title="{{ $job['jobTitle'] }}" loading="lazy" height="100" width="100"
                                            style="border-radius:15px;">
                                    </div>
                                    <div class="job-container">
                                        <div class="details">
                                            <div class="title ">
                                                <div class="titles">
                                                    <a href="{{ $job['jobUrl'] }}">
                                                        <h4>{{ $job['jobTitle'] }}</h4>
                                                    </a>
                                                    <h6>{{ $job['jobMetaData'] }}</h6>
                                                </div>
                                                <ul class="btns">
                                                    <li><a href="{{ $job['jobUrl'] }}" target="_blank">Postuler</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-warning" role="alert">
                                <strong>Oups !</strong> Il semble qu'il n'y ait actuellement aucune offre d'emploi dans
                                cette zone.
                            </div>
                            <br><br><br>
                            <div class="row">
                                <div class="col-md">
                                    <div class="🤚">
                                        <div class="👉"></div>
                                        <div class="👉"></div>
                                        <div class="👉"></div>
                                        <div class="👉"></div>
                                        <div class="🌴"></div>
                                        <div class="👍"></div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="🤚">
                                        <div class="👉"></div>
                                        <div class="👉"></div>
                                        <div class="👉"></div>
                                        <div class="👉"></div>
                                        <div class="🌴"></div>
                                        <div class="👍"></div>
                                    </div>

                                </div>
                                <div class="col-md">
                                    <div class="🤚">
                                        <div class="👉"></div>
                                        <div class="👉"></div>
                                        <div class="👉"></div>
                                        <div class="👉"></div>
                                        <div class="🌴"></div>
                                        <div class="👍"></div>
                                    </div>

                                </div>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="col-lg-4 sidebar">
                    <div class="single-slidebar">
                        <h4>Centres d’appels par ville</h4>
                        <ul class="cat-list">
                            <li><a class="justify-content-between d-flex" href="/Ville/Casablanca" target="">
                                    <p>Casablanca</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="/Ville/Rabat">
                                    <p>Rabat</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="/Ville/Tanger">
                                    <p>Tanger</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="/Ville/Kenitra">
                                    <p>Kenitra</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="/Ville/Mohammedia">
                                    <p>Mohammedia</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="/Ville/Marrakech">
                                    <p>Marrakech</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="/Ville/Meknes">
                                    <p>Meknes</p>
                                </a></li>
                        </ul>
                    </div>
                    <div class="single-slidebar">
                        <h4>Emplois par type</h4>
                        <ul class="cat-list">
                            @if (isset($jobDataJsonType))
                                @php $jobDataTypes = json_decode($jobDataJsonType, true); @endphp
                                @foreach ($jobDataTypes as $job)
                                    @if ($job['jobType'] == 'Type')
                                        @continue
                                    @endif
                                    <li>
                                        <a class="justify-content-between d-flex" href="/Type/{{ $job['jobType'] }}">
                                            <p>{{ $job['jobType'] }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="single-slidebar">
                        <h4>Actualités</h4>
                        <div class="blog-list">
                            <div class="single-blog " style="background:#000 url('img/blog1.jpg');">
                                <a href="http://www.callinnov.com/la-concurrence-des-destinations-offshores-call-center/"
                                    target="_blank">
                                    <h4>La concurrence des destinations offshores call center</h4>
                                </a>
                                <div class="meta justify-content-between d-flex">
                                    <p>août 15, 2022</p>
                                </div>
                            </div>
                            <div class="single-blog " style="background:#000 url(img/blog2.jpg);">
                                <a href="http://www.callinnov.com/telemarketing-evolution-dun-marche/" target="_blank">
                                    <h4>Home Audio Recording <br>
                                        For Everyone</h4>
                                </a>
                                <div class="meta justify-content-between d-flex">
                                    <p>juin 23, 2022</p>
                                </div>
                            </div>
                            <div class="single-blog" style="background:#000 url(img/blog3.png);">
                                <a href="http://www.callinnov.com/call-center/" target="_blank">
                                    <h4>Le Centre d’appel (Call center) s’agrandit</h4>
                                </a>
                                <div class="meta justify-content-between d-flex">
                                    <p>août 15, 2022</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End post Area -->

    @include('partials.footer')
@endsection
