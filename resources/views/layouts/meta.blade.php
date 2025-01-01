<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="{{config('app.description')}}">
<meta name="keywords" content="{{config('app.keywords')}}">
<meta name="author" content="{{config('app.author')}}">

<link rel="icon" href="{{asset('img/logo/logo.png')}}" type="image/png">
<link rel="apple-touch-icon" href="{{asset('img/logo/logo.png')}}">

<meta property="og:title" content="{{__('caption.project-name')}}">
<meta property="og:description" content="{{config('app.description')}}">
<meta property="og:image" content="{{asset('img/logo/logo.png')}}">
<meta property="og:url" content="https://www.yourwebsite.com">

<meta name="twitter:card" content="{{config('app.description')}}">
<meta name="twitter:title" content="{{__('caption.project-name')}}">
<meta name="twitter:description" content="{{config('app.description')}}">
<meta name="twitter:image" content="{{asset('img/logo/logo.png')}}">

<title>
    @yield('title', __('caption.project-name'))
</title>

<style>
    .rtl .dropdown-item{
        text-align:right
    }
</style>
