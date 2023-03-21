<?php
    if(isset($_POST['cadastrar'])){
    
    include_once('conexao.php');
    
        $cargo = $_POST['cargo'];
        $salcarg = $_POST['salcarg'];
        $carghor = $_POST['carghor'];

        $insert = "INSERT INTO tb_cargo (cd_cargo,nm_cargo,vl_salario,nu_cargaHor)values('','$cargo','$salcarg','$carghor')";
   
        mysqli_query($conn,$insert);

    mysqli_close($conn);

    }


    if(isset($_POST['search'])){

        include_once('conexao.php');

        $cod = $_POST['codcarg'];
        
        $select = "SELECT * FROM tb_cargo WHERE cd_cargo = $cod;";
        

        
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

    if(isset($_POST['alterar'])){

        include_once('conexao.php');

        $cod = $_POST['codcarg'];
        $cargo = $_POST['cargo'];
        $salcarg = $_POST['salcarg'];
        $carghor = $_POST['carghor'];

        $update = "UPDATE tb_cargo set nm_cargo = '$cargo', vl_salario = '$salcarg', nu_cargaHor = '$carghor' WHERE cd_cargo = $cod ";
   
        $result = mysqli_query($conn,$update) or die("erro update");

        mysqli_close($conn);
    }

    if(isset($_POST['delete'])){

        include_once('conexao.php');

        $cod = $_POST['codcarg'];
  

        $delete = "DELETE from tb_cargo where cd_cargo = '$cod'";
        $result = mysqli_query($conn,$delete) or die("erro delete");
        
        mysqli_close($conn);
    }








?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <button><a href="/Pizzaria/CadCarg.html">Voltar</a></button>
    
</body>
</html>