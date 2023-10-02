@extends('layout')

@section('content')
    @include('partials.navbar')

    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-center">
                <div class="banner-content col-lg-12">
                    @if (isset($jobDataJson))
                        @php $jobData = json_decode($jobDataJson, true); @endphp
                        @if (count($jobData) > 0)
                            <img src="{{ $jobData[0]['imageCallCenter'] }}" class="img-thumbnail" alt="{{ $callCenter }}" title="callCenter" loading="lazy">
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </section>

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
                                    <img src="{{ $job['jobImgLink'] }}" alt="{{ $job['jobTitle'] }}"
                                        title="{{ $job['jobTitle'] }}" loading="lazy" height="100" width="100"
                                        style="border-radius:15px;">
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
                                            <ul class="btns">
                                                <li><a href="/application/{{ $lastSegmentUrl }}">Postuler</a></li>
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
    @include('partials.footer')
@endsection
