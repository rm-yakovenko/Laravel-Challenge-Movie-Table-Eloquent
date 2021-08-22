<?php

namespace App\Observers;

use App\Models\Rating;

class MovieRatingObserver
{
    public function created(Rating $rating)
    {
        $this->handle($rating);
    }

    public function updated(Rating $rating)
    {
        $this->handle($rating);
    }

    public function deleted(Rating $rating)
    {
        $this->handle($rating);
    }

    public function restored(Rating $rating)
    {
        $this->handle($rating);
    }

    public function forceDeleted(Rating $rating)
    {
        $this->handle($rating);
    }

    protected function handle(Rating $rating)
    {
        $rating->movie->updateRatingsCache();
        $rating->movie->save();
    }
}
