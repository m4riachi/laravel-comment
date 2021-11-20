<div class="panel">
    @if($guestUser)
    <form action="{{ route('m4.comment.save') }}" method="post">
        @csrf
        <div class="panel-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                <small class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea class="form-control" id="comment" rows="2" placeholder="Share with us your comment"></textarea>
            </div>
            <div class="mar-top clearfix">
                <button class="btn btn-sm btn-primary pull-right" type="submit">
                    <i class="fa fa-pencil fa-fw"></i> Share
                </button>
            </div>
        </div>
    </form>
    @else
        <div class="panel-body">
        <h3>You must be logged to send a comment</h3>
        </div>
    @endif
</div>
