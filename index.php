<!DOCTYPE html>
  <html>
    <head>
      <meta charset="UTF-8">
      <link rel="shortcut icon" href="img/logo2.png" />

      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <link type="text/css" rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"  media="screen,projection"/>

      <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:300,400' rel='stylesheet' type='text/css'>

      <!--Let browser know website is optimized for mobile-->

      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

    </head>

    <body style="background-color: #f2f2f2">

        <nav style="background-color:#3677C0;" class="z-depth-4">
          <div class="container">
            <div class="row">
              <div class="col s3">
                 <img class="responsive-img" src="img/logo2.png" style="padding-top: 3px;width: 115px;">
              </div>
              <div class="col s2">
              </div>
              <div class="col s7">
                <h1 style="margin-top: 5px ;" class="right-align"><i class="icon ion-android-attach" style="font-family: 'Yanone Kaffeesatz', sans-serif;font-weight: 400;"><a href="index.php?pag=inicial">Post it</a> </i></h1>
              </div>
            </div>
          </div>
        </nav>


        <div class="container">
            <div class="row" style="margin-top: 130px;">
              <div class="col s5">
                <h5 style="font-family: 'Yanone Kaffeesatz', sans-serif;font-weight: 300;margin-top: -15px;">Muitos trabalhos, provas e você não está conseguindo se organizar?</h5>
                <h4 style="font-family: 'Yanone Kaffeesatz', sans-serif;font-weight: 300; " class="center-align">O <b>POST IT</b> vai te ajudar <i class="icon ion-android-happy"></i></h4>
              </div>

              <div class="col s2"></div>

              <div class="col s5" style="background-color: #fff;border-radius: 8px;margin-top: -80px;">
               <div class="row">

                    <h5 class="center-align">Entre em sua conta</h5>
                    
                    <form method="post" action="controler.php">
                      <input type="hidden" name="operacao" value="login"/>

                        <div class="input-field col s12">
                          <i class="material-icons prefix">account_circle</i>
                          <input id="icon_prefix" type="text" class="validate" name="nome" required>
                          <label for="icon_prefix">Nome de usuário</label>
                        </div>

                         <div class="input-field col s12">
                         <i class="material-icons prefix">vpn_key</i>
                          <input id="password" type="password" class="validate" name="senha" required>
                          <label for="password">Senha</label>
                        </div>


                        <button class="btn waves-effect waves-orange " type="submit" name="action" style="padding-left: 40%;">ENTRAR
                          <i class="material-icons right">input</i>
                        </button>

                    </form>

                    <br><br><hr>
                    <div>
                      <p class="center-align">Ainda não possui uma conta? <a href="cadastro.php"> <i class="icon ion-clipboard"></i> CADASTRE-SE</a></p>
                    </div>
        

                </div>
              </div>

            </div>
        </div>

        <?php
        //mensagens TOAST
        if(isset($_COOKIE['msgCadastro'])){
            echo "<script>window.onload = function() {msgCad();};</script>";
          }
        if(isset($_COOKIE['msgErroLogin'])){
            echo "<script>window.onload = function() {msgErrLogin();};</script>";
          }
        if(isset($_COOKIE['msgLogout'])){
            echo "<script>window.onload = function() {msgBye();};</script>";
          }
         if(isset($_COOKIE['msgFazerLogin'])){
            echo "<script>window.onload = function() {msgLogin();};</script>";
          }
        ?>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/extra.js"></script>
    </body>
  </html>