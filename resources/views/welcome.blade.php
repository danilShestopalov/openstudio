<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OpenStudio</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="device-mockups/device-mockups.min.css">

    <!-- Custom styles for this template -->
    <link href="css/new-age.css" rel="stylesheet">
    <link href="css/cowboy.css" rel="stylesheet">

</head>
<script>
    $(document).ready(function(){
        openLoginModal();
    });


    /*
     *
     * login-register modal
     * Autor: Creative Tim
     * Web-autor: creative.tim
     * Web script: http://creative-tim.com
     *
     */
    function showRegisterForm(){
        $('.loginBox').fadeOut('fast',function(){
            $('.registerBox').fadeIn('fast');
            $('.login-footer').fadeOut('fast',function(){
                $('.register-footer').fadeIn('fast');
            });
        });
        $('.error').removeClass('alert alert-danger').html('');

    }
    function showLoginForm(){
        $('#loginModal .registerBox').fadeOut('fast',function(){
            $('.loginBox').fadeIn('fast');
            $('.register-footer').fadeOut('fast',function(){
                $('.login-footer').fadeIn('fast');
            });


        });
        $('.error').removeClass('alert alert-danger').html('');
    }

    function openLoginModal(){
        showLoginForm();
        setTimeout(function(){
            $('#loginModal').modal('show');
        }, 230);

    }
    function openRegisterModal(){
        showRegisterForm();
        setTimeout(function(){
            $('#loginModal').modal('show');
        }, 230);

    }

    function loginAjax(){
        /*   Remove this comments when moving to server
        $.post( "/login", function( data ) {
                if(data == 1){
                    window.location.replace("/home");
                } else {
                     shakeModal();
                }
            });
        */

        /*   Simulate error message from the server   */
        shakeModal();
    }

    function shakeModal(){
        $('#loginModal .modal-dialog').addClass('shake');
        $('.error').addClass('alert alert-danger').html("Invalid email/password combination");
        $('input[type="password"]').val('');
        setTimeout( function(){
            $('#loginModal .modal-dialog').removeClass('shake');
        }, 1000 );
    }


</script>
<body id="page-top">
<header class="masthead">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-7 my-auto">
                <div class="header-content mx-auto">
                    <h1 class="mb-5">Looking for a startup team?</h1>
                    <h3>We have created a platform for you to find your dream team.</h3> <br/>
                    <a href="javascript:void(0)" onclick="openRegisterModal();" class="btn btn-outline btn-xl js-scroll-trigger">search team</a>
                </div>
            </div>
            <div class="col-lg-5 my-auto">
                <div class="device-container">
                    <div class="device-mockup iphone6_plus portrait white">
                        <div class="device">
                            <div class="screen">
                                <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                <img src="img/iphone.png" class="img-fluid" alt="">
                            </div>
                            <div class="button">
                                <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<main id="content" class="main-content">
    <section class="section group section-feature">
        <h2 class="visuallyhidden">Design meets technology</h2>
        <article>
            <div class="inner">
                <h2>
            <span style="overflow: visible;">
              <span data-animation-delay="300" data-animation-type="slideUp" class="animated slideUp" data-triggered="true">
                Share
              </span>
            </span>
                    <br>
                    <span style="overflow: visible;">
              <span data-animation-delay="500" data-animation-type="slideUp" class="animated slideUp" data-triggered="true"><strong>experience</strong></span>
            </span><br>
                </h2>
                <p data-animation-delay="400" data-animation-type="fadeIn" class="animated fadeIn" data-triggered="true">Join the community of experts willing to share their experiences.</p>
            </div>
        </article>
        <aside>
            <picture>
                <img class="align-center parallax lazyloaded" src="img/imagethree.jpg" data-src="img/design-meets-technology-4K.jpg" alt="Design meets technology" style="margin-top: 26.1818px;">
            </picture>
        </aside>
    </section>



    <section class="section group section-feature">
        <h2 class="visuallyhidden">More than an electric bike</h2>
        <aside>
            <picture>
                <img class="align-center parallax lazyloaded" src="img/imagetwo.jpg" data-src="img/more-than-an-electric-bike.jpg" style="margin-top: 4.63636px;">
            </picture>
        </aside>
        <article>
            <div class="inner">
                <h2>
        <span style="overflow: visible;">
          <span class="animated slideUp" data-animation-delay="300" data-animation-type="slideUp" data-triggered="true">Find</span>
        </span>
                    <span style="overflow: visible;"><span class="animated slideUp" data-animation-delay="700" data-animation-type="slideUp" data-triggered="true"><strong>confederate</strong></span></span></h2>
                <p class="animated fadeIn" data-animation-delay="400" data-animation-type="fadeIn" data-triggered="true">Briefly tell about yourself and our algorithm will select the people you need.</p>
            </div>
        </article>
    </section>

    <section class="section group section-feature">
        <h2 class="visuallyhidden">You'll never ride alone</h2>
        <article>
            <div class="inner">
                <h2>
          <span style="overflow: visible;">
            <span class="animated slideUp" data-animation-delay="300" data-animation-type="slideUp" data-triggered="true">Create</span>
          </span>


                    <span style="overflow: visible;">
          <span class="animated slideUp" data-animation-delay="700" data-animation-type="slideUp" data-triggered="true">
            <strong>startups</strong>
          </span>
        </span>
                </h2>
                <p class="animated fadeIn" data-animation-delay="400" data-animation-type="fadeIn" data-triggered="true">Put your ideas to life with the help of your chosen team.</p>
            </div>
        </article>
        <aside>
            <picture>
                <img class="align-center parallax lazyloaded" src="img/imageone1.jpg" data-src="img/more-than-an-electric-bike.jpg" style="margin-top: 4.63636px;" >
            </picture>

        </aside>
    </section>
</main>

<header class="masthead">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-7 my-auto">
                <div class="header-content mx-auto">
                    <h1 class="mb-5">Find any people,
                        </br>any level,
                        </br>from anywhere!</h1>
                    <h3>Its dangerous to go alone</h3> <br/>
                    <a href="javascript:void(0)" onclick="openRegisterModal();" class="btn btn-outline btn-xl js-scroll-trigger">search team</a>
                </div>
            </div>
            <div class="col-lg-5 my-auto">
                <div class="device-container">
                    <div class="device-mockup iphone6_plus portrait white">
                        <div class="device">
                            <div class="screen">
                                <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                <img src="img/iphone.png" class="jpg-fluid" alt="">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="modal fade login" id="loginModal">
        <div class="modal-dialog login animated">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="box">
                        <div class="modal-header">
                            <h3>Registration</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="content">

                            <div class="form loginBox">
                                <form method="post" action="/login" accept-charset="UTF-8">
                                    @csrf
                                    <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                    <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                    <input class="btn" type="button" value="Login" onclick="loginAjax()">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="content registerBox" style="display:none;">
                            <div class="form">
                                <form method="post" html="{:multipart=>true}" data-remote="true" action="/register" >
                                    @csrf
                                    <input id="name" class="form-control" type="text" placeholder="Name" name="name">
                                    <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                    <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                    <input id="password_confirmation" class="form-control" type="password" placeholder="Repeat Password" name="password_confirmation">
                                    <input class="btn inline" style="display: inline" type="submit" value="Create account" name="commit">
                                    <h4 class="inline">or</h4>
                                    <a class="btn inline" href="javascript: showLoginForm();">Login</a>
                                </br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/new-age.min.js"></script>

</body>

</html>

