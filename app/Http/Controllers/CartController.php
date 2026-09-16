<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id(),
        ]);

        $cart->load('items.book');

        return view('cart', compact('cart'));
    }

    public function add(Request $request, Book $book)
    {
        $request->validate([
            'quantity' => 'nullable|integer|min:1',
        ]);

        $quantity = $request->quantity ?? 1;

        if ($book->stock < $quantity) {
            return back()->with('error', 'Stok buku tidak mencukupi.');
        }

        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id(),
        ]);

        $item = CartItem::where('cart_id', $cart->id)
            ->where('book_id', $book->id)
            ->first();

        if ($item) {
            $newQuantity = $item->quantity + $quantity;

            if ($newQuantity > $book->stock) {
                return back()->with('error', 'Jumlah melebihi stok yang tersedia.');
            }

            $item->update([
                'quantity' => $newQuantity,
            ]);
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'book_id' => $book->id,
                'quantity' => $quantity,
            ]);
        }

        return back()->with('success', 'Buku berhasil ditambahkan ke keranjang.');
    }

    public function update(Request $request, CartItem $item)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        if ($item->cart->user_id !== auth()->id()) {
            abort(403);
        }

        if ($request->quantity > $item->book->stock) {
            return back()->with('error', 'Jumlah melebihi stok yang tersedia.');
        }

        $item->update([
            'quantity' => $request->quantity,
        ]);

        return back()->with('success', 'Keranjang berhasil diperbarui.');
    }

    public function remove(CartItem $item)
    {
        if ($item->cart->user_id !== auth()->id()) {
            abort(403);
        }

        $item->delete();

        return back()->with('success', 'Buku dihapus dari keranjang.');
    }
}