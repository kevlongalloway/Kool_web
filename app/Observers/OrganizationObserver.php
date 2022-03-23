<?php

namespace App\Observers;

use App\Organization;

class OrganizationObserver
{
    /**
     * Handle the organization "created" event.
     *
     * @param  \App\Organization  $organization
     * @return void
     */
    public function created(Organization $organization)
    {
        $organization->generateAccessCode();
        $organization->generateTeacherPasscode();
    }



    /**
     * Handle the organization "updated" event.
     *
     * @param  \App\Organization  $organization
     * @return void
     */
    public function updated(Organization $organization)
    {
        //
    }

    /**
     * Handle the organization "deleted" event.
     *
     * @param  \App\Organization  $organization
     * @return void
     */
    public function deleted(Organization $organization)
    {
        //
    }

    /**
     * Handle the organization "restored" event.
     *
     * @param  \App\Organization  $organization
     * @return void
     */
    public function restored(Organization $organization)
    {
        //
    }

    /**
     * Handle the organization "force deleted" event.
     *
     * @param  \App\Organization  $organization
     * @return void
     */
    public function forceDeleted(Organization $organization)
    {
        //
    }
}
