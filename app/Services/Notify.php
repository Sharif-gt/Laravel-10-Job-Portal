<?php

namespace App\Services;

class Notify
{
    static function createdNotification()
    {
        notify()->success('Created Successfully', 'Success');
    }

    static function updatedNotification()
    {
        notify()->success('Updated Successfully', 'Success');
    }
}
