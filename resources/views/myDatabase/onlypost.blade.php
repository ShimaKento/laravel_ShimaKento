<x-app-layout>

<!--
    @if(!empty(session('viewId')))
    @php
    $viewId = session('viewId');
    @endphp
    @endif
    -->
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
                <h1>Post</h1>
            @foreach ($posts as $post)
            @if ($post->id === intval($viewId))
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <ul>
                <li style="font-size:18px; margin-bottom:30px;">
                @foreach ($users as $user)
                @if ($post->user_id === $user->id)
                Name　:　{{ $user->first_name }}　{{ $user->last_name }}
                @endif
                @endforeach
                </li>
                <li style="font-size:30px; margin-bottom:20px;">{{ $post->post }}</li>
                <li style="text-align:right;">{{ $post->created_at }}</li>
            </ul>
            </div>
            <h2>Reply</h2>
            @foreach ($replies as $reply)
            @if ($reply->hierarchy === 1)
            @if ($reply->post_id === $post->id)
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <ul>
                <li style="font-size:18px; margin-bottom:30px;">
                @foreach ($users as $user)
                @if ($reply->user_id === $user->id)
                Name　:　{{ $user->first_name }}　{{ $user->last_name }}
                @endif
                @endforeach
                </li>
                <li style="font-size:26px; margin-bottom:20px;">{{ $reply->reply }}</li>
                <li style="text-align:right; width: 97.6%;">{{ $reply->created_at }}</li>
                <li style="text-align:center; ">
                    <form action="{{route('reply')}}" method="GET">
                        @csrf 
                        <input name="viewHierarchy" type="hidden" value="1"/>
                        <input name="viewUserId" type="hidden" value="{{ $reply->user_id }}"/>
                        <input name="viewPostId" type="hidden" value="{{ $reply->id }}"/>
                        <button>Check out this post and the replies</button>
                    </form>
                </li>
                @php
                $nowPoster = $reply->id;
                @endphp
                @foreach ($replies as $reply)
                @if ($reply->hierarchy === 2)
                @if ($reply->post_id === $nowPoster)
                <li class="p-4 sm:p-8 bg-primary-subtle shadow sm:rounded-lg"><ul>
                  <li style="font-size:18px; margin-bottom:30px;">
                  @foreach ($users as $user)
                  @if ($reply->user_id === $user->id)
                  Name　:　{{ $user->first_name }}　{{ $user->last_name }}
                  @endif
                  @endforeach
                  </li>
                  <li style="font-size:24px; margin-bottom:20px;">{{ $reply->reply }}</li>
                  <li style="text-align:right; ">{{ $reply->created_at }}</li>
                  <li style="text-align:center; ">
                    <form action="{{route('reply')}}" method="GET">
                        @csrf 
                        <input name="viewHierarchy" type="hidden" value="2"/>
                        <input name="viewUserId" type="hidden" value="{{ $reply->user_id }}"/>
                        <input name="viewPostId" type="hidden" value="{{ $reply->id }}"/>
                        <button>Check out this post and the replies</button>
                    </form>
                </li>
                </ul></li>
                @endif
                @endif
                @endforeach
            </ul>
            </div>
            @endif
            @endif
            @endforeach
            @endif
            @endforeach

<!--
-->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                  <h2>Reply to this post (top post)</h2>
            <form action="{{route('replypaste')}}" method="POST">
            @csrf
            <input name="viewId" type="hidden" value="{{$viewId}}">
            <textarea name="reply" placeholder="Enter content" style="width:80%"></textarea>
            <input name="user_id" type="hidden" value="{{$id}}">
            @foreach ($posts as $post)
            @if ($post->id === intval($viewId))
              <input name="post_id" type="hidden" value="{{$post->id}}">
            @endif
            @endforeach
            <input name="hierarchy" type="hidden" value="1">
            <button>send</button>
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
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="font-size: 30px;">
                <a href="{{ route('postpage') }}">Go post an article</a>
                </div>
            </div>
        </div>
        <div>
        </div>
    </div>
</x-app-layout>
