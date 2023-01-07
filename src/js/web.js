
    
$(document).ready(function(){
$('#btn-dropdown-Log').dropdown();
});
$(document).ready(function() {
    $('select').material_select();
  });
var rediU = document.getElementById("direciona-cadU");
rediU.onclick = RedirecionaPCadastroUsuario;

 
//var rediR = document.getElementById("direciona-cadF");
//rediR.onclick = RedirecionaPCadastroFornecedor;

function FModal(){
	 $('.modal').modal();
}
function FToll(){
  $('.tooltipped').tooltip();  
     }
 
function RedirecionaPCadastroUsuario(){
 window.location.href = "/TrabFinalWeb2/Trab/TCadastroUsuarios.php" ;
}
function RedirecionaPCadastroFornecedor(){
 window.location.href = "/TrabFinalWeb2/Trab/TCadastroFornecedor.php" ;
}

