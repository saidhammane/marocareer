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
                        @foreach ($jobData as $job)
                            <img src="{{ $job['imageCallCenter'] }}" class="img-thumbnail" alt="Responsive image"
                                style="border-radius: 10px">
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </section>

    <!-- Start post Area -->
    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center d-flex">
                <div class="col-lg-4 post-list">
                    <div class="single-post d-flex flex-row"
                        style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); border-radius: 10px;">
                        <div class="thumb">
                            <div class="cardsTitle">Présentation:</div>
                            <hr class="new5"><br><br>
                            @if (isset($jobDataJson))
                                @php $jobData = json_decode($jobDataJson, true); @endphp
                                @foreach ($jobData as $job)
                                    <p>{{ $job['presentationJob'] }}</p>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 post-list">
                    <div class="single-post d-flex flex-row">
                        <div class="thumb">
                            <div class="cardsTitle">Avantages:</div>
                            <hr class="new5"><br><br>
                            @if (isset($jobDataJson))
                                @php $jobData = json_decode($jobDataJson, true); @endphp
                                @foreach ($jobData as $job)
                                    <p>{{ $job['avantagesJob'] }}</p>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 post-list">
                    <div class="single-post d-flex flex-row">
                        <div class="thumb">
                            <div class="cardsTitle">Nos offres d'emploi:</div>
                            <hr class="new5"><br><br>


                            @if (isset($jobDataJson))
                                @php $jobData = json_decode($jobDataJson, true); @endphp
                                @foreach ($jobData as $job)
                                    <a href="{{ $job['nosOffresEemploiUrlJob'] }}" target="_blank">
                                        <p class="titleJobCallcenter">{{ $job['nosOffresEemploiTitreJob'] }}</p>
                                    </a>
                                    <p>{{ $job['nosOffresEemploiDescJob'] }}</p>
                                    <hr class="new6">
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End post Area -->

    <div class="container mb-5">
        <a href="https://www.moncallcenter.ma/{{ $callCenter }}" target="_blank" class="btn btn-primary text-white h4"
            style="width: 100%">Voir plus</a>
    </div>

    @include('partials.footer')
@endsection
