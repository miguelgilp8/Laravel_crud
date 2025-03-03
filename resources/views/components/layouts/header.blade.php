<header class="w-full h-full">
    <div class="h-full w-full bg-white flex items-center justify-between px-8 shadow-md">


        <div class="flex items-center gap-4">
            @auth
                <span class="text-gray-700">{{ auth()->user()->name }}</span>
                <form action="{{route("logout")}}" method="POST" class="ml-4">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white rounded-lg">
                        Logout
                    </button>
                </form>
                <a class="btn btn-sm btn-secondary " href="{{route("main")}}">Home</a>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white rounded-lg">
                    Login
                </a>
                <a href="{{ route('register') }}" class="px-4 py-2 bg-[#9c9d9f] hover:bg-gray-400 text-white rounded-lg">
                    Register
                </a>
                    <a class="btn btn-sm btn-secondary " href="{{route("main")}}">Home</a>
                @endguest
        </div>
    </div>
</header>
{{--Header para desktop--}}
