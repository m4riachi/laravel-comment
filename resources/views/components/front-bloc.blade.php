<div class="">
    <div class="col-md-12 bootstrap snippets">
        <x-m4-comment-front-form />
        <x-m4-comment-front-list />
    </div>
    <script src="https://www.google.com/recaptcha/api.js?render={{config('m4-comment.recaptcha.site-key')}}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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

                onSubmitForm(replay.querySelector('form'));
            }
            else replay.innerHTML = '';
        }

        function onSubmitForm(element) {
            @if (!config('m4-comment.ajax_post', true))
                return false;
            @endif

            const form = element;
            const actionUrl = form.getAttribute("action");

            form.addEventListener('submit', function (event) {
                event.preventDefault();

                grecaptcha.execute('{{config('m4-comment.recaptcha.site-key')}}', {action: 'forms'}).then(function (token) {
                    var recaptchaElements = document.getElementsByName('g-recaptcha-response');
                    for (var i = 0; i < recaptchaElements.length; i++) {
                        recaptchaElements[i].value = token;
                    }

                    const formData = new FormData(form);


                    axios
                        .post(actionUrl, formData)
                        .then(function (response) {
                            form.parentElement.querySelector('.alert-danger').style.display = "none";
                            if (response.data.success) {
                                form.parentElement.querySelector('.alert-success').style.display = "block";
                                form.reset();
                            }
                        })
                        .catch(function (error) {
                            form.parentElement.querySelector('.alert-success').style.display = "none";
                            var html;
                            if (error.response.data != undefined) {
                                html = '';
                                for (var e in error.response.data.errors) {
                                    html += '<li>' + error.response.data.errors[e] + '</li>';
                                }
                                form.parentElement.querySelector('.error_li').innerHTML = html;
                                form.parentElement.querySelector('.alert-danger').style.display = "block";
                            }
                        });
                });
            });
        }

        window.addEventListener('load', function () {
            onSubmitForm(document.getElementById("m4CommentForm"));
        });
    </script>
</div>
