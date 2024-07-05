<?php

declare(strict_types = 1);

function getTransactionFiles ($dirPath){
    $files = [];

    foreach(scandir($dirPath) as $file){
        if(is_file($dirPath.$file)){
            $files[] = $file;
        }
    }
return $files;
}

function getTransactions (string $file){
    $transactions = [];
    
        if(!file_exists($file)){
            trigger_error("File'".$file."' does not exist") ;
            return;
        }
        $transactionFile = fopen($file, "r");

        fgetcsv($transactionFile);

        while(($transaction = fgetcsv($transactionFile))==! false){
            $transactions[] = orderTransaction($transaction);

        }

        return $transactions;
    
}

function orderTransaction (array  $Transaction) : array{
    [$date, $checkNo, $description, $amount] = $Transaction;

    $amount = (int) str_replace(['$',','],"",$amount);

    return [
        "date" => $date,
        "checkNo" => $checkNo,
        "description" => $description,
        "amount" => $amount
    ];
}

function getTransactionTotals($transactions){
    [$expense, $income, $net_total] = 0;
    foreach($transactions as $transaction){
        $amount = $transaction["amount"];
        if($amount < 0){
            $expense += $amount;
            continue;
        }
        $income += $amount;
    }
    $net_total = $income + $expense;

    return [
        "expense" => $expense,
        "income" => $income,
        "net_total" => $net_total,
    ];

}