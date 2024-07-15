<div class="col-lg-12 mb-5">
    <div class="comment-area card border-0 p-5">
        <h4 class="mb-4">{{$post->comments->count('id')}} Comments</h4>
        <ul class="comment-tree list-unstyled">
            @foreach ($comments as $comment)
                <li class="mb-5">
                    <div class="comment-area-box">
                        <img alt="" src="{{asset('users/'.$comment->user->image)}}" style="width: 50px; height: 50px"
                            class="img-fluid float-left mr-3 mt-2">

                        <h5 class="mb-1">Comment by: {{$comment->user->name}}</h5>
                        <span>{{$comment->user->address}}</span>

                        <div class="comment-meta mt-4 mt-lg-0 mt-md-0 float-lg-right float-md-right">
                            <a href="#"><i class="icofont-reply mr-2 text-muted"></i>Reply |</a>
                            <span class="date-comm">Posted {{format_Date($comment->created_at)}} </span>
                        </div>

                        <div class="comment-content mt-3">
                            <p>{{$comment->content}}</p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
