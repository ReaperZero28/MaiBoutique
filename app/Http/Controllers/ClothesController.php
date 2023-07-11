<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Clothes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClothesController extends Controller
{
    public function viewAllClothes(){
        $clothes = Clothes::orderBy('created_at', 'desc')->orderBy('id', 'desc')->paginate(8);

        return view('home', [
            'clothes' => $clothes,
        ]);
    }

    public function viewClothes($id){
        $clothes = Clothes::find($id);

        return view('product', [
            'clothes' => $clothes,
        ]);
    }

    public function addToCart($id, Request $req){
        $clothes = Clothes::find($id);
        $cart = Cart::firstWhere('userId', Auth::user()->id);

        $cartDetail = CartDetail::firstWhere('clothesId', $clothes->id);

        if($cartDetail != NULL){
            $cartDetail->quantity += $req->quantity;
            $cartDetail->save();

            $clothes->stock -= $req->quantity;
            $clothes->save();

            return redirect()->back()->with('homeSession', 'Item already exists in cart. Quantity was updated.');
        }

        $newCart = CartDetail::create([
            'cartId' => $cart->id,
            'clothesId' => $clothes->id,
            'quantity' => $req->quantity,
        ]);

        $tempStock = $clothes->stock;
        $clothes->stock = $tempStock - $req->quantity;
        $clothes->save();

        return redirect()->back()->with('homeSession', 'Item was successfully added to cart.');
    }

    public function removeCart($id){
        $cartDetail = CartDetail::find($id);
        $clothes = Clothes::find($cartDetail->clothesId);

        $clothes->stock += $cartDetail->quantity;
        $clothes->save();

        $cartDetail->delete();

        return redirect()->back()->with('homeSession', 'Item was successfully removed from cart.');
    }

    public function addClothesForm(){
        return view('addItem');
    }

    public function addClothes(Request $req){
        $req->validate([
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg'],
            'name' => ['required', 'unique:clothes,name', 'min:5', 'max:20'],
            'desc' => ['required', 'min:5'],
            'price' => ['required', 'integer', 'min:1000'],
            'stock' => ['required', 'min:1']
        ]);

        $image = $req->image;
        $extension = $req->file('image')->extension();

        Storage::putFileAs('/public/images', $image, $req->name.'.'.$extension);

        $clothes = Clothes::create([
            'name' => $req->name,
            'desc' => $req->desc,
            'price' => $req->price,
            'stock' => $req->stock,
            'image' => 'storage/images/'.$req->name.'.'.$extension,
        ]);

        return redirect('/home')->with('homeSession', 'Item was successfully added.');
    }

    public function restockClothes(Clothes $id, Request $req){
        $id->stock += $req->quantity;
        $id->save();

        return redirect()->back()->with('homeSession', 'Item was successfully restocked.');
    }

    public function removeClothes(Clothes $id){
        unlink($id->image);
        $id->delete();

        return redirect('/home')->with('homeSession', 'Item was successfully deleted.');
    }

    public function searchForm(){
        $clothes = Clothes::orderBy('id', 'desc')->paginate(8);

        return view('search', [
            'query' => $clothes,
        ]);
    }

    public function search(Request $req){
        $query = Clothes::where('name', 'like', '%'.$req->search.'%')->orWhere('desc', 'like', '%'.$req->search.'%')->orderBy('created_at', 'desc')->orderBy('id', 'desc')->paginate(8);

        $query->appends(array('search'=>$req->search));

        return view('searchResult', [
            'input' => $req->search,
            'query' => $query,
        ]);
    }
}
