@extends('layout')

@section('content')
    @include('partials.navbar')
    <!-- start banner Area -->
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
                                    <select id="cities">
                                        <option>Toutes les villes</option>
                                        {{-- @if (isset($jobDataJsonCity))
                                            @php $jobDataCities = json_decode($jobDataJsonCity, true); @endphp
                                            @foreach ($jobDataCities as $job)
                                                @if ($job['jobCity'] == 'Ville')
                                                    @continue
                                                @endif
                                                <option value="{{ $job['jobCity'] }}">{{ $job['jobCity'] }}</option>
                                            @endforeach
                                        @endif --}}
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-5 form-cols">
                                <div class="default-select" id="default-selects2">
                                    <select id="type">
                                        <option>Type</option>
                                        {{-- @if (isset($jobDataJsonType))
                                            @php $jobDataTypes = json_decode($jobDataJsonType, true); @endphp
                                            @foreach ($jobDataTypes as $job)
                                                @if ($job['jobType'] == 'Type')
                                                    @continue
                                                @endif
                                                <option value="{{ $job['jobType'] }}">{{ $job['jobType'] }}</option>
                                            @endforeach
                                        @endif --}}
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-2 form-cols">
                                <button type="button" class="btn btn-info" id="searchBtn">
                                    <span class="lnr lnr-magnifier"></span> Rechercher
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->
    @include('partials.footer')
@endsection
