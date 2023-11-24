<?php
include_once './service/NIFValidationService.php';

use src\service\NIFValidationService;

$userNIF = filter_input(INPUT_POST, 'user_nif');
$moreInfo = filter_input(INPUT_POST, 'more_info');
$moreInfoHTML = null;

if ($userNIF) {
    $nifValidationService = new NIFValidationService(trim($userNIF));

    if ($userNIF && $moreInfo) {
        $moreInfoHTML = $nifValidationService->validateOnline();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VALIDADOR DE NIF PORTUGUÊS | BY RAZIEL RODRIGUES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-dark bg-danger">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Flag_of_Portugal.svg/900px-Flag_of_Portugal.svg.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                VALIDADOR DE NIF PORTUGUÊS
            </a>
        </div>
    </nav>

    <main class="container mt-4">
        <section>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="mb-3">
                    <label for="user_nif" class="form-label">Digite seu NIF</label>
                    <input name="user_nif" maxlength="9" minlength="9" type="text" class="form-control" id="user_nif" aria-describedby="user_nif">
                    <small id="user_nif" class="form-text text-muted">*Não guardamos nenhum dado</small>
                </div>
                <div class="mb-3 form-check d-none">
                    <input name="more_info" type="checkbox" class="form-check-input" id="more_info">
                    <label class="form-check-label" for="more_info">Quero mais informações</label>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </section>

        <section class="mt-4">
            <?php if (isset($nifValidationService)) { ?>
                <?php if ($nifValidationService->validate()) { ?>
                    <h2 class="mt-3">NIF Válido</h2>
                    <h5 class="mt-3">Tipo: <?= $nifValidationService->getNIFtype() ?></h5>
                    <?php if ($moreInfoHTML) { ?>
                        <article class="mt-3">
                            <?= $moreInfoHTML ?>
                        </article>
                    <?php } ?>
                <?php } else { ?>
                    <h2 class="mt-3">NIF INVÁLIDO</h2>
                <?php }  ?>
            <?php }  ?>
        </section>
    </main>

    <div class="card mt-4 card-sm">
        <div class="card-body text-center">
            O número de identificação fiscal (NIF) tem como finalidade identificar em Portugal uma entidade fiscal, contribuinte, por exemplo, em declarações de IRS ou outros impostos ou transações financeiras. É atribuído pela Autoridade Tributária e Aduaneira, organismo do Ministério das Finanças e da Administração Pública, no caso de pessoas singulares e pessoas coletivas não sujeitas a registo no Registo Nacional de Pessoas Coletivas (RNPC). É atribuído pelo Registo Nacional de Pessoas Coletivas no caso de entidades sujeitas a registo. Foi instituído pelo Decreto-Lei n.º 463/79, de 30 de Novembro. O Decreto-lei n.º 463/79 foi revogado a partir de 27 de Fevereiro de 2013 pelo Decreto-lei n.º 14/2013, de 28 de Janeiro, que procede à sistematização e harmonização da legislação referente ao Número de Identificação Fiscal. Este número é ainda utilizado, dentro da União Europeia, para identificar as entidades económicas para efeitos de IVA (VAT identification Number).
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>