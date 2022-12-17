<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

$item = DB::table('items')
->where('id', '=', $items->item_id)
->get();
?>