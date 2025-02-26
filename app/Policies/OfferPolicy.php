<?php

namespace App\Policies;

use App\Models\Offer;
use App\Models\User;
use App\Models\Manger;
use Illuminate\Auth\Access\HandlesAuthorization;

class OfferPolicy
{
	use HandlesAuthorization;

	/**
	 * Determine whether the user can view any models.
	 *
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Auth\Access\Response|bool
	 */
	public function viewAny(User $user)
	{
		return true;
	}

	/**
	 * Determine whether the user can view the model.
	 *
	 * @param  \App\Models\User  $user
	 * @param  \App\Models\Offer  $offer
	 * @return \Illuminate\Auth\Access\Response|bool
	 */
	public function view(User $user, Offer $offer)
	{
		return true;
	}

	/**
	 * Determine whether the user can create models.
	 *
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Auth\Access\Response|bool
	 */
	public function create(User $user)
	{
		return $user->isFreelancer();
	}

	/**
	 * Determine whether the user can update the model.
	 *
	 * @param  \App\Models\User  $user
	 * @param  \App\Models\Offer  $offer
	 * @return \Illuminate\Auth\Access\Response|bool
	 */
	public function update(User $user, Offer $offer)
	{
		return $offer->owner_id == $user->roleable_id;
	}

    public function approve(User $user, Offer $offer)
	{
		return $offer->job->owner_id == $user->roleable_id && $user->roleable_type == Manger::class;
	}

	/**
	 * Determine whether the user can delete the model.
	 *
	 * @param  \App\Models\User  $user
	 * @param  \App\Models\Offer  $offer
	 * @return \Illuminate\Auth\Access\Response|bool
	 */
	public function delete(User $user, Offer $offer)
	{
		return true;
	}

	/**
	 * Determine whether the user can restore the model.
	 *
	 * @param  \App\Models\User  $user
	 * @param  \App\Models\Offer  $offer
	 * @return \Illuminate\Auth\Access\Response|bool
	 */
	public function restore(User $user, Offer $offer)
	{
		return true;
	}

	/**
	 * Determine whether the user can permanently delete the model.
	 *
	 * @param  \App\Models\User  $user
	 * @param  \App\Models\Offer  $offer
	 * @return \Illuminate\Auth\Access\Response|bool
	 */
	public function forceDelete(User $user, Offer $offer)
	{
		return true;
	}
}
