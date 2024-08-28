<?php
namespace App\Listeners;

use UniSharp\LaravelFilemanager\Events\ImageWasUploaded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Image;

class ChangeExtensionImg
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
     * @param  object  $event
     * @return void
     */
    public function handle(ImageWasUploaded $event)
    {
        $path = $event->path();
        $image = Image::make($path);

        $newPath = preg_replace('/\\.[^.\\s]{3,4}$/', '', $path) . '.webp';
        $image->save($newPath, 80, 'webp');

        if (pathinfo($path, PATHINFO_EXTENSION) != 'webp') {    
            if (file_exists($path)) {
                unlink($path);
            }
        }
		
    }
}