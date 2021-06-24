<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Consulta da expressão digitada</title>
    <style>
         h2 {
            color: black;
         }
	 #voltar{
	    color: #0071b2;
            font-weight: bolder;
	    text-decoration: none;
	    background-color: #acc;
	    padding: .6rem;
	    margin-left: 2rem;
	    border-radius: .6rem;
	    box-shadow: .8px 1px 1px 0 rgba(0, 0, 0, 0.75);
	    opacity: 0.8;
	    transition: 0.5s;
        }#voltar:hover{opacity: 1;}
        #excluir{
            color: #EB6B5C;
            transition: 0.5s;
        }#excluir:hover{color: #EB493C;}
         footer {
	    margin-top: 2rem;
         }
    </style>
</head>
<body>
    <?php 
        $expressao = trim($_POST['expressao']);
        
        echo "
        <header>
            <h1>Músicas Encontradas com '$expressao'</h1>
	</header><br><a href='index.html' id='voltar'>Voltar</a><br><main>";
        
        $bd = mysqli_connect("localhost", "root", "", "repertorio") or die("Erro!");

        if (isset($_POST["op"])){ // Se o usuário escolheu alguma das opções

            $op = $_POST["op"];
            if($op == "nome"){
                $consulta = mysqli_query($bd, "select * from musicas where nome_musica like '%$expressao%'");
            }else if($op == "genero"){
                $consulta = mysqli_query($bd, "select * from musicas where genero = '$expressao'");
            }else if($op == "interprete"){
                $consulta = mysqli_query($bd, "select * from musicas where interprete like '%$expressao%'");
            }else if($op == "letra"){
                $consulta = mysqli_query($bd, "select * from musicas where letra like '%$expressao%'");
            }else{
                echo "<p>Volte a página e escolha o campo que fará a pesquisa.</p>";
                exit;
            }
            $reg = mysqli_fetch_array($consulta); # Armazena os valores da consulta em um tipo de matriz, ou vetor.
            if($reg == 0 || $expressao == ""){
                echo "<p><br>Não existem registros para a pesquisa! :(</p>";
                exit;
            }
            while($reg!=0){
                $cod_musica = $reg["cod_musica"];
                $nome = $reg["nome_musica"];
                $genero = $reg["genero"];
                $gravadora = $reg["gravadora"];
                $compositor = $reg["compositor"];
                $interprete = $reg["interprete"];
                $dt_lancamento = $reg["data_lancamento"];
                $duracao = $reg["duracao"];
                $letra = $reg["letra"];

                echo "<br><h2>$nome</h2><br>
                         <p>Gênero: $genero<br>
                         Gravadora: $gravadora<br>
                         Compositor(a): $compositor<br>
                         Intérprete: $interprete<br>
                         Data de Lançamento: $dt_lancamento<br>
                         Duração: $duracao<br>
                         </p><br>
                         <p>Letra: </p><br>
                         <textarea rows='5' cols='60'>$letra</textarea><br>";
        ?>
        <a href="alterar.php?cod=<?php echo $cod_musica;?>">Alterar</a>
        <a href="excluir.php?cod=<?php echo $cod_musica;?>" onclick="return confirm ('Tem certeza que deseja excluir a Música?');" id="excluir">Excluir</a>
        <hr>
        <?php
                         $reg = mysqli_fetch_array($consulta);
                }
            }
        ?>
    </main>
    <footer>
    	<hr>
        <p>&copy; Mestre Galvani | Repertório desenvolvido pelo aluno Nicolas - 2021</p>
    </footer>
</body>
</html>
