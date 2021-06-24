<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <?php 
        $cod_musica = trim($_GET['cod']); 
        
        $bd=mysqli_connect("localhost","root","","repertorio") or die ("erro!");
        $sql = "select * from musicas where cod_musica = $cod_musica";
        $consulta = mysqli_query($bd, $sql);
        $reg = mysqli_fetch_array($consulta);
    ?>
    <title>Alteração da música <?php echo $reg["nome_musica"]?></title>
</head>
<body>
    <header>
        <h1>Alterar Música</h1>
    </header>
    <main>
        <?php 
            if($reg == 0){
                echo "ERRO - Registro não existe ;(";
                exit;
            }else{
                $cod_musica = $reg["cod_musica"];
                $nome = $reg["nome_musica"];
                $genero = $reg["genero"];
                $gravadora = $reg["gravadora"];
                $compositor = $reg["compositor"];
                $interprete = $reg["interprete"];
                $dt_lancamento = $reg["data_lancamento"];
                $duracao = $reg["duracao"];
                $letra = $reg["letra"];
            }
        ?>
        <form action="regrava.php" method="post">
            <input type="hidden" name="cod" value="<?php echo $cod_musica;?>"><br>
            <label>Nome da Música</label>
            <input type="text" name="nome_musica" id="input" value="<?php echo $nome?>"/><br>
            <label>Gênero</label>
            <input type="text" name="genero" id="input" value="<?php echo $genero?>"/><br>
            <label>Gravadora</label>
            <input type="text" name="gravadora" id="input" value="<?php echo $gravadora?>"/><br>
            <label>Compositor(a)</label>
            <input type="text" name="compositor" id="input" value="<?php echo $compositor?>"/><br>
            <label>Interprete</label>
            <input type="text" name="interprete" id="input" value="<?php echo $interprete?>"/><br>
            <label>Data de Lançamento</label>
            <input type="date" name="data_lancamento" id="input" value="<?php echo $dt_lancamento?>"/><br>
            <label>Duração</label>
            <input type="text" name="duracao" id="input" value="<?php echo $duracao?>"/><br>
            <label>Letra</label><br>
            <textarea rows="10" cols="60" name="letra"><?php echo $letra?></textarea><br><br>
            <input type="submit" id="input" value="Alterar"/>
        </form>
        <a href="index.html" style="color: gray;">
                <button id="input" id="submit" style="margin-top: 1rem;
    color: #aaa;
    height: 2rem;
    font-size: 1.2rem;
    font-weight: bolder;">Cancelar</button>
            </a>
    </main>
    <footer>
        <hr>
        <p>&copy; Mestre Galvani | Repertório desenvolvido pelo aluno Nicolas - 2021</p>
    </footer>
</body>
</html>
