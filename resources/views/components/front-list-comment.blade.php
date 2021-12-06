<div>
@foreach($comments as $comment)
    <div class="media">
        <svg class="mr-3" style="width: 60px" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
        <div class="media-body">
            <b>{{ is_null($comment['user']) ? $comment['user_name'] : $comment['user']['name'] }}</b>
            <p class="text-muted text-sm">{{ Carbon\Carbon::parse($comment['created_at'])->diffForHumans() }}</p>
            <p>
                {{ $comment['comment'] }}
            </p>
            <button class="btn btn-secondary"
                    onclick="replayComment({{ $comment['id'] }})">Replay
            </button>
            <div id="replay{{ $comment['id'] }}"></div>
            <hr>
            @if (isset($comment['sub']) && count($comment['sub']) > 0)
                <x-m4-comment-front-list-comment :comments="$comment['sub']"/>
            @endif
        </div>
    </div>
@endforeach
</div>
