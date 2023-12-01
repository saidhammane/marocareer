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
        <div class="row justify-content-center d-flex my-5">
            <div class="col-lg-8 post-list ">
                <div class="mb-5">
                    @if (isset($jobDataJson))
                    @php $jobData = json_decode($jobDataJson, true); @endphp
                    @foreach ($jobData as $job)
                    <div class="d-sm-flex align-items-start">
                        <a href="{{ $job['callcenterNameJobUrl'] }}">
                            <img src="{{ $job['callcenterImgJob'] }}" alt="{{ $job['titleJob'] }}" title="{{ $job['titleJob'] }}" class="mb-3 mb-sm-0" loading="lazy" height="120" width="120">
                        </a>
                        <div class="ml-sm-4">
                            <h3 class="mb-2">{{ $job['titleJob'] }}</h3>
                            <div class="d-flex flex-column ">
                                <span class="fw-bold text-primary fs-2">{{ $job['callcenterNameJob'] }}</span>
                                <span>{{ $job['metaDataJob'] }}</span>
                                <span>{{ $job['languageJob'] }} </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div>
                    @if (isset($jobDataJson))
                    @php $jobData = json_decode($jobDataJson, true); @endphp
                    @foreach ($jobData as $job)
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('img/description.png') }}" alt="icon de description du poste rechercher" width="30" height="30">
                        <span class="h3 ml-2">Descriptif du poste :</span>
                    </div>
                    <p class="p-3">{!! nl2br(e($job['descriptifPosteJob'])) !!}</p>
                    @endforeach
                    @endif
                </div>
                <div class="mb-4">
                    @if (isset($jobDataJson))
                    @php $jobData = json_decode($jobDataJson, true); @endphp
                    @foreach ($jobData as $job)
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('img/magnifying-glass.png') }}" alt="icon de profil Recherché" width="30" height="30">
                        <span class="h3 ml-2">Profil Recherché :</span>
                    </div>
                    <p class="p-3">{!! nl2br(e($job['profilRechercheJob'])) !!}</p>
                    @endforeach
                    @endif
                </div>
                <a href="https://www.moncallcenter.ma//offre-emploi/{{ $lastSegment }}" target="_blank" class="button w-100 text-center">Postuler</a>
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

@include('partials.footer')
@endsection