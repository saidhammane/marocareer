@extends('layout')

@section('content')
@include('partials.navbar')
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-12">
                <h1 class="text-white">Liste des centres d'appels - Maroc</h1>
                <form class="serach-form-area">
                    <div class="row justify-content-center form-wrap">
                        <div class="col-lg-8 form-cols">
                            <div class="default-select" id="default-selects2">
                                <select id="citiesCallCnter">
                                    <option>Villes</option>
                                    @if (isset($jobDataJsonCity))
                                    @php $jobDataCities = json_decode($jobDataJsonCity, true); @endphp
                                    @foreach ($jobDataCities as $job)
                                    @if ($job['jobCity'] == 'Ville')
                                    @continue
                                    @endif
                                    <option value="{{ $job['jobCity'] }}">{{ $job['jobCity'] }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 form-cols">
                            <button type="button" class="search-btn" id="searchBtnCallCnter">
                                <i class="fa-solid fa-magnifying-glass"></i> Rechercher
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">

        <div class="row my-5">
            <div class="col-lg-8">
                <div class="menu-content pb-30 col-lg-12">
                    <div class="title text-start">
                        <h2 class="mb-20">Liste des centres d'appels - {{ $city }}</h2>
                    </div>
                </div>
                <div class="row">
                    @if (isset($callCenterDataJson))
                    @php $callCenterData = json_decode($callCenterDataJson, true); @endphp
                    @foreach ($callCenterData as $job)
                    <div class="col-lg-12 post-list">
                        <div class="single-post d-flex flex-row align-sm-items-center">
                            <div class="thumb">
                                <a href="https://www.moncallcenter.ma/{{ $job['url'] }}" target="_blank">
                                    <img src="{{ $job['ImgLink'] }}" alt="{{ $job['name'] }}" title="{{ $job['name'] }}" height="100" width="100" loading="lazy">
                                </a>
                            </div>
                            <div class="job-container">
                                <div class="details">
                                    <div class="title">
                                        <h4>{{ $job['name'] }}</h4>
                                        <p>{{ $job['description'] }}</p>
                                        <a href="/callcenters/{{ $job['url'] }}/offres-emploi" class="button d-block">{{ $job['offres'] }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
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

    </div>
</section>
@include('partials.footer')
@endsection