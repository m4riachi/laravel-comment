<div class="panel">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success">
            {{ 'Comment with success' }}
        </div>
    @endif

    @if($guestUser)
    <form action="{{ route('m4.comment.save') }}" id="m4CommentForm" method="post">
        @csrf
        <input type="hidden" name="url_path" value="{{ $url_path }}">
        <input type="hidden" name="url_query" value="{{ $url_query }}">
        <input type="hidden" name="user_id" value="1">
        <div class="panel-body">
            @guest
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="user_name" name="user_name" value="{{ old('user_name') }}" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="user_email" name="user_email" value="{{ old('user_email') }}" placeholder="Enter your email">
                <small class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            @endguest
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="2" placeholder="Share with us your comment">{{ old('comment') }}</textarea>
            </div>
            <div class="mar-top clearfix">
                @if (config('m4-comment.recaptcha.enable', false))
                <button class="g-recaptcha btn btn-sm btn-primary pull-right"
                        data-sitekey="{{config('m4-comment.recaptcha.site-key')}}"
                        data-callback="onSubmit"
                        data-action="submit">
                    <i class="fa fa-pencil fa-fw"></i> Share
                </button>
                @else
                    <button class="btn btn-sm btn-primary pull-right" type="submit">
                        <i class="fa fa-pencil fa-fw"></i> Share
                    </button>
                @endif
            </div>
        </div>
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <script>
            function onSubmit(token) {
                document.getElementById("m4CommentForm").submit();
            }
        </script>
    </form>
    @else
        <div class="panel-body">
        <h3>You must be logged to send a comment</h3>
        </div>
    @endif
</div>
