<!DOCTYPE html>
<html lang="pt-BR" style="margin: 0px;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../style/estilo.css"> -->
   

    <style>*{font-family: monospace;}table {text-align: center;margin: 0 auto;width: 70%;border-collapse: collapse;border-radius:10px;}button[type="submit"]{cursor: pointer;border-radius: 5px;border: none;width: 80px;height: 35px;}button[type="submit"]:hover{background-color: black;color: white;}</style>
    
    <title>Gerador de Relatório</title> 
</head>
<body style="margin:0px ;">
    <div class="div1" style="display: flex;margin: 0% ; align-items: center; justify-content: space-evenly; background-color: #3d4f80 ;" >
       <div><H4 style=" padding:5px;border-style: solid ;border-width: 1px; border-collapse: collapse; border-color: black; background-color:#fff;">GERADOR DE RELATORIO</H4></div> 
        <form action="<?php echo $_SERVER['PHP_SELF']?>"method="post">
        <label for="dataini">De:</label><input type="date" name="dataini" id="dataini" default="0000-00-00">
        <label for="datafim">Ate:</label><input type="date" name="datafim" id="datafim" default="0000-00-00">
        <input type="submit" value="Gerar Relatorio" name="Enviar">
        <button><a href="home.html">Voltar</a></button>
        </form>
    </div>
 

<div id="tb">

<?php
    if(isset($_POST['Enviar'])){include_once('conexao.php');

        if($_POST['dataini']!=""){$dtini = date($_POST['dataini']);}
        else{$dtini = date('1000-01-01');}     
        if($_POST['datafim']){$dtfim = date($_POST['datafim']);}
        else{$dtfim =date('9999-12-12');}
        
       

        $query1 = "SELECT nu_pedido,vl_total,dt_pedido,nm_cliente
        from tb_pedido as TBP
        inner join tb_cliente as TBC on TBP.cd_cliente = TBC.cd_cliente
        where dt_pedido >= '$dtini' and dt_pedido <= '$dtfim'
        order by TBC.cd_cliente;";


        


            $result1 = mysqli_query($conn,$query1);
           


        if (mysqli_num_rows($result1) != 0) {

           
           echo "<BR>";
            
            while($row = $result1->fetch_assoc()) {
                echo "<div style='display: flex; justify-content: center'>";
                echo "<table bordercolor = 'black' bgcolor = 'white' border = '1' id = 'tbrlt' width: '70%' text-align='center'>";
                
                echo "<tr><th bgcolor='A4A4A4'>Codigo_Pedido</th><th bgcolor='A4A4A4'>Valor_Pedido</th><th bgcolor='A4A4A4'>Data do pedido</th><th bgcolor='A4A4A4'>Nome_Cliente</th></tr>";
                echo "<tr><td>" . $row["nu_pedido"] . "</td><td>" . $row["vl_total"] . "</td><td>" . $row["dt_pedido"] . "</td><td>" . $row["nm_cliente"] . "</td></tr>"; 
                
                echo "<tr style='color:#ffffff;'><th bgcolor='343434'>Itens</th><th bgcolor='343434'>Valor_Unitario</th><th bgcolor='343434'>QTDE</th><th bgcolor='343434'>Valor_Conjunto</th></tr>";
                
                $anemoia = $row["nu_pedido"];

        $query2 = "SELECT 
        TBP.nu_pedido as pedido,
        nm_itens,
        vl_valor_unitario,
        qt_itens,
        qt_itens * vl_valor_unitario as vl_conjunto
        from tb_pedido as TBP
        inner join tb_pedido_itens as TBPI on TBPI.nu_pedido = TBP.nu_pedido
        inner join tb_itens as TBI on TBI.cd_itens = TBPI.cd_itens
        where TBP.nu_pedido = '$anemoia' ;";
                
        $result2 = mysqli_query($conn,$query2);
                
            while($row2 = $result2->fetch_assoc()) {
            echo "<tr><td>" . $row2["nm_itens"] . "</td><td>" . $row2["vl_valor_unitario"] . "</td><td>" . $row2["qt_itens"] . "</td><td>" . $row2["vl_conjunto"] . "</td></tr>"; 
                }

                echo "</table></div><BR><BR>";
            }
            



                    } 
                    
                mysqli_close($conn);}
            
            ?>
         </div>

            <br>
            
            <div style="display: flex; justify-content: center;">
            <button id="btn_imp" type="submit">Baixar</button>
            </div>
        
   

<script>
    // Cria uma constante para o id 
    const btn_imp = document.getElementById("btn_imp");

    btn_imp.onclick = function() {
        //Recebe o conteúdo da tabela anterior
        const conteudo = document.getElementById('tb').innerHTML;

        //Estilo de impressão
        let estilo = "<style>";
        estilo += "UTF-8";
        estilo += "table {width: 100%; font: 25px Calibri;}";
        estilo += "table, th, td {border: solid 2px #888; border-collapse: collapse;";
        estilo += "padding: 4px 8px; text-align: center;}";
        estilo += "</style>";

        //Criar título
        const tit = document.getElementById('tb').outerHTML;
        const titulo = '<h4>Relatório de Pedidos</h4>';

        //Abertura da janela de impressão
        const win = window.open('', '', 'height = 700, width = 700');
        
        //Criação da página com os dados do Banco de Dados
        win.document.write('<html><head>');
        win.document.write(estilo);
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(titulo);
        win.document.write(conteudo);
        win.document.write('</body></html>');
        
        win.print();
        win.close();
    
    };
    </script> 
</body>
</html>
