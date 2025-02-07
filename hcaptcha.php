<?php
if (isset($_POST['submit'])) {
    if (!empty($_POST['h-captcha-response'])) {
        $data = [
            'secret' => "<secret-key>",
            'response' => $_POST['h-captcha-response']
        ];

        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $verifyResponse = curl_exec($verify);
        curl_close($verify);

        $responseData = json_decode($verifyResponse);
        $name = htmlspecialchars(trim($_POST['name'] ?? ''));

        if (!empty($responseData) && $responseData->success) {
            $succMsg = "Sucesso! Seu formulário foi enviado.";
            $errMsg = '';
        } else {
            $errMsg = "hCaptcha falhou. Por favor, tente novamente.";
            $succMsg = '';
        }
    } else {
        $errMsg = "Por favor, clique no hCaptcha.";
        $succMsg = '';
    }
} else {
    $errMsg = '';
    $succMsg = '';
    $name = '';
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com hCaptcha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg p-4">
                    <h2 class="text-center mb-4">Formulário de Contato</h2>
                    <?php if (!empty($errMsg)) : ?>
                        <div class="alert alert-danger"> <?= $errMsg; ?> </div>
                    <?php endif; ?>
                    <?php if (!empty($succMsg)) : ?>
                        <div class="alert alert-success"> <?= $succMsg; ?> </div>
                    <?php endif; ?>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $name; ?>" placeholder="Digite seu nome" required>
                        </div>
                        <div class="mb-3 text-center">
                            <div class="h-captcha" data-sitekey="<site-key>"></div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary w-100">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
