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

        @endforeach
    </div>
    <div class="col-9">
        <?php
        $viewedChat = $chats[$_GET['chat']]??null;
        ?>
        @if ($viewedChat)

        @endif
    </div>
</div>
@endsection
