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
                            <div class="col-lg-5 form-cols">
                                <div class="default-select" id="default-selects2">
                                    <select id="typeCallCnter">
                                        <option>Type</option>
                                        @if (isset($jobDataJsonType))
                                            @php $jobDataType = json_decode($jobDataJsonType, true); @endphp
                                            @foreach ($jobDataType as $job)
                                                @if ($job['jobType'] == 'Type')
                                                    @continue
                                                @endif
                                                <option value="{{ $job['jobType'] }}">{{ $job['jobType'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5 form-cols">
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
                                <button type="button" class="btn btn-info" id="searchBtnCallCnter">
                                    <span class="lnr lnr-magnifier"></span> Rechercher
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container mt-20 mb-20">
            <div class="row">
                @if (isset($callCenterDataJson))
                    @php $callCenterData = json_decode($callCenterDataJson, true); @endphp
                    @foreach ($callCenterData as $job)
                        <div class="col-lg-4 mt-20 reletiveCol">
                            <div class="card ">
                                <img class="card-img-top darkened-image" src="{{ $job['ImgLink'] }}"
                                    alt="{{ $job['name'] }}" title="{{ $job['name'] }}" height="150" loading="lazy">
                                <a href="{{ $job['url'] }}" target="_blank">
                                    <img class="overlay-image rounded" src="{{ $job['ImgLink'] }}" alt="{{ $job['name'] }}"
                                    title="{{ $job['name'] }}" height="80" loading="lazy" width="80"></a>
                                <div class="card-body">
                                    <div style="text-align: center;">
                                        <div class="card-title h5">{{ $job['name'] }}</div>
                                    </div>
                                    <p class="card-text">{{ $job['description'] }}</p>
                                    <div style="text-align: center;">
                                        <a href="{{ $job['offresUrl'] }}" class="btn btn-secondary"
                                            target="_blank">{{ $job['offres'] }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    @include('partials.footer')
@endsection
