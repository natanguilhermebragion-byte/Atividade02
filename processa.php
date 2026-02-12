<?php
 
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Acesso negado.");
}
 
 
$nome = $_POST['nome'] ?? '';
$apelido = $_POST['apelido'] ?? '';
$email = $_POST['email'] ?? '';
$nascimento = $_POST['data_nascimento'] ?? '';
$pais = $_POST['pais'] ?? '';
$experiencia = $_POST['experiencia'] ?? '';
$interesses = $_POST['interesses'] ?? [];
$salario = $_POST['salario'] ?? '';
$obs = $_POST['obs'] ?? '';
 
 
if (empty($nome) || empty($email)) {
    die("Erro: Nome e E-mail são obrigatórios.");
}
 
 
$destino = "";
if (isset($_FILES['curriculo']) && $_FILES['curriculo']['error'] === 0) {
    $arquivo = $_FILES['curriculo'];
   
 
    $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
   
    
    if ($extensao === 'pdf') {
        $pasta = "uploads/pdf/";
    } elseif ($extensao === 'doc' || $extensao === 'docx') {
        $pasta = "uploads/doc/";
    } else {
        die("Apenas arquivos PDF ou DOC são permitidos.");
    }
 
 
    $novoNome = uniqid() . "." . $extensao;
    $destino = $pasta . $novoNome;
 
    if (!move_uploaded_file($arquivo['tmp_name'], $destino)) {
        die("Erro ao salvar o arquivo.");
    }
}
?>
 
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <title>Resumo do Registo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f5f7fa; padding: 50px; font-family: 'Segoe UI', sans-serif; }
        .resumo-container { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); max-width: 700px; margin: auto; }
        .header-resumo { color: #28a745; font-weight: bold; margin-bottom: 20px; }
    </style>
</head>
<body>
 
<div class="resumo-container">
    <h2 class="header-resumo">Seu registro foi feito com sucesso!</h2>
    <hr>
   
    <div class="row">
        <div class="col-12 mb-3">
            <p><strong>Nome Completo:</strong> <?= $nome ?> </p>
            <p><strong>Apelido:</strong> <?= $apelido ?></p>
            <p><strong>E-mail:</strong> <?= $email ?></p>
            <p><strong>Data de Nascimento:</strong> <?= $nascimento ?></p>
            <p><strong>País:</strong> <?= $pais ?></p>
            <p><strong>Nível de Experiência:</strong> <?= $experiencia ?></p>
            <p><strong>Expectativa Salarial:</strong> R$ <?= $salario ?></p>
        </div>
 
        <div class="col-12 mb-3">
            <p><strong>Áreas de Interesse:</strong></p>
            <ul>
                <?php if (!empty($interesses)): ?>
                    <?php foreach ($interesses as $area): ?>
                        <li><?= $area ?></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>Nenhuma área selecionada.</li>
                <?php endif; ?>
            </ul>
        </div>
 
        <div class="col-12 mb-3">
            <p><strong>Observações:</strong> <?= nl2br($obs) ?></p>
        </div>
 
        <div class="col-12">
            <p><strong>Currículo Enviado:</strong>
                <a href="<?= $destino ?>" target="_blank" class="btn btn-sm btn-success">Abrir Arquivo</a>
            </p>
        </div>
    </div>
   
    <hr>
    <a href="index.php" class="btn btn-outline-primary">Voltar ao Formulário</a>
</div>
 
</body>
</html>