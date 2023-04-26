<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="arquivoCSS/stylecads.css">
    <title>Cadastro De Funcionário</title>
</head>
<body>
 <div class="container">
  <div class="formimage">
     <img src="imagens/img3.jpeg" >
      </div>
       <div class="formpage">
        <div class="formheader">
         <div class="title">
          <h1 >PIZZARIA HOT CHILLI PEPPER </h1>
      </div>
     </div>
     <!-- inicio formulario -->
   <div class="formfunc">          
    
 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
     <h2> Cadastro De Funcionário</h2>   
<br>
      <input type="text" name="codfunc" placeholder="Codigo do Funcionario"> &nbsp;
      <input type="submit" name="sfunc" value="Buscar Funcionario" id="btn"> <br><br>
      <?php 
if(isset($_POST['sfunc'])){include_once('conexao.php');
   $codfunc = $_POST['codfunc'];

   $select = "SELECT * from tb_funcionario where cd_funcionario = '$codfunc' or nm_funcionario = '$codfunc';"; 
   $resp = mysqli_query($conn,$select);

   if(mysqli_num_rows($resp) != null){
   echo "<table border = '1'>";
    echo "<tr><td>cd_funcionario</td><td>nm_funcionario</td><td>nu_cpf</td><td>nu_telefone</td><td>ds_endereco</td><td>dt_inicio</td><td>dt_termino</td><td>cd_cargo</td></tr>"; 
            while($line = mysqli_fetch_assoc($resp)){
               $cod = $line['cd_funcionario'];
               $nmfunc = $line['nm_funcionario'];
               $cpf = $line['nu_cpf'];
               $tel = $line['nu_telefone'];
               $end = $line['ds_endereco'];
               $dtini = $line['dt_inicio'];
               $dtfim = $line['dt_termino'];
               $cdcargo = $line['cd_cargo'];
         echo "<tr><td>$cod</td><td>$nmfunc</td><td>$cpf</td><td>$tel</td><td>$end</td><td>$dtini</td><td>$dtfim</td><td>$cdcargo</td></tr>";
        } 
    echo"</table><br>";

   

   mysqli_close($conn);}
      }
?> 
      
     
        &nbsp;Codigo:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtNome">
        &nbsp;&nbsp;&nbsp;Cargo: &nbsp;&nbsp;<select name="cargo">
        <option value="0" selected="selected"> Selecione o cargo </option>
        <option value="1">Funcionario</option>
        <option value="2">Gerente</option>
        </select> <p><br>
        
        &nbsp;Nome:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;<input type="text" name="txtNome" size="54"><p><br>
        
        &nbsp;CPF:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtCpf" size="20">
        
        &nbsp;Telefone:&nbsp;&nbsp;<input type="text" name="txtFone" size="18"><p><br>
        
        &nbsp;Endereço: <input type="text" name="txtEnd" size="54"><p><br>
       
        
        &nbsp;Data Inicio:&nbsp;&nbsp;<input type="text" name="txtDtI" size="15"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        Data Final:&nbsp;<input type="text" name="txtDtF" size="15"><p><br><br>
        
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="   Salvar   " name="bt_salvar">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="   Apagar   "  name="bt_apagar">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="   Editar   " name="bt_editar">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="   Voltar   " name="bt_voltar">
        
</p></p></p></p></p>

        </form>
   </div>
  </div>
 </body>
</html>
<head>
   <link rel="stylesheet" href="/arquivoCSS/stylecads.css">
   
</head>





<?php
if(isset($_POST['NeuroticBreakdown'])){include_once('conexao.php');

   $codcarg = $_POST['codcarg'];

   $FoulPlay = "SELECT * FROM tb_cargo where cd_cargo = '$codcarg' or nm_cargo = '$codcarg';";
   $resp = mysqli_query($conn,$FoulPlay);
      if(mysqli_num_rows($resp) != ''){
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


