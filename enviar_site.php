<?php include "tempo_limite.php";?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bulma/css/bulma.min.css">
    <title>Cadastrar Usuário</title>
</head>

<body>
    <style>
    .table {
      margin-left: auto;
      margin-right: auto;
    }
    </style>
    <?php include "navbar.php"?>
    <section class="section">
        <div class="container">
            <div class="columns is-mobile is-centered">
                <div class="column is-half">
                    <h1 class="title has-text-centered">Adicionar Site</h1>
                    <form action="enviar_site.php" method="post" enctype="multipart/form-data">
                        <div class="field">
                            <label class="label">Arquivos</label>
                            <div class="control">
                                <input class="input is-success" name="arquivo" accept=".zip" type="file"
                                    placeholder="Digite o nome de usuário">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">IP</label>
                            <div class="control">
                                <input class="input is-success" name="ip" type="text"
                                    placeholder="Digite o IP do servidor">
                            </div>
                        <div class="field">
                            <div class="buttons is-centered">
                                <div class="control">
                                    <button class="button is-dark is-fullwidth">Cadastrar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>


<?php
//192.168.0.112
if(isset($_POST['ip'])&&isset($_POST['arquivo'])){
    $ip=$_POST['ip'];
    // Configura o tempo limite para ilimitado
    set_time_limit(0);

   /*-----------------------------------------------------------------------------*
 * Parte 1: Configurações do Envio de arquivos via FTP com PHP
/*----------------------------------------------------------------------------*/

// IP do Servidor FTP
$servidor_ftp = "$ip";

// Usuário e senha para o servidor FTP
$usuario_ftp = 'teste';
$senha_ftp   = 'teste';

// Extensões de arquivos permitidas
$extensoes_autorizadas = array( '.zip' );

// Caminho da pasta FTP
$caminho = 'arquivos/';

/* 
Se quiser limitar o tamanho dos arquivo, basta colocar o tamanho máximo 
em bytes. Zero é ilimitado
*/
$limitar_tamanho = 0;

/* 
Qualquer valor diferente de 0 (zero) ou false, permite que o arquivo seja 
sobrescrito
*/
$sobrescrever = 0;

/*-----------------------------------------------------------------------------*
 * Parte 2: Configurações do arquivo
/*----------------------------------------------------------------------------*/

// Verifica se o arquivo não foi enviado. Se não; termina o script.
if ( ! isset( $_FILES['arquivo'] ) ) {
	exit('Nenhum arquivo enviado!');
}

// Aqui o arquivo foi enviado e vamos configurar suas variáveis
$arquivo = $_FILES['arquivo'];

// Nome do arquivo enviado
$nome_arquivo = $arquivo['name'];

// Tamanho do arquivo enviado
$tamanho_arquivo = $arquivo['size'];

// Nome do arquivo temporário
$arquivo_temp = $arquivo['tmp_name'];

// Extensão do arquivo enviado
$extensao_arquivo = strrchr( $nome_arquivo, '.' );

// O destino para qual o arquivo será enviado
$destino = $caminho . $nome_arquivo;

/*-----------------------------------------------------------------------------*
 *  Parte 3: Verificações do arquivo enviado
/*----------------------------------------------------------------------------*/

/* 
Se a variável $sobrescrever não estiver configurada, assumimos que não podemos 
sobrescrever o arquivo. Então verificamos se o arquivo existe. Se existir; 
terminamos aqui. 
*/

if ( ! $sobrescrever && file_exists( $destino ) ) {
	exit('Arquivo já existe.');
}

/* 
Se a variável $limitar_tamanho tiver valor e o tamanho do arquivo enviado for
maior do que o tamanho limite, terminado aqui.
*/

if ( $limitar_tamanho && $limitar_tamanho < $tamanho_arquivo ) {
	exit('Arquivo muito grande.');
}

/* 
Se as $extensoes_autorizadas não estiverem vazias e a extensão do arquivo não 
estiver entre as extensões autorizadas, terminamos aqui.
*/

if ( ! empty( $extensoes_autorizadas ) && ! in_array( $extensao_arquivo, $extensoes_autorizadas ) ) {
	exit('Tipo de arquivo não permitido.');
}

/*-----------------------------------------------------------------------------*
 * Parte 4: Conexão FTP
/*----------------------------------------------------------------------------*/

// Realiza a conexão
$conexao_ftp = ftp_connect( $servidor_ftp );

// Tenta fazer login
$login_ftp = @ftp_login( $conexao_ftp, $usuario_ftp, $senha_ftp );

// Se não conseguir fazer login, termina aqui
if ( ! $login_ftp ) {
	exit('Usuário ou senha FTP incorretos.');
}

// Envia o arquivo
if ( @ftp_put( $conexao_ftp, $destino, $arquivo_temp, FTP_BINARY ) ) {
	// Se for enviado, mostra essa mensagem
	echo 'Arquivo enviado com sucesso!';
} else {
	// Se não for enviado, mostra essa mensagem
	echo 'Erro ao enviar arquivo!';
}

// Fecha a conexão FTP
ftp_close( $conexao_ftp );
}
?>