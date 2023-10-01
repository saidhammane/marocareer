@extends('layout')

@section('content')
    @include('partials.navbar')

    <style>
        .single-post {
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .single-post:hover {
            transform: translateY(-10px);
        }

        .cardsTitle {
            font-family: 'georgia';
            font-weight: bold;
            font-size: 20px;
        }

        hr.new5 {
            border: 5px solid #584c4c;
            border-radius: 5px;
            width: 60px;
            float: left;
        }

        hr.new6 {
            border: 2px solid #584c4c;
            border-radius: 5px;
            width: 200px;
            float: left;
        }

        .titleJobCallcenter {
            font-family: 'georgia';
            font-weight: bold;
            font-size: 12px;
        }
    </style>
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
                            <p>{{ $job['avantagesJob'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 post-list">
                    <div class="single-post d-flex flex-row">
                        <div class="thumb">
                            <div class="cardsTitle">Nos offres d'emploi:</div>
                            <hr class="new5"><br><br>
                            <a href="{{ $job['nosOffresEemploiUrlJob'] }}" target="_blank">
                                <p class="titleJobCallcenter">{{ $job['nosOffresEemploiTitreJob'] }}</p>
                            </a>
                            <p>{{ $job['nosOffresEemploiDescJob'] }}</p>
                            <hr class="new6">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End post Area -->

    @include('partials.footer')
@endsection
