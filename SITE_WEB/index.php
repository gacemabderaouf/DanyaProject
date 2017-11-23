<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="This is a test for project n°3 team 26">
    <meta name="author" content="0m3ga-K0d3r">
    <link rel="icon" href="">

    <!-- Normalize CSS :D -->
    <link rel="stylesheet" href="assets/css/vendors/normalize.css">

    <!-- Bootstrap & FontAwesome Stylesheets -->
    <link rel="stylesheet" href="assets/css/vendors/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendors/font-awesome.min.css">
    <!-- For Icons -->
    <!-- Custom CSS File -->
    <!-- Animation CSS -->
    <link rel="stylesheet" href="assets/css/vendors/animate.min.css">
    <link rel="stylesheet" href="assets/css/resources/welcome.css?id=<?php echo uniqid();?>">


    <!-- JQuery  -->
    <script src="assets/js/vendors/jquery-3.1.1.min.js"></script>

    <title>Danya Project | Easy Website Generator for Economy professors.</title>

</head>

<body id="top">

    <!-- PRELOADER -->
    <div class="spn_hol">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <!-- Navbar Start -->





<header>
   <!-- Navbar Start -->
   <nav class="navbar light-theme">
      <div class="container-fluid">
           <!-- Logo and Toggle Are grouped for better mobile Display -->
           <div class="navbar-header"> <!-- Navbar Header -->
               <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigationLinks"
               aria-expanded="false">
                   <i class="fa fa-bars"></i>
               </button>
               <!-- - Logo Start -->
               <a href="index.php" class="navbar-brand">Danya<strong>Project.</strong></a>
               <!-- - Logo End -->
           </div> <!-- End Navbar Header -->
           <!-- Begin Navigation Links -->
           <!-- Collecting nav links,forms and other content for toggling -->
           <div class="collapse navbar-collapse" id="navigationLinks">
               <ul class="nav navbar-nav">

               </ul>
               <form target="_blank" class="navbar-form navbar-right" action="search/index.php" method="GET">
                       <div class="input-group">
                           <input type="hidden" name="category" value="all">
                           <input type="hidden" name="date" value="latest">
                           <input type="text" name="q" class="form-control" placeholder="search Here" id="navSearch">
                           <span class="input-group-btn">
                              <input class="btn btn-custom" type="submit" id="searchIcon" value="Search">
                          </span>
                       </div>
               </form>
               <ul class="nav navbar-nav navbar-right">
                   <li>
                       <a href="editor/index.php"><i class="fa fa-code"></i> Editor</a>
                   </li>
                   <li class="dropdown">
                       <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                          aria-expanded="false">More &nbsp;<i class="fa  fa-chevron-down" aria-hidden="true"></i></a>
                       <ul class="dropdown-menu">
                           <li><a href="#dev-team"><i class="fa fa-group"></i> &nbsp;Developers</a></li>
                           <li><a href="search/index.php?q=&date=latest&category=all"><i class="fa fa-clock-o"></i>  &nbsp;Latest Saved</a></li>
                           <li class="divider"></li>
                           <li><a href="#contact"><i class="fa fa-envelope"></i> &nbsp;Contact Us</a></li>
                           <li><a href="#about"><i class="fa fa-question-circle"></i> &nbsp;About Project</a></li>
                       </ul>
                   </li>

               </ul>

           </div>


           <!-- End Navigation Links -->

      </div>
   </nav>
   <!-- Navbar End -->


    <div class="hero-box">
            <div class="row">
                <h1 class="text-center hero-header">DANYA PROJECT</h1>
                <div class="col-lg-6 col-md-6 col-sm-6 col-cs-12">
                    <div class="box" id="editor">
                        <div class="box-header">
                           <div class="box-icon">
                              <i class="fa fa-code icon-big"></i>
                           </div>
                           <a href=""><h1>Editor ...</h1></a>
                        </div>
                        <div class="box-content">
                           <p class="text-faded">Go to Editor And Create your awesome Website ... </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box" id="Websites">
                       <div class="box-header">
                          <div class="box-icon">
                             <i class="fa fa-globe"></i>
                          </div>
                          <a href=""><h1>Websites ...</h1></a>
                       </div>
                       <div class="box-content">
                          <p class="text-faded">Browse Websites already generated, or Search for Specific ones! to edit ...</p>
                       </div>
                    </div>
                </div>
            </div>

    </div>
