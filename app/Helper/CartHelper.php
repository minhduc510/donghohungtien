<?php

namespace App\Helper;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Session;
class CartHelper
{
    public $cartItems = [];
    public $totalQuantity = 0;
    public $totalPrice = 0;
    public $totalOldPrice = 0;

    public function __construct()
    {
        // session()->flush();

        $this->cartItems = session()->has('cart') ? session('cart') : [];
        //   $this->cartItems = Session::has('cart') ? Session::session('cart') : [];
        $this->totalQuantity = $this->getTotalQuantity();
        $this->totalPrice = $this->getTotalPrice();
        $this->totalOldPrice = $this->getTotalOldPrice();
    }
    public function add($product, $quantity)
    {
        $option_id = $product->option_id ?? '';
        if (!$product->option_id) {
            $option_id = 0;
        }

        if (isset($this->cartItems[$product->id . '-' . $option_id])) {
            $this->cartItems[$product->id . '-' . $option_id]['quantity'] +=  $quantity;
            $this->cartItems[$product->id . '-' . $option_id]['totalPriceOneItem'] = $this->getTotalPriceOneItem($this->cartItems[$product->id . '-' . $option_id]);
            $this->cartItems[$product->id . '-' . $option_id]['totalOldPriceOneItem'] = $this->getTotalOldPriceOneItem($this->cartItems[$product->id . '-' . $option_id]);
        } else {

            $cartItem = [
                'id' => $product->id,
                'option_id' => $product->option_id,
                'price' => $product->price * ((100 - $product->old_price) / 100),
                'slug' => $product->slug_full,
                'masp' => $product->masp,
                'sale' => $product->sale,
                'size' => $product->size,
                'name' => $product->name,
                'avatar_path' => $product->avatar_path,
                'quantity' => $quantity,
            ];
            $cartItem['totalPriceOneItem'] = $this->getTotalPriceOneItem($cartItem);
            $cartItem['totalOldPriceOneItem'] = $this->getTotalOldPriceOneItem($cartItem);
            $this->cartItems[$product->id . '-' . $option_id] = $cartItem;
        }
        session(['cart' => $this->cartItems]);
    }
    public function remove($id, $option_id = 0)
    {
        if (isset($this->cartItems[$id . '-' . $option_id])) {
            unset($this->cartItems[$id . '-' . $option_id]);
        }
        // Session::put('cart' , $this->cartItems);
        session(['cart' => $this->cartItems]);
    }
    public function update($id, $quantity, $option_id = 0)
    {
        if (isset($this->cartItems[$id . '-' . $option_id])) {
            $this->cartItems[$id . '-' . $option_id]['quantity'] = $quantity;
            $this->cartItems[$id . '-' . $option_id]['totalPriceOneItem'] = $this->getTotalPriceOneItem($this->cartItems[$id . '-' . $option_id]);
            $this->cartItems[$id . '-' . $option_id]['totalOldPriceOneItem'] = $this->getTotalOldPriceOneItem($this->cartItems[$id . '-' . $option_id]);
        }
        //  Session::put('cart' , $this->cartItems);
        session(['cart' => $this->cartItems]);
    }
    public function clear()
    {
        $this->cartItems = [];
        session()->forget('cart');
    }
    public function getTotalPriceOneItem($item)
    {
        $t = 0;
        $t +=  $item['price'] * (100 - $item['sale']) / 100 * $item['quantity'];
        return $t;
    }
    public function getTotalOldPriceOneItem($item)
    {
        $t = 0;
        $t +=  $item['price']  * $item['quantity'];
        return $t;
    }
    public function getTotalPrice()
    {
        $tP = 0;
        if ($this->cartItems) {
            foreach ($this->cartItems as $cartItem) {
                $tP +=  $cartItem['price'] * $cartItem['quantity'];
            }
        }
        return $tP;
    }

    public function getTotalOldPrice()
    {
        $tP = 0;
        if ($this->cartItems) {
            foreach ($this->cartItems as $cartItem) {
                $tP +=  $cartItem['price']  * $cartItem['quantity'];
            }
        }
        return $tP;
    }

    public function getTotalQuantity()
    {
        $tQ = 0;
        foreach ($this->cartItems as $cartItem) {
            $tQ += $cartItem['quantity'];
        }
        return $tQ;
    }
}
