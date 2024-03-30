<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Melted;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MeltedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get today's orders count
        $todayOrdersCount = Melted::whereDate('created_at', Carbon::today())->count();

        // Get orders with status true count
        $statusTrueOrdersCount = Melted::where('completed', true)->count();

        $buy_trades = Melted::where('type', 'buy')->count();

        $sell_trades = Melted::where('type', 'sell')->count();


        return view('manager.order.melted', [
            'today_orders' => $todayOrdersCount,
            'status_true_orders' => $statusTrueOrdersCount,
            'buy_trades' => $buy_trades,
            'sell_trades' => $sell_trades,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function indexJson()
    {

        $orders = Melted::latest()->get();


        $response = null;
        foreach ($orders as $order) {

            $response[] = [
                'id' => $order->id ,
                'type' => $order->type,
                'full_name' => $order->user->firstname . $order->user->lastname ,
                'phone' => $order->user->phone ,
                'grams' => $order->grams,
                'amount' => $order->amount,
                'price' => $order->price,
                'date' => $order->created_at ,
                'completed' => $order->completed
            ];
        }

        return response()->json(
            [
                "data" => $response
            ]
        );
    }

    public function accept(Melted $melted) {
        $melted->completed = true;
        $melted->save();
        return redirect()->back()->with('success', 'سفارش مورد نظر با موفقیت تکمیل شد.');
    }

    public function ignore(Melted $melted) {
        $melted->delete();
        return redirect()->back()->with('success', 'سفارش مورد نظر با موفقیت رد شد.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Melted $melted)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
