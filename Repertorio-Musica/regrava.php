<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Regravando...</title>
</head>
<body>
    <?php 
        $cod_musica = $_POST["cod"];
        $nome_musica = $_POST["nome_musica"];
        $nome_musica = str_replace("'", "", $nome_musica);
        $genero = $_POST["genero"];
        $gravadora = $_POST["gravadora"];
        $compositor = $_POST["compositor"];
        $interprete = $_POST["interprete"];
        $dt_lancamento = $_POST["data_lancamento"];
        $duracao = $_POST["duracao"];
        $letra = $_POST["letra"];

        $bd = mysqli_connect("localhost", "root", "", "repertorio") or die ("Erro ao conectar!");
        $altera = mysqli_query($bd, "update musicas set 
                                    nome_musica='$nome_musica', 
                                    genero='$genero',
                                    gravadora='$gravadora',
                                    compositor='$compositor',
                                    interprete='$interprete',
                                    data_lancamento='$dt_lancamento',
                                    duracao='$duracao',
                                    letra='$letra'
                                    where cod_musica=$cod_musica;");
        if($altera == 1){
            echo "<header><h1>Música Alterada com Sucesso!</h2></header>";
    	    echo "<main><label>Nome: $nome_musica</label><br>
    	      <label>Gênero: $genero</label><br>
    	      <label>Gravadora: $gravadora</label><br>
    	      <label>Compositor(a): $compositor</label><br>
    	      <label>Interprete: $interprete</label><br>
    	      <label>Data de Lançamento: $dt_lancamento</label><br>
    	      <label>Duração: $duracao</label><br>
    	      <label>Letra:</label><br><textarea>$letra</textarea><br></main>";
        }else{
            echo "<main><h1>ERRO - Registro não Alterado</h1></main>";
        }
    ?>
    <a href="index.html">Voltar para nova consulta</a>
</body>
</html>
