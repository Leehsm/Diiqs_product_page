<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductDetail;
use App\Models\Slider;
use App\Models\Combo;
use Session;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index(Request $req){

        
        $product = Product::where('category','normal')->get();
        $slider = Slider::all();
        $combo = Product::where('category','combo')->get();
        $detail_product = DB::table('product_details')->get();
        
        return view('frontend.menu.main',['product'=>$product, 'product_detail'=>$detail_product, 'slider'=>$slider, 'combo'=>$combo]);
    }

    public function detail($id){
        
        $product = Product::find($id);
        $relatedProduct = Product::all();
        return view('frontend.menu.productdetails',['product'=>$product],['related'=>$relatedProduct]);
    }

    public function addToCart(Request $req){

        if($req->session()->has('user')){

            $cart = new Cart;
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$req->product_id;
            $cart->cart_quantity=$req->quantity;
            $cart->save();
            return redirect('/');

        }
        else{
            return redirect('/login');
        }
    }

    public static function cartItem(){

        $userId = Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }

    public function cartlist(){

        $userId = Session::get('user')['id'];
        $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id','cart.*')
        ->get();
        $total= DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->sum('price');

        return view('frontend.menu.cartlist',['products'=>$products],['total'=>$total]);
        // return $products;
    }

    public function cartDelete($id){
        Cart::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Cart Removed Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    }

    public function checkout(){

        $userId = Session::get('user')['id'];
        $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id','cart.*')
        ->get();
        $total= DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->sum('price');

        //kena tukar cara kira total darab dgn quantity

        return view('frontend.menu.checkout',['products'=>$products],['total'=>$total]);

    }

    // public function checkoutDetail(Request $req){
	// 	$sabahsarawak = 15;
	// 	$semenanjung = 10;
	// 	// dd($req->all());
		
	// 	$name = strtoupper($req->name);
    // 	$email = strtoupper($req->email);
    // 	$phone = $req->phone;
    // 	$address = strtoupper($req->address);
    // 	$postcode = strtoupper($req->postcode);
    // 	$city = strtoupper($req->city);
    // 	$state = strtoupper($req->state);
    // 	$country = "MALAYSIA";
    // 	$notes = $req->notes;
    // 	$subTotal = $req->subTotal;

	// 	if($state == 'SABAH' || $state == 'SARAWAK' || $state == 'LABUAN')
    // 		$finalTotal = $req->subTotal + $sabahsarawak;
	// 	else
	// 		$finalTotal = $req->subTotal + $semenanjung;

    //     $userId = Session::get('user')['id'];
    //     $products = DB::table('cart')
    //     ->join('products','cart.product_id','=','products.id')
    //     ->where('cart.user_id',$userId)
    //     ->select('products.*','cart.id as cart_id','cart.*')
    //     ->get();
    //     $total= DB::table('cart')
    //     ->join('products','cart.product_id','=','products.id')
    //     ->where('cart.user_id',$userId)
    //     ->sum('price');

    //     //kena tukar cara kira total darab dgn quantity

    //     return view('frontend.menu.orderSummary',compact('name', 'email', 'phone', 'address', 'postcode', 'city', 'state', 'country', 'notes', 'finalTotal', 'subTotal', 'sabahsarawak', 'semenanjung'),['products'=>$products],['total'=>$total]);

    // }// end mehtod.

    // public function payment(Request $req){

    //     $userId = Session::get('user')['id'];
    //     $products = DB::table('cart')
    //     ->join('products','cart.product_id','=','products.id')
    //     ->where('cart.user_id',$userId)
    //     ->select('products.*','cart.id as cart_id','cart.*')
    //     ->get();
    //     $total_amount= DB::table('cart')
    //     ->join('products','cart.product_id','=','products.id')
    //     ->where('cart.user_id',$userId)
    //     ->sum('price');

    //     $billExtRef = 'RefNO'.mt_rand(10000000,99999999);
    //     // return $total_amount = (int) $req->total_amount;   

    //     $some_data = array(
    //         'userSecretKey' => 'zo1ckaem-awxf-uz7y-3ekx-pcv6nvn014ai',
    //         'categoryCode' => '4zhu2wr1',
    //         'billName' => 'DiiqsBeauty.com',
    //         'billDescription' => 'Payment for purchased item from  website',
    //         'billPriceSetting' => 1,
    //         'billPayorInfo' => 1,
    //         'billAmount' => $total_amount*100,
    //         'billReturnUrl' => route('payment-status', $billExtRef),
    //         // 'billCallbackUrl' => route('payment-callback'),
    //         'billExternalReferenceNo' => $billExtRef,
    //         'billTo' => $req->name,
    //         'billEmail' => $req->email,
    //         'billPhone' => $req->phone,
    //         'billPaymentChannel'=>'2',
    //         'billContentEmail'=>'Thank you for purchasing our product!',
    //         'billChargeToCustomer'=>2,
    //     );  

    //     $order_id = Order::insertGetId([
    //         'billNo' => $billExtRef,
    //         'user_id' => Session::get('user')['id'],
    //         'city' => $req->city,
    //         'state' => $req->state,
    //         'country' => $req->country,
    //         'name' => $req->name,
    //         'email' => $req->email,
    //         'phone' => $req->phone,
    //         'address' => $req->address,
    //         'postcode' => $req->postcode,
    //         'note' => $req->notes,
    
    //         'payment_type' => $req->paymentType,
    //         'payment_method' => $req->paymentType,
    //         'payment_status' => '',
    //         'transaction_id' => 'TRANID' .request('billcode'), //TRANSACTIONID
    //         'currency' => 'myr',
    //         'amount' => $total_amount,
    //         'order_number' => 'ON' .request('billcode'), //ORDERNUMBER

    //         'holdername' => $req->name,
    //         'bankname' => 'FPX Transfer',
    
    //         'invoice_no' => 'INV' .request('billcode'), //INVOICENUMBER
    //         'order_date' => Carbon::now()->format('d F Y'),
    //         'order_month' => Carbon::now()->format('F'),
    //         'order_year' => Carbon::now()->format('Y'),
    //         'status' => 'Pending',
    //         'created_at' => Carbon::now(),	
    //     ]);
    //     // dd($some_data);

    //     $arrayCount = count($products);

    //     foreach($products as $product){
    //         OrderItem::insert([
    //             'order_id' => $order_id, 
    //             'product_id' => $product->product_id,
    //             'user_id' => $userId,
    //             'RefNo' => $billExtRef,
    //             'created_at' => Carbon::now(),
    //         ]);
    //     }

    //     Cart::where('user_id',$userId)->delete();

    //     // return OrderItem::all();

    //     $url = 'https://dev.toyyibpay.com/index.php/api/createBill';
    //     $response = Http::asForm()->post($url, $some_data);
    //     $billCode = $response[0]['BillCode'];
    //     return redirect('https://dev.toyyibpay.com/' . $billCode);
    // }

    // public function paymentStatus(Request $request){
    //     $response = request()->all();
    //     $userId = Session::get('user')['id'];
    //     // dd($response);

    //     //if payment success update transaction id, order num, inv num
    //     if(request('status_id') == 1){
    //         Order::where('billNo', request()->order_id)->update([
    //             'transaction_id' => 'TRANID' .request()->transaction_id, //SAHIRASHOPTRANSACTIONID
    //             'order_number' => 'ON' .request()->order_id, //SAHIRASHOPOEDERNUMBER
    //             'invoice_no' => 'IN' .request()->billcode, //SAHIRASHOPINVOICENUMBER
    //             'payment_status' => 'Successfull'
    //              ]);

    //         // collect data from db before sending email
    //         $invoice = Order::where('billNo', request()->order_id)->get("invoice_no");
    //         $total_amount = Order::where('billNo', request()->order_id)->get("amount");
    //         $name = Order::where('billNo', request()->order_id)->get("name");
    //         $email = Order::where('billNo', request()->order_id)->get("email");
            
    //         $data = [
    //             'invoice_no' => $invoice,
    //             'amount' => $total_amount,
    //             'name' => $name,
    //             'email' => $email,
    //         ];

    //         //send Email
    //         // Mail::to($email)->send(new OrderMail($data));

    //         $notification = array(
    //             'message' => 'Your Order Place Successfully',
    //             'alert-type' => 'success'
    //         );

    //     }else{
    //         Order::where('billExtNo', request()->order_id)->update([
    //             'transaction_id' => 'TRANID' .request()->transaction_id, //SAHIRASHOPTRANSACTIONID
    //             'order_number' => 'ON' .request()->order_id, //SAHIRASHOPOEDERNUMBER
    //             'invoice_no' => 'IN' .request()->billcode, //SAHIRASHOPINVOICENUMBER
    //             'payment_status' => 'CANCEL / UNSUCCESSFUL',
    //             'status' => 'CANCEL / UNSUCCESSFUL'
    //                 ]);

    //         // OrderItem::where('buyRefNo', request()->order_id)->delete();

    //         $notification = array(
    //             'message' => 'Your Order Unsuccessful',
    //             'alert-type' => 'warning'
    //         );
    //     }

    //     Cart::where('user_id',$userId)->delete();
    //     // return $response;
    //     return view('frontend.menu.orders')->with($notification);
    // }

    // public function callBack(){
    //     $response = request()->all(['refno', 'status', 'reason', 'billcode', 'status_id', 'order_id']);
    //     Log::info($response);
            
    //     return view('frontend.menu.orders');
    // }

    // public function orderHistory(){

    //     $userId = Session::get('user')['id'];
    //     $order = Order::where('user_id',$userId)->get();
    //     return view('frontend.menu.orders',['order'=>$order]);
    // }

    // public function feedback(Request $req){

    //     return $req->feedback_name;
    //     $comment = $req->feedback_comment;
    //     $file = $req->feedback_file;


    //     $notification = array(
	// 		'message' => 'Cart Removed Successfully',
	// 		'alert-type' => 'info'
	// 	);

	// 	return redirect()->back()->with($notification);
    // }
}




// $some_data = array(
//     'billCode' => request()->billcode,
//     'billpaymentStatus' => request()->status_id,            
// );

// $url = 'https://dev.toyyibpay.com/index.php/api/getBillTransactions';
// $response = Http::asForm()->post($url, $some_data);
// $billCode = request()->billcode;
// return redirect('https://dev.toyyibpay.com/' . $billCode);
