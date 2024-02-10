<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Purchase;
use App\Models\Stock;
use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Add the methods you need here

    public function index()
    {
        $orders = Order::all();
        return view('pages.orders.index', compact('orders'));
    }

    public function create()
    {
        // for creating a new order
        $suppliers = Supplier::all();
        $units = Unit::all();
        $products = Product::all();
        $stocks = Stock::all();
        $customers = Customer::all();

        // get the latest purchase number
        $last_order = Order::orderBy('created_at', 'desc')->first();
        $order_no = 'ON-' . date('Ymd') . '-' . sprintf('%03d', $last_order ? substr($last_order->order_no, -3) + 1 : 1);

        return view('pages.orders.create', compact('products', 'units', 'stocks', 'customers', 'order_no'));
    }

    public function store(Request $request) : RedirectResponse
    {
        try {
            // Validate your request here if needed
            $totalAmount = 0; // Initialize totalAmount variable

            if ($request->product_id_val == null) {
                throw new \Exception('Please select at least one item');
            }

            $count_products = count($request->product_id_val);

            for ($i = 0; $i < $count_products; $i++) {
                $product = Product::findOrFail($request->product_id_val[$i]);
                $stock = Stock::where('product_id', $product->id)->first();

                if ($stock && $stock->remaining_quantity >= $request->quantity_val[$i]) {
                    // There is enough stock, deduct the quantity from the stock
                    $stock->remaining_quantity -= $request->quantity_val[$i];
                    $stock->update();

                    // Create the order
                    $order = new Order();
                    $order->product_id = $product->id;
                    $order->order_date = $request->order_date_val[$i];
                    $order->order_no = $request->order_no_val[$i];
                    $order->total_amount = $request->total_amount_val[$i];
                    $order->quantity = $request->quantity_val[$i];
                    $order->customer_name = $request->customer_name_val[$i];
                    $order->created_by = Auth::user()->id;
                    $order->updated_by = Auth::user()->id;
                    $order->status = '1'; // You may need to adjust this according to your status handling
                    $order->save();

                    // Add the current total_amount to the running total
                    $totalAmount += $request->total_amount_val[$i];
                } else {
                    return redirect()->route('orders.create')->with([
                        'message' => 'Not enough stock for product: ' . $product->product_name,
                        'alert-type' => 'error',
                    ]);
                    // throw new \Exception('Not enough stock for product: ' . $product->product_name);
                }
            }

            $notification = [
                'message' => 'Order Placed Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('orders.index', ['totalAmount' => $totalAmount])->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }


    public function show($id)
    {
        $orders = Order::where('order_no', $id)->get();
        $totalAmount = 0;

        foreach ($orders as $order) {
            $totalAmount += $order->total_amount;
        }

        return view('pages.orders.view', compact('orders', 'totalAmount'));
    }




    public function edit(Order $order)
    {
        // Add code for editing an order
    }

    public function update(Request $request, Order $order)
    {
        // Add code for updating an order
    }

    public function destroy($id, Request $request) : RedirectResponse
    {
        $order = Order::find($id);

        if ($order) {
            // Get the order_no before deletion
            $orderNo = $order->order_no;

            // Delete the order
            $order->delete();

            // Check the number of remaining orders with the same order_no
            $remainingOrders = Order::where('order_no', $orderNo)->count();

            // If no orders remain with the same order_no, redirect to the index page
            if ($remainingOrders == 0) {
                return redirect()->route('orders.index')->with([
                    'message' => 'Order Deleted Successfully',
                    'alert-type' => 'success',
                ]);
            }

            // If there are remaining orders with the same order_no, redirect back
            return redirect()->back()->with([
                'message' => 'Order Deleted Successfully',
                'alert-type' => 'success',
            ])->withInput($request->all());
        } else {
            return redirect()->back()->with([
                'message' => 'Order Not Found',
                'alert-type' => 'error',
            ]);
        }
    }


    public function approveAll($order_no)
    {
        $orders = Order::where('order_no', $order_no)->get();

        foreach ($orders as $order) {
            $this->approveOrder($order);
        }

        $notification = [
            'message' => 'Orders Approved Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('orders.index')->with($notification);
    }

    /**
     * Approve an individual order.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve($id)
    {
        $order = Order::findOrFail($id);

        // Call the helper function to approve the order
        $response = $this->approveOrder($order);

        // Check if the response is a redirect, and if so, return it
        if ($response instanceof RedirectResponse) {
            return $response;
        }

        return redirect()->route('orders.index')->with([
            'message' => 'Order Approved Successfully',
            'alert-type' => 'success',
        ]);
    }

    private function approveOrder(Order $order)
    {
        try {
            if ($order->status == 0) {
                // Check if there is enough stock to fulfill the order
                $product = Product::findOrFail($order->product_id);
                $stock = Stock::where('product_id', $product->id)->first();

                if ($stock && $stock->remaining_quantity >= $order->quantity) {
                    // Update order status to approved
                    $order->update(['status' => 1]);

                    // Update stock and product quantities
                    $stock->remaining_quantity -= $order->quantity;
                    $stock->update();

                    $product->quantity -= $order->quantity;
                    $product->update();
                } else {
                    // Not enough stock, return a redirect response with an error message
                    return redirect()->route('orders.index')->with([
                        'message' => 'Not enough stock for product: ' . $product->product_name,
                        'alert-type' => 'error',
                    ]);
                }
            }
        } catch (\Exception $e) {
            // Handle exceptions if needed
            return redirect()->route('orders.index')->with([
                'message' => 'Error approving order',
                'alert-type' => 'error',
            ]);
        }
    }


}
