<?php
include_once('conexao.php');
    $codfunc = $_POST['codfunc'];
    $codcarg = $_POST['codcarg'];
    $nomfunc = $_POST['nomfunc'];
    $cpf = $_POST['cpf'];
    $telephone = $_POST['telephone'];
    $endereco = $_POST['endereco'];
    $dtini = $_POST['dtini'];
    $dtfim = $_POST['dtfim'];





    $insert = "INSERT INTO tb_funcionario(cd_funcionario,nm_funcionario,nu_cpf,ds_endereco,dt_inicio,dt_termino) values('','$nomfunc','$cpf','$endereco','$dtini','$dtfim')";

 $X = mysqli_query($conn,$insert);

    
?>