@extends('layout')

@section('content')
    @include('partials.navbar')

    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Quiz
                    </h1>
                    <p class="text-white"><a href="/">Accueill </a> <span class="lnr lnr-arrow-right"></span> <a
                            href="/quiz"> Quiz </a></p>
                </div>
            </div>
        </div>
    </section>
    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center d-flex">
                <div class="col-lg-8 post-list">
                    <div class="row">
                        @if (isset($quizDataJson))
                            @php $quizData = json_decode($quizDataJson, true); @endphp
                            @foreach ($quizData as $job)
                                <div class="col-lg-6 mt-20 reletiveCol">
                                    <div class="card ">
                                        <a href="url" target="_blank">
                                            <img class="card-img-top darkened-image" src="{{ asset('img/backquiz.webp') }}"
                                                alt="name" title="name" height="180" loading="lazy">
                                            <img class="overlay-image rounded"
                                                src="{{ $job['imgUrl'] }}"
                                                alt="name" title="name" height="120" loading="lazy"
                                                width="120"></a>
                                        <div class="card-body">
                                            <div style="text-align: center;">
                                                <div class="card-title h5">{{ $job['title'] }}</div>
                                            </div>
                                            <br>
                                            <div style="text-align: center;">
                                                <p class="card-text">{{ $job['qd'] }}
                                                    <br>Nombre de participants: <span style="font-weight: bold">{{ $job['NombreParticipants'] }}</span>
                                                    <br>Note moyenne : <span style="font-weight: bold">{{ $job['NoteMoyenne'] }}</span>
                                                </p>
                                            </div>
                                            <br>
                                            <div style="text-align: center; width: 100%;">
                                                <a style="width: 100%;" href="{{ $job['url'] }}" class="btn btn-secondary" target="_blank">Lancer le test</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 sidebar">
                    <div class="single-slidebar">
                        <h4>Centres d’appels par ville</h4>
                        <div class="row">
                            @for ($i = 0; $i < 6; $i++)
                                <div class="col-md-4 mt-10">
                                    <a href="#">
                                        <img src="https://www.moncallcenter.ma/im/120/images/300/ca-dks5amdyadsp0wytnwdbf6mh19fyth19042017032050.jpg"
                                            class="img-thumbnail" alt="...">
                                    </a>
                                </div>
                            @endfor
                        </div>
                        {{-- <ul class="cat-list">
                            <li><a class="justify-content-between d-flex"
                                    href="https://www.moncallcenter.ma/q-offres/?Ville=Casablanca">
                                    <p>Casablanca</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex"
                                    href="https://www.moncallcenter.ma/q-offres/?Ville=Rabat">
                                    <p>Rabat</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex"
                                    href="https://www.moncallcenter.ma/q-offres/?Ville=Tanger">
                                    <p>Tanger</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex"
                                    href="https://www.moncallcenter.ma/q-offres/?Ville=Kenitra">
                                    <p>Kenitra</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex"
                                    href="https://www.moncallcenter.ma/q-offres/?Ville=Mohammedia">
                                    <p>Mohammedia</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex"
                                    href="https://www.moncallcenter.ma/q-offres/?Ville=Marrakech">
                                    <p>Marrakech</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex"
                                    href="https://www.moncallcenter.ma/q-offres/?Ville=Meknes">
                                    <p>Meknes</p>
                                </a></li>
                        </ul> --}}
                    </div>
                    <div class="single-slidebar">
                        <h4>Offres de la semaine</h4>
                        <div class="active-relatedjob-carusel">
                            {{-- @if (isset($jobDataJsonTop))
                                @php $jobDataTop = json_decode($jobDataJsonTop, true); @endphp
                                @foreach ($jobDataTop as $job) --}}
                            <div class="single-rated">
                                <img class="img-fluid" src="{{ asset('img/backquiz.webp') }}" loading="lazy" alt="jobTitle" title="ImgLink"
                                    width="100" height="100"style="border-radius:15px;">
                                <a href="jobUrl">
                                    <h4>jobTitle</h4>
                                </a>
                                <a href="jobUrl" class="btns text-uppercase">POSTULER</a>
                            </div>
                            {{-- @endforeach
                            @endif --}}
                        </div>
                    </div>
                    <div class="single-slidebar">
                        <h4>Emplois par type</h4>
                        <ul class="cat-list">
                            {{-- @if (isset($jobDataJsonType))
                                @php $jobDataTypes = json_decode($jobDataJsonType, true); @endphp
                                @foreach ($jobDataTypes as $job) --}}
                            {{-- @if ($job['jobType'] == 'Type')
                                        @continue
                                    @endif --}}
                            <li>
                                <a class="justify-content-between d-flex"
                                    href="https://www.moncallcenter.ma/q-offres/?Type=jobType">
                                    <p>jobType</p>
                                </a>
                            </li>
                            {{-- @endforeach
                            @endif --}}
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
    <!-- End banner Area -->
    @include('partials.footer')
@endsection
