@extends('layout')

@section('content')
    @include('partials.navbar')

    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-center">
                <div class="banner-content col-lg-12">
                    @if (isset($quizDataJson))
                        @php $quizData = json_decode($quizDataJson, true); @endphp
                        @if (count($quizData) > 0)
                            <img src="{{ $quizData[0]['imgUrl'] }}" class="img-thumbnail" alt="{{ $title }}"
                                title="{{ $title }}" loading="lazy">
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center d-flex">
                <div class="col-lg-1 post-list">
                    <div class="single-post d-flex flex-row"
                        style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); border-radius: 10px;">
                        <div class="thumb">
                            <img src="{{ asset('img/quiz.png') }}" alt="{{ $title }}" title="{{ $title }}"
                                loading="lazy" height="20" width="20">

                        </div>
                    </div>
                </div>
                <div class="col-lg-10 post-list">
                    <div class="single-post d-flex flex-row"
                        style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); border-radius: 10px;">
                        <div class="thumb">
                            <span class="cardsTitle" style="text-align: center;">{{ $title }}</span>

                        </div>
                    </div>
                </div>
                <div class="col-lg-1 post-list">
                    <div class="single-post d-flex flex-row"
                        style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); border-radius: 10px;">
                        <div class="thumb">
                            <img src="{{ asset('img/quiz.png') }}" alt="{{ $title }}" title="{{ $title }}"
                                loading="lazy" height="20" width="20">

                        </div>
                    </div>
                </div>


                @if (isset($quizDataJson))
                    @php $quizData = json_decode($quizDataJson, true); @endphp
                    <div class="col-lg-3 post-list">
                        <div class="single-post d-flex flex-row"
                            style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); border-radius: 10px;">
                            <div class="thumb">
                                <div class="cardsTitleQuiz">Durée :</div>
                                <hr class="new5"><br><br>
                                @foreach ($quizData as $quiz)
                                    <span class="cardsTitle" style="text-align: center;">{{ $quiz['quizDuree'] }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 post-list">
                        <div class="single-post d-flex flex-row"
                            style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); border-radius: 10px;">
                            <div class="thumb">
                                <div class="cardsTitleQuiz">Nombre de questions:</div>
                                <hr class="new5"><br><br>
                                @foreach ($quizData as $quiz)
                                    <span class="cardsTitle"
                                        style="text-align: center;">{{ $quiz['quizNombreQuestions'] }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 post-list">
                        <div class="single-post d-flex flex-row"
                            style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); border-radius: 10px;">
                            <div class="thumb">
                                <div class="cardsTitleQuiz">Nombre de participants:</div>
                                <hr class="new5"><br><br>
                                @foreach ($quizData as $quiz)
                                    <span class="cardsTitle"
                                        style="text-align: center;">{{ $quiz['quizNombreParticipants'] }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 post-list">
                        <div class="single-post d-flex flex-row"
                            style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); border-radius: 10px;">
                            <div class="thumb">
                                <div class="cardsTitleQuiz">Note moyenne:</div>
                                <hr class="new5"><br><br>
                                @foreach ($quizData as $quiz)
                                    <span class="cardsTitle"
                                        style="text-align: center;">{{ $quiz['quizNoteMoyenne'] }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 post-list">
                        <div class="single-post d-flex flex-row"
                            style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); border-radius: 10px;">
                            <div class="thumb">
                                <div class="cardsTitle">Description :</div>
                                <hr class="new5"><br><br>
                                @foreach ($quizData as $quiz)
                                    <span class="cardsTitleQuiz"
                                        style="text-align: center;">{{ $quiz['quizDescription'] }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-lg-12">
                    <a href="https://www.moncallcenter.ma/test/{{ $url }}" class="btn btn-primary h5" target="_blank"
                        style="width: 100%; color:white;">Lancer le test</a>
                </div>
            </div>
        </div>
    </section>


    @include('partials.footer')
@endsection
