<div>
    @if (session('status'))
    <div class="alert alert-success" style="display: {{ session('status') ? 'block' : 'none' }}">
        {{ 'Successfully done' }}
    </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Comment</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr class="{{ $comment->status == \M4riachi\LaravelComment\Enums\CommentStatusEnum::pending() ? 'table-danger' : '' }}">
                    <td>{{ is_null($comment->user_id) ? $comment->user_name : $comment->user->name }}</td>
                    <td>{{ is_null($comment->user_id) ? $comment->user_email : $comment->user->email }}</td>
                    <td>
                        <a href="{{ $comment->url_path }}{{ is_null($comment->url_query) ? '' : '?' . $comment->url_query}}"
                           target="_blank">
                            {{ $comment->comment }}
                        </a>
                    </td>
                    <td style="width: 120px">
                        <form action="{{ route('m4.comment.status', $comment) }}" method="post" class="float-left">
                            @csrf
                            @method('patch')
                            <button type="submit" class="float-left mr-2">
                                @if ($comment->status == \M4riachi\LaravelComment\Enums\CommentStatusEnum::pending())
                                <svg style="width: 24px;" class="float-left" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd"></path><path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z"></path></svg>
                                @else
                                <svg style="width: 24px;" class="float-left" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                                @endif
                            </button>
                        </form>
                        <form action="{{ route('m4.comment.delete', $comment) }}" method="post" class="float-left">
                            @csrf
                            @method('delete')
                            <button type="button" onclick="if (confirm('Are you sure?')) { this.parentElement.submit()}">
                                <svg style="width: 24px;" class="float-left text-danger" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    {{ view()->exists('vendor.pagination.bootstrap-4') ? $comments->links('vendor.pagination.bootstrap-4') : ''}}
</div>
