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
              	<h1 style="margin-top: 5px ;"><i class="icon ion-android-attach" style="font-family: 'Yanone Kaffeesatz', sans-serif;font-weight: 400;"><a href="#!">Post it</a> </i>
                </h1>
              </div>
              <div class="col s7">
                <h1 style="margin-top: 5px ;" class="right-align"><i class="icon ion-android-hand" style="font-family: 'Yanone Kaffeesatz', sans-serif;font-weight: 400;"><a href="#"> AGUARDE...</a> </i></h1>
              </div>
            </div>
          </div>
        </nav>


        <div class="container">

        	<div style="margin-top: 170px;margin-left: 50%;">
  				<h5>AGUARDE...</h5>

		        <div class="preloader-wrapper big active">
			      <div class="spinner-layer spinner-blue">
			        <div class="circle-clipper left">
			          <div class="circle"></div>
			        </div><div class="gap-patch">
			          <div class="circle"></div>
			        </div><div class="circle-clipper right">
			          <div class="circle"></div>
			        </div>
			      </div>

			      <div class="spinner-layer spinner-red">
			        <div class="circle-clipper left">
			          <div class="circle"></div>
			        </div><div class="gap-patch">
			          <div class="circle"></div>
			        </div><div class="circle-clipper right">
			          <div class="circle"></div>
			        </div>
			      </div>

			      <div class="spinner-layer spinner-yellow">
			        <div class="circle-clipper left">
			          <div class="circle"></div>
			        </div><div class="gap-patch">
			          <div class="circle"></div>
			        </div><div class="circle-clipper right">
			          <div class="circle"></div>
			        </div>
			      </div>

			      <div class="spinner-layer spinner-green">
			        <div class="circle-clipper left">
			          <div class="circle"></div>
			        </div><div class="gap-patch">
			          <div class="circle"></div>
			        </div><div class="circle-clipper right">
			          <div class="circle"></div>
			        </div>
			      </div>
			    </div>

			</div>

            <?php 
            	include 'Principal.class.php';
				include 'Login.class.php';
				
			if(isset($_POST["operacao"])){

				$operacao = $_POST["operacao"];

				if($operacao == "cadastro"){
					$nome = $_POST["nome"];
					$senha = $_POST["senha"];
					$email = $_POST["email"];

					$obj = new Cadastro;

					$obj->nome = $nome;
					$obj->senha = $senha;
					$obj->email = $email;

					$obj->cadastrar();

					
				setcookie("msgCadastro","mensagem",time()+5);
				echo "<meta http-equiv='refresh'content='3;url=index.php'>";
				}else if($operacao == "login"){
					$nome = $_POST["nome"];
					$senha = $_POST["senha"];

					$obj = new Cadastro;

					$obj->nome = $nome;
					$obj->senha = $senha;

					$user = $obj->Logar();
					
					if($user){
						$aux = 0;
						while($linha=mysqli_fetch_assoc($user)){
							$aux = 1;
							if($linha['nome'] == $nome and $linha['senha'] == $senha){
									//criar session
									session_start();

									$_SESSION['nome'] = $nome;
									$_SESSION['idUser'] = $linha['idUser'];
									setcookie("msgOla","mensagem",time()+5);
									echo "<meta http-equiv='refresh' content='1;url=principal.php'>";
								
							}
						}
						if($aux == 0){
							setcookie("msgErroLogin","mensagem",time()+5);
							echo "<meta http-equiv='refresh' content='1;url=index.php'>";
						}
					}
					
				}else if($operacao == "logout"){

					session_start();
					session_destroy();
					setcookie("msgLogout","mensagem",time()+5);
					echo "<meta http-equiv='refresh' content='1;url=index.php'>";

				}else if($operacao == "inserirPostit"){
					session_start();

					$nome = $_SESSION['nome'];
					$titulo = $_POST["titulo"];
					$data = $_POST["data"];
					$descricao = $_POST["descricao"];

					$obj = new Principal;

					$obj->nome = $nome;
					$obj->titulo = $titulo;
					$obj->data = $data;
					$obj->descricao = $descricao;

					$obj->criar();
					setcookie("msgInserido","mensagem",time()+5);
					echo "<meta http-equiv='refresh'content='2;url=principal.php'>";

				}else if($operacao == "deletarPostit"){
					session_start();

					$nome = $_SESSION['nome'];
					$id= $_POST["idPostit"];

					$obj = new Principal;

					$obj->nome = $nome;
					$obj->id = $id;

					$obj->deletar();
					
					setcookie("msgDeletado","mensagem",time()+5);
					echo "<meta http-equiv='refresh'content='1;url=principal.php'>";

				}else if($operacao == "editarPostit"){
					session_start();
					$nome = $_SESSION['nome'];
					$id = $_POST["idPostit"];
					
					$obj = new Principal;

					$obj->nome = $nome;
					$obj->id = $id;

					$post = $obj->buscar();
					if($post){
						while($linha=mysqli_fetch_assoc($post)){

								if($linha['nome'] == $nome and $linha['idPostit'] == $id){
									
									$idc =  $linha['idPostit'];
									$titulo =  $linha['titulo'];
									$data =  $linha['data'];
									$descricao =  $linha['descricao'];

									setcookie("idPostitC",$idc,time()+3);
									setcookie("tituloC",$titulo,time()+3);
									setcookie("dataC",$data,time()+3);
									setcookie("descricaoC",$descricao,time()+3);

									echo "<meta http-equiv='refresh' content='0;url=principal.php'>";

								}
								
							}
						}
						
					}else if($operacao == "alterarPostit"){
						session_start();
						$nome = $_SESSION['nome'];
						$id = $_POST["idPostitalterar"];
						$titulo = $_POST["tituloalterar"];
						$data = $_POST["dataalterar"];
						$descricao = $_POST["descricaoalterar"];

						$obj = new Principal;

						$obj->id = $id;
						$obj->nome = $nome;
						$obj->titulo = $titulo;
						$obj->data = $data;
						$obj->descricao = $descricao;

						$obj->alterar();
						setcookie("msgAlterado","mensagem",time()+5);
						echo "<meta http-equiv='refresh'content='1;url=principal.php'>";

					}
				

			}else{
				echo "<meta http-equiv='refresh' content='0;url=index.php?pag=inicial'>";
			}

			?>
        </div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/extra.js"></script>
    </body>
  </html>