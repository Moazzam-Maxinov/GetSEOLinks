@extends('layouts.user.user')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-2xl rounded-2xl p-6 max-w-lg w-full text-center">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Need Assistance?</h1>
            <p class="text-gray-600 mb-6">If you have any questions or need support, please feel free to reach out to us.</p>
            <a href="mailto:contact@getseolinks.com"
                class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-xl transition-all">
                Email Us: contact@getseolinks.com
            </a>
        </div>
    </div>
@endsection
