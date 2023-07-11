<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Clothes;
use App\Models\History;
use App\Models\HistoryDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function viewCart(){
        $userId = Auth::user()->id;
        $cart = Cart::firstWhere('userId', $userId);

        $cartPrice = 0;
        $cartQuantity = 0;
        foreach($cart->cart_details as $data){
            $cartPrice += $data->clothes->price * $data->quantity;
            $cartQuantity += $data->quantity;
        }

        return view('cart', [
            'cart' => $cart,
            'cartPrice' => $cartPrice,
            'cartQuantity' => $cartQuantity,
        ]);
    }

    public function editCartForm($id){
        $cart = CartDetail::find($id);

        return view('editCart', [
            'cart' => $cart,
        ]);
    }

    public function editCart($id, Request $req){
        $cartDetail = CartDetail::find($id);
        $cart = Cart::find($cartDetail->cartId);
        $clothes = Clothes::find($cartDetail->clothesId);

        $tempStock = $clothes->stock + $cartDetail->quantity;

        $cartDetail->quantity = $req->quantity;
        $cartDetail->save();

        $finalStock = $tempStock - $cartDetail->quantity;
        $clothes->stock = $finalStock;
        $clothes->save();

        return redirect('/cart')->with('homeSession', 'Cart was successfully updated.');
    }

    public function checkout(){
        $cart = Cart::firstWhere('userId', Auth::user()->id);

        // dd($cart);

        $cartPrice = 0;
        $cartQuantity = 0;
        foreach($cart->cart_details as $data){
            $cartPrice += $data->clothes->price * $data->quantity;
            $cartQuantity += $data->quantity;
        }

        $newHistory = History::create([
            'userId' => $cart->userId,
            'status' => 'success',
        ]);

        foreach($cart->cart_details as $data){
            $newHistoryDetail = HistoryDetail::create([
                'historyId' => $newHistory->id,
                'clothesId' => $data->clothesId,
                'quantity' => $data->quantity,
            ]);

            $data->delete();
        }

        return redirect('/history')->with('homeSession', 'Checkout is successful.');
    }

    public function viewHistory(){
        $history = History::where('userId', Auth::user()->id)->get();

        return view('history', [
            'history' => $history,
        ]);
    }
}
