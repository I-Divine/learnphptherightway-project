<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
            .green{
                color : green;
            }
            .red{
                color : red;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php if($transactions): ?>
                <?php foreach($transactions as $transaction): ?>
                    <tr>
                        <td><?= dateFormater($transaction["date"]) ?></td>
                        <td><?= $transaction["checkNo"] ?></td>
                        <td><?= $transaction["description"] ?></td>
                        <td>
                        <span 
                            class=<?= $transaction["amount"] > 0 ? "green" :( $transaction["amount"] < 0 ? "red" : "") ?>
                        >
                            <?= amountFormatter($transaction["amount"] )?>
                        </span>    
                       </td>
                    </tr>
                    <?php endforeach?>
                    <?php endif ?>
        </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td><?= amountFormatter($income) ?></td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td><?= amountFormatter($expenses) ?></td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td><?= amountFormatter($net_total) ?></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
