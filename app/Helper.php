<?php
function amountFormatter(int $amount){
    $is_expense = $amount < 0;
    $amount_str = str_replace("-","", (string) $amount);
    return ($is_expense ? "-$" : "$").$amount_str;

}

function dateFormater(string $date){

    return date('d, M, y ', strtotime($date));
}