<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INDEX</title>
</head>
<body>

<form method="POST" action="processando.php" enctype="multipart/form-data">
   <input type="file" class="form-control-file" name="arquivo"><br><br>
   <input type="text" name ="nome" size="50" placeholder = "Digite o titulo da caixa EX: CTO; BAR; MCP.....">
    <input type="submit"   class="btn btn-success"value="Enviar">
    <br><a href="../lerxml/nap.kml">Baixar NAP</a>
</form> <br><br><br><hr>

<form action="default.php" method="POST">
    <input type="text" name="caixas" placeholder="Digite o numero de NAP's">
    <input type="submit" value="Enviar">
</form>
<br><a href="../lerxml/infradefault.kml">Baixar infradefault</a>

<br><br><br>
<form method="POST" action="lerxmltotal.php" enctype="multipart/form-data">
   <label for="">Contagem de itens</label><br><hr>
    <input type="file" class="form-control-file" name="arquivo"><br><br>
    <input type="submit"   class="btn btn-success"value="Enviar">
</form>
<br><br><br>

    
</body>
</html>

