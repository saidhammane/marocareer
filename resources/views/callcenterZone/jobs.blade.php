@extends('layout')

@section('content')
@include('partials.navbar')

<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-start">
            <div class="head-img col-lg-12">
                @if (isset($jobDataJson))
                    @php $jobData = json_decode($jobDataJson, true); @endphp
                    @if (count($jobData) > 0)
                        <img src="{{ $jobData[0]['imageCallCenter'] }}" class="img-thumbnail" alt="{{ $callCenter }}" title="{{ $callCenter }}" loading="lazy">
                    @endif
                @endif
                @if (isset($jobDataNameJson))
                    @php $jobDataName = json_decode($jobDataNameJson, true); @endphp
                    @foreach ($jobDataName as $jobName)
                        <h1 class="ml-4 mt-0 fw-bold text-white">{{ $jobName['jobCallCenterName'] }}</h1>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    @include('partials.shape')
</section>

<!-- Start post Area -->
<section class="post-area section-gap">
    <div class="container">
        <div class="row justify-content-center d-flex my-4">
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
                        <img src="{{ $job['jobImgLink'] }}" alt="{{ $job['jobTitle'] }}" title="{{ $job['jobTitle'] }}" loading="lazy" height="100" width="100">
                    </div>
                    <div class="job-container">
                        <div class="details">
                            <div class="title ">
                                @php
                                $urlSegments = explode('/', parse_url($job['jobUrl'], PHP_URL_PATH));
                                $lastSegmentUrl = end($urlSegments);
                                @endphp
                                <div class="titles">
                                    <a href="/application/{{ $lastSegmentUrl }}">
                                        <h4>{{ $job['jobTitle'] }}</h4>
                                    </a>
                                    <h6>{{ $job['metaData'] }}</h6>
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
            </div>
        </div>
    </div>
</section>
@include('partials.footer')
@endsection