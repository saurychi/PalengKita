@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4 text-white">Customers List</h2>

        <div class="container">
            <a href="{{ route('customers.signup') }}" class="btn btn-outline-info mb-3">Add Customer</a>
            <a href="{{ url('/') }}" class="btn btn-outline-info mb-3">Back</a>
        </div>

        @session('success')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ $value }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endsession

        <table class="table table-bordered table-dark table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Money Owned</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                    <tr>
                        <td>{{ $customer->customer_id }}</td>
                        <td>{{ $customer->customer_name }}</td>
                        <td>{{ $customer->cart }}</td>
                        <td>{{ $customer->money_owned }}</td>
                        <td>
                            <a href="{{ route('customers.displayCustomer', $customer->customer_id) }}" class="btn btn-outline-warning">View</a>
                            <a href="{{ route('customers.edit', $customer->customer_id) }}" class="btn btn-outline-info">Edit</a>
                            <form action="{{ route('customers.delete', $customer->customer_id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                class="btn btn-outline-danger"
                                onClick="return confirm('Are you sure?')"
                            >Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No Student Found!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-end mt-4">
            {{$customers->links('vendor.pagination.bootstrap-5-dark')}}
        </div>

    </div>
@endsection
