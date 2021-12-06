<div class="panel">
    <div class="panel-body">
    @if(count($comments) > 0)
        <!-- Newsfeed Content -->
            <!--===================================================-->
            @foreach($comments as $comment)
                <div class="media-block">
                    <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture"
                                                        src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
                    <div class="media-body">
                        <div class="mar-btm">
                            <b>{{ is_null($comment['user']) ? $comment['user_name'] : $comment['user']['name'] }}</b>
                            <p class="text-muted text-sm">{{ Carbon\Carbon::parse($comment['created_at'])->diffForHumans() }}</p>
                        </div>
                        <p>
                            {{ $comment['comment'] }}
                        </p>
                        <div class="pad-ver">
                            <button class="btn btn-sm btn-default btn-hover-primary"
                                    onclick="replayComment({{ $comment['id'] }})">Replay
                            </button>
                        </div>
                        <div id="replay{{ $comment['id'] }}"></div>
                        <hr>
                        @if (isset($comment['sub']) && count($comment['sub']) > 0)
                            <x-m4-comment-front-list-comment :comments="$comment['sub']"/>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
        <h3>No comment yet, be the first</h3>
        @endif
    </div>
</div>
