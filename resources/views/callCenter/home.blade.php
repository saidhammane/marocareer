@extends('layout')

@section('content')
    @include('partials.navbar')

    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-center">
                <div class="banner-content col-lg-12">
                    <h1 class="text-white">Votre carrière est notre priorité</h1>
                    <p style="color: white">Le choix numéro un pour les emplois en centre d'appels au Maroc.</p>
                    <form action="search.html" class="serach-form-area">
                        <div class="row justify-content-center form-wrap">
                            <div class="col-lg-9 form-cols">
                                <div class="default-select" id="default-selects2">
                                    <select>
                                        <option value="1">Toutes les villes</option>
                                        <option value="2">Medical</option>
                                        <option value="3">Technology</option>
                                        <option value="4">Goverment</option>
                                        <option value="5">Development</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 form-cols">
                                <button type="button" class="btn btn-info">
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

    <!-- Start feature-cat Area -->
    <section class="feature-cat-area pt-100" id="category">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-10">
                    <div class="title text-center">
                        <h2 class="mb-10">Nos offres récentes</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End feature-cat Area -->
    <!-- Start post Area -->
    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center d-flex">
                <div class="col-lg-8 post-list">
                    @if (isset($jobDataJson))
                        @php $jobData = json_decode($jobDataJson, true); @endphp
                        @foreach ($jobData as $job)
                            <div class="single-post d-flex flex-row">
                                <div class="thumb" style="padding: 24px;">
                                    {{-- <img src="img/post.png" alt> --}}
                                    <img src="{{ $job['ImgLink'] }}" alt="{{ $job['jobTitle'] }}"
                                        title="{{ $job['jobTitle'] }}" loading="lazy" height="100" width="100"
                                        style="border-radius:15px;">
                                </div>
                                <div class="details">
                                    <div class="title d-flex flex-row justify-content-between">
                                        <div class="titles">
                                            <a href="single.html">
                                                <h4>{{ $job['jobTitle'] }}</h4>
                                            </a>
                                            <h6>{{ $job['jobDate'] }}</h6>
                                        </div>
                                        <ul class="btns">
                                            <li><a href="{{ $job['jobUrl'] }}" target="_blank">Apply</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <a class="text-uppercase loadmore-btn mx-auto d-block" href="category.html">Toutes les offres</a>
                </div>
                <div class="col-lg-4 sidebar">
                    <div class="single-slidebar">
                        <h4>Jobs by Location</h4>
                        <ul class="cat-list">
                            <li><a class="justify-content-between d-flex"
                                    href="https://www.moncallcenter.ma/q-offres/?Ville=Casablanca">
                                    <p>Casablanca</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="https://www.moncallcenter.ma/q-offres/?Ville=Rabat">
                                    <p>Rabat</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="https://www.moncallcenter.ma/q-offres/?Ville=Tanger">
                                    <p>Tanger</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="https://www.moncallcenter.ma/q-offres/?Ville=Kenitra">
                                    <p>Kenitra</p>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="category.html">
                                    <p>Florida</p><span>47</span>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="category.html">
                                    <p>Rocky
                                        Beach</p><span>27</span>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="category.html">
                                    <p>Chicago</p><span>17</span>
                                </a></li>
                        </ul>
                    </div>

                    <div class="single-slidebar">
                        <h4>Top rated job posts</h4>
                        <div class="active-relatedjob-carusel">
                            <div class="single-rated">
                                <img class="img-fluid" src="img/r1.jpg" alt>
                                <a href="single.html">
                                    <h4>Creative Art Designer</h4>
                                </a>
                                <h6>Premium Labels Limited</h6>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                    eiusmod temporinc ididunt ut dolore magna aliqua.
                                </p>
                                <h5>Job Nature: Full time</h5>
                                <p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath
                                    Dhanmondi Dhaka</p>
                                <p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
                                <a href="#" class="btns text-uppercase">Apply job</a>
                            </div>
                            <div class="single-rated">
                                <img class="img-fluid" src="img/r1.jpg" alt>
                                <a href="single.html">
                                    <h4>Creative Art Designer</h4>
                                </a>
                                <h6>Premium Labels Limited</h6>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                    eiusmod temporinc ididunt ut dolore magna aliqua.
                                </p>
                                <h5>Job Nature: Full time</h5>
                                <p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath
                                    Dhanmondi Dhaka</p>
                                <p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
                                <a href="#" class="btns text-uppercase">Apply job</a>
                            </div>
                            <div class="single-rated">
                                <img class="img-fluid" src="img/r1.jpg" alt>
                                <a href="single.html">
                                    <h4>Creative Art Designer</h4>
                                </a>
                                <h6>Premium Labels Limited</h6>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                    eiusmod temporinc ididunt ut dolore magna aliqua.
                                </p>
                                <h5>Job Nature: Full time</h5>
                                <p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath
                                    Dhanmondi Dhaka</p>
                                <p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
                                <a href="#" class="btns text-uppercase">Apply job</a>
                            </div>
                        </div>
                    </div>

                    <div class="single-slidebar">
                        <h4>Jobs by Category</h4>
                        <ul class="cat-list">
                            <li><a class="justify-content-between d-flex" href="category.html">
                                    <p>Technology</p><span>37</span>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="category.html">
                                    <p>Media
                                        & News</p><span>57</span>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="category.html">
                                    <p>Goverment</p><span>33</span>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="category.html">
                                    <p>Medical</p><span>36</span>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="category.html">
                                    <p>Restaurants</p><span>47</span>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="category.html">
                                    <p>Developer</p><span>27</span>
                                </a></li>
                            <li><a class="justify-content-between d-flex" href="category.html">
                                    <p>Accounting</p><span>17</span>
                                </a></li>
                        </ul>
                    </div>

                    <div class="single-slidebar">
                        <h4>Carrer Advice Blog</h4>
                        <div class="blog-list">
                            <div class="single-blog " style="background:#000 url(img/blog1.jpg);">
                                <a href="single.html">
                                    <h4>Home Audio Recording <br>
                                        For Everyone</h4>
                                </a>
                                <div class="meta justify-content-between d-flex">
                                    <p>
                                        02 Hours ago
                                    </p>
                                    <p>
                                        <span class="lnr lnr-heart"></span>
                                        06
                                        <span class="lnr lnr-bubble"></span>
                                        02
                                    </p>
                                </div>
                            </div>
                            <div class="single-blog " style="background:#000 url(img/blog2.jpg);">
                                <a href="single.html">
                                    <h4>Home Audio Recording <br>
                                        For Everyone</h4>
                                </a>
                                <div class="meta justify-content-between d-flex">
                                    <p>
                                        02 Hours ago
                                    </p>
                                    <p>
                                        <span class="lnr lnr-heart"></span>
                                        06
                                        <span class="lnr lnr-bubble"></span>
                                        02
                                    </p>
                                </div>
                            </div>
                            <div class="single-blog " style="background:#000 url(img/blog1.jpg);">
                                <a href="single.html">
                                    <h4>Home Audio Recording <br>
                                        For Everyone</h4>
                                </a>
                                <div class="meta justify-content-between d-flex">
                                    <p>
                                        02 Hours ago
                                    </p>
                                    <p>
                                        <span class="lnr lnr-heart"></span>
                                        06
                                        <span class="lnr lnr-bubble"></span>
                                        02
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End post Area -->
    <!-- Start callto-action Area -->
    <section class="callto-action-area section-gap" id="join">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content col-lg-9">
                    <div class="title text-center">
                        <h1 class="mb-10 text-white">Join us today without any hesitation</h1>
                        <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation.</p>
                        <a class="primary-btn" href="#">I am a Candidate</a>
                        <a class="primary-btn" href="#">Request Free Demo</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End calto-action Area -->
    <!-- Start download Area -->
    <section class="download-area section-gap" id="app">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 download-left">
                    <img class="img-fluid" src="img/d1.png" alt>
                </div>
                <div class="col-lg-6 download-right">
                    <h1>Download the <br>
                        Job Listing App Today!</h1>
                    <p class="subs">
                        It won’t be a bigger problem to find one video game lover in your
                        neighbor. Since the introduction of Virtual Game, it has been achieving
                        great heights so far as its popularity and technological advancement are
                        concerned.
                    </p>
                    <div class="d-flex flex-row">
                        <div class="buttons">
                            <i class="fa fa-apple" aria-hidden="true"></i>
                            <div class="desc">
                                <a href="#">
                                    <p>
                                        <span>Available</span> <br>
                                        on App Store
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="buttons">
                            <i class="fa fa-android" aria-hidden="true"></i>
                            <div class="desc">
                                <a href="#">
                                    <p>
                                        <span>Available</span> <br>
                                        on Play Store
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
@endsection
