@extends('layout')

@section('content')
    @include('partials.navbar')

    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-center">
                <div class="banner-content col-lg-12">
                    <h1 class="text-white">Votre carrière est notre priorité</h1>
                    <p class="text-white">Le choix numéro un pour les emplois en centre d'appels au Maroc.</p>
                    <form class="serach-form-area">
                        <div class="row justify-content-center form-wrap">
                            <div class="col-lg-5 form-cols">
                                <div class="default-select" id="default-selects2">
                                    <select id="cities">
                                        <option>Toutes les villes</option>
                                        @if (isset($jobDataJsonCity))
                                            @php $jobDataCities = json_decode($jobDataJsonCity, true); @endphp
                                            @foreach ($jobDataCities as $job)
                                                @if ($job['jobCity'] == 'Ville') @continue @endif
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
                                                @if ($job['jobType'] == 'Type') @continue @endif
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
    <!-- End banner Area -->

    <!-- Start feature-cat Area -->
    <section class="feature-cat-area pt-100" id="category">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-10">
                    <div class="title text-center">
                        <h2 class="mb-10">Nos offres récentes</h2>
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
                        @foreach ($jobData as $job)
                            <div class="single-post d-flex flex-row">
                                <div class="thumb" style="padding: 24px;">
                                    <img src="{{ $job['ImgLink'] }}" alt="{{ $job['jobTitle'] }}"
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
                                                <h6>{{ $job['jobDate'] }}</h6>
                                            </div>
                                            <ul class="btns">
                                                <li><a href="{{ $job['jobUrl'] }}" target="_blank">Postuler</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <a class="text-uppercase loadmore-btn mx-auto d-block" href="/">Toutes les offres</a>
                </div>
                <div class="col-lg-4 sidebar">
                    <div class="single-slidebar">
                        <h4>Centres d’appels par ville</h4>
                        <ul class="cat-list">
                            <li><a class="justify-content-between d-flex"
                                    href="https://www.moncallcenter.ma/q-offres/?Ville=Casablanca" target="_blank">
                                    <p>Casablanca</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex"
                                    href="https://www.moncallcenter.ma/q-offres/?Ville=Rabat"target="_blank">
                                    <p>Rabat</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex"
                                    href="https://www.moncallcenter.ma/q-offres/?Ville=Tanger"target="_blank">
                                    <p>Tanger</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex"
                                    href="https://www.moncallcenter.ma/q-offres/?Ville=Kenitra"target="_blank">
                                    <p>Kenitra</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex"
                                    href="https://www.moncallcenter.ma/q-offres/?Ville=Mohammedia"target="_blank">
                                    <p>Mohammedia</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex"
                                    href="https://www.moncallcenter.ma/q-offres/?Ville=Marrakech"target="_blank">
                                    <p>Marrakech</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex"
                                    href="https://www.moncallcenter.ma/q-offres/?Ville=Meknes"target="_blank">
                                    <p>Meknes</p>
                                </a></li>
                        </ul>
                    </div>
                    <div class="single-slidebar">
                        <h4>Offres de la semaine</h4>
                        <div class="active-relatedjob-carusel">
                            @if (isset($jobDataJsonTop))
                                @php $jobDataTop = json_decode($jobDataJsonTop, true); @endphp
                                @foreach ($jobDataTop as $job)
                                    <div class="single-rated">
                                        <img class="img-fluid" src="{{ $job['ImgLink'] }}" loading="lazy"
                                            alt="{{ $job['jobTitle'] }}" title="{{ $job['jobTitle'] }}" width="100"
                                            height="100"style="border-radius:15px;" >
                                        <a href="{{ $job['jobUrl'] }}">
                                            <h4>{{ $job['jobTitle'] }}</h4>
                                        </a>
                                        <a href="{{ $job['jobUrl'] }}" class="btns text-uppercase" target="_blank">POSTULER</a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
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
                                        <a class="justify-content-between d-flex"
                                            href="https://www.moncallcenter.ma/q-offres/?Type={{ $job['jobType'] }}">
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
