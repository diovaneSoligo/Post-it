<?php session_start(); ?>
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

        <?php //se tiver uma sessão  se ok
          if(isset($_SESSION['nome']) and isset($_SESSION['idUser'])){
        ?>

        <nav style="background-color:#3677C0;" class="z-depth-4">
          <div class="container">
            <div class="row">
              <div class="col s3">
                 <img class="responsive-img" src="img/logo2.png" style="padding-top: 3px;width: 115px;">
              </div>
              <div class="col s2">
                <h1 style="margin-top: 5px ;"><i class="icon ion-android-attach" style="font-family: 'Yanone Kaffeesatz', sans-serif;font-weight: 400;"><a href="#!">Post it</a> </i>
                </h1>
              </div>
              <div class="col s5">
              <h5><img src="img/user.png" alt="" class="circle" style="width: 40px;margin-top: -5px;font-family: 'Yanone Kaffeesatz', sans-serif;font-weight: 300;"> Usuário: <b><?php echo $_SESSION['nome']; ?></b> 
              </h5>
              </div>
              
              <div class="col s2">
                <form method="post" action="controler.php">
                  <input type="hidden" name="operacao" value="logout"/>
                  <button class="btn waves-effect waves-orange " type="submit" name="action" style="margin-left: 40%;">SAIR</button>
                </form>
              </div>
            </div>
          </div>
        </nav>


        <div class="container" style="padding-top: 90px;">
          <div class="row">
            <!-- INSERIR LEMBRETES -->


            <div class="col s5" style="background-color: white;border-radius: 10px;">
              <?php 
                   if(isset($_COOKIE['idPostitC'])){
              ?>
                <h5 class="center-align"><b style="color: red;"><i class="icon ion-android-send"></i> Alterar Post it</b></h5>

              <form method="post" action="controler.php">
                <input type="hidden" name="operacao" value="alterarPostit"/>
                <input type="hidden" name="idPostitalterar" value="<?php echo $_COOKIE['idPostitC']; ?>"/>

                <div class="input-field col s12">
                  <i class="material-icons prefix">mode_edit</i>
                  <input id="icon_prefix" type="text" class="validate" name="tituloalterar" value="<?php echo $_COOKIE['tituloC']; ?>" required>
                  <label for="icon_prefix">Título</label>
                </div>

                <div class="input-field col s12">
                  <i class="material-icons prefix">today</i>
                  <input id="data" type="text" class="datepicker" name="dataalterar" value="<?php echo $_COOKIE['dataC']; ?>" required>
                  <label for="data">Data</label>
                </div>

                <div class="input-field col s12">
                  <i class="material-icons prefix">mode_edit</i>
                  <input id="icon_prefix" type="text" class="validate" name="descricaoalterar" value="<?php echo $_COOKIE['descricaoC']; ?>" required>
                  <label for="icon_prefix">Descrição</label>
                </div>
      
                <button class="btn waves-effect waves-orange " type="submit" name="action" style="padding-left: 5%;background-color: #4caf50;">Salvar Alteração
                    <i class="material-icons right">done</i>
                </button>
                <br><br>
                <a href="principal.php" class="btn waves-effect waves-orange " name="action" style="padding-left: 5%;background-color: #f44336;">Cancelar<i class="material-icons right">cancel</i>
                </a>

              </form>
              <?php 
                }else{
              ?>
              <h5 class="center-align">Criar Post it</h5>

              <form method="post" action="controler.php">
                <input type="hidden" name="operacao" value="inserirPostit"/>

                <div class="input-field col s12">
                  <i class="material-icons prefix">mode_edit</i>
                  <input id="icon_prefix" type="text" class="validate" name="titulo" required>
                  <label for="icon_prefix">Título</label>
                </div>

                <div class="input-field col s12">
                  <i class="material-icons prefix">today</i>
                  <input id="data" type="text" class="datepicker" name="data" required>
                  <label for="data">Data</label>
                </div>

                <div class="input-field col s12">
                  <i class="material-icons prefix">mode_edit</i>
                  <input id="icon_prefix" type="text" class="validate" name="descricao" required>
                  <label for="icon_prefix">Descrição</label>
                </div>
      
                <button class="btn waves-effect waves-orange " type="submit" name="action" style="padding-left: 40%;">CRIAR
                    <i class="material-icons right">thumb_up</i>
                </button>

              </form>

              <?php } ?>

                <br><br>
            </div>

            <!-- LISTA DE LEMBRETES -->
            <div class="col s7" style="margin-top: -70px;">

              <ul class="collection">


              <?php
                include 'Principal.class.php';

                $obj = new Principal;
                $obj->nome = $_SESSION['nome'];

                $res = $obj->mostrar();

                if($res){
                  $aux = 0;
                  while ($linha=mysqli_fetch_assoc($res)) {
                    $aux = 1;
                    $id = $linha['idPostit'];
                    $titulo = $linha['titulo'];
                    $data = $linha['data'];
                    $descricao = $linha['descricao'];
                    ?>
                        <li class="collection-item avatar" style="margin-bottom: 3px;">
                          <i class="material-icons circle green">loyalty</i>
                          <span class="title"><b style="font-size: 15pt;"><?php echo $titulo; ?></b></span>
                          <p><span style="color: #3677c0;font-style: italic;"><?php echo $data; ?></span><br>
                             <span><?php echo $descricao; ?></span>
                          </p>

                         <div class="fixed-action-btn horizontal" style="position: absolute; display: inline-block; right: 24px;">
                                <a class="btn-floating btn-large red">
                                  <i class="large material-icons">settings</i>
                                </a>
                                <ul>

                                <form method="post" action="controler.php">
                                    <input type="hidden" name="idPostit" value="<?php echo $id ?>"/>
                                      <li><button class="btn tooltipped btn-floating red " data-position="top" data-delay="50" data-tooltip="Deletar" style="transform: scaleY(0.4) scaleX(0.4) translateY(0px) translateX(40px); opacity: 0;" type="submit" name="operacao" value="deletarPostit"><i class="material-icons">delete</i></button>
                                      </li>

                                      <li><button class="btn tooltipped btn-floating green" data-position="top" data-delay="50" data-tooltip="Editar"  style="transform: scaleY(0.4) scaleX(0.4) translateY(0px) translateX(40px); opacity: 0;" name="operacao" value="editarPostit"><i class="material-icons">mode_edit</i></button>
                                      </li>
                                </form>

                                </ul>
                              </div>
                        </li>
                    <?php
                  }
                  if($aux == 0){
                    echo "<h5 class='center-align'>Você não possui nenhum post it!</h5>";
                    }
                }

              ?>

            </ul>
            </div>
          </div>
        </div>


        <?php
          if(isset($_COOKIE['msgAlterado'])){
            echo "<script>window.onload = function() {postitAlterado();};</script>";
          }
          if(isset($_COOKIE['msgDeletado'])){
            echo "<script>window.onload = function() {postitDeletado();};</script>";
          }
          if(isset($_COOKIE['msgInserido'])){
            echo "<script>window.onload = function() {postitInserido();};</script>";
          }
          if(isset($_COOKIE['msgOla'])){ ?>
            <script>window.onload = function() {postitOla("<?php echo $_SESSION['nome']; ?>");};</script>
            <?php
          }
          }else{
            //não tem sessão desvia para a pagina inicial informando que é necessário realizar o login
            setcookie("msgFazerLogin","mensagem",time()+5);
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
          }
        ?>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/extra.js"></script>
    </body>
  </html>