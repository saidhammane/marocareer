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
                                            @if ($job['jobType'] == 'Type') @continue @endif
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
                                                @if ($job['jobCity'] == 'Ville')@continue @endif
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
    @include('partials.footer')
@endsection
