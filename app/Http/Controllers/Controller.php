<?php

namespace App\Http\Controllers;

use App\Models\detil_order;
use App\Models\Feedback;
use App\Models\Item;
use App\Models\item_picture;
use App\Models\item_size_stock;
use App\Models\order;
use App\Models\Payment_types;
use App\Models\shipping_address;
use App\Models\shopping_cart;
use App\Models\User;
use App\Models\wishlist;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
    {
        return view('welcome', [
            'pagetitle' => 'Home'
        ]);
    }

    public function catalog()
    {
        $filterCategory = Item::select('category', DB::raw('count(category) as jumlah'))
            ->groupBy('category')
            ->get();

        if (isset($_GET['filterButton'])) {
            $priceMIN = $_GET['priceMIN'];
            $priceMAX = $_GET['priceMAX'];
            $cateogryCheckBoxs = null;

            if (isset($_GET['checkboxFilter'])) {
                $cateogryCheckBoxs = $_GET['checkboxFilter'];
            }

            if ($priceMIN == null) {
                $priceMIN = 0;
            }

            if ($priceMAX != null) {
                if ($priceMAX < $priceMIN) {
                    $priceMIN = 0;
                    $priceMAX = null;
                }
            }

            if ($priceMAX != null) {
                //max not null
                if ($priceMIN != -1) {
                    //min not null
                    if ($cateogryCheckBoxs != null) {
                        //checkbox not null
                        $filterResult = Item::where('price', '>', $priceMIN)
                            ->where('price', '<', $priceMAX)
                            ->where(function ($query) use ($cateogryCheckBoxs) {
                                foreach ($cateogryCheckBoxs as $category) {
                                    $query->orWhere('category', 'like', $category);
                                }
                            })
                            ->paginate(8);
                    } else {
                        //checkbox null
                        $filterResult = Item::where('price', '>', $priceMIN)
                            ->where('price', '<', $priceMAX)
                            ->paginate(8);
                    }
                } else {
                    // min null
                    if ($cateogryCheckBoxs != null) {
                        //checkbox not null
                        $filterResult = Item::where('price', '<', $priceMAX)
                            ->where(function ($query) use ($cateogryCheckBoxs) {
                                foreach ($cateogryCheckBoxs as $category) {
                                    $query->orWhere('category', 'like', $category);
                                }
                            })
                            ->paginate(8);
                    } else {
                        $filterResult = Item::where('price', '<', $priceMAX)
                            ->paginate(8);
                    }
                }
            } else {
                //max null
                if ($priceMIN != -1) {
                    //min not null
                    if ($cateogryCheckBoxs != null) {
                        //checkbox not nul
                        $filterResult = Item::where('price', '>', $priceMIN)
                            ->where(function ($query) use ($cateogryCheckBoxs) {
                                foreach ($cateogryCheckBoxs as $category) {
                                    $query->orWhere('category', 'like', $category);
                                }
                            })
                            ->paginate(8);
                    } else {
                        $filterResult = Item::where('price', '>', $priceMIN)
                            ->paginate(8);
                    }
                }
            }

            if ($priceMIN == 0 && $priceMAX == null && $cateogryCheckBoxs == null) {
                return view('catalog', [
                    $itemSizeStocks = DB::table('item_size_stocks')->get(),
                    'pagetitle' => 'Catalog',
                    'items' => Item::paginate(8),
                    'filterCategory' => $filterCategory,
                    'itemSizeStocks' => $itemSizeStocks,
                    'itemPictures' => item_picture::all()

                ]);
            } {
                return view('catalog', [

                    $itemSizeStocks = DB::table('item_size_stocks')->get(),
                    'pagetitle' => 'Catalog',
                    'items' => $filterResult,
                    'filterCategory' => $filterCategory,
                    'itemSizeStocks' => $itemSizeStocks,
                    'itemPictures' => item_picture::all()
                ]);
            }
        }

        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $results = DB::table('items')
                ->where('nama', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->orWhere('category', 'LIKE', "%{$search}%")
                ->paginate(8);

            $itemSizeStocks = DB::table('item_size_stocks')->get();

            return view('catalog', [
                'pagetitle' => 'Catalog',
                'items' => $results,
                'filterCategory' => $filterCategory,

                'itemSizeStocks' => $itemSizeStocks,
                'itemPictures' => item_picture::all()

            ]);
        } else {
            return view('catalog', [
                $itemSizeStocks = DB::table('item_size_stocks')->get(),
                'pagetitle' => 'Catalog',
                'items' => Item::paginate(8),
                'filterCategory' => $filterCategory,
                'itemSizeStocks' => $itemSizeStocks,
                'itemPictures' => item_picture::all()

            ]);
        }
    }

    public function productDetails($id)
    {
        $items = DB::table('items')
            ->where('id', $id)
            ->get();
        $pics = DB::table('item_pictures')
            ->where('id_item', $id)
            ->get();
        $sizestock = DB::table('item_size_stocks')
            ->where('id_item', $id)
            ->get();
        $itemSizeStocks = DB::table('item_size_stocks')->get();

        $range = range(1, count(DB::table('items')->get()));
        shuffle($range);

        $recomID1 = $range[0];
        $recomID2 = $range[1];
        $recomID3 = $range[2];
        $recomID4 = $range[3];

        $currid = array_search('green', $range);
        unset($range[$currid]);


        $recomItems = DB::table('items')
            ->where('id', $recomID1)
            ->orWhere('id', $recomID2)
            ->orWhere('id', $recomID3)
            ->orWhere('id', $recomID4)
            ->get();

        $recomItems = DB::table('items')
            ->select(
                'items.id',
                'items.nama',
                'items.price',
                'items.sold',
                'items.category',
                DB::raw('(SELECT item_pictures.picture FROM `item_pictures` item_pictures WHERE item_pictures.id_item = items.id LIMIT 1) as item_picture')
            )
            ->where('id', $recomID1)
            ->orWhere('id', $recomID2)
            ->orWhere('id', $recomID3)
            ->orWhere('id', $recomID4)
            ->get();

        return view('product-details', [
            'pagetitle' => 'Product Details',
            'items' => $items,
            'itemPictures' => $pics,
            'itemSizeStocks' => $sizestock,
            'userid' => Auth::user()->id,
            'recomItems' => $recomItems,
            'itemPicturesAlls' => item_picture::all(),
            'itemSizeStocksAlls' => $itemSizeStocks,
        ]);
    }

    public function login()
    {
        return view('login', [
            'pagetitle' => 'Login'
        ]);
    }

    public function makeaddress()
    {
        return view('makeaddress', [
            'pagetitle' => 'makeaddress',
        ]);
    }

    public function signin()
    {
        return view('signin', [
            'pagetitle' => 'Sign In'
        ]);
    }

    public function wishlist()
    {
        return view('wishlist', [
            'pagetitle' => 'Wishlist'
        ]);
    }

    public function cart()
    {
        $user = Auth::user();
        $userId = $user->id;
        $shoppingcarts = DB::table('items')
            ->select('shopping_carts.id', 'items.id as items_id', 'items.nama', 'items.price', 'shopping_carts.jumlah', DB::raw('(SELECT item_pictures.picture FROM `item_pictures` item_pictures WHERE item_pictures.id_item = items.id LIMIT 1) as picture'))
            ->join('shopping_carts', 'shopping_carts.item_id', '=', 'items.id')
            ->whereIn('items.id', function ($query) use ($userId) {
                $query
                    ->select('item_id')
                    ->from('shopping_carts')
                    ->where('user_id', '=', $userId);
            })
            ->where('shopping_carts.user_id', '=', $userId)
            ->get();

        $total = 0;
        return view('cart', [
            'pagetitle' => 'Cart',
            'shoppingcarts' => $shoppingcarts,
            'total' => $total,
        ]);
    }

    public function aboutus()
    {
        return view('aboutus', [
            'pagetitle' => 'About Us'
        ]);
    }

    public function dashboard()
    {
        $user = Auth::user();
        $id = $user['id'];


        $ChangeActiveTabToOngoing = false;


        if (isset($_GET['userconfirmed'])) {
            $order = order::findOrFail($_GET['id']);
            $order->update([
                'usercompleted' => 1,
            ]);
            $ChangeActiveTabToOngoing = true;
        }

        $completedorders = DB::table('orders')
            ->where('user_id', '=', $id)
            ->Where('usercompleted', '=', true)
            ->get();

        $statusorder = DB::table('orders')
            ->where('user_id', '=', $id)->exists();

        $status = DB::table('shipping_addresses')
            ->where('user_id', '=', $id)->exists();

        $shipping_addresses = DB::table('shipping_addresses')
            ->where('user_id', '=', $id)
            ->get();

        $pendingorders = DB::table('orders')
            ->where('user_id', '=', $id)
            ->where('status', '=', 'pending')
            ->get();

        $ongoingorders = DB::table('orders')
            ->where('user_id', '=', $id)
            ->where('status', '=', 'ongoing')
            ->Where('usercompleted', '=', 0)
            ->get();

        return view('dashboard', [
            'pagetitle' => 'Dashboard',
            "shipping_addresses" => $shipping_addresses,
            'status' => $status,
            'statusorder' => $statusorder,
            'pendingorders' => $pendingorders,
            'ongoingorders' => $ongoingorders,
            'completedorders' => $completedorders,
            'ChangeActiveTabToOngoing' => $ChangeActiveTabToOngoing,
        ]);
    }

    public function adminDashboard()
    {
        return view('admin-dashboard', [
            'pagetitle' => 'Admin Dashboard'
        ]);
    }

    public function adminProfile()
    {
        return view('admin-profile', [
            'pagetitle' => 'Admin Profile',
        ]);
    }

    public function adminItem_requests()
    {
        $item_requests = DB::table('item_requests')
            ->get();
        return view('admin-item_requests', [
            'pagetitle' => 'Admin Item Requests',
            "item_requests" => $item_requests
        ]);
    }

    public function adminItem()
    {
        $items = DB::table('items')
            ->get();
        return view('admin-items', [
            'pagetitle' => 'Admin Item',
            "items" => $items,
            'itemPictures' => item_picture::all(),
        ]);
    }

    public function adminBilling_options()
    {
        return view('admin-billing_options', [
            'pagetitle' => 'Admin Billing',
            'paymentTypes' => Payment_types::all(),
        ]);
    }

    public function adminManage_account()
    {
        return view('admin-manage_account', [
            'pagetitle' => 'Admin Manage Accounts',
            'user' => User::all()
        ]);
    }

    public function adminOrders()
    {
        return view('admin-orders', [
            'pagetitle' => 'Admin Orders',
            'orders' => order::all()
        ]);
    }

    public function adminOrdersdelete()
    {
        if (isset($_POST['delpending'])) {

            order::where('id', $_POST['id'])->delete();
            return redirect("admin-orders");
        }
    }

    public function adminOrdersUpdate()
    {
        $time = Carbon::now()->toDateTimeString();

        if (isset($_POST['tickpending'])) {
            $order = order::findOrFail($_POST['id']);

            $order->update([
                'status' => 'ongoing',
                'ship_date' => $time,
            ]);

            $tempID = $order->id;
            $detilOrderMinusStock = detil_order::where('id_order', $tempID)->get();

            foreach ($detilOrderMinusStock as $d) {
                $stockuntukDikurangi = $d->total_items;
                $imtemsizeObj = item_size_stock::where('id', $d->id_stocksize)->get();
                foreach ($imtemsizeObj as $s) {
                    $stocks = $s->stock;
                }

                foreach ($imtemsizeObj as $s) {
                    $s->update([
                        'stock' => $stocks - $stockuntukDikurangi
                    ]);
                }
            }

            return redirect("admin-orders");
        }

        if (isset($_POST['tickongoing'])) {
            $order = order::findOrFail($_POST['id']);

            $order->update([
                'admincompleted' => 1,
            ]);

            $order = order::findOrFail($_POST['id']);

            if ($order->admincompleted && $order->usercompleted) {
                $order->update([
                    'status' => "completed",
                ]);
            }

            return redirect("admin-orders");
        }

        if (isset($_POST['delongoing'])) {
            $order = order::findOrFail($_POST['id']);

            $order->update([
                'admincompleted' => 0,
            ]);

            return redirect("admin-orders");
        }

        if (isset($_POST['usercancel'])) {

            order::where('id', $_POST['id'])->delete();
            return redirect("dashboard");
        }
    }


    public function OrderaddDB(Request $request)
    {
        $time = Carbon::now()->toDateTimeString();

        $orderId = order::create([
            'user_id' => $request->Id,
            'postal_code' => $request->PostalCode,
            'shipment_address' => $request->StreetAddress,
            "city" => $request->City,
            "contact" => $request->Phone,
            'proof_of_payment' => $request->file('picture')->store('payment_confirm', 'public'),
            "notes" => $request->StreetAddressNotes,
            "status" => 'pending',
            'order_date' => $time,
        ]);

        $ShoppingCartLists = DB::table('item_size_stocks as iss')
            ->select('nameTotal.nama', 'nameTotal.jumlah', 'iss.size', 'nameTotal.price', 'nameTotal.item_size_stock_id')
            ->join(DB::raw('(SELECT shopping_carts.jumlah*items.price as price, items.nama, items.id, shopping_carts.jumlah, shopping_carts.item_size_stock_id, shopping_carts.user_id FROM shopping_carts, items WHERE items.id = shopping_carts.item_id) as nameTotal'), function ($join) {
                $join->on('iss.id', '=', 'nameTotal.item_size_stock_id');
            })
            ->where('nameTotal.user_id', $request->Id)
            ->get();

        foreach ($ShoppingCartLists as $ShoppingCartList) {
            detil_order::create([
                'id_order' => $orderId->id,
                'id_stocksize' => $ShoppingCartList->item_size_stock_id,
                'transaction_time' => $time,
                'price_bought' => $ShoppingCartList->price,
                'total_items' => $ShoppingCartList->jumlah,
                'total_price' => $ShoppingCartList->jumlah * $ShoppingCartList->price,
            ]);
        }

        // delete shopping cart becuz already order
        shopping_cart::where('user_id', $request->Id)->delete();


        return redirect('/dashboard');
    }

    public function checkout()
    {
        $userId = Auth::user()->id;
        // $billingDetails = DB::table('users as user')
        //     ->select('user.name', 'new.shipment_address', 'new.notes', 'new.city', 'new.postal_code', 'new.contact', 'user.email')
        //     ->join(DB::raw('(SELECT * FROM shipping_addresses WHERE user_id = ' . $user . ') as new', [$user]), function ($join) {
        //         $join->on('new.user_id', '=', 'user.id');
        //     })
        //     ->where('user.id', '=', $user)
        //     ->first();

        // $billingDetailAlls = DB::table('users as user')
        //     ->select('user.name', 'new.shipment_address', 'new.notes', 'new.city', 'new.postal_code', 'new.contact', 'user.email', 'new.id')
        //     ->join(DB::raw('(SELECT * FROM shipping_addresses WHERE user_id = ' . $user . ') as new', [$user]), function ($join) {
        //         $join->on('new.user_id', '=', 'user.id');
        //     })
        //     ->where('user.id', '=', $user)
        //     ->get();


        $ShoppingCartLists = DB::table('item_size_stocks as iss')
            ->select('nameTotal.nama', 'nameTotal.jumlah', 'iss.size', 'nameTotal.price', 'nameTotal.item_size_stock_id')
            ->join(DB::raw('(SELECT shopping_carts.jumlah*items.price as price, items.nama, items.id, shopping_carts.jumlah, shopping_carts.item_size_stock_id, shopping_carts.user_id FROM shopping_carts, items WHERE items.id = shopping_carts.item_id) as nameTotal'), function ($join) {
                $join->on('iss.id', '=', 'nameTotal.item_size_stock_id');
            })
            ->where('nameTotal.user_id', $userId)
            ->get();



        $TotalPrices = DB::table(DB::raw('(SELECT shopping_carts.jumlah*items.price as price, items.nama, shopping_carts.user_id FROM shopping_carts, items WHERE items.id = shopping_carts.item_id) total'))
            ->select(DB::raw('SUM(total.price) as Total'))
            ->where('total.user_id', $userId)
            ->first()
            ->Total;

        $shippingAddressesEXIST = DB::table('shipping_addresses')
            ->where('user_id', $userId)
            ->exists();

        $shippingAddresses = DB::table('shipping_addresses')
            ->where('user_id', $userId)
            ->get();

        $exists = DB::table('item_size_stocks as iss')
            ->select('nameTotal.nama', 'nameTotal.jumlah', 'iss.size', 'nameTotal.price', 'nameTotal.item_size_stock_id')
            ->join(DB::raw('(SELECT shopping_carts.jumlah*items.price as price, items.nama, items.id, shopping_carts.jumlah, shopping_carts.item_size_stock_id, shopping_carts.user_id FROM shopping_carts, items WHERE items.id = shopping_carts.item_id) as nameTotal'), function ($join) {
                $join->on('iss.id', '=', 'nameTotal.item_size_stock_id');
            })
            ->where('nameTotal.user_id', $userId)
            ->exists();

        $shippingAddressesSELECTED = false;
        if (isset($_GET['a'])) {
            $shippingAddressesSELECTED = true;

            $shippingAddressId = $_GET['chooseLocation'];

            $selectedinfo = DB::table('users as user')
                ->select('user.name', 'new.shipment_address', 'new.notes', 'new.city', 'new.postal_code', 'new.contact', 'user.email', 'new.id')
                ->join(DB::raw('(SELECT * FROM shipping_addresses WHERE user_id = ' . $userId . ') as new'), function ($join) {
                    $join->on('new.user_id', '=', 'user.id');
                })
                ->where('user.id', '=', $userId)
                ->where('new.id', '=', $shippingAddressId)
                ->get();


            return view('checkout', [
                'pagetitle' => 'Checkout',
                'selectedforms' => $selectedinfo,
                'TotalPrice' => $TotalPrices,
                'ShoppingCartLists' => $ShoppingCartLists,
                'paymentTypes' => Payment_types::all(),
                'exists' => $exists,
                'shippingAddressesEXIST' => $shippingAddressesEXIST,
                'shippingaddresses' => $shippingAddresses,
                'shippingAddressesSELECTED' => $shippingAddressesSELECTED
            ]);
        } else {
            return view('checkout', [
                'pagetitle' => 'Checkout',
                'shippingaddresses' => $shippingAddresses,
                'TotalPrice' => $TotalPrices,
                'ShoppingCartLists' => $ShoppingCartLists,
                'paymentTypes' => Payment_types::all(),
                'exists' => $exists,
                'shippingAddressesEXIST' => $shippingAddressesEXIST,
                'shippingAddressesSELECTED' => $shippingAddressesSELECTED
            ]);
        }
    }
}
