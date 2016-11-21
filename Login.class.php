<?php
		

		class Cadastro{
			public $id;
			public $nome;
			public $senha;
			public $email;

			function cadastrar(){
				$bd = new ConexaoBD;
				$sql = "INSERT INTO usuario (nome,senha,email) VALUES ('$this->nome','$this->senha','$this->email')";
				$bd->conectar();
				$bd->query($sql);
				$bd->fechar();
			}

			function logar(){
				$bd = new ConexaoBD;
				$bd->conectar();
				return $bd->query("SELECT * FROM usuario WHERE nome='$this->nome' and senha='$this->senha';");
				$bd->fechar();
			}

		}
?>