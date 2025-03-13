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
            @foreach ($replies as $reply)
            @if ($reply->hierarchy === intval($viewHierarchy))
            @if ($reply->id === intval($viewPostId))
            @if ($reply->user_id === intval($viewUserId))
            <ul>
                <li style="margin-bottom:30px;">
                @foreach ($users as $user)
                @if ($reply->user_id === $user->id)
                Name　:　{{ $user->first_name }}　{{ $user->last_name }}
                @endif
                @endforeach
                </li>
                <li style="font-size:26px; margin-bottom:20px;">{{ $reply->reply }}</li>
                <li style="text-align:right; width: 89%;">{{ $reply->created_at }}</li>
                @php
                $nowPoster = $reply->id;
                $reply1Hierarchy = intval($viewHierarchy) + 1;
                @endphp
                @foreach ($replies as $reply)
                @if ($reply->hierarchy === $reply1Hierarchy)
                @if ($reply->post_id === $nowPoster)
                <li class="p-4 sm:p-8 bg-primary-subtle sm:rounded-lg"><ul class="p-4 sm:p-8 bg-primary-subtle shadow sm:rounded-lg">
                <li style="margin-bottom:30px;">
                  @foreach ($users as $user)
                  @if ($reply->user_id === $user->id)
                  Name　:　{{ $user->first_name }}　{{ $user->last_name }}
                  @endif
                  @endforeach
                  </li>
                  <li style="font-size:22px; margin-bottom:20px;">{{ $reply->reply }}</li>
                  <li style="text-align:right; width: 93%;">{{ $reply->created_at }}</li>
                <li style="text-align:center; ">
                    <form action="{{route('reply')}}" method="GET">
                        @csrf 
                        <input name="viewHierarchy" type="hidden" value="{{$reply1Hierarchy}}"/>
                        <input name="viewUserId" type="hidden" value="{{ $reply->user_id }}"/>
                        <input name="viewPostId" type="hidden" value="{{ $reply->id }}"/>
                        <button>Check out this post and the replies</button>
                    </form>
                </li>
                  @php
                  $nextPoster = $reply->id;
                  $reply2Hierarchy = intval($viewHierarchy) + 2;
                  @endphp
                  @foreach ($replies as $reply)
                    @if ($reply->hierarchy === intval($viewHierarchy) + 2)
                    @if ($reply->post_id === $nextPoster)
                    <li class="p-4 sm:p-8 bg-primary-subtle sm:rounded-lg"><ul class="p-4 sm:p-8 bg-primary-subtle shadow  sm:rounded-lg">
                    <li style="margin-bottom:30px;">
                      @foreach ($users as $user)
                      @if ($reply->user_id === $user->id)
                      Name　:　{{ $user->first_name }}　{{ $user->last_name }}
                      @endif
                  @endforeach
                  </li>
                  <li style="font-size:20px; margin-bottom:20px;">{{ $reply->reply }}</li>
                  <li style="text-align:right; ">{{ $reply->created_at }}</li>
                <li style="text-align:center; ">
                    <form action="{{route('reply')}}" method="GET">
                        @csrf 
                        <input name="viewHierarchy" type="hidden" value="{{$reply2Hierarchy}}"/>
                        <input name="viewUserId" type="hidden" value="{{ $reply->user_id }}"/>
                        <input name="viewPostId" type="hidden" value="{{ $reply->id }}"/>
                        <button>Check out this post and the replies</button>
                    </form>
                </li>
                </ul></li>
                @endif
                @endif
                @endforeach
                </ul></li>
                @endif
                @endif
                @endforeach
</ul>
            @endif
            @endif
            @endif
            @endforeach

            <!--
-->
                </div>

              <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h2>Reply to this post (top post)</h2>
            <form action="{{route('morereply')}}" method="POST">
            @csrf
            <input name="viewHierarchy" type="hidden" value="{{$viewHierarchy}}">
            <input name="viewUserId" type="hidden" value="{{$viewUserId}}">
            <input name="viewPostId" type="hidden" value="{{$viewPostId}}">
            <textarea name="reply" placeholder="Enter content" style="width:80%"></textarea>
            <input name="user_id" type="hidden" value="{{$id}}">
            @foreach ($replies as $reply)
            @if ($reply->hierarchy === intval($viewHierarchy))
            @if ($reply->id === intval($viewPostId))
            @if ($reply->user_id === intval($viewUserId))
              <input name="post_id" type="hidden" value="{{$reply->id}}">
<!--・-->
            @endif
            @endif
            @endif
            @endforeach
            @php
            $reply1Hierarchy = intval($viewHierarchy) + 1;
            @endphp
            <input name="hierarchy" type="hidden" value="{{$reply1Hierarchy}}">
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
