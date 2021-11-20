<?php

namespace App\Listeners;

use App\Events\UploadImageEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UploadImageEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UploadImageEvent  $event
     * @return void
     */
    public function handle(UploadImageEvent $event)
    {
        foreach($event->images as $image){
            $event->product->addMedia($image)->toMediaCollection('main_image');
        }
        //
        // echo "working";
    }
}
