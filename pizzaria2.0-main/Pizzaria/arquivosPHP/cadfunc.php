<head>
   <link rel="stylesheet" href="/arquivoCSS/stylecads.css">
   
</head>

<?php
if(isset($_POST['NeuroticBreakdown'])){include_once('conexao.php');

   $codcarg = $_POST['codcarg'];

   $FoulPlay = "SELECT * FROM tb_cargo where cd_cargo = '$codcarg' or nm_cargo = '$codcarg';";
   $resp = mysqli_query($conn,$FoulPlay);
      if(mysqli_num_rows($resp) != null){
         echo "<table border = '1'>"; echo "<tr><td>CODIGO</td><td>CARGO</td><td>SALARIO</td><td>HORAS</td></tr>"; 
            while($line = mysqli_fetch_assoc($resp)){
               $cod = $line['cd_cargo'];
               $cargo = $line['nm_cargo'];
               $salcarg = $line['vl_salario'];
               $carghor = $line['nu_cargaHor'];
         echo "<tr><td>$cod</td><td>$cargo</td><td>$salcarg</td><td>$carghor</td></tr>";
        } 
    echo"</table>";}
   mysqli_close($conn);}
if(isset($_POST['SearchAll'])){include_once('conexao.php');
      
   $select = "SELECT * from tb_cargo;";
   $resp = mysqli_query($conn,$select);      
   if(mysqli_num_rows($resp) != null){
      echo "<table border = '1'>"; echo "<tr><td>CODIGO</td><td>CARGO</td><td>SALARIO</td><td>HORAS</td></tr>"; 
         while($line = mysqli_fetch_assoc($resp)){
            $cod = $line['cd_cargo'];
            $cargo = $line['nm_cargo'];
            $salcarg = $line['vl_salario'];
            $carghor = $line['nu_cargaHor'];
      echo "<tr><td>$cod</td><td>$cargo</td><td>$salcarg</td><td>$carghor</td></tr>";
     } 
 echo"</table>";}
      
      
   mysqli_close($conn);}

?>
      <hr><input type="text" name="codfunc" placeholder="Codigo do Funcionario"> 
      <input type="submit" name="sfunc" value="Buscar Funcionario" id="btn">
<?php 
if(isset($_POST['sfunc'])){include_once('conexao.php');
   $codfunc = $_POST['codfunc'];

   $select = "SELECT * from tb_funcionario where cd_funcionario = '$codfunc';"; 
   $resp = mysqli_query($conn,$select);

   

   mysqli_close($conn);}
?> 
      
     

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

    $insert = "INSERT INTO tb_funcionario(cd_funcionario,nm_funcionario,nu_cpf,ds_endereco,nu_telefone,dt_inicio,dt_termino,cd_cargo)  values('','$nomfunc','$cpf','$endereco','$telefone','$dtini','$dtfim','$codcarg')";

      
 $X = mysqli_query($conn,$insert)or die("Que isso maluco! ta doido????");
 mysqli_close($conn);}  


if(isset($_POST['btoApagar'])){include_once('conexao.php');
      $codfunc = $_POST['codfunc'];

      $n = "DELETE FROM tb_funcionario where cd_funcionario = '$codfunc';";
      $result = mysqli_query($conn,$n);
      
mysqli_close($conn);
}

?>
