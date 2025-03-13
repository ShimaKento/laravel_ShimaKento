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
            
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h2 style="font-size:26px">投稿内容</h2>
            <form action="{{ route('newpost') }}" method="POST">
            @csrf
            @foreach ($users as $user)
        @if ($user->id === $id)
        <div>
            <input name="user_id" type="hidden" value="{{ $user->id }}"/>
        </div>
    @endif
    @endforeach
        
        <div>
            <textarea name="post" placeholder="Enter content" style="width:80%"></textarea>
        </div>
        <button>送信</button>
    </form>
            </div>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="font-size: 30px;">
                <a href="{{ route('register') }}">Return to home screen</a>
                </div>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="font-size: 30px;">
                <a href="{{ route('mypost') }}">
                go see my posts</a>
                </div>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="font-size: 30px;">
                <a href="{{ route('ourpost') }}">Go see everyone's posts</a>
                </div>
            </div>
        </div>
        <div>
        </div>
    </div>
</x-app-layout>
