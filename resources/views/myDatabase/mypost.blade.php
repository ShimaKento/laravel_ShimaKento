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
            @php
                $allPosts = 0;
            @endphp
            @foreach ($posts as $post)
            @if ($post->user_id === $id)
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <ul>
                <li style="text-align:center; font-size:36px; margin-bottom:20px;">{{ $post->post }}</li>
                <li style="text-align:right; font-size:26px">{{ $post->created_at }}</li>
                <li style="text-align:center; font-size:30px;">
                    <form action="{{route('onlypost')}}" method="GET">
                        @csrf 
                        <input name="viewId" type="hidden" value="{{ $post->id }}"/>
                        <button class="border border-primary">Check out this post and the replies</button>
                    </form>
                </li>
            </ul>
            </div>
            @php
                $allPosts++ ;
            @endphp
            @endif
            @endforeach
            @if($allPosts === 0)
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <h2 style="font-size:26px">Let`s posting my post!!</h2>
            <a href="{{ route('postpage') }}" style="font-size:30px">Let's go postPage!</a>
            </div>
            @endif
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="font-size: 30px;">
                <a href="{{ route('register') }}">Return to home screen</a>
                </div>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="font-size: 30px;">
                <a href="{{ route('ourpost') }}">Go see everyone's posts</a>
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
