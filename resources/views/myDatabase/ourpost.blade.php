<x-app-layout>
    <x-slot name="header">
        
            
    @foreach ($users as $user)
    @if ($user->id === $id)
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Hello!　{{ $user->first_name }}　{{ $user->last_name }}.
    </h2>
    @endif
    @endforeach
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @foreach ($posts as $post)
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <ul>
                <li style="font-size:22px; margin-bottom:30px;">
                @foreach ($users as $user)
                @if ($post->user_id === $user->id)
                Name　:　{{ $user->first_name }}　{{ $user->last_name }}
                @endif
                @endforeach
                </li>
                <li style="font-size:32px; margin-bottom:20px;">{{ $post->post }}</li>
                <li style="text-align:right; font-size:22px">{{ $post->created_at }}</li>
                <li style="text-align:center; font-size:26px">
                    <form action="{{route('onlypost')}}" method="GET">
                        @csrf 
                        <input name="viewId" type="hidden" value="{{ $post->id }}"/>
                        <button>Check out this post and the replies</button>
                    </form>
                </li>
            </ul>
            </div>
            @endforeach
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="font-size: 30px;">
                <a href="{{ route('register') }}">Return to home screen</a>
                </div>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="font-size: 30px;">
                <a href="{{ route('mypost') }}">
                go see my posts</a>
                </div>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="font-size: 30px;">
                <a href="{{ route('postpage') }}">Go post an article</a>
                </div>
            </div>
        </div>
        <div>
        </div>
    </div>
</x-app-layout>
