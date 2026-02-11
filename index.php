<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Utilizador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --primary-color: #4a90e2; --bg-gradient: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); }
        body { background: var(--bg-gradient); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; font-family: 'Segoe UI', sans-serif; }
        .form-container { background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); max-width: 800px; width: 100%; }
        .section-title { border-left: 5px solid var(--primary-color); padding-left: 15px; margin-bottom: 25px; color: #333; font-weight: 600; }
    </style>
</head>
<body>
 
<div class="form-container">
    <h2 class="text-center mb-4">Registro de Utilizador</h2>
   
    <form action="processa.php" method="POST" enctype="multipart/form-data">
        <div class="mb-5">
            <h4 class="section-title">Dados Pessoais</h4>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Apelido</label>
                    <input type="text" name="apelido" class="form-control">
                </div>
                <div class="col-md-8">
                    <label class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Data de Nascimento</label>
                    <input type="date" name="data_nascimento" class="form-control" required>
                </div>
            </div>
        </div>
 
        <div class="mb-5">
            <h4 class="section-title">Preferências</h4>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">País de Residência</label>
                    <select name="pais" class="form-select" required>
                        <option value="" selected disabled>Escolha um país...</option>
                        <option>Portugal</option>
                        <option>Brasil</option>
                        <option>Angola</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nível de Experiência</label>
                    <div class="mt-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="experiencia" value="Júnior" required>
                            <label class="form-check-label">Júnior</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="experiencia" value="Pleno" required>
                            <label class="form-check-label">Pleno</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="experiencia" value="Sénior" required>
                            <label class="form-check-label">Sênior</label>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label">Áreas de Interesse</label>
                    <div class="d-flex flex-wrap gap-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="interesses[]" value="Tecnologia">
                            <label class="form-check-label">Tecnologia</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="interesses[]" value="Design">
                            <label class="form-check-label">Design</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="interesses[]" value="Marketing">
                            <label class="form-check-label">Marketing</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
        <div class="mb-5">
            <h4 class="section-title">Informações Adicionais</h4>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Currículo (PDF ou DOC)</label>
                    <input class="form-control" type="file" name="curriculo" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Expectativa Salarial</label>
             <input type="range" name="salario" class="form-range" min="1000" max="10000" step="100">
                </div>
                <div class="col-12">
                    <label class="form-label">Observações</label>
                    <textarea name="obs" class="form-control" rows="3"></textarea>
                </div>
            </div>
        </div>
 
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="reset" class="btn btn-outline-secondary me-md-2">Limpar</button>
            <button type="submit" class="btn btn-primary px-4">Submeter</button>
        </div>
    </form>
</div>
 
</body>
</html>