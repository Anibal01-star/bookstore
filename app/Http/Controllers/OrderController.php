<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = Cart::where('user_id', auth()->id())
            ->with('items.book')
            ->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()
                ->route('cart')
                ->with('error', 'Keranjang masih kosong.');
        }

        foreach ($cart->items as $item) {
            if ($item->quantity > $item->book->stock) {
                return redirect()
                    ->route('cart')
                    ->with(
                        'error',
                        'Stok buku "' . $item->book->title . '" tidak mencukupi.'
                    );
            }
        }

        $total = $cart->items->sum(function ($item) {
            return $item->book->price * $item->quantity;
        });

        return view('checkout', compact('cart', 'total'));
    }

    public function store()
    {
        $cart = Cart::where('user_id', auth()->id())
            ->with('items.book')
            ->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()
                ->route('cart')
                ->with('error', 'Keranjang masih kosong.');
        }

        try {
            $order = DB::transaction(function () use ($cart) {

                $total = $cart->items->sum(function ($item) {
                    return $item->book->price * $item->quantity;
                });

                $order = Order::create([
                    'user_id' => auth()->id(),
                    'total_price' => $total,
                    'status' => 'pending',
                ]);

                foreach ($cart->items as $item) {

                    if ($item->quantity > $item->book->stock) {
                        throw new \Exception(
                            'Stok buku "' . $item->book->title . '" tidak mencukupi.'
                        );
                    }

                    $subtotal = $item->book->price * $item->quantity;

                    OrderItem::create([
                        'order_id' => $order->id,
                        'book_id' => $item->book->id,
                        'quantity' => $item->quantity,
                        'price' => $item->book->price,
                        'subtotal' => $subtotal,
                    ]);

                    $item->book->decrement('stock', $item->quantity);
                }

                $cart->items()->delete();

                return $order;
            });

            return redirect()
                ->route('orders.show', $order)
                ->with('success', 'Pesanan berhasil dibuat.');
        } catch (\Exception $e) {
            return redirect()
                ->route('cart')
                ->with('error', $e->getMessage());
        }
    }

    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
            ->with('items.book')
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        $order->load('items.book');

        return view('orders.show', compact('order'));
    }
}