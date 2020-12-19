<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\OrderRequest;
use App\Http\Resources\BillResource;
use App\Http\Services\OrderService;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store(OrderRequest $request)
    {
        $bill = $this->orderService->createBill($request);

        return response()->json(['status' => true, 'message' => '' , 'data' => new BillResource($bill)], Response::HTTP_OK);
    }
}
