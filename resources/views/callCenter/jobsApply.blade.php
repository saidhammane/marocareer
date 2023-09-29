@extends('layout')

@section('content')
    @include('partials.navbar')
    @include('partials.filter')



    <style>
        .btn-primary {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center d-flex">
                <div class="col-lg-12 post-list">
                    @if (isset($jobDataJson))
                        @php $jobData = json_decode($jobDataJson, true); @endphp
                        @foreach ($jobData as $job)
                            <div class="single-post d-flex flex-row">
                                <div class="thumb" style="padding: 24px;">
                                    <a href="{{ $job['callcenterNameJobUrl'] }}">
                                        <img src="{{ $job['callcenterImgJob'] }}" alt="{{ $job['titleJob'] }}"
                                            title="{{ $job['titleJob'] }}" loading="lazy" height="100" width="100"
                                            style="border-radius:15px;">
                                    </a>

                                </div>
                                <div class="job-container">
                                    <div class="details">
                                        <div class="title ">
                                            <div class="titles">
                                                <a href="https://www.moncallcenter.ma//offre-emploi/{{ $lastSegment }}"
                                                    target="_blank">
                                                    <h3>{{ $job['titleJob'] }}</h3>
                                                </a>
                                                <br>
                                                <h4>Centre d'appels : <span class="h5">{{ $job['callcenterNameJob'] }}</span></h4>
                                                <h6>{{ $job['metaDataJob'] }}</h6>
                                                <h6>{{ $job['languageJob'] }} </h6>
                                            </div>
                                            <ul class="btns" style="padding-left: 50%">
                                                <li><a href="https://www.moncallcenter.ma//offre-emploi/{{ $lastSegment }}"
                                                        target="_blank">Postuler</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center d-flex">
                <div class="col-lg-12 post-list">
                    @if (isset($jobDataJson))
                        @php $jobData = json_decode($jobDataJson, true); @endphp
                        @foreach ($jobData as $job)
                            <div class="single-post d-flex flex-row">
                                <div class="thumb" style="padding: 24px;">
                                    <div class="h3"> <img src="{{ asset('img/description.png') }}"
                                            alt="icon de description du poste rechercher " width="40" height="40">
                                        &nbsp;&nbsp;Descriptif du poste: </div>
                                    <br>
                                    <p class="fs-4">{!! nl2br(e($job['descriptifPosteJob'])) !!}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center d-flex">
                <div class="col-lg-12 post-list">
                    @if (isset($jobDataJson))
                        @php $jobData = json_decode($jobDataJson, true); @endphp
                        @foreach ($jobData as $job)
                            <div class="single-post d-flex flex-row">
                                <div class="thumb" style="padding: 24px;">
                                    <div class="h3"> <img src="{{ asset('img/magnifying-glass.png') }}"
                                            alt="icon de profil Recherché " width="40" height="40">&nbsp;&nbsp;Profil
                                        Recherché: </div>
                                    <br>
                                    <p class="fs-4">{!! nl2br(e($job['profilRechercheJob'])) !!}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

    <div class="container mb-5">
        <div class="container">
            <div class="container">
                <div class="container">
                    <a href="https://www.moncallcenter.ma//offre-emploi/{{ $lastSegment }}" target="_blank"
                        class="btn btn-primary text-white h4">Postuler</a>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
@endsection
