
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Comment for : {{$comment->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="wrap_post">
                    <div class="wrap_img"><img height= '200px' class="def_img" src="{{$comment->article->image_path}}" alt="">
                    </div>
                    <div class="wrap_info">
                        <h4>{{$comment->article->name}}
                        </h4><span class="date">{{date("M d,Y", strtotime($comment->article->date)) }}</span>
                    </div>
                </div>
                <div class="wrap_post p-3">
                    <h3>{{$comment->name}}</h3>
                    <span>{{$comment->created_at->toFormattedDateString()}}</span>
                    <p>{{$comment->comment}}</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>

