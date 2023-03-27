<html>
  <head>
     <title>   </title>   
  </head>

<body>

   <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
      <fieldset>
      <legend>CADASTRO FUNCIONARIO</legend><br>
              
      <input type="search" name="codfunc" placeholder="Codigo do Funcionario" >
      <input type="text" name="codcarg" placeholder="Cargo""><br>
      <input type="text" name="nomfunc" size="54" placeholder="Nome do Funcionario" required><br>  
      <input type="text" name="cpf" size="20" placeholder="CPF" required> <br>
      <input type="text" name="telephone" size="18" placeholder="Telephone" required> <br>
      <input type="text" name="endereco" size="54" placeholder="Endereco" required><br>
      <input type="text" name="email" size="54" placeholder="E-mail" required>  <br>
      <input type="date" name="dtini" size="15" required> <br>
      <input type="date" name="dtfim" size="15"><br>
      <input type="submit" name="salvar" value="Salvar">
      <input type="reset" value="Apagar" name="btoApagar"> 
   </fieldset>
   </form>




   
   </body>
</html>   

<?php

if(isset($_POST['salvar'])){include_once('conexao.php');

    $codfunc = $_POST['codfunc'];
    $codcarg = $_POST['codcarg'];
    $nomfunc = $_POST['nomfunc'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telephone'];
    $endereco = $_POST['endereco'];
    $dtini = $_POST['dtini'];
    $dtfim = $_POST['dtfim'];

    $insert = "INSERT INTO tb_funcionario(cd_funcionario,nm_funcionario,nu_cpf,ds_endereco,nu_telefone,dt_inicio,dt_termino) values('','$nomfunc','$cpf','$endereco','$telefone','$dtini','$dtfim')";

 $X = mysqli_query($conn,$insert);
 mysqli_close($conn);}  



?>