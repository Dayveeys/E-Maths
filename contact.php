<?php
include_once 'app/quiz/dbConnection.php';

    $success="";

if (isset($_POST['submit'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$id=uniqid();
$date=date("Y-m-d");
$time=date("h:i:sa");
$feedback = $_POST['feedback'];
$q=mysqli_query($con,"INSERT INTO feedback VALUES  ('$id' , '$name', '$email' , '$subject', '$feedback' , '$date' , '$time')")or die ("Error");
    $success="Feedback sent successfully! We will get back to you through the email you have provided";
}else{
  $error="Feedback not sent!";
}


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">

<title>E-Maths || Feedback</title>
<link rel="icon" href="favicon.png" type="image/png">
<link rel="shortcut icon" href="favicon.ico" type="img/x-icon">

<!-- <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600' rel='stylesheet' type='text/css'> -->


<link href="css/kntbootstrap.css" rel="stylesheet">
<link href="css/w3.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/style2.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">

<!--[if IE]><style type="text/css">.pie {behavior:url(PIE.htc);}</style><![endif]-->

<script type="text/javascript" src="js/jquery.1.8.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-scrolltofixed.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.isotope.js"></script>
<script type="text/javascript" src="js/wow.js"></script>
<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/jquery-1.6.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Vegur_700.font.js"></script>
<script type="text/javascript" src="js/Vegur_400.font.js"></script>
<script type="text/javascript" src="js/Vegur_300.font.js"></script>
<script type="text/javascript" src="js/atooltip.jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>

<!--[if lt IE 9]>
    <script src="js/respond-1.1.0.min.js"></script>
    <script src="js/html5shiv.js"></script>
    <script src="js/html5element.js"></script>
<![endif]-->

</head>
<body>

<nav class="main-nav-outer wow" id="test"><!--main-nav-start-->
	<div class="container wow">
        <ul class="main-nav">
        	<li><a href="index.php#header">Home</a></li>
            <li><a href="app/studportal/login.php">Students Login</a></li>
            <li><a href="app/login.php">Tutor Login</a></li>
            <li class="small-logo"><a href="index.php#header"><img src="img/small-logo.png" alt=""></a></li>
            <li><a href="reg.php">Sign Up</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="index.php#contact">About E-Maths</a></li>
        </ul>
        <a class="res-nav_click" href="#"><i class="fa-bars"></i></a>
    </div>
</nav><!--main-nav-end-->

<div>
<header class="header" id="header" style="margin-bottom: 3px !important;"><!--header-start-->
  <div style="" class="container">
    <div class="wrapper">
        <div class="whole w3-margin-top">
        <div class="w3-center" style="color: #fff;">
          <h1>Send Your Feedback</h1><span class="btn btn-danger" id="usereg"><?php echo $error; ?></span><span class="btn btn-success" id="delsucs"><?php echo $success; ?></span>
          <hr>
        </div>
        <div class="relative">
          <form action="contact.php" method="post" enctype="multipart/form-data" style="color: yellow; text-align: left;">

          <div class="col-sm-6">
            <label>Name:</label>
            <input required id="name" name="name" placeholder="Enter your name" class="form-control input-md" type="text">

            <label>Subject:</label>
            <input required class="form-control w3-margin-bottom" id="name" name="subject" placeholder="Enter subject" class="form-control input-md" type="text">

            <label>Email:</label>
            <input required class="form-control w3-margin-bottom" id="email" name="email" placeholder="Enter your email" class="form-control input-md" type="email">
          </div>

          <div class="col-sm-6">
            <label>Comment:</label>
            <textarea required rows="5" cols="8" name="feedback" class="form-control" placeholder="Write feedback here..."></textarea>
            <br>

            <input required class="btn btn-success form-control w3-hover-text-white" type="submit" name="submit" value="Send">
          </div>
        </form>
        </div>
      </div>
    </div>
    <div class="col-md-12"><hr></div>
        <div class="col-md-6" style="font-size: 20px; margin-top: 5%; color: #fff"><i class="fa fa-envelope"></i><br>dumeoka@visiondatatechs.com</div>
        <div class="col-md-6" style="font-size: 20px; margin-top: 4.7%; color: #fff"><i class="fa fa-phone"></i><br>+234(0)706 896 9591</div>
      <!-- <figure class="logo animated fadeInDown delay-07s">
          <a href="#"><img src="img/logo.png" alt=""></a> 
        </figure> 
        <h1 class="animated fadeInDown delay-07s">Welcome To Knight Studios</h1>
        <ul class="we-create animated fadeInUp delay-1s">
          <li>We are a digital agency that loves crafting beautiful websites.</li>
        </ul>
            <a class="link animated fadeInUp delay-1s" href="#test">Get Started</a> -->
  </div>
</div>
</header><!--header-end-->

<footer class="footer">
    <div class="container">
        <div class="footer-logo"><a href="#"><img src="img/footer-logo.png" alt=""></a></div>
        <span class="copyright">© <script>var y = new Date(); document.write(y.getFullYear()+" ");
      </script>  | <a href="index.php">E-Maths</a> by Davis Umeoka</span>
    </div>
    <!-- 
        All links in the footer should remain intact. 
        Licenseing information is available at: http://bootstraptaste.com/license/
        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Knight
    -->
</footer>


<script type="text/javascript">
    $(document).ready(function(e) {
        $('#test').scrollToFixed();
        $('.res-nav_click').click(function(){
            $('.main-nav').slideToggle();
            return false    
            
        });
        
    });
</script>

  <script>
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100
      }
    );
    wow.init();
 
  </script>


<script type="text/javascript">
	$(window).load(function(){
		
		$('.main-nav li a').bind('click',function(event){
			var $anchor = $(this);
			
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top - 102
			}, 1500,'easeInOutExpo');
			/*
			if you don't want to use the easing effects:
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top
			}, 1000);
			*/
			event.preventDefault();
		});
	})
</script>

<script type="text/javascript">

$(window).load(function(){
  
  
  var $container = $('.portfolioContainer'),
      $body = $('body'),
      colW = 375,
      columns = null;

  
  $container.isotope({
    // disable window resizing
    resizable: true,
    masonry: {
      columnWidth: colW
    }
  });
  
  $(window).smartresize(function(){
    // check if columns has changed
    var currentColumns = Math.floor( ( $body.width() -30 ) / colW );
    if ( currentColumns !== columns ) {
      // set new column count
      columns = currentColumns;
      // apply width to container manually, then trigger relayout
      $container.width( columns * colW )
        .isotope('reLayout');
    }
    
  }).smartresize(); // trigger resize to set container width
  $('.portfolioFilter a').click(function(){
        $('.portfolioFilter .current').removeClass('current');
        $(this).addClass('current');
 
        var selector = $(this).attr('data-filter');
        $container.isotope({
			
            filter: selector,
         });
         return false;
    });
  
});

</script>
<script type="text/javascript">Cufon.now();</script>
 <script>
        $("#delsucs2").hide();
        $("#viewbtn").hide();
        $("#usereg").hide();
        $("#shobtn").on("click", function(){
          $("#usereg").show("slow");
        });
        $("#dhbtn").on("click", function(){
          $("#usereg").hide("slow");
        });
      </script>

      <?php
        if (isset($success)){
          ?>
          <script>
            setTimeout(function(){
                if ($('#delsucs').length > 0) {
                  $('#delsucs').fadeOut("slow");
                }
              }, 5000)   
          </script>
          <?php
        }
      ?>
      <?php
        if (isset($error)){
          ?>
          <style type="text/css">
            #usereg{
              display: block;
            }
          </style>
                     
          <?php
        }
      ?>
</body>
</html>