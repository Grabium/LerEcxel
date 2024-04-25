<!DOCTYPE html>
  <head>	
    <html lang="Pt-br">
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    <title>Empenhos atualizados</title>
  </head>
  <body>	
    <div id='externa'><div id='interna'>
      <form action="{{ route('mainTigger') }}" method="post" enctype="multipart/form-data">
      @csrf
        <h1>Quantidade de contratos já atualizados:</h1>
        <h3>Para isso, escolha a planilha para ser analizada</h3>
        <label for="changedFile">Selecione o arquivo .xlsx para fazer a busca:</label><br />
        <input type="file" name="changedFile" id="changedFile"/><br /><br />
        <label for="searchColumn">Indique o nome da clouna que será contada:</label><br />
        <input type="text" name="searchColumn" id="searchColumn"/><br />
        <button>Enviar</button>
      </form>
    </div></div>



  </body>
</html>
