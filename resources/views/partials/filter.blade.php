<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-12">
                @switch($type)
                @case('jobApply')
                @if (isset($jobDataJson))
                @php $jobDataTypes = json_decode($jobDataJson, true); @endphp
                @foreach ($jobDataTypes as $job) <h1 class="text-white">{{ $job['titleJob'] }}</h1> @endforeach
                @endif
                @break
                @case('home')
                <h1 class="text-white">Votre carrière est notre priorité</h1>
                <p class="text-white">Le choix numéro un pour les emplois en centre d'appels au Maroc.</p>
                @break
                @default
                @if ($city == "typeCity") <h1 class="text-white">Emplois de type {{ $type }}</h1>
                @else <h1 class="text-white">Emplois à {{ $city }} @if ($type != null) - {{ $type }} @endif </h1>
                @endif
                @endswitch
                <form class="serach-form-area">
                    <div class="row justify-content-center form-wrap">
                        <div class="col-lg-5 form-cols">
                            <div class="default-select" id="default-selects2">
                                <select id="cities">
                                    <option>Toutes les villes</option>
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

                        <div class="col-lg-5 form-cols">
                            <div class="default-select" id="default-selects2">
                                <select id="type">
                                    <option>Type</option>
                                    @if (isset($jobDataJsonType))
                                    @php $jobDataTypes = json_decode($jobDataJsonType, true); @endphp
                                    @foreach ($jobDataTypes as $job)
                                    @if ($job['jobType'] == 'Type')
                                    @continue
                                    @endif
                                    <option value="{{ $job['jobType'] }}">{{ $job['jobType'] }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2 form-cols">
                            <button type="button" class="search-btn" id="searchBtnHome">
                                <span class="lnr lnr-magnifier"></span> Rechercher
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('partials.shape')
</section>