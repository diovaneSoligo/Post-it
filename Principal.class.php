<?php
		include 'ConexaoBD.class.php';
		class Principal{
			public $id;
			public $nome;
			public $titulo;
			public $data;
			public $descricao;

			function criar(){
				$bd = new ConexaoBD;
				$sql = "INSERT INTO postit (nome,titulo,data,descricao) VALUES ('$this->nome','$this->titulo','$this->data','$this->descricao')";
				$bd->conectar();
				$bd->query($sql);
				$bd->fechar();
			}

			function mostrar(){
				$bd = new ConexaoBD;
				$bd->conectar();
				return $bd->query("SELECT * FROM postit where nome = '$this->nome';");
				$bd->fechar();
			}

			function deletar(){
				$bd = new ConexaoBD;
				$sql = "DELETE FROM postit WHERE idPostit = $this->id and nome = '$this->nome';";
				$bd->conectar();
				$bd->query($sql);
				$bd->fechar();
			}

			function alterar(){
				$bd = new ConexaoBD;
				$sql ="UPDATE  postit set titulo = '$this->titulo' , data = '$this->data' , descricao = '$this->descricao' where idPostit = $this->id and nome = '$this->nome'";
				$bd->conectar();
				$bd->query($sql);
				$bd->fechar();
			}

			function buscar(){
				$bd = new ConexaoBD;
				$bd->conectar();
				return $bd->query("SELECT * FROM postit where idPostit = $this->id;");
				$bd->fechar();
			}

		}
?>