<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->withCount('items')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.orders', compact('orders'));
    }

    public function show($id)
    {
        // Assuming there is already a view for showing a single order, or we might need to create/update it later.
        // The current route definition uses a closure for 'show', I should probably replace that too eventually,
        // but for now I'll stick to the plan which was focused on the index page.
        // However, looking at web.php, typical resource controller structure suggests I might handle 'show' here too.
        // But the user only asked to "make this page fully dynamic" referring to /admin/orders.
        // I'll keep it simple for now and just handle index, or if I replace the route, I might break 'show' if I'm not careful.
        // Let's check web.php again.
        // Route::get('/admin/orders/{id}', function ($id) { ... })->name('admin.orders.show');
        // valid 'show' logic would be:
        $order = Order::with(['items.product', 'items.bundle', 'user'])->findOrFail($id); // using ID directly if it's the ID, or order_number if string
        // The existing closure uses $id. Let's assume database ID.
        // Actually, let's just stick to 'index' for this file creation as per plan, 
        // BUT I'll include 'show' to be future-proof/cleaner if I update the route to resource or individual methods.
        
        return view('admin.orders.show', compact('order'));
    }
}
