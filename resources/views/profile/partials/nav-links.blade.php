@guest
<a href="{{ route('dashboard') }}"
    class="px-4 py-2 border border-gray-500 text-white rounded hover:bg-gray-700 transition shadow">Dashboard</a>
@endguest
@if ($isLoggedIn)
<a href="{{ route('dashboard') }}"
    class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition shadow">
    Dashboard
</a>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition shadow">
        Logout
    </button>
</form>
@else
<a href="{{ route('login') }}"
    class="px-4 py-2 border border-gray-500 text-white rounded hover:bg-gray-700 transition shadow">
    Login
</a>
<a href="{{ route('register') }}"
    class="px-4 py-2 border border-gray-500 text-white rounded hover:bg-gray-700 transition shadow">
    Register
</a>
@endif
@auth
<form method="POST" action="{{ route('logout') }}" class="inline">
    @csrf
    <button type="submit"
        class="px-4 py-2 border border-red-500 text-white rounded hover:bg-gray-700 transition shadow">Logout</button>
</form>
@endauth
