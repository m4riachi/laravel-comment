<div class="panel">
    @if(count($comments) > 0)
        <x-m4-comment-front-list-comment :comments="$comments"/>
    @else
        <h3>No comment yet, be the first</h3>
    @endif
</div>
