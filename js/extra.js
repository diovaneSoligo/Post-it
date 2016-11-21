$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });

$(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
  });

function msgCad(){
	Materialize.toast('Cadastro Realizado com Sucesso! Agora basta acessar sua conta.', 5000, 'rounded');
};
function msgErrLogin(){
	Materialize.toast('Usuario ou senha Inválidos!', 3000, 'rounded');
};
function msgBye(){
	Materialize.toast('Obrigado! Aguardamos seu retorno :) ', 3000, 'rounded');
};
function msgLogin(){
	Materialize.toast('OPS! É necessário realizar o login!', 3000, 'rounded');
};

function postitInserido(){
	Materialize.toast('Post it Inserido!', 3000, 'rounded');
};
function postitAlterado(){
	Materialize.toast('Post it Alterado!', 3000, 'rounded');
};
function postitDeletado(){
	Materialize.toast('Post it Deletado!', 3000, 'rounded');
};
function postitOla(nome){
	Materialize.toast('Olá ' + nome, 3000, 'rounded');
};
