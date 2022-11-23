<?php
require_once('./class/Response.php');

$response = null;
?>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
              crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@18.6.0/dist/css/suggestions.min.css"
              type="text/css" rel="stylesheet"/>
        <link href="style/style.css" type="text/css" rel="stylesheet">
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript"
                src="https://cdn.jsdelivr.net/npm/suggestions-jquery@18.6.0/dist/js/jquery.suggestions.min.js"></script>
        <script type="text/javascript" src="script/script.js"></script>
    </head>
    <body>
    <h2>Автореквизиты</h2>
    <div class="mb-3">
        <form id="form_to_crm" action="index.php" method="post">
            <input class="form-control" aria-describedby="helper" type="text" name="company_name" value="<?= isset($_POST['company_name']) ? htmlspecialchars($_POST['company_name']) : ''; ?>" autocomplete="off"
                   required>
            <div id="helper" class="form-text">Введите ИНН или название компании.</div>
            <input type="hidden" name="hidden">
        </form>
    </div>

    <?php
    if (isset($_POST['hidden'])) {
        $response = new Response($_POST['hidden']);
        if(!$response->response) {
            $response = null;
        }
    }
    ?>

    <section>
        <h3>Реквизиты компании</h3>
        <table class="table table-striped">
            <tr class="table-dark">
                <th scope="col">Наименование реквизита</th>
                <th scope="col">Данные реквизита</th>
            </tr>
            <tr>
                <th>Название компании</th>
                <td><?= $response->company ?? "-" ?></td>
            </tr>
            <tr>
                <th>ИНН</th>
                <td><?= $response->inn ?? "-" ?></td>
            </tr>
            <tr>
                <th>ОГРН</th>
                <td><?= $response->ogrn ?? "-" ?></td>
            </tr>
            <tr>
                <th>КПП</th>
                <td><?= $response->kpp ?? "-" ?></td>
            </tr>
            <tr>
                <th>ОКТМО</th>
                <td><?= $response->oktmo ?? "-" ?></td>
            </tr>
            <tr>
                <th>ОКПО</th>
                <td><?= $response->okpo ?? "-" ?></td>
            </tr>
            <tr>
                <th>Ген. директор</th>
                <td><?= $response->director ?? "-" ?></td>
            </tr>
            <tr>
                <th>Дата государственной регистрации</th>
                <td><?= $response->regDate ?? "-" ?></td>
            </tr>
        </table>
    </section>

    <section>
        <h3>Физический адрес</h3>
        <table class="table table-striped">
            <tr class="table-dark">
                <th scope="col">Наименование реквизита</th>
                <th scope="col">Данные реквизита</th>
            </tr>
            <tr>
                <th>Область</th>
                <td><?= $response->region ?? "-" ?></td>
            </tr>
            <tr>
                <th>Город</th>
                <td><?= $response->city ?? "-" ?></td>
            </tr>
            <tr>
                <th>Район</th>
                <td><?= $response->district ?? "-" ?></td>
            </tr>
            <tr>
                <th>Улица, дом</th>
                <td><?= $response->address ?? "-" ?></td>
            </tr>
            <tr>
                <th>Индекс</th>
                <td><?= $response->postal ?? "-" ?></td>
            </tr>
            <tr>
                <th>Страна</th>
                <td><?= $response->country ?? "-" ?></td>
            </tr>
        </table>
    </section>
    </body>