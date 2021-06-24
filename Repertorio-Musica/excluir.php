<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processo de Exclusão da Música</title>
</head>
<body>
<?php 
    $cod_musica = $_GET["cod"];
    
    $bd = mysqli_connect("localhost", "root", "", "repertorio") or die("Erro!");
    
    $apagar = mysqli_query($bd, "delete from musicas where cod_musica='$cod_musica'");
    
    if($apagar){
        echo "Música excluída com sucesso!";
    }else{
        echo "Música NÃO foi excluído!";
    }
    
?>
    <br><br><a href="index.html">Voltar para a página de Consulta</a>
</body>
</html>
