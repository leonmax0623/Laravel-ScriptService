<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Счет</title>
    <style>
        @font-face {
            font-family: "DejaVu Sans";
            font-style: normal;
            font-weight: 400;
            src: url("/fonts/dejavu-sans/DejaVuSans.ttf");
            src:
                local("DejaVu Sans"),
                local("DejaVu Sans"),
                url("/fonts/dejavu-sans/DejaVuSans.ttf") format("truetype");
        }
        body {
            font-family: "DejaVu Sans";
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table.withoutBorder td, th {
            border: 0;
        }
        td, th {
            padding: 3px;
            border: 1px solid black;
        }
        .bold {
            font-weight: bold;
        }
        .rightText {
            text-align: right;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td colspan="2" rowspan="2">
                <span>ТУЛЬСКИЙ ФИЛИАЛ АБ "РОССИЯ" Г. ТУЛА</span
                <br>
                <span>Банк получателя</span>
            </td>
            <td>
                <span>БИК</span>
            </td>
            <td rowspan="2">
                <span>047003764</span>
                <br>
                <span>30101810600000000764</span>
            </td>
        </tr>
        <tr>
            <td>
                <span>Сч. №</span>
            </td>
        </tr>
        <tr>
            <td>
                <span>ИНН 6729028414</span>
            </td>
            <td>
                <span>КПП 673001001</span>
            </td>
            <td rowspan="2">
                <span>Сч. №</span>
            </td>
            <td rowspan="2">
                <span>40702810903180002068</span>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <span>ООО "ТЕХОБОРОНЭКСПЕРТ"</span>
                <br>
                <span>Получатель</span>
            </td>
        </tr>
    </table>

    <h1>Счет на оплату № {{ $dataForPdf['payment_id']  }} от {{ $dataForPdf['date']  }} г.</h1>
    <hr>

    <table class="withoutBorder">
        <tr>
            <td>
                <span>Поставщик</span>
                <br>
                <span>(Исполнитель):</span>
            </td>
            <td class="bold">
                <span>ООО "ТЕХОБОРОНЭКСПЕРТ", ИНН 6729028414, КПП 673001001, 214013, Смоленская обл, Смоленск г, Черняховского ул, дом № 15, помещение 6.2</span>
            </td>
        </tr>
        <tr>
            <td>
                <span>Покупатель</span>
                <br>
                <span>(Заказчик):</span>
            </td>
            <td class="bold">
                <span>{{ $dataForPdf['company_name'] }}, ИНН {{ $dataForPdf['inn'] }}, КПП {{ $dataForPdf['kpp'] }}, {{ $dataForPdf['ogrn'] }}, {{ $dataForPdf['legal_address'] }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <span>Основание</span>
            </td>
            <td class="bold">
                <span>Публичная оферта</span>
            </td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th>№</th>
                <th>Товары (работы, услуги)</th>
                <th>Кол-во</th>
                <th>Ед.</th>
                <th>Цена</th>
                <th>Сумма</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: center;">1</td>
                <td>Доступ к онлайн-сервису</td>
                <td class="rightText">1</td>
                <td>шт</td>
                <td class="rightText">{{ $dataForPdf['amount'] }}</td>
                <td class="rightText">{{ $dataForPdf['amount'] }}</td>
            </tr>
        </tbody>
    </table>

    <table class="withoutBorder" style="width: 40%; float: right;">
        <tr>
            <td class="bold rightText">
                <span>Итого</span>
            </td>
            <td class="bold rightText">
                <span>{{ $dataForPdf['amount'] }}</span>
            </td>
        </tr>
        <tr>
            <td class="bold rightText">
                <span>Без налога (НДС)</span>
            </td>
            <td class="bold rightText">
                <span>-</span>
            </td>
        </tr>
        <tr>
            <td class="bold rightText">
                <span>Всего к оплате:</span>
            </td>
            <td class="bold rightText">
                <span>{{ $dataForPdf['amount'] }}</span>
            </td>
        </tr>
    </table>
    <br><br>
    <br><br>
    <br><br>
    <div style="margin-top: 0px;">
        <span>Всего наименований 1, на сумму {{ $dataForPdf['amount'] }} руб.</span>
        <br>
        <span class="bold" style="margin: 0px;">{{ $dataForPdf['strAmount'] }}</span>
    </div>
    <br>
    <hr>

    <table class="withoutBorder">
        <tr>
            <td class="bold" style="vertical-align: bottom; width: 80px;">
                Руководитель
            </td>
            <td style="border-bottom: 1px solid black !important; text-align: right;">
                <img src="./core/media/document/paymentInvoice/signature.png">
                <span>Романенкова Е. И.</span>
            </td>
            <td class="bold" style="vertical-align: bottom; width: 60px;">
                Бухгалтер
            </td>
            <td style="border-bottom: 1px solid black !important; text-align: right;">
                <img src="./core/media/document/paymentInvoice/signature.png">
                <span>Романенкова Е. И.</span>
            </td>
        </tr>
    </table>

    <div style="margin-top: 15px;">
        <img src="./core/media/document/paymentInvoice/stamp.png">
    </div>
</body>
</html>


