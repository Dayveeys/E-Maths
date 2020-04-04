<?php
include_once 'phpfiles/global.php';
include_once 'app/includes/dbkey2.php';

checkstudentlogged();

$title = "Student Portal Signup";

$success = $error = $passport = $firstname = $lastname = $othernames = $email = $password = $c_password = $gender = $dob = $phone = $address = $state = $lga = $nationality = $programme = $school = "";



if (isset($_POST['signup'])) {
   $firstname = checkinput($_POST['firstname']);
   $lastname = checkinput($_POST['lastname']);
   $othernames = checkinput($_POST['othernames']);
   $email = checkinput($_POST['email']);
   $password = checkinput($_POST['password']);
   $c_password = checkinput($_POST['c_password']);
   $gender = checkinput($_POST['gender']);
   $dob = checkinput($_POST['dob']);
   $phone = checkinput($_POST['phone']);
   $address = checkinput($_POST['address']);
   $state = checkinput($_POST['state']);
   $lga = checkinput($_POST['lga']);
   $nationality = checkinput($_POST['nationality']);
   $programme = checkinput($_POST['programme']);
   $school = checkinput($_POST['school']);


   if (!empty($firstname) || !empty($lastname) || !empty($email) || !empty($password) || !empty($dob) || !empty($phone) || !empty($address) || !empty($state) || !empty($lga) || !empty($nationality)) {
     if (!empty($firstname)) {
       if (!empty($lastname)) {
         if (!empty($email)) {
           if (!empty($password)) {
             if ($gender != 'choose') {
               if (!empty($dob)) {
                 if (!empty($phone)) {
                   if (!empty($address)) {
                     if (!empty($state)) {
                       if (!empty($lga)) {
                         if (!empty($nationality)) {
                           if ($programme != 'choose') {
                             if (preg_match("/^[a-zA-Z]*$/",$firstname)) {
                               if (preg_match("/^[a-zA-Z]*$/",$lastname)) {
                                 if (preg_match("/^[a-zA-Z ]*$/",$othernames)) {
                                   if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                     if ($password == $c_password) {
                                       if (preg_match("/^[0-9\/]*$/",$dob)) {
                                         if (preg_match("/^(\d{2})\/(\d{2})\/(\d{4})$/", $dob)) {
                                           if (preg_match("/^[0-9]*$/",$phone)) {
                                             if (preg_match("/^[a-zA-Z0-9-+,. ]*$/",$address)) {
                                               if (preg_match("/^[a-zA-Z- ]*$/",$state)) {
                                                 if (preg_match("/^[a-zA-Z- ]*$/",$lga)) {
                                                   if (preg_match("/^[a-zA-Z- ]*$/",$nationality)) {
                                                     $sql = "select * from students where email = '$email'";
                                                     $result = mysqli_query($connect, $sql);
                                                     if (!mysqli_num_rows($result) > 0) {
                                                        $password = md5($password);
                                                       if (isset($_FILES['passport']['tmp_name'])) {
                                                         $name = $_FILES['passport']['name'];
                                                         $size = $_FILES['passport']['size'];
                                                         $type = $_FILES['passport']['type'];
                                                         if (getimagesize($_FILES['passport']['tmp_name']) == true) {
                                                           if ($type == "image/jpeg" || $type == "image/png") {
                                                             $name = strtolower($firstname."-".$phone.".png");
                                                             if (move_uploaded_file($_FILES['passport']['tmp_name'], "app/studportal/uploads/passport/".$name)) {
                                                               $reg_no = "EMTH/".date('Y')."/".rand(0001,9999).rand(01,99);
                                                               $date_reg = date("d/m/Y");
                                                               $time_reg = date("h:ia");
                                                               $sql = "insert into students (passport, reg_no, firstname, lastname, othernames, email, password, gender, dob, phone, address, state, lga, nationality, programme, school, date_reg, time_reg)
                                                               values('$name', '$reg_no', '$firstname', '$lastname', '$othernames', '$email', '$password', '$gender', '$dob', '$phone', '$address', '$state', '$lga', '$nationality', '$programme', '$school', '$date_reg', '$time_reg')";
                                                               $query = mysqli_query($connect, $sql);
                                                               
                                                                $sql2 = "insert into user (name, gender, college, email, mob, password)
                                                                 values('$firstname $lastname', '$gender', '$school', '$email', '$phone', '$password')";

                                                               
                                                               $query2 = mysqli_query($connect2, $sql2);

                                                               if ($query) {
                                                                 $success = "Registeration was successful! Kindly <a href='app/studportal/login.php' style='color:white;'>login</a> to view your profile.";
                                                                }if ($query2) {
                                                                 $success = "Registeration was successful! Kindly <a href='app/studportal/login.php' style='color:white;'>login</a> to view your profile.";
                                                               }else {
                                                                 $error = "An error occured, please try again.";
                                                               }
                                                             }else {
                                                               $error = "An error occured, please try again!!";
                                                             }
                                                           }else {
                                                             $error = "Unsupported file format!";
                                                           }
                                                         }else {
                                                           $error = "Please, select an image file!";
                                                         }
                                                       }
                                                     }else {
                                                       $error = "Email address already registered.";
                                                     }
                                                   }else {
                                                     $error = "Please, type a valid country name.";
                                                   }
                                                 }else {
                                                   $error = "Please, type a valid LGA name.";
                                                 }
                                               }else {
                                                 $error = "Please, type a valid state name.";
                                               }
                                             }else {
                                               $error = "Please, type a valid address.";
                                             }
                                           }else {
                                             $error = "Please, type a valid phone number.";
                                           }
                                         }else {
                                             $error = "Please, use DD/MM/YYYY for date of birth.";
                                           }
                                       }else {
                                         $error = "Please, use DD/MM/YYYY for date of birth.";
                                       }
                                     }else {
                                       $error = "Password does not match!";
                                     }
                                   }else {
                                     $error = "Please type correct email address";
                                   }
                                 }else {
                                   $error = "Please, type your valid othernames.";
                                 }
                               }else {
                                 $error = "Please, type your a valid lastname.";
                               }
                             }else {
                               $error = "Please, type your a valid firstname.";
                             }
                           }else {
                             $error = "Please, choose your programme.";
                           }
                         }else {
                           $error = "Please, type your country name.";
                         }
                       }else {
                         $error = "Please, type your local government area.";
                       }
                     }else {
                       $error = "Please, type your state.";
                     }
                   }else {
                     $error = "Please, type your address.";
                   }
                 }else {
                   $error = "Please, type your phone number.";
                 }
               }else {
                 $error = "Please, type your date of birth.";
               }
             }else {
               $error = "Please, choose your gender.";
             }
           }else {
             $error = "Please, type your password.";
           }
         }else {
           $error = "Please, type your email address.";
         }
       }else {
         $error = "Please, type your lastname.";
       }
     }else {
       $error = "Please, type your firstname.";
     }
   }else {
     $error = "All fields marked * is required";
   }
 }

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">

