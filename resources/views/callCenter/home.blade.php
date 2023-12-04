@extends('layout')

@section('content')
@include('partials.navbar')
@include('partials.filter')

<!-- Start post Area -->
<section class="post-area section-gap">
    <div class="container">
        <div class="row justify-content-center d-flex my-5">
            <div class="col-lg-8 post-list">
                <div class="menu-content pb-30 col-lg-12">
                    <div class="title text-start">
                        <h2 class="mb-20">Nos offres récentes</h2>
                    </div>
                </div>
                @if (isset($jobDataJson))
                @php $jobData = json_decode($jobDataJson, true); @endphp
                @foreach ($jobData as $job)
                <div class="single-post d-flex align-sm-items-center single-post-start-text">
                    <div class="thumb">
                        <img src="{{ $job['ImgLink'] }}" alt="{{ $job['jobTitle'] }}" title="{{ $job['jobTitle'] }}" loading="lazy" height="100" width="100">
                    </div>
                    <div class="job-container">
                        <div class="details">
                            <div class="title ">
                                <div class="titles">
                                    <a href="/application/{{ basename($job['jobUrl']) }}">
                                        <h4>{{ $job['jobTitle'] }}</h4>
                                    </a>
                                    <h6>{{ $job['jobDate'] }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-post-icon">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="col-lg-4 sidebar">
                <div class="single-slidebar">
                    <div class="menu-content mb-4">
                        <div class="title text-start">
                            <h4>Centres d’appels par ville</h4>
                        </div>
                    </div>
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
                    <div class="menu-content mb-4">
                        <div class="title text-start">
                            <h4>Offres de la semaine</h4>
                        </div>
                    </div>
                    <div class="active-relatedjob-carusel">
                        @if (isset($jobDataJsonTop))
                        @php $jobDataTop = json_decode($jobDataJsonTop, true); @endphp
                        @foreach ($jobDataTop as $job)
                        <div class="single-rated">
                            <img class="img-fluid" src="{{ $job['ImgLink'] }}" loading="lazy" alt="{{ $job['jobTitle'] }}" title="{{ $job['jobTitle'] }}" width="100" height="100">
                            <a href="/application/{{ basename($job['jobUrl']) }}">
                                <h4>{{ $job['jobTitle'] }}</h4>
                            </a>
                            <a href="/application/{{ basename($job['jobUrl']) }}" class="btns text-uppercase">POSTULER</a>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="single-slidebar">
                    <div class="menu-content mb-4">
                        <div class="title text-start">
                            <h4>Emplois par type</h4>
                        </div>
                    </div>
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
            </div>
        </div>
    </div>
</section>
<!-- End post Area -->


@include('partials.footer')


@endsection