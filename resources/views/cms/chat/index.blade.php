@extends('layouts.cms')
@section('title')
{{__('caption.cms.menu-item.chat-menu.index' )}}
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.chat-menu.index' )}}</h1>
	</div>
</div>
<div class="row">
    <div class="col-3">
        @foreach ($chats as $chat)
            <div class="card mb-3">
                <div class="card-header"><a href="?chat={{$chat->id}}">{{$chat->title}}</a></div>
                <div class="card-body">{{$chat->messages->last()?->content??'No messages'}}</div>
            </div>
        @endforeach
    </div>
    <div class="col-9">
        <?php
            $id = $_GET['chat']??0;
            $viewedChat = collect($chats)->where('id',$id)->first();
        ?>
        @if ($viewedChat)
        <div class="card">
            <div class="card-header">
                {{$viewedChat->title}} ({{$viewedChat->first_member_name.' and '.$viewedChat->second_member_name}})
            </div>
            <div class="card-body">
                <ul>
                @foreach ($viewedChat->messages as $message)
                    <li><b>{{$message->created_by_name}}</b> : ({{$message->created_at->diffForHumans()}})<br>{{$message->content}}</li>
                @endforeach
                </ul>
            </div>
            <div class="card-footer">
                <form action="{{route('message.store')}}" method="POST">
                    @csrf
                    <div class="row" style="align-items: center">
                        <input type="hidden" name="created_by_id" value="\Auth::user()->id">
                        <input type="hidden" name="chat_id" value="{{$viewedChat->id}}">
                        <x-textarea
                            :xl="10" :lg="10" :md="10" :sm="9" parentClass="mb-3"
                            idName="content"
                            :caption="__('caption.cms.fields.message.content')"
                            :initValue="old('content')"
                            :rows="4"
                            :cols="10"
                            placeholder=""
                            extraAttribute="required"
                        ></x-textarea>
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-12 mb-3">
                            <input type="submit" class=" form-control btn btn-outline-success"  name="save" value="{{__('caption.labels.send')}}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