<title>E-Maths || Sign Up</title>
<link rel="icon" href="favicon.png" type="image/png">
<link rel="shortcut icon" href="favicon.ico" type="img/x-icon">

<!-- <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600' rel='stylesheet' type='text/css'> -->

<link href="css/kntbootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css">
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

<header class="header" id="header" style="margin-bottom: 3px !important;"><!--header-start-->
  <div style="" class="animated fadeInDown delay-07s container">
    <div class="w3-center" style="color: #fff;">
          <h1>Students Registration</h1>
        </div>
          <span class="" id="usereg"><?php echo $error; ?></span><span style="color:green; font-weight:bold;" id="delsucs"><?php echo $success; ?></span>
          <hr>
          <form action="reg.php" method="post" enctype="multipart/form-data" style="color: yellow; text-align: left;">
          <div class="col-sm-6">
            <label>Passport:</label>
            <input required class="form-control w3-margin-bottom" type="file" name="passport" required>

            <label>Firstname:</label>
            <input required class="form-control w3-margin-bottom" type="text" value="<?php echo $firstname; ?>" name="firstname" placeholder="Enter your firstname..">

            <label>Lastname:</label>
            <input required class="form-control w3-margin-bottom" type="text" value="<?php echo $lastname; ?>" name="lastname" placeholder="Enter your lastname..">

            <label>Othernames:</label>
            <input required class="form-control w3-margin-bottom" type="text" value="<?php echo $othernames; ?>" name="othernames" placeholder="Enter your othernames..">

            <label>Email:</label>
            <input required class="form-control w3-margin-bottom" type="text" value="<?php echo $email; ?>" name="email" placeholder="Enter your email..">

            <label>Password:</label>
            <input required class="form-control w3-margin-bottom" type="password" value="<?php echo $password; ?>" name="password" placeholder="Enter your password..">

            <label>Re-type Password:</label>
            <input required class="form-control w3-margin-bottom" type="password" value="<?php echo $c_password; ?>" name="c_password" placeholder="Re-type your password..">

            <label>Gender:</label>
            <select class="form-control w3-margin-bottom" name="gender">
              <option value="choose">-- Choose --</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>

          <div class="col-sm-6">
            <label>Date of birth:</label>
            <input required class="form-control w3-margin-bottom" type="text" name="dob" value="<?php echo $dob; ?>" placeholder="DD/MM/YYYY">

            <label>Phone number:</label>
            <input required class="form-control w3-margin-bottom" type="text" name="phone" value="<?php echo $phone; ?>" placeholder="Enter your phone number">

            <label>Address:</label>
            <input required class="form-control w3-margin-bottom" type="text" name="address" value="<?php echo $address; ?>" placeholder="Enter your address">

            <label>State:</label>
            <input required class="form-control w3-margin-bottom" type="text" name="state" value="<?php echo $state; ?>" placeholder="Enter your state">

            <label>LGA:</label>
            <input required class="form-control w3-margin-bottom" type="text" name="lga" value="<?php echo $lga; ?>" placeholder="Enter your LGA">

            <label>Nationality:</label>
            <input required class="form-control w3-margin-bottom" type="text" name="nationality" value="<?php echo $nationality; ?>" placeholder="Enter your nationality">

            <label>Choose Class:</label>
            <select class="form-control w3-margin-bottom" name="programme">
              <option value="choose">-- choose --</option>
              <option value="JSSI">JSSI</option>
              <option value="JSS2">JSS2</option>
              <option value="JSS3">JSS3</option>
              <option value="SSS1">SSS1</option>
              <option value="SSS2">SSS2</option>
              <option value="SSS3">SSS3</option>
            </select>
            <label>School:</label>
            <input required class="form-control w3-margin-bottom" type="text" name="school" value="<?php echo $school; ?>" placeholder="Enter your School">
          </div>

          <div class="col-sm-12">
            <br>
            <input required class="btn btn-success form-control w3-hover-text-white" type="submit" name="signup" value="Signup">
          </div><hr>
        </form>

      <!-- <figure class="logo animated fadeInDown delay-07s">
          <a href="#"><img src="img/logo.png" alt=""></a> 
        </figure> 
        <h1 class="animated fadeInDown delay-07s">Welcome To Knight Studios</h1>
        <ul class="we-create animated fadeInUp delay-1s">
          <li>We are a digital agency that loves crafting beautiful websites.</li>
        </ul>
            <a class="link animated fadeInUp delay-1s" href="#test">Get Started</a> -->
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
        // $("#usereg").hide();
        $("#delsucs2").hide();
        $("#viewbtn").hide();
        
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
              }, 1000000)   
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
                color:red;
                font-weight:bold;
              }
            </style>
          <?php
        }else{
          ?>
            <style type="text/css">
              #usereg{
                display: none;
              }
            </style>
          <?php
        }
      ?>
</body>
</html>