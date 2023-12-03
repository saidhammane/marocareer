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
                <p class="text-white"><a href="/">Accueill </a> <span class="lnr lnr-arrow-right"></span> <a href="/quiz"> Quiz </a></p>
            </div>
        </div>
    </div>
    @include('partials.shape')
</section>
<section class="post-area section-gap">
    <div class="container">
        <div class="row justify-content-center d-flex my-5">
            <div class="col-lg-8 post-list">
                <div class="row">
                    @if (isset($quizDataJson))
                    @php $quizData = json_decode($quizDataJson, true); @endphp
                    @foreach ($quizData as $job)
                    <div class="col-lg-12 post-list">
                        <div class="single-post d-flex flex-row align-sm-items-center">
                            <div class="thumb">
                                <img src="{{ $job['imgUrl'] }}" alt="name" title="name" height="100" width="100" loading="lazy">
                            </div>
                            <div class="job-container">
                                <div class="details">
                                    <div class="title">
                                        <h4>{{ $job['title'] }}</h4>
                                        <p>{{ $job['qd'] }}
                                            <br>Nombre de participants: <span style="font-weight: bold">{{ $job['NombreParticipants'] }}</span>
                                            <br>Note moyenne : <span style="font-weight: bold">{{ $job['NoteMoyenne'] }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ $job['url'] }}" class="button" target="_blank">Lancer le test</a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="col-lg-4 sidebar">
                <div class="single-slidebar">
                    <div class="menu-content mb-4">
                        <div class="title text-start">
                            <h4>Les centres qui recrutent</h4>
                        </div>
                    </div>
                    <div class="row">
                        @if (isset($callCenterRecrutJson))
                        @php $callCenterRecrut = json_decode($callCenterRecrutJson, true); @endphp
                        @foreach ($callCenterRecrut as $job)
                        <div class="col-6 col-md-4 mt-10 text-center">
                            <a href="https://www.moncallcenter.ma//{{ $job['title'] }}" target="_blank">
                                <img src="{{ $job['imgUrl'] }}" class="img-thumbnail" alt="{{ $job['title'] }}" title="{{ $job['title'] }}" loading="lazy" height="200" width="200">
                            </a>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="single-slidebar">
                    <div class="menu-content mb-4">
                        <div class="title text-start">
                            <h4>Actualités</h4>
                        </div>
                    </div>
                    <div class="blog-list">
                        <div class="single-blog " style="background:#000 url('img/blog1.jpg');">
                            <a href="http://www.callinnov.com/la-concurrence-des-destinations-offshores-call-center/" target="_blank">
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