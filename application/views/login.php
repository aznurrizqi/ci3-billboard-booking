<!DOCTYPE html>
<html lang="en">
  <head>
    <mta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Admin</title>

    <!-- Bootstrap -->
    <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assetsvendors//font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="assets/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">



  <?php
    if($this->session->flashdata('sukses')) {
      echo '<p class="warning" style="margin: 10px 20px;">'.$this->session->flashdata('sukses').'</p>';
    }
    echo validation_errors('<p class="warning" style="margin: 10px 20px;">','</p>');
  ?>

            <form class="form-signin" action="<?php echo base_url('login') ?>" method="post">
              <h1>Login Admin</h1>
              <div>
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus />
              </div>
              <div>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required />
              </div>
              <div class="checkbox">
                <label>
                <input type="checkbox" value="remember-me"> Remember me
                </label>
              </div>
              <div>
                <button class="btn btn-default submit" type="submit">Log in</button>
              </div>
              <div class="clearfix"></div>
              <div class="separator">
                <div class="clearfix"></div>
                <br />
                <div>
                  <p>©2016 All Rights Reserved.</p>
                </div>
              </div>
            </form>

    </section>
        </div>

      </div>
    </div>
  </body>
</html>