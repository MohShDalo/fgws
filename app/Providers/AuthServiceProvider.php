<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	 */
	protected $policies = [
		\App\Models\User::class => \App\Policies\UserPolicy::class,
		\App\Models\Freelancer::class => \App\Policies\FreelancerPolicy::class,
		\App\Models\Manger::class => \App\Policies\MangerPolicy::class,
		\App\Models\Skill::class => \App\Policies\SkillPolicy::class,
		\App\Models\Certificate::class => \App\Policies\CertificatePolicy::class,
		\App\Models\Education::class => \App\Policies\EducationPolicy::class,
		\App\Models\Language::class => \App\Policies\LanguagePolicy::class,
		\App\Models\Experience::class => \App\Policies\ExperiencePolicy::class,
		\App\Models\Portfolio::class => \App\Policies\PortfolioPolicy::class,
		\App\Models\Reference::class => \App\Policies\ReferencePolicy::class,
		\App\Models\Post::class => \App\Policies\PostPolicy::class,
		\App\Models\Job::class => \App\Policies\JobPolicy::class,
		\App\Models\Comment::class => \App\Policies\CommentPolicy::class,
		\App\Models\Offer::class => \App\Policies\OfferPolicy::class,
		\App\Models\Reaction::class => \App\Policies\ReactionPolicy::class,
		\App\Models\Chat::class => \App\Policies\ChatPolicy::class,
		\App\Models\Message::class => \App\Policies\MessagePolicy::class,
		// 'App\Model' => 'App\Policies\ModelPolicy',
	];

	/**
	 * Register any authentication / authorization services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->registerPolicies();

		//
	}
}
