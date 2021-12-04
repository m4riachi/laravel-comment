<div class="">
    <div class="col-md-12 bootstrap snippets">
        <x-m4-comment-front-form />
        <x-m4-comment-front-list />
    </div>
    <script src="https://www.google.com/recaptcha/api.js?render={{config('m4-comment.recaptcha.site-key')}}"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('{{config('m4-comment.recaptcha.site-key')}}', {action: 'forms'}).then(function (token) {
                var recaptchaElements = document.getElementsByName('g-recaptcha-response');
                for (var i = 0; i < recaptchaElements.length; i++) {
                    recaptchaElements[i].value = token;
                }
            });
        });

        function replayComment(id) {
            var replay = document.getElementById('replay' + id);
            var formComment = document.getElementById('formComment');
            if (replay.innerHTML == '') {
                replay.innerHTML = formComment.innerHTML;
                replay.querySelector('.m4_comment_id').value = id;
                //console.log(replay.querySelector('.alert-danger'));
                if (replay.querySelector('.alert-success') != null)
                    replay.querySelector('.alert-success').style.display = "none";

                if (replay.querySelector('.alert-danger') != null)
                    replay.querySelector('.alert-danger').style.display = "none";
            }
            else replay.innerHTML = '';
        }
    </script>
</div>
