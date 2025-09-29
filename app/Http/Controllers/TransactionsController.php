<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionsController extends Controller
{
    public function test()
    {
        dd('ok');
    }

    // ADD
    public function addTransaction(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'customer_id'   => 'required|exists:customers,customer_id',
            'overall_price' => 'required|integer|min:0',
            'cart'          => 'required|array',
        ]);

        $transaction = Transaction::create([
            'customer_id'   => $validated['customer_id'],
            'overall_price' => $validated['overall_price'],
            'cart'          => json_encode($validated['cart']),
        ]);

        return response()->json([
            'message'     => 'Transaction created successfully',
            'transaction' => $transaction,
        ], 201);
    }

    // DISPLAY (many)
    public function index()
    {
        $transactions = Transaction::orderByDesc('created_at')->paginate(5);
        return view('transactions.index', compact('transactions'));
    }
}
