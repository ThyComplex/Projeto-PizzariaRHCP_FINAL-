<!DOCTYPE html>
<html lang="en">
<head>
    <title>CADASTRO DE CARGO</title>
    
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <fieldset >
           <legend>CADASTRO CARGOS</legend>
           <input type="text" name="cargo" placeholder="Nome Cargo"> <br>
           <input type="text" name="salcarg" placeholder="Salario"> <br>
           <input type="text" name="carghor" placeholder="Carga Horaria"><br> <br>
           <input type="submit" name="cadastrar" value="Cadastrar">
           <input type="submit" name="alterar" value="Alterar">
            <input type="submit" name="delete" value="Deletar"> <br> <br>
            <button><a href="/Pizzaria/home.html">Voltar a Pagina Inicial ?</a></button>
       </fieldset>

       <fieldset><Legend>PESQUISA</Legend><fieldset>
        <input type="text" name="codcarg"  size="10" placeholder="Codigo Cargo" > 
           <input type="submit" name="search" value="Pesquisar">
           <input type="submit" name="searchall" value="Pesquisar Todos"> <br> <br>
       </fieldset>
        <div class="acucar_mascavo">
        <output> </output> 


        </div>
       </fieldset>
       </form>
    



</table>
</body>
</html>
<?php
    //Função cadastrar: 
if(isset($_POST['cadastrar'])){include_once('conexao.php');
        $cargo = $_POST['cargo'];
        $salcarg = $_POST['salcarg'];
        $carghor = $_POST['carghor'];

        if($cargo != '' and $salcarg != '' and $carghor != ''){
        $insert = "INSERT INTO tb_cargo (cd_cargo,nm_cargo,vl_salario,nu_cargaHor)values('','$cargo','$salcarg','$carghor')"; 
        mysqli_query($conn,$insert);
        }
        else {
            echo "Preencha todos os Campos";
        }
        
    mysqli_close($conn);
    }

    //função buscar:
if(isset($_POST['search'])){include_once('conexao.php');
    $cod = $_POST['codcarg'];

    
         if($cod != ''){
            $select="SELECT * FROM tb_cargo WHERE cd_cargo='$cod' or nm_cargo='$cod';";

        $result = mysqli_query($conn,$select) or die ("erro ao fazer a consulta!");
            if(mysqli_num_rows($result) != null){   
                echo "<table border='1' id='border'>";
                echo "<tr><td>CODIGO</td><td>CARGO</td><td>SALARIO</td><td>HORAS</td></tr>";
                    while($line = mysqli_fetch_assoc($result)){
                    $cod = $line['cd_cargo'];
                    $cargo = $line['nm_cargo'];
                    $salcarg = $line['vl_salario'];
                    $carghor = $line['nu_cargaHor'];
                echo "<tr><td>$cod</td><td>$cargo</td><td>$salcarg</td><td>$carghor</td></tr>";
                } 
            echo"</table>";
            mysqli_close($conn);
        }
        else{ echo "Dados nao encontrados";}
    }
        else{ echo "Dados nao foram preenchidos!";}
    }
// Função pesquisar todos os cargos:
if(isset($_POST['searchall'])){ include_once('conexao.php');
    $select = "SELECT * FROM tb_cargo;";
    
    $result = mysqli_query($conn,$select) or die ("erro ao fazer a consulta!");
            if(mysqli_num_rows($result) != null){   
                echo "<table border='1' id='border'>";
                echo "<tr><td>CODIGO</td><td>CARGO</td><td>SALARIO</td><td>HORAS</td></tr>";
                    while($line = mysqli_fetch_assoc($result)){
                    $cod = $line['cd_cargo'];
                    $cargo = $line['nm_cargo'];
                    $salcarg = $line['vl_salario'];
                    $carghor = $line['nu_cargaHor'];
                echo "<tr><td>$cod</td><td>$cargo</td><td>$salcarg</td><td>$carghor</td></tr>";
                } 
            echo"</table>";
            mysqli_close($conn);
        }
        else{ echo "Dados nao encontrados";}

}
     //função alterar:
if(isset($_POST['alterar'])){ include_once('conexao.php');
        $cod = $_POST['codcarg'];
        $cargo = $_POST['cargo'];
        $salcarg = $_POST['salcarg'];
        $carghor = $_POST['carghor'];

        $update = "UPDATE tb_cargo set nm_cargo = '$cargo', vl_salario = '$salcarg', nu_cargaHor = '$carghor' WHERE cd_cargo = $cod ";
   
        $result = mysqli_query($conn,$update) or die("erro update");

        mysqli_close($conn);
    }

    //função deletar: 
if(isset($_POST['delete'])){

        include_once('conexao.php');

        $coddel = $_POST['codcarg'];
  

        $delete = "DELETE from tb_cargo where cd_cargo = '$coddel';";
        $result = mysqli_query($conn,$delete) or die("erro delete");
        
        mysqli_close($conn);
    }








?>
