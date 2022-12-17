<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

$user = Auth::user();

if (
    auth()
        ->guard()
        ->check()
) {
    $count = DB::table('wishlists')
        ->where('user_id', '=', $user->id)
        ->count();

    $wishlistsid = DB::table('wishlists')
        ->where('user_id', '=', $user->id)
        ->get();

    $count2 = DB::table('shopping_carts')
        ->where('user_id', '=', $user->id)
        ->count();

    $userId = $user->id; // replace with the actual value of the user ID

    $shoppingcarts = DB::table('items as i')
        ->select('i.id', 'i.nama', 'i.price', 'sc.jumlah', 'sc.id as shopping_id')
        ->join('shopping_carts as sc', function ($join) use ($userId) {
            $join->on('sc.item_id', '=', 'i.id')->where('sc.user_id', '=', $userId);
        })
        ->whereIn('i.id', function ($query) use ($userId) {
            $query
                ->select('item_id')
                ->from('shopping_carts')
                ->where('user_id', '=', $userId);
        })
        ->get();

    $total = 0;
}

?>
