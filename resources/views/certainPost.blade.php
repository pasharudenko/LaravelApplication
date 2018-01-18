@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 pt-4">
                <h1>{{$post->title}}</h1>
                <p>by {{$post->user->name}}</p>
                <hr>
                <p> <i class="fa fa-clock-o"></i> Posted {{$post->updated_at->diffForHumans()}}</p>
                <hr>
                <img src="{{asset('images')}}/{{$post->photo->photo}}" alt="" width="730px" height="500px">
                <hr>
                <p>{!! ($post->body) !!}</p>
                <hr>
              <!--  @if(Session::has('comment_message'))
                   <p style="color:red">{{session('comment_message')}}</p>
                @endif
                @if(Auth::check())
                <div class="card">
                    <div class="card-header">
                        <h4>Leave a Comment:</h4>
                        {!! Form::open(["method" => "POST", "action" => "IndexAboutContactsController@storeComment"]) !!}
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                            <div class="form-group">
                                <textarea name="body" class="form-control bodyComment" onkeyup=checkParams()></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary CommentButton">Submit</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                    @if(Session::has('reply_message'))
                        <p style="color:red">{{session('reply_message')}}</p>
                    @endif
                @endif
                <hr>
                @foreach($comments as $comment)
                    @if($comment->is_active == 1)
                <div class="media">
                    @if($comment->user->photo_id == NULL)
                    <img src="{{asset('images/noImage.jpg')}}" alt="" class="d-flex mr-3" width="60px">
                    @else
                        <img src="{{asset('images').'/'.$comment->user->photo->photo}}" alt="" class="d-flex mr-3" width="60px">
                        @endif
                    <br>
                    <div class="media-body">
                        <media class="h4">{{$comment->user->name}}</media> <small>{{$comment->created_at->diffForHumans()}}</small>
                        <p>{{$comment->body}} @if(Auth::check())<button type="submit" class="btn btn-primary ml-5 reply_button" id="reply_form{{$comment->id}}">Reply</button>@endif</p>

                        @foreach($replies as $reply)
                            @if($reply->comment_id == $comment->id && $reply->is_active == 1)
                        <div class="media m-3">
                            <a href="#" class="d-flex pr-3">
                                @if($reply->user->photo_id == NULL)
                                    <img src="{{asset('images/noImage.jpg')}}" width="60px" height="60px">
                                    @else
                                    <img src="{{asset('images').'/'.$reply->user->photo->photo}}" alt="" class="d-flex mr-3" width="60px" height="60">
                                @endif
                            </a>
                            <div class="media-body">
                                <h5 class="mt-0">{{$reply->user->name}}</h5>
                                {{$reply->body}}
                            </div>
                        </div>
                            @endif
                        @endforeach
                        {!! Form::open(['method' => 'POST', 'action' => 'IndexAboutContactsController@storeReply', 'class' => 'reply_form reply_form'."{$comment->id}"]) !!}
                        <div class="form-group">
                            <input type="hidden" value="{{$comment->id}}" name="comment_id">
                            <textarea name="body" class="form-control" onkeyup="reply(this)"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-reply">Reply</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                    @endif
                @endforeach -->
                <div id="disqus_thread"></div>
                <script>

                    /**
                     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                    /*
                    var disqus_config = function () {
                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    */
                    (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = 'https://blogpostapp.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                <script id="dsq-count-scr" src="//blogpostapp.disqus.com/count.js" async></script>
                <hr>
            </div>

            <div class="col-md-4 pt-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Blog Search</h4>
                        {!! Form::open(['method' => 'GET', 'action' => 'IndexAboutContactsController@search']) !!}
                        <div class="input-group">
                            <input type="text" placeholder="Search for..." class="form-control" name="search">
                            <span class="input-group-btn">
                                <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="text-center">
                        <h4>Blog Categories</h4>
                        <ul class="list-unstyled">
                            <div class="row">
                                <div class="col-md-12">
                                    @foreach($categories as $category)
                                        {!! Form::open(['method' => 'GET', 'action' => ['IndexAboutContactsController@categories', $category->id]]) !!}
                                        <li><a href="/categories/{{$category->id}}">{{$category->category}}</a></li>
                                        {!! Form::close() !!}
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Site Widget Well</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur eius illum nesciunt quia recusandae rem similique? Accusamus ad, alias, architecto delectus dolores ea, eligendi hic magni maxime omnis porro provident quam quisquam quod soluta sunt voluptates? Autem consectetur cupiditate, ducimus labore laboriosam nesciunt qui, quod, recusandae sint soluta tenetur voluptate.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    @endsection


@section('scripts')
    <script>


            $('.reply_form').hide();
            var count = 0;
            $('.reply_button').click(function () {
                var id = $(this).attr('id');
                $('.'+id).slideToggle();
            });



            $('.CommentButton').attr('disabled', 'disabled');

            function checkParams()
            {
                var Comment =  $('.bodyComment').val();
                var regexp = /^[\s]+$/gi;
                var result = Comment.match(regexp);

                if(result !== null)
                {
                    $('.CommentButton').attr('disabled', 'disabled');
                    return false;
                }
                else
                {
                    if(Comment.length !==0)
                    {
                        $('.CommentButton').removeAttr('disabled');
                    }
                    else
                    {
                        $('.CommentButton').attr('disabled', 'disabled');
                    }
                    return true;
                }
            }

            $('.btn-reply').attr('disabled', 'disabled');

            function reply(Reply)
            {

                CommentReply = Reply.value;
                var regexp = /^[\s]+$/gi;
                var result = CommentReply.match(regexp);
                if(result !== null)
                {
                    $('.btn-reply').attr('disabled', 'disabled');
                    return false;
                }
                else
                {
                    if(CommentReply.length !==0)
                    {
                        $('.btn-reply').removeAttr('disabled');
                    }
                    else
                    {
                        $('.btn-reply').attr('disabled', 'disabled');
                    }
                    return true;
                }
            }



    </script>
@endsection