</header>
<a href="#features" id="down-btn" ><i class="fa fa-chevron-down fa-2x animated infinite pulse"></i></a>

<section id="features">
   <div class="row hide-custom">
      <h2 class="text-center"> FEATURES </h2>

      <div class="col-lg-3 col-md-3 col-sm-3 text-center">
         <i class="fa fa-code feature-icon"></i>
         <h4 class="text-center"> Friendly Editor </h4>
         <p class="text-center text-fade">Our Editor is like a desktop text editor and very friendly too.
         With the ability to Autocomplete the code you're writing, highling the code you can also use shortcuts to insert code.
      The Editor is also available in two modes, Dark and Light Mode</p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 text-center">
         <i class="fa fa-chrome feature-icon"></i>
         <h4 class="text-center"> Responsive</h4>
         <p class="text-faded text-fade">The Website is almost completely responsive, works on google chrome, firefox and safari the same way. Except for IE !, anyway IE Sucks!!</p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 text-center">
         <i class="fa fa-fighter-jet feature-icon"></i>
         <h4 class="text-center"> Fast Interpreter </h4>
         <p class="text-faded text-fade">Your WebSite Will Be generated in just a second.</p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 text-center">
         <i class="fa fa-database feature-icon"></i>
         <h4 class="text-center">Save Your Work</h4>
         <p class="text-faded text-fade">We give you the ability to Store your Websites, give them a title, and you can store your websites under catagories, thus you can search for your website Faster.</p>
      </div>
   </div>
</section>

<section id="features-detail">
   <div class="row">
      <h2 class="text-center"> EDITOR FEATURES </h2>
      <div class="col-md-6 hide-custom" id="editor-text">
         <br>
         <br>
         <p>
             Danya Editor, the Editor is similar to a desktop based Text editor with many awesome features including multiple selections, multiple editing,
             Smart syntax Highlighter for D Markup Language, smart Code autocomplete and easy user interface for inserting code through shortcuts and many other features to discover.
         </p>
         <h4><i class="fa fa-cart-plus"></i> Features</h4>
         <ul class="editor-features">
            <li><i class="fa fa-check"></i> Syntax Highlighter</li>
            <li><i class="fa fa-check"></i> Smart Code Autocomplete</li>
            <li><i class="fa fa-check"></i> Code Saving</li>
            <li><i class="fa fa-check"></i> Dark and Light Theme</li>
            <li><i class="fa fa-check"></i> Responsive Editor</li>
            <li><i class="fa fa-check"></i> Simple UI/UX Design</li>
         </ul>

      </div>
      <div class="col-md-6 hide-custom" id="editor-mockup">
         <img src="assets/images/macbook-iphone-mockup.png" alt="Editor MockUp" class="img-responsive">
      </div>


   </div>
</section>
    <section id="syntax-highlighter">
        <div class="row">
            <h2 class="text-center">Syntax highlighter</h2>
            <div class="col-md-6">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci at commodi, delectus deserunt enim fugiat itaque magnam nemo, possimus saepe sapiente tempora voluptatibus? Cumque possimus quae quam quia repellat similique!
                <h4><i class="fa fa-plus"></i> Features </h4>
                <p>Highlighting Capabilities are: </p>
                <ul>
                    <li><i class="fa fa-check"></i> Numbers (Decimal, float, Hexadecimal) </li>
                    <li><i class="fa fa-check"></i> Hex Colors (ex: #0FACF3)</li>
                    <li><i class="fa fa-check"></i> Correct Commands According to Language D</li>
                    <li><i class="fa fa-check"></i> Wrong Command Name</li>
                    <li><i class="fa fa-check"></i> Comments </li>
                    <li><i class="fa fa-check"></i> Parameter Separator </li>
                </ul>
            </div>
            <div class="col-md-6">
                <img src="assets/images/syntax-highlighter-darkmode.png" alt="Syntaxe Highlighter en mode dark" class="img-responsive img-thumbnail" title="Syntax Highlighter In Dark Mode">
                <p class="text-center text-fade" style="margin-top: 10px;"> Syntax Highlighter Using Dark Mode</p>
            </div>
        </div>
    </section>
    <section id="code-autocomplete">
        <div class="row">
            <h2 class="text-center"> Code Autocomplete </h2>
            <div class="col-md-6">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem dolor fuga ipsum. A consequatur culpa, debitis ducimus earum excepturi exercitationem fugit libero maiores, necessitatibus nihil rem sapiente ut! Ea, itaque?
                
            </div>
            <div class="col-md-6">
                <img src="assets/images/autocomplete.gif" alt="Autocomplete in Action" class="img-responsive img-thumbnail">
                <p class="text-center text-fade" style="margin-top: 9px; margin-right: 20px;">in action autocomplete</p>
            </div>
        </div>
    </section>
    <section id="themes">
        <div class="row">
            <h2 class="text-center"> Themes </h2>
            <div class="col-md-8 col-md-offset-2">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus earum error esse est maiores minima obcaecati odit praesentium saepe tempora? Beatae ducimus esse ex nam officiis quam sequi tempore ut?
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-6">
                <p class="text-center"> Dark Theme</p>
                <img src="assets/images/syntax-highlighter-darkmode.png" alt="Dark Theme" class="img-responsive img-thumbnail">
            </div>
            <div class="col-md-6">
                <p class="text-center"> Light Theme </p>
                <img src="assets/images/light-theme.png" alt="Light Theme" class="img-responsive img-thumbnail">
            </div>
        </div>
    </section>
<section id="dev-team">
   <div class="row">
      <h2 class="text-center">Developement Team</h2>

      <div class="col-md-6 col-md-offset-3">
         <h3 class="text-center">Our Skills</h3>
         <div>
             <div class="progress">
                 <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                     <span>HTML/CSS</span>
                 </div>
             </div>
             <div class="progress">
                 <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                     <span>Javascript</span>
                 </div>
             </div>

             <div class="progress">
                 <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                     <span>PHP</span>
                 </div>
             </div>
             <div class="progress">
                 <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="44" aria-valuemin="0" aria-valuemax="100" style="width: 44%;">
                     <span>SQL</span>
                 </div>
             </div>
         </div>
      </div>
   </div>
   <div class="row">
      <h3 class="text-center">Meet The team</h3>
      <div id="meet-the-team" class="row">
         <div class="col-md-2 col-xs-6 text-center">
                 <p><img class="img-responsive img-thumbnail img-circle" src="assets/images/omega-profile.jpg" alt="" height="150px" width="150px"></p>
                 <h5>CHERIEF Yassine<small class="designation muted">Khedma</small></h5>
                 <p>I Work as a Senior Sleeper at Home Inc.</p>
                 <a href="#" class="btn btn-social btn-facebook"><i class="fa fa-facebook"></i></a>
                 <a href="#" class="btn btn-social btn-twitter"><i class="fa fa-twitter"></i></a>
                 <a href="#" class="btn btn-social btn-linkedin"><i class="fa fa-linkedin"></i></a>
         </div>
         <div class="col-md-2 col-xs-6 text-center">
                 <p><img class="img-responsive img-thumbnail img-circle" src="assets/images/omega-profile.jpg" alt="" height="150px" width="150px"></p>
                 <h5>KERRIS Nadir Islam<small class="designation muted">Khedma</small></h5>
                 <p>I don't know wach ndirlkom hna.</p>
                 <a href="#" class="btn btn-social btn-facebook"><i class="fa fa-facebook"></i></a>
                 <a href="#" class="btn btn-social btn-twitter"><i class="fa fa-twitter"></i></a>
                 <a href="#" class="btn btn-social btn-linkedin"><i class="fa fa-linkedin"></i></a>
         </div>
         <div class="col-md-2 col-xs-6 text-center">
                 <p><img class="img-responsive img-thumbnail img-circle" src="assets/images/omega-profile.jpg" alt="" height="150px" width="150px"></p>
                 <h5>GACEM Abderraouf<small class="designation muted">Khedma</small></h5>
                 <p>I don't know wach ndirlkom hna.</p>
                 <a href="#" class="btn btn-social btn-facebook"><i class="fa fa-facebook"></i></a>
                 <a href="#" class="btn btn-social btn-twitter"><i class="fa fa-twitter"></i></a>
                 <a href="#" class="btn btn-social btn-linkedin"><i class="fa fa-linkedin"></i></a>
         </div>
         <div class="col-md-2 col-xs-6 text-center">
                 <p><img class="img-responsive img-thumbnail img-circle" src="assets/images/omega-profile.jpg" alt="" height="150px" width="150px"></p>
                 <h5>MEKHALFA Taki Eddine<small class="designation muted">Khedma</small></h5>
                 <p>I don't know wach ndirlkom hna.</p>
                 <a href="#" class="btn btn-social btn-facebook"><i class="fa fa-facebook"></i></a>
                 <a href="#" class="btn btn-social btn-twitter"><i class="fa fa-twitter"></i></a>
                 <a href="#" class="btn btn-social btn-linkedin"><i class="fa fa-linkedin"></i></a>
         </div>
         <div class="col-md-2 col-xs-6 text-center">
                 <p><img class="img-responsive img-thumbnail img-circle" src="assets/images/omega-profile.jpg" alt="" height="150px" width="150px"></p>
                 <h5>BRAHIM Yacine<small class="designation muted">Web Developper</small></h5>
                 <p>I don't know wach ndirlkom hna </p>
                 <a href="#" class="btn btn-social btn-facebook"><i class="fa fa-facebook"></i></a>
                 <a href="#" class="btn btn-social btn-twitter"><i class="fa fa-twitter"></i></a>
                 <a href="#" class="btn btn-social btn-linkedin"><i class="fa fa-linkedin"></i></a>
         </div>
          <div class="col-md-2 col-xs-6 text-center">
                  <p><img class="img-responsive img-thumbnail img-circle" src="assets/images/omega-profile.jpg" alt="" height="150px" width="150px"></p>
                  <h5>DJELLAL Abderrahmane<small class="designation muted">Khedma</small></h5>
                  <p>I don't know wach ndirlkom hna.</p>
                  <a href="#" class="btn btn-social btn-facebook"><i class="fa fa-facebook"></i></a>
                  <a href="#" class="btn btn-social btn-twitter"><i class="fa fa-twitter"></i></a>
                  <a href="#" class="btn btn-social btn-linkedin"><i class="fa fa-linkedin"></i></a>
          </div>
      </div><!--/#meet-the-team-->
   </div>
</section>


<section id="contact">
   <div class="row">
       <h2 class="text-center"> CONTACT US </h2>
       <hr>
       <p class="text-center">If You like the work we have Done, and you want something similar
       please contact us.
       </p>
       <br>
       <div class="col-md-8 text-center">
           <form class="well form-horizontal" action="contact/contact.php" method="post"  id="contact_form">
               <fieldset>

                   <!-- Form Name -->
                   <legend class="text-center">Contact Us Today!</legend>

                   <!-- Text input-->

                   <div class="form-group">
                       <label class="col-md-4 control-label">First Name</label>
                       <div class="col-md-4 inputGroupContainer">
                           <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-user"></i></span>
                               <input  name="first_name" placeholder="First Name" class="form-control"  type="text">
                           </div>
                       </div>
                   </div>

                   <!-- Text input-->

                   <div class="form-group">
                       <label class="col-md-4 control-label" >Last Name</label>
                       <div class="col-md-4 inputGroupContainer">
                           <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-user"></i></span>
                               <input name="last_name" placeholder="Last Name" class="form-control"  type="text">
                           </div>
                       </div>
                   </div>

                   <!-- Text input-->
                   <div class="form-group">
                       <label class="col-md-4 control-label">E-Mail</label>
                       <div class="col-md-4 inputGroupContainer">
                           <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                               <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
                           </div>
                       </div>
                   </div>


                   <!-- Text area -->

                   <div class="form-group">
                       <label class="col-md-4 control-label">Message</label>
                       <div class="col-md-4 inputGroupContainer">
                           <div class="input-group">
                               <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                               <textarea class="form-control" name="comment" placeholder="Project Description"></textarea>
                           </div>
                       </div>
                   </div>

                   <!-- Success message -->

                   <div class="alert alert-success alert-dismissable center-block" role="alert" id="success_message">
                       <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-close"></i></a>
                       Success <i class="fa fa-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.
                   </div>

                   <!-- Button -->
                   <div class="form-group">
                       <label class="col-md-4 control-label"></label>
                       <div class="col-md-4">
                           <button type="submit" class="btn btn-warning" >Send <span class="fa fa-send"></span></button>
                       </div>
                   </div>

               </fieldset>
           </form>
       </div>
       <div class="col-md-4">
           <div id="map">

           </div>
       </div>
   </div>
</section>

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2017 <a target="_blank" href="https://www.facebook.com/yacinewebdz" title="">0m3ga-k0d3r</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#top">Home</a></li>
                        <li><a href="#dev-team">Dev Team</a></li>
                        <li><a href="#features">features</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                        <li><a href="#top"><i class="fa fa-chevron-up"></i></a></li><!--#gototop-->
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

<button type="button" class="btn btn-custom" id="upButton"><i class="fa fa-chevron-up fa-2x"></i></button>


<script src="./assets/js/vendors/tether.min.js">
</script>
<script src="./assets/js/vendors/bootstrap.min.js"></script>

<script>
    function initMap() {
        var esi = {lat: 36.705777, lng: 3.171200};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
            center: esi
        });
        var marker = new google.maps.Marker({
            position: esi,
            map: map
        });
    }

    $(window).bind("load", function() {

      $(".spn_hol").fadeOut(1000, function() {
         $(".col-md-6").addClass("animated bounceInDown");
      });
        var featuresTarget = $("section#features").offset().top, timeout = null;
        var featuresDetails = $("section#features-detail").offset().top, timeout2 = null;


      $("#editor").on("click", function() {
         window.open("editor/index.php", "_blank");
      });
      $("#Websites").on("click", function() {
         window.open("search/index.php?q=&date=latest", "_blank");
      });

      $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html, body').animate({
           scrollTop: target.offset().top
        }, 1000);
          return false;
        }
        }
      });


      $(window).scroll(function() {
          if (!timeout) {
              timeout = setTimeout(function() {
                  clearTimeout(timeout);
                  timeout = null;
                  if ($(window).scrollTop() >= featuresTarget - 90) {
                      $("section#features > .row").removeClass("hide-custom");
                      $("section#features > .row").addClass("animated fadeInUp");
                  }
              }, 1);
          }

          if (!timeout2) {
              timeout2 = setTimeout(function() {
                  clearTimeout(timeout2);
                  timeout2 = null;
                  if ($(window).scrollTop() >= featuresDetails - 10) {
                      $("#editor-text").removeClass("hide-custom").addClass("animated fadeInLeft");
                      $("#editor-mockup").removeClass("hide-custom").addClass("animated fadeInRight");
                  }
              }, 1);
          }

        if ($(this).scrollTop() > 600) {
           $('#upButton').fadeIn();
        } else {
           $('#upButton').fadeOut();
        }




      });

      $('#upButton').click(function() {
        $("html, body").animate({scrollTop: 0}, 800);
        return false;
      });

    });
</script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwTLqeIU-SizKIUtRz4NziA6P4eHkIt9A&callback=initMap">
    </script>

</body>
</html>
