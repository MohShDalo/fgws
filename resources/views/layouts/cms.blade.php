<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.meta')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
	@stack('css')
</head>
<?php
	$isDarkMode = true;
	$is_RTL = \Config::get('app.locale') == 'ar';
?>
<body dir="{{$is_RTL?'rtl':'ltr'}}" class="{{$is_RTL?'rtl':'ltr'}}">
	<nav class="navbar navbar-{{$isDarkMode?'dark':'light'}} bg-{{$isDarkMode?'dark':'light'}} fixed-top">
		<div class="container">
			<a class="navbar-brand" href="{{route('cms')}}">				<img src="{{asset('files/img/logo.png')}}" alt="" style="width:100px">
				{{ config('app.name', 'Laravel') }}</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
				data-bs-target="#sideNavbar" aria-controls="sideNavbar"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="offcanvas offcanvas-{{$is_RTL?'start':'end'}} text-bg-{{$isDarkMode?'dark':'light'}}" tabindex="-1"
				id="sideNavbar" aria-labelledby="sideNavbarLabel">
				<div class="offcanvas-header bg-main-color-light">
					<h5 class="offcanvas-title" id="sideNavbarLabel">{{__('caption.cms.menu-item.title')}}</h5>
					<button type="button" class="btn-close btn-close-{{$isDarkMode?'white':'dark'}}"
						data-bs-dismiss="offcanvas" aria-label="Close"></button>
				</div>
				<div class="offcanvas-body bg-main-color-light">
					@if(\Auth::check())
					<ul class="navbar-nav justify-content-{{$is_RTL?'start':'end'}} flex-grow-1 pe-3">
                        @if(false)
						@can('viewAny', \App\Models\User::class)
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
								aria-expanded="false">
								{{__('caption.cms.menu-item.user-menu.title')}}
							</a>
							<ul class="dropdown-menu dropdown-menu-{{$isDarkMode?'white':'dark'}}">
								<li><a class="dropdown-item" href="{{route('user.index')}}">{{__('caption.cms.menu-item.user-menu.index')}}</a></li>
								@can('create', \App\Models\User::class)
								<li><a class="dropdown-item" href="{{route('user.create')}}">{{__('caption.cms.menu-item.user-menu.add')}}</a></li>
								@endcan
							</ul>
						</li>
						@endcan
						@can('viewAny', \App\Models\Freelancer::class)
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
								aria-expanded="false">
								{{__('caption.cms.menu-item.freelancer-menu.title')}}
							</a>
							<ul class="dropdown-menu dropdown-menu-{{$isDarkMode?'white':'dark'}}">
								<li><a class="dropdown-item" href="{{route('freelancer.index')}}">{{__('caption.cms.menu-item.freelancer-menu.index')}}</a></li>
								@can('create', \App\Models\Freelancer::class)
								<li><a class="dropdown-item" href="{{route('freelancer.create')}}">{{__('caption.cms.menu-item.freelancer-menu.add')}}</a></li>
								@endcan
							</ul>
						</li>
						@endcan

						@can('viewAny', \App\Models\Manger::class)
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
								aria-expanded="false">
								{{__('caption.cms.menu-item.manger-menu.title')}}
							</a>
							<ul class="dropdown-menu dropdown-menu-{{$isDarkMode?'white':'dark'}}">
								<li><a class="dropdown-item" href="{{route('manger.index')}}">{{__('caption.cms.menu-item.manger-menu.index')}}</a></li>
								@can('create', \App\Models\Manger::class)
								<li><a class="dropdown-item" href="{{route('manger.create')}}">{{__('caption.cms.menu-item.manger-menu.add')}}</a></li>
								@endcan
							</ul>
						</li>
						@endcan
                        @endif
                        @if(\Auth::user()->isFreelancer())
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
								aria-expanded="false">
								{{__('caption.cms.menu-item.freelancer-menu.profile')}}
							</a>
							<ul class="dropdown-menu dropdown-menu-{{$isDarkMode?'white':'dark'}}">
                                @can('viewAny', \App\Models\Skill::class)
                                    <li><a class="dropdown-item" href="{{route('skill.index')}}">{{__('caption.cms.menu-item.skill-menu.index')}}</a></li>
                                    @can('create', \App\Models\Skill::class)
                                    <li><a class="dropdown-item" href="{{route('skill.create')}}">{{__('caption.cms.menu-item.skill-menu.add')}}</a></li>
                                    @endcan
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                @endcan
                                @can('viewAny', \App\Models\Certificate::class)
                                    <li><a class="dropdown-item" href="{{route('certificate.index')}}">{{__('caption.cms.menu-item.certificate-menu.index')}}</a></li>
                                    @can('create', \App\Models\Certificate::class)
                                    <li><a class="dropdown-item" href="{{route('certificate.create')}}">{{__('caption.cms.menu-item.certificate-menu.add')}}</a></li>
                                    @endcan
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                @endcan
                                @can('viewAny', \App\Models\Education::class)
                                    <li><a class="dropdown-item" href="{{route('education.index')}}">{{__('caption.cms.menu-item.education-menu.index')}}</a></li>
                                    @can('create', \App\Models\Education::class)
                                    <li><a class="dropdown-item" href="{{route('education.create')}}">{{__('caption.cms.menu-item.education-menu.add')}}</a></li>
                                    @endcan
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                @endcan
                                @can('viewAny', \App\Models\Language::class)
                                    <li><a class="dropdown-item" href="{{route('language.index')}}">{{__('caption.cms.menu-item.language-menu.index')}}</a></li>
                                    @can('create', \App\Models\Language::class)
                                    <li><a class="dropdown-item" href="{{route('language.create')}}">{{__('caption.cms.menu-item.language-menu.add')}}</a></li>
                                    @endcan
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                @endcan
                                @can('viewAny', \App\Models\Experience::class)
                                    <li><a class="dropdown-item" href="{{route('experience.index')}}">{{__('caption.cms.menu-item.experience-menu.index')}}</a></li>
                                    @can('create', \App\Models\Experience::class)
                                    <li><a class="dropdown-item" href="{{route('experience.create')}}">{{__('caption.cms.menu-item.experience-menu.add')}}</a></li>
                                    @endcan
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                @endcan
                                @can('viewAny', \App\Models\Portfolio::class)
                                    <li><a class="dropdown-item" href="{{route('portfolio.index')}}">{{__('caption.cms.menu-item.portfolio-menu.index')}}</a></li>
                                    @can('create', \App\Models\Portfolio::class)
                                    <li><a class="dropdown-item" href="{{route('portfolio.create')}}">{{__('caption.cms.menu-item.portfolio-menu.add')}}</a></li>
                                    @endcan
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                @endcan
                                @can('viewAny', \App\Models\Reference::class)
                                    <li><a class="dropdown-item" href="{{route('reference.index')}}">{{__('caption.cms.menu-item.reference-menu.index')}}</a></li>
                                    @can('create', \App\Models\Reference::class)
                                    <li><a class="dropdown-item" href="{{route('reference.create')}}">{{__('caption.cms.menu-item.reference-menu.add')}}</a></li>
                                    @endcan
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                @endcan
                                <li><a class="dropdown-item" href="{{route('freelancer.show',\Auth::user()->roleable_id)}}">{{__('caption.cms.menu-item.freelancer-menu.view-mine')}}</a></li>
							</ul>
						</li>
                        @endif

						@can('viewAny', \App\Models\Post::class)
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
								aria-expanded="false">
								{{__('caption.cms.menu-item.post-menu.title')}}
							</a>
							<ul class="dropdown-menu dropdown-menu-{{$isDarkMode?'white':'dark'}}">
								<li><a class="dropdown-item" href="{{route('post.index')}}">{{__('caption.cms.menu-item.post-menu.index')}}</a></li>
								@can('create', \App\Models\Post::class)
								<li><a class="dropdown-item" href="{{route('post.create')}}">{{__('caption.cms.menu-item.post-menu.add')}}</a></li>
								@endcan
							</ul>
						</li>
						@endcan

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
								aria-expanded="false">
								{{__('caption.cms.menu-item.job-menu.title')}}
							</a>
							<ul class="dropdown-menu dropdown-menu-{{$isDarkMode?'white':'dark'}}">
								@can('viewAny', \App\Models\Offer::class)
									<li><a class="dropdown-item" href="{{route('offer.index')}}">{{__('caption.cms.menu-item.offer-menu.index')}}</a></li>
								@endcan
								@can('viewAny', \App\Models\Job::class)
									<li><a class="dropdown-item" href="{{route('job.index')}}">{{__('caption.cms.menu-item.job-menu.index')}}</a></li>
									@can('create', \App\Models\Job::class)
									<li><a class="dropdown-item" href="{{route('job.create')}}">{{__('caption.cms.menu-item.job-menu.add')}}</a></li>
									@endcan
								@endcan
							</ul>
						</li>
						@if(\Auth::check())
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
								data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ __('caption.cms.pages.login.manage_account').' - '.(Auth::user()->name??"") }}
							</a>

							<ul class="dropdown-menu bg-main-color-orange">
								{{-- <li><a class="dropdown-item" href="{{route('user.password.change')}}">{{__('caption.cms.pages.login.change_password')}}</a></li>
								<li>
									<hr class="dropdown-divider">
								</li> --}}

                                @can('viewAny', \App\Models\Chat::class)
                                    <li><a class="dropdown-item" href="{{route('chat.index')}}">{{__('caption.cms.menu-item.chat-menu.index')}}</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                @endcan

								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
									{{ __('caption.labels.logout') }}
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
								</a>
							</ul>
						</li>
						@endif
					</ul>
				@endif
				</div>
			</div>
		</div>
	</nav>
	<div class="container mt-5 pt-4">
		@if(session('type') && session('message') || $errors->any())
		<div class="row">
			@if($errors->any())
			<div class="alert alert-danger">
				<ul  class="m-0">
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(session('extra_message'))
				<div class="alert alert-warning">
					{!!session()->pull('extra_message')!!}
				</div>
			@endif
			@if(session('type') && session('message'))
				<div class="alert alert-{{session()->pull('type')}}">
					{!!session()->pull('message')!!}
				</div>
			@endif
		</div>
		@endif
		@yield('content' )
	</div>
	@stack('script')
	<script>
		document.addEventListener("DOMContentLoaded", function() {
		var requiredInputs = document.querySelectorAll('input[required], select[required], textarea[required]');
		requiredInputs.forEach(function(input) {
			var label = document.querySelector(`label[for="${input.id}"]`);
			if (label) {
				var span = document.createElement('span');
				span.textContent = ' *';
				span.style.color = 'red';
				label.appendChild(span);
			}
		});
		});
	</script>
</body>
</html>
