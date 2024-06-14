<?php
// Defina o diretório onde estão as imagens
$diretorio = 'imagens';

// Obtenha uma lista de arquivos do diretório
$arquivos = scandir($diretorio);

// Filtre apenas os arquivos de imagem
$imagens = array_filter($arquivos, function($arquivo) use ($diretorio) {
    $caminhoCompleto = $diretorio . '/' . $arquivo;
    return is_file($caminhoCompleto) && preg_match('/\.(jpg|jpeg|png|gif)$/i', $arquivo);
});

// Ordene as imagens pelo nome
sort($imagens);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Imagens</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .container {
            border: 2px solid #ddd;
            padding: 10px;
            margin: 20px auto;
            max-width: 90%;
        }
        .imagem {
            display: block;
            max-width: 100%;
            height: auto;
            margin: 0 auto 10px;
        }
        .nome-imagem {
            font-size: 50px;
            color: #333;
            word-wrap: break-word;
        }
        @media (max-width: 600px) {
            .nome-imagem {
                font-size: 30px; /* Ajuste de tamanho para telas menores */
            }
        }
    </style>
</head>
<body>
    <h1>Galeria de Imagens</h1>
    <?php foreach ($imagens as $imagem): ?>
        <?php
        // Obtenha o nome do arquivo sem a extensão
        $nomeImagem = pathinfo($imagem, PATHINFO_FILENAME);
        ?>
        <div class="container">
            <img src="<?php echo $diretorio . '/' . $imagem; ?>" alt="<?php echo $nomeImagem; ?>" class="imagem">
            <p class="nome-imagem"><?php echo $nomeImagem; ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>
