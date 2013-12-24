    <!-- Footer -->
    <footer>
      <!-- login popup -->
      <div class="login-popup" id="loginPopup">
        <a class="overlay" href="#"></a>
        <div class="loginwrap">
          <div class="popup-title">Login</div>
          <div class="loginform selected">
            <form action="" method="post" id="formuser">
              <center><h3 id="status"></h3></center>
              <br>
              <label class="input" for="loginuser" >
                Username
                <input type="text" required="" id="loginuser" name="loginuser" value="" autocomplete="off"/>
              </label>
              <label class="input" for="loginpass">
                Password
                <input type="password" required="" id="loginpass" name="loginpass" value="" autocomplete="off"/>
              </label>
              <p class="checkwrap clearfix">
                <input id="login_remember" name="" type="checkbox" />
                <label for="login_remember">Remember Me</label>
              </p>
              <input class="btn btn-primary" type="submit" id="submite" value="Login" />
            </form>
          </div>
        </div>
      </div>
      <!-- end of login popup -->
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 text-center">
            <ul class="list-inline">
              <li><a href="https://www.facebook.com/infotechUMM"><i class="fa fa-facebook fa-4x"></i></a></li>
              <li><a href="https://twitter.com/infotechumm"><i class="fa fa-twitter fa-4x"></i></a></li>
            </ul>
            <div class="top-scroll">
              <a href="#top"><i class="fa fa-arrow-circle-o-up scroll fa-3x"></i></a>
              <br>
              <label>Back On Top</label>
            </div>
            <hr>
            <p>Copyright &copy; Lab Informatika - UMM <?php echo date('Y'); ?></p>
          </div>
        </div>
      </div>
    </footer>
    <!-- /Footer -->

    <!-- JavaScript -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/login.js"></script>

    <!-- Custom JavaScript for the Side Menu and Smooth Scrolling -->
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
  </body>
</html>