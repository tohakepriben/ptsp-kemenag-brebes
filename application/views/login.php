<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Login PTSP Kemenag Brebes">
    <meta name="author" content="TohaKepriben">
    <link href="<?=base_url('assets/favicon.png')?>" rel="icon" type="image/png" />	

    <title>PTSP Kemenag Brebes - Login</title>

    <link href="<?=base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/vendor/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" >
    <link href="<?=base_url('assets/css/sb-admin.css" rel="stylesheet')?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap"> 

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div style="text-align: center" class="card-header">
    	<figure style="text-align: center">
    		<span>
                <img src="<?=base_url('assets/logo.png')?>" style="margin-right:10px; width:150px; height:auto;" >
            </span>

			<figcaption >
				<p class="text-primary">Pelayanan Terpadu Satu Pintu<br />
				Kankemenag Kab. Brebes</p><hr />
				<p style="font-family: 'Ubuntu', sans-serif;">Login Aplikasi</p>
				
			</figcaption>
			
		</figure>

        
        </div>
        <div class="card-body">
          <form method="post">
          	<input type="hidden" name="secret" value="1"/>
            <div class="form-group">
              <div class="form-label-group">
                <input name="username" id="inputEmail" class="form-control" placeholder="Username" required="" autofocus="">
                <label for="inputEmail">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <p class="text-danger"><?=$this->session->flashdata('login_error')?></p>
            <button type="submit" class="btn btn-primary btn-block" >
            <i class="fa fa-fw fa-sign-in"></i> Login
            </button>
          </form>
        </div>
        
        <footer style="height: 50px">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <small>Copyright © Kemenag Brebes <?=date('Y')?></small>
            </div>
          </div>
        </footer>

        
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
    <script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

  </body>

</html>
