<div class="col-lg-12">
    <form method="post" action="{{ route('comments.store') }}" class="contact-form bg-white rounded p-5" id="comment-form">
        @csrf
        <h4 class="mb-4">Write a comment</h4>
        <div class="row d-none">
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" type="text" name="post_id" id="post_id" value="{{$post->id}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" type="text" name="user_id" id="user_id" value="{{$user->id}}">
                </div>
            </div>
        </div>

        <textarea class="form-control mb-3" name="content" id="content" cols="30" rows="5"></textarea>

        <input class="btn btn-main btn-round-full" type="submit" name="submit-contact" id="submit_contact"
            value="Submit Message">
    </form>
</div>
