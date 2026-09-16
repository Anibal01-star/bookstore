<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $totalCategories = Category::count();
        $totalUsers = User::where('role', 'user')->count();
        $totalMessages = ContactMessage::count();
        $totalOrders = Order::count();

        return view('admin.dashboard', compact(
            'totalBooks',
            'totalCategories',
            'totalUsers',
            'totalMessages',
            'totalOrders'
        ));
    }

    public function users()
    {
        $users = User::where('role', 'user')
            ->latest()
            ->get();

        return view('admin.users', compact('users'));
    }

    public function messages()
    {
        $messages = ContactMessage::latest()->get();

        return view('admin.messages', compact('messages'));
    }

    public function orders()
    {
        $orders = Order::with('user', 'items.book')
            ->latest()
            ->get();

        return view('admin.orders', compact('orders'));
    }

    public function updateOrderStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        $order->update([
            'status' => $validated['status'],
        ]);

        return redirect()
            ->route('admin.orders')
            ->with('success', 'Status pesanan berhasil diperbarui.');
    }
}