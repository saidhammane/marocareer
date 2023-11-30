@extends('layout')

@section('content')
@include('partials.navbar')

<!-- start banner Area -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Contactons-Nous
                </h1>
                <p class="text-white"><a href="/">Accueill </a> <span class="lnr lnr-arrow-right"></span> <a href="/contact"> Contact </a></p>

                <!-- <div class="text-center">
                        <img src="{{ asset('img/customer-care.png') }}" class="rounded" alt="contact image marocareer"
                            loading="lazy" title="contact image marocareer" height="230" width="230">
                    </div> -->
            </div>
        </div>
    </div>
    @include('partials.shape')
</section>
<!-- End banner Area -->

<!-- Start contact-page Area -->
<section class="contact-page-area section-gap">
    <div class="container">
        <div class="row my-5">
           
            <div class="col-lg-8">
                <div class="menu-content mb-4">
                    <div class="title pb-20 text-start">
                        <h2>Let's talk about everything!</h2>
                    </div>
                    <p class="mt-3">Bienvenue sur Marocareer, votre porte d'entrée vers des opportunités professionnelles passionnantes au Maroc. Nous apprécions vos retours, questions et interactions. N'hésitez pas à nous contacter via les coordonnées ci-dessous :</p>
                </div>
                <form class="form-area" id="contactForm" method="get" class="contact-form text-right" action="send-mail">
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <input name="name" placeholder="Entrer votre nom" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Entrer votre nom'" class="common-input mb-20 form-control" required="" type="text">

                            <input name="email" placeholder="Entrer votre addresse email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Entrer votre addresse email'" class="common-input mb-20 form-control" required="" type="email">


                            <input name="object" placeholder="Entrer votre objet" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Entrer votre objet'" class="common-input mb-20 form-control" required="" type="text">

                            <textarea class="common-textarea mt-10 form-control" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                            <button class="button mt-4" type="submit">Envoyer</button>
                            <div class="mt-20 alert-msg" style="text-align: left;"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 text-center">
                <img src="{{ asset('img/contact/img-1.jpg') }}" alt="contact service" title="contact service" width="100%" height="90%" class="fluid-img" loading="lazy">
            </div>
        </div>
    </div>
</section>
<!-- End contact-page Area -->
@include('partials.footer')
@endsection