 <!-- start footer Area -->

 <footer class="footer-area section-gap position-relative">
     <div class="custom-shape-divider-top-1701471209">
         <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
             <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
         </svg>
     </div>
     <div class="container">
         <div class="row justify-content-between">
             <div class="col-lg-4 ">
                 <div class="single-footer-widget">
                     <div id="logo" class="h3 m-0">
                         <a href="/" style="color: white"><img src="{{ asset('img/logo_32_32.png') }}" width="50" height="50" alt="icon and logo of marocareer website recrutement" title="icon and logo of marocareer website recrutement" loading="lazy" />&nbsp;&nbsp;MaroCareer</a>
                     </div>
                     <p class="mt-4 text-secondary">Marocareer - Votre plateforme emploi pour les centres d'appels. Trouvez votre opportunité dès aujourd'hui et démarrez votre succès professionnel avec nous.</p>
                 </div>
             </div>
             <div class="col-lg-4">
                 <div class="single-footer-widget newsletter">
                     <h6>Newsletter</h6>
                     <p class="text-secondary">Vous pouvez nous faire confiance. Nous n’envoyons que des offres promotionnelles, pas un seul spam.</p>
                     <div id="mc_embed_signup" class="pt-3">
                         <form id="subscribeForm" class="form-inline" action="{{ url('/storeEmail') }}">
                             @csrf
                             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                             <div class="d-flex flex-column commentform-area pb-0 w-100">
                                 <input name="EMAIL" placeholder="Entre Votre Email" class="common-input form-control w-100 py-2" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Entre Votre Email '" required type="email">
                                 <button class="button w-50 ml-auto" type="submit" id="submitButton">Abonner</button>
                             </div>
                             <div class="info"></div>
                         </form>
                     </div>

                 </div>
             </div>
         </div>

         <div class="row footer-bottom d-flex justify-content-between">
             <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
                 Copyright &copy;
                 <script>
                     document.write(new Date().getFullYear());
                 </script>
                 Tous droits réservés | made with <i class="fa fa-heart-o text-primary" aria-hidden="true"></i> par <a href="/" target="_blank" class="text-primary">MaroCareer</a>
             </p>
         </div>
     </div>
 </footer>
 <!-- End footer Area -->