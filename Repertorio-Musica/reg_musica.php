<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8" />
    <title>Repertório | ETEC - Nicolas Ceschin Langhi</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        label {
            margin: 2rem 0 2rem 5rem;
        }textarea{margin-left: 5rem;}
        a {
            color: #0071b2;
            font-weight: bolder;
	    text-decoration: none;
	    background-color: #acc;
	    padding: .6rem;
	    margin-left: 15rem;
	    border-radius: .6rem;
	    box-shadow: .8px 1px 1px 0 rgba(0, 0, 0, 0.75);
	    opacity: 0.8;
	    transition: 0.5s;
        }a:hover{opacity: 1;}
        footer {
	    margin-top: 10rem;
        }
    </style>
</head>
<body>
<?php 
    $nome_musica = $_POST["nome_musica"];
    $nome_musica = str_replace("'", "", $nome_musica);
    $genero = $_POST["genero"];
    $gravadora = $_POST["gravadora"];
    $compositor = $_POST["compositor"];
    $interprete = $_POST["interprete"];
    $dt_lancamento = $_POST["data_lancamento"];
    $duracao = $_POST["duracao"];
    $letra = $_POST["letra"];
    
    $con = mysqli_connect("localhost", "root", "", "repertorio") or die ("Erro de Conxeão!");
    $codigoIns = "insert into musicas values(
    		DEFAULT, '$nome_musica', '$genero', '$gravadora', '$compositor', '$interprete',
    		'$dt_lancamento', '$duracao', '$letra')";
    		
    $incluir = mysqli_query($con, $codigoIns);
    if($incluir == 1){
	echo "<header><h1>Música Registrada com Sucesso!</h2></header>";
    	echo "<main><label>Nome: $nome_musica</label><br>
    	      <label>Gênero: $genero</label><br>
    	      <label>Gravadora: $gravadora</label><br>
    	      <label>Compositor(a): $compositor</label><br>
    	      <label>Interprete: $interprete</label><br>
    	      <label>Data de Lançamento: $dt_lancamento</label><br>
    	      <label>Duração: $duracao</label><br>
    	      <label>Letra:</label><br><textarea>$letra</textarea><br></main>";
    }else {
    	echo "<header><h1>Registro NÃO incluído!</h2></header>";
    }
    echo "<a href='cadastrar.html'>Voltar</a><br>";
?>
<footer>
    <hr>
    <p>&copy; Mestre Galvani | Repertório desenvolvido pelo aluno Nicolas - 2021</p>
</footer>
</body>
</html>
