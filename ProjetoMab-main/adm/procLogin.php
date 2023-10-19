<?php 
session_start();
//incluir as script do servidor
include('../servidor.php');

/*
pegar os dados de acesso e verificar os no banco para saber
se o usuario exite

*/

$login = $_POST['login'];
$senha = md5($_POST['senha']);

// fazer uma consulta ao banco

$sql = " SELECT * FROM `tb_usuario` WHERE login_us = '$login' and ";
$sql .=" senha_us = '$senha' " ;

 // echo $sql;

 // mandar o php executar no mysql

  $resp = mysqli_query($cx, $sql);

   if (mysqli_num_rows($resp) == 1){

       // pegar o resultado do registro do usuario
       $campo = mysqli_fetch_assoc($resp);
       // pegar informações separadas do usuario
       // echo $campo['nome_us'];
       // echo $campo['cod_us'];
       // echo $campo['senha_us'];
       // pegar o id do usuario para ficar na memoria do navegador
        $_SESSION['usuario']['id'] = $campo['cod_us'];
       // direcionar para a pagina menu
       header ('location:menu.php');

   }else{

       // caso o usuario não existe retorna para a tela de login

       header('location:index.php');
   }
?>