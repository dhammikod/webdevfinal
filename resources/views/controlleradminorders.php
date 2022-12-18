<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

$userObj = Auth::user();
$user = $userObj->id;

$results = DB::select(
    "SELECT orders.usercompleted, orders.admincompleted, detil_orders.id_stocksize as id_size, detil_orders.id_order as detil_orders_id, detil_orders.total_items, item_size_stocks.size, items.nama, orders.status, orders.notes
    FROM orders
    LEFT JOIN detil_orders ON detil_orders.id_order = orders.id
    LEFT JOIN item_size_stocks ON detil_orders.id_stocksize = item_size_stocks.id
    LEFT JOIN items ON item_size_stocks.id_item = items.id
    WHERE detil_orders.id_order = ?", [$order->id]
);

// print_r($results);
?>