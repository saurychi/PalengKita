<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Validation\Rule;

class CustomersController extends Controller
{

    public function signup()
    {
        return view('auth.signup');
    }

    // ADD
    public function addCustomer(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|min:2|max:255',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|string|min:8|max:255|confirmed',
        ]);

        // dd($request->all());

        Customer::create($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer added successfully'); // redirects to index page
    }

    // DISPLAY (one)
    public function displayCustomer(Customer $customer)
    {
        return view('customers.customer', compact('customer'));
    }

    // DISPLAY (many)
    public function index()
    {
        $customers = Customer::orderByDesc('created_at')->paginate(5);
        return view('customers.index', compact('customers'));
    }

    // EDIT
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'customer_name' => 'required|string|min:2|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('customers', 'email')->ignore($customer->customer_id, 'customer_id')
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                Rule::unique('customers', 'password')->ignore($customer->customer_id, 'customer_id')
            ],
        ]);

        // dd($request->all());
        $customer->update($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
    }

    // DELETE
    public function delete(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'customer deleted successfully');
    }
}
