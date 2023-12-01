@extends('layout')

@section('content')
@include('partials.navbar')
@include('partials.filter')

<!-- Start post Area -->
<section class="post-area section-gap">
    <div class="container">
        <div class="row justify-content-center d-flex my-4">
            <div class="col-lg-8 post-list">
                <div class="menu-content pb-30 col-lg-10">
                    <div class="title text-center">
                        <h2 class="mb-20">Nos offres</h2>
                    </div>
                </div>
                @if (isset($jobDataJson))
                @php $jobData = json_decode($jobDataJson, true); @endphp
                @if (!empty($jobData))
                @foreach ($jobData as $job)
                <div class="single-post d-flex align-sm-items-center single-post-start-text">
                    <div class="thumb">
                        <img src="{{ $job['jobImgLink'] }}" alt="{{ $job['jobTitle'] }}" title="{{ $job['jobTitle'] }}" loading="lazy" height="100" width="100">
                    </div>
                    <div class="job-container">
                        <div class="details">
                            <div class="title ">
                                <div class="titles">
                                    <a href="{{ $job['jobUrl'] }}">
                                        <h4>{{ $job['jobTitle'] }}</h4>
                                    </a>
                                    <h6>{{ $job['jobMetaData'] }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-post-icon">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </div>
                </div>
                @endforeach
                @else
                <div class="alert alert-warning" role="alert">
                    <strong>Oups !</strong> Il semble qu'il n'y ait actuellement aucune offre d'emploi dans
                    cette zone.
                </div>
                <br><br><br>
                <div class="row">
                    <div class="col-md">
                        <div class="🤚">
                            <div class="👉"></div>
                            <div class="👉"></div>
                            <div class="👉"></div>
                            <div class="👉"></div>
                            <div class="🌴"></div>
                            <div class="👍"></div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="🤚">
                            <div class="👉"></div>
                            <div class="👉"></div>
                            <div class="👉"></div>
                            <div class="👉"></div>
                            <div class="🌴"></div>
                            <div class="👍"></div>
                        </div>

                    </div>
                    <div class="col-md">
                        <div class="🤚">
                            <div class="👉"></div>
                            <div class="👉"></div>
                            <div class="👉"></div>
                            <div class="👉"></div>
                            <div class="🌴"></div>
                            <div class="👍"></div>
                        </div>

                    </div>
                </div>
                @endif
                @endif
            </div>
            <div class="col-lg-4 sidebar">
                <div class="single-slidebar">
                    <h4>Centres d’appels par ville</h4>
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
                    <h4>Emplois par type</h4>
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
                <div class="single-slidebar">
                    <h4>Actualités</h4>
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
<!-- End post Area -->

@include('partials.footer')
@endsection