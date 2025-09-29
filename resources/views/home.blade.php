@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <a href="{{ route('customers.index') }}" class="btn btn-outline-primary">Customers</a>
            <a href="{{ route('transactions.index') }}" class="btn btn-outline-primary">Transactions</a>
        </div>
    </div>
@endsection
