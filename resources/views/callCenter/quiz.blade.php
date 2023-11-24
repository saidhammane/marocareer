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
        @include('partials.shape')
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
                                            <img class="overlay-image rounded" src="{{ $job['imgUrl'] }}" alt="name"
                                                title="name" height="120" loading="lazy" width="120"></a>
                                        <div class="card-body">
                                            <div style="text-align: center;">
                                                <div class="card-title h5">{{ $job['title'] }}</div>
                                            </div>
                                            <br>
                                            <div style="text-align: center;">
                                                <p class="card-text">{{ $job['qd'] }}
                                                    <br>Nombre de participants: <span
                                                        style="font-weight: bold">{{ $job['NombreParticipants'] }}</span>
                                                    <br>Note moyenne : <span
                                                        style="font-weight: bold">{{ $job['NoteMoyenne'] }}</span>
                                                </p>
                                            </div>
                                            <br>
                                            <div style="text-align: center; width: 100%;">
                                                <a style="width: 100%;" href="{{ $job['url'] }}" class="btn btn-secondary"
                                                    target="_blank">Lancer le test</a>
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
                        <h4>Les centres qui recrutent
                        </h4>
                        <div class="row">
                            @if (isset($callCenterRecrutJson))
                                @php $callCenterRecrut = json_decode($callCenterRecrutJson, true); @endphp
                                @foreach ($callCenterRecrut as $job)
                                    <div class="col-md-4 mt-10">
                                        <a href="callcenters/{{ $job['title'] }}">
                                            <img src="{{ $job['imgUrl'] }}" class="img-thumbnail" alt="{{ $job['title'] }}"
                                                title="{{ $job['title'] }}" loading="lazy" height="200" width="200">
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="single-slidebar">
                        <a href="https://www.moncallcenter.ma/guide/reussir-cv/" target="_blank">
                            <img src="https://www.moncallcenter.ma/images/reussir-votre-cv.png" class="img-thumbnail"
                                alt="Réussir votre CV" title="Réussir votre CV">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->
    @include('partials.footer')
@endsection
