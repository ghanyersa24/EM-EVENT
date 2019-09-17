<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title>EM-EVENT | Login</title>
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <link href="<?= base_url('assets/css/') ?>layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?= base_url('assets/js/') ?>plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?= base_url('assets/css/') ?>materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?= base_url('assets/css/') ?>style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?= base_url('assets/css/') ?>custom/custom-style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?= base_url('assets/js/') ?>plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
</head>

<body class="cyan">
  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="<?= base_url('assets/') ?>images/logo2.png" alt="" class="circle responsive-img valign profile-image-login">
            <p class="center login-form-text">EM-EVENT Admin Dashboard</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" type="text" name="nim">
            <label for="username" class="center-align">NIM</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password" name="password">
            <label for="password">Password</label>
          </div>
        </div>
        <!-- <div class="row">
          <div class="input-field col s12 m12 l12  login-text">
            <input type="checkbox" id="remember-me" />
            <label for="remember-me">Remember me</label>
          </div>
        </div> -->
        <div class="row">
          <div class="input-field col s12">
            <a href="index.html" class="btn waves-effect waves-light col s12 cyan" onclick="login()">Login</a>
          </div>
        </div>
        <!-- <div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="page-register.html">Register Now!</a></p>
          </div>
          <div class="input-field col s6 m6 l6">
            <p class="margin right-align medium-small"><a href="page-forgot-password.html">Forgot password ?</a></p>
          </div>
        </div> -->

      </form>
    </div>
  </div>

  <script type="text/javascript" src="<?= base_url('assets/js/') ?>materialize.js"></script>
  
  <script>
    function login(){
      event.preventDefault();
      let nim = $('input[name="nim"]').val();
      let password = $('input[name="password"]').val();
      $.ajax({
        url:
        "https://em.ub.ac.id/redirect/login/loginApps/?nim=" +
        nim +
        "&password=" +
        password +
        "",
        type: 'POST',
        dataType:'json',
        success:(r)=>{
          if(r.status==true){
            sessionStorage.setItem("nim",r.nim);
            sessionStorage.setItem("nama",r.nama);
            sessionStorage.setItem("fak",r.fak);
            sessionStorage.setItem("prodi",r.prodi);
            sessionStorage.setItem("jurusan",r.jurusan);
            sessionStorage.setItem("foto",r.foto);
            window.location.replace('<?=base_url('agenda')?>');
          }
        }
      })
    }
  </script>
</body>

</html>
