<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Retail;
use App\Models\RetailOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RetailOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Get today's orders count
        $todayOrdersCount = RetailOrder::whereDate('created_at', Carbon::today())->count();

        // Get orders with status true count
        $statusTrueOrdersCount = RetailOrder::where('completed', true)->count();

        // Get last week's orders count
        $lastWeekOrdersCount = RetailOrder::whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->count();

        // Get last month's orders count
        $lastMonthOrdersCount = RetailOrder::whereBetween('created_at', [Carbon::now()->subMonth(), Carbon::now()])->count();

        return view('manager.order.retail', [
            'today_orders' => $todayOrdersCount,
            'status_true_orders' => $statusTrueOrdersCount,
            'last_week_orders' => $lastWeekOrdersCount,
            'last_month_orders' => $lastMonthOrdersCount,
        ]);
    }

    public function indexJson() {

        $orders = RetailOrder::latest()->get();


        $response = null;
        foreach ($orders as $order) {

            $response[] = [
                'id' => $order->id ,
                'full_name' => $order->user->firstname . $order->user->lastname ,
                'phoneNum' => $order->user->phone ,
                'date' => $order->created_at ,
                'detail' => '<button data-bs-toggle="modal" data-id="'. $order->id . '" data-bs-target="#paymentMethods" class="btn btn-sm btn-icon btn-label-secondary waves-effect orderdetail"><i class="ti ti-eye"></i></button>' ,
                'price' => $order->fullPriceFormated() . 'ریال',
                'completed' => $order->completed ,
            ];
        }

        return response()->json(
            [
                "data" => $response
            ]
        );
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
    public function show(RetailOrder $retailOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RetailOrder $retailOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RetailOrder $retailOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RetailOrder $retailOrder)
    {
        //
    }
}
