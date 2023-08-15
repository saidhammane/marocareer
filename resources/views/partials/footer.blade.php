 <!-- start footer Area -->
 
 <footer class="footer-area section-gap">
     <div class="container">
         <div class="row">
             <div class="col-lg-3  col-md-12">
                 <div class="single-footer-widget">
                 </div>
             </div>
             <div class="col-lg-6  col-md-12">
                 <div class="single-footer-widget newsletter">
                     <h6>Newsletter</h6>
                     <p>Vous pouvez nous faire confiance. Nous n’envoyons que des offres promotionnelles, pas un seul
                         spam.</p>
                     <div id="mc_embed_signup">
                         <form id="subscribeForm" class="form-inline">
                             @csrf
                             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                             <div class="form-group row" style="width: 100%">
                                 <div class="col-lg-8 col-md-12">
                                     <input name="EMAIL" placeholder="Entre Votre Email"
                                         onfocus="this.placeholder = ''"
                                         onblur="this.placeholder = 'Entre Votre Email '" required type="email">
                                 </div>
                                 <div class="col-lg-4 col-md-12">
                                     <button class="nw-btn primary-btn submit-form" type="button"
                                         id="submitButton">Abonner<span class="lnr lnr-arrow-right"></span></button>
                                 </div>
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
                 Tous droits réservés | made with <i class="fa fa-heart-o" aria-hidden="true"></i> par <a href="/"
                     target="_blank">MaroCareer</a>
             </p>
             <div class="col-lg-4 col-sm-12 footer-social">
                 <a href="/"><i class="fa fa-facebook"></i></a>
                 <a href="/"><i class="fa fa-twitter"></i></a>
                 <a href="/"><i class="fa fa-dribbble"></i></a>
                 <a href="/"><i class="fa fa-behance"></i></a>
             </div>
         </div>
     </div>
 </footer>

 <script>

    
     //  $.ajax({
     //      url: $('#subscribeForm').attr('action'),
     //      method: "POST",
     //      data: $(this).serialize(),
     //      success: function(response) {
     //          alert(response.message); 
     //      },
     //      error: function(xhr, status, error) {
     //          // Handle errors, if any
     //          console.error(error);
     //      }
     //  });
 </script>
 <!-- End footer Area -->
