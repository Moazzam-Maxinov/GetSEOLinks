{{-- @extends('layouts.admin.admin')

@section('content')
    <div class="container mt-4">
        <h2>Invoice Details</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card p-4">
            <h4>Invoice #{{ $invoice->invoice_guid }}</h4>
            <p><strong>Order ID:</strong> {{ $invoice->order_id }}</p>
            <p><strong>Total Amount:</strong> ${{ number_format($invoice->total_amount, 2) }}</p>
            <p><strong>Issued At:</strong>
                {{ $invoice->issued_at ? \Carbon\Carbon::parse($invoice->issued_at)->format('d-m-Y H:i') : 'N/A' }}</p>
            <p><strong>Paid At:</strong>
                {{ $invoice->paid_at ? \Carbon\Carbon::parse($invoice->paid_at)->format('d-m-Y H:i') : 'Not Paid' }}</p>

            <!-- Update Invoice Form -->
            <form action="{{ route('admin.updateInvoice') }}" method="POST">
                @csrf
                <input type="hidden" name="invoice_id" value="{{ $invoice->invoice_guid }}">

                <div class="mb-3">
                    <label for="status">Status:</label>
                    <select id="status" name="status" class="form-control">
                        <option value="paid" {{ $invoice->status === 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="unpaid" {{ $invoice->status === 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                        <option value="refunded" {{ $invoice->status === 'refunded' ? 'selected' : '' }}>Refunded</option>
                        <option value="failed" {{ $invoice->status === 'failed' ? 'selected' : '' }}>Failed</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="payment_method">Payment Method:</label>
                    <input type="text" id="payment_method" name="payment_method" class="form-control"
                        value="{{ $invoice->payment_method }}">
                </div>

                <div class="mb-3">
                    <label for="transaction_id">Transaction ID:</label>
                    <input type="text" id="transaction_id" name="transaction_id" class="form-control"
                        value="{{ $invoice->transaction_id }}">
                </div>

                <button type="submit" class="btn btn-success">Save Changes</button>
            </form>
        </div>
    </div>
@endsection --}}

@extends('layouts.admin.admin')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        @if (session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded relative">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="border-b border-gray-100 px-6 py-4">
                <h2 class="text-2xl font-bold text-gray-800">Invoice #{{ $invoice->invoice_guid }}</h2>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="space-y-2">
                        <p class="text-sm text-gray-500">Order ID</p>
                        <p class="font-medium text-gray-900">{{ $invoice->order_id }}</p>
                    </div>

                    <div class="space-y-2">
                        <p class="text-sm text-gray-500">Total Amount</p>
                        <p class="font-medium text-gray-900">${{ number_format($invoice->total_amount, 2) }}</p>
                    </div>

                    <div class="space-y-2">
                        <p class="text-sm text-gray-500">Issued At</p>
                        <p class="font-medium text-gray-900">
                            {{ $invoice->issued_at ? \Carbon\Carbon::parse($invoice->issued_at)->format('d-m-Y H:i') : 'N/A' }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <p class="text-sm text-gray-500">Paid At</p>
                        <p class="font-medium text-gray-900">
                            {{ $invoice->paid_at ? \Carbon\Carbon::parse($invoice->paid_at)->format('d-m-Y H:i') : 'Not Paid' }}
                        </p>
                    </div>
                </div>

                <form action="{{ route('admin.updateInvoice') }}" method="POST" id="invoiceForm">
                    @csrf
                    <input type="hidden" name="invoice_id" value="{{ $invoice->invoice_guid }}">

                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status:</label>
                            <select id="status" name="status"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="paid" {{ $invoice->status === 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="unpaid" {{ $invoice->status === 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                                <option value="refunded" {{ $invoice->status === 'refunded' ? 'selected' : '' }}>Refunded
                                </option>
                                <option value="failed" {{ $invoice->status === 'failed' ? 'selected' : '' }}>Failed
                                </option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label for="payment_method" class="block text-sm font-medium text-gray-700">Payment
                                Method:</label>
                            <input type="text" id="payment_method" name="payment_method"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                value="{{ $invoice->payment_method }}">
                        </div>

                        <div class="space-y-2">
                            <label for="transaction_id" class="block text-sm font-medium text-gray-700">Transaction
                                ID:</label>
                            <input type="text" id="transaction_id" name="transaction_id"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                value="{{ $invoice->transaction_id }}">
                        </div>

                        <button type="submit" id="submitButton" disabled
                            class="w-full px-4 py-2 bg-gray-300 text-white rounded-md transition-colors duration-200 ease-in-out
                                   hover:bg-blue-700 disabled:bg-gray-300 disabled:cursor-not-allowed">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('invoiceForm');
            const submitButton = document.getElementById('submitButton');
            const originalStatus = '{{ $invoice->status }}';

            function checkFormChanges() {
                const currentStatus = document.getElementById('status').value;
                const hasChanges = currentStatus !== originalStatus;

                submitButton.disabled = !hasChanges;
                submitButton.className = hasChanges ?
                    'w-full px-4 py-2 bg-blue-600 text-white rounded-md transition-colors duration-200 ease-in-out hover:bg-blue-700' :
                    'w-full px-4 py-2 bg-gray-300 text-white rounded-md transition-colors duration-200 ease-in-out disabled:cursor-not-allowed';
            }

            // Add event listeners to form fields
            document.getElementById('status').addEventListener('change', checkFormChanges);

            // Prevent double submission
            form.addEventListener('submit', function(e) {
                submitButton.disabled = true;
                submitButton.innerHTML = 'Saving...'; // Change button text to indicate processing
                submitButton.className =
                    'w-full px-4 py-2 bg-gray-400 text-white rounded-md cursor-not-allowed';
            });
        });
    </script>
@endsection

{{-- TO DO fill if the user has already approved or rejected the order. Also show user that a review from their side is pending --}}
