<div class="card mb-3">
    <div class="card-header"  style="text-align: center">
        <a href="{{route('home.post.show',$post->id)}}">
            {{__('caption.home.post-title',['name'=>$post->owner_name,'date'=>$post->created_at->diffForHumans()])}}
        </a>
        @can('create', \App\Models\Reaction::class)
        <div>
            <?php
            $user = \Auth::user();
            $isSelected = $user->reactions()->where('post_id',$post->id)->where('type',\App\Models\Reaction::TYPE_LIKE)->first();
            ?>
            <a href="{{route('reaction.store')}}?post_id={{$post->id}}&type={{\App\Models\Reaction::TYPE_LIKE}}" class="icon">
                <i class="bi bi-hand-thumbs-up{{$isSelected?'-fill':''}}"></i>
            </a>
            <?php $isSelected = $user->reactions()->where('post_id',$post->id)->where('type',\App\Models\Reaction::TYPE_HEART)->first();?>
            <a href="{{route('reaction.store')}}?post_id={{$post->id}}&type={{\App\Models\Reaction::TYPE_HEART}}" class="icon">
                <i class="bi bi-heart{{$isSelected?'-fill':''}}"></i>
            </a>
            <?php $isSelected = $user->reactions()->where('post_id',$post->id)->where('type',\App\Models\Reaction::TYPE_LOVE)->first();?>
            <a href="{{route('reaction.store')}}?post_id={{$post->id}}&type={{\App\Models\Reaction::TYPE_LOVE}}" class="icon">
                <i class="bi bi-emoji-heart-eyes{{$isSelected?'-fill':''}}"></i>
            </a>
        </div>
        @endcan
    </div>
    <div class="card-body">
        {{$post->content}}
    </div>
    <div class="card-footer">
        <form action="{{route('comment.store')}}" method="POST">
            <div class="row">
                @csrf
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <dl>
                    @foreach ($post->comments as $comment)
                        <dt><a {{$comment->created_by->isFreelancer()?'href='.route('home.freelancer.show',$comment->created_by->roleable_id):'' }}>{{$comment->created_by_name}}</a> </dt>
                        <dd>{{$comment->content}}</dd>
                    @endforeach
                </dl>
                @can('create', \App\Models\Comment::class)
                <x-textfield
                    :xl="8" :lg="8" :md="4" :sm="12" parentClass="mb-3"
                    idName="content"
                    :initValue="old('content')"
                    type="text"
                    :hint="null"
                    :placeholder="__('caption.labels.hint.comment')"
                    extraAttribute="required"
                ></x-textfield>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 ">
                    <label for=""></label>
                    <input type="submit" class=" form-control btn btn-outline-success"  name="save" value="{{__('caption.labels.save')}}">
                </div>
                @endcan
            </div>
        </form>
    </div>
</div>
