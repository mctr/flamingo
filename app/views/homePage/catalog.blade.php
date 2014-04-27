<div id ="catalog" class="catalog">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4 text-center">
              <h1>Örnek Katalog</h1>
            <hr>
          </div>
        </div>
        <div class="main">
          <div class="fs-slider" id="fs-slider">
            <figure>
              <img src="assets/img/mesut.jpeg" alt="image01" />
              <!--<figcaption>
                <p><h3>Omu Yıllık</h3></p>
              </figcaption>-->
            </figure>
            
            <figure>
              <img src="assets/img/12.jpg" alt="image04" />
              <!--<figcaption>
                <p><h3>Omu Yıllık</h3></p>
              </figcaption>-->
            </figure>

            <figure>
              <img src="assets/img/5.jpg" alt="image02" />
                <!--<figcaption>
                <p><h3>Omu Yıllık</h3></p>
              </figcaption>-->
            </figure>

            <figure>
              <img src="assets/img/4.jpg" alt="image05" />
              <!--<figcaption>
                <p><h3>Omu Yıllık</h3></p>
              </figcaption>-->
            </figure>
            
            <figure>
              <img src="assets/img/mengi.jpeg" alt="image03" />
               <!--<figcaption>
                <p><h3>Omu Yıllık</h3></p>
              </figcaption>-->
            </figure>          
            
            <figure>
              <img src="assets/img/koray.jpeg" alt="image04" />
              <!--<figcaption>
                <p><h3>Omu Yıllık</h3></p>
              </figcaption>-->
            </figure>
            
          </div>      
        </div>
      </div>
    </div>

<script type="text/javascript">
      $(function() {

        $( '#fs-slider' ).imgslider();

      });
    </script>

  <!-- Custom JavaScript for the Side Menu - Put in a custom JS file if you want to clean this up -->
  <script>
      $("#menu-close").click(function(e) {
          e.preventDefault();
          $("#sidebar-wrapper").toggleClass("active");
      });
  </script>
  <script>
      $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#sidebar-wrapper").toggleClass("active");
      });
  </script>
  <script>
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
          if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
              || location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
              $('html,body').animate({
                scrollTop: target.offset().top
              }, 1000);
              return false;
            }
          }
        });
      });
    </script>