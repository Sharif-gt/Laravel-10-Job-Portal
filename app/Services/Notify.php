<?php

namespace App\Services;

class Notify
{
    // Create Notification
    static function createdNotification()
    {
        notify()->success('Created Successfully', 'Success');
    }

    // Update Notification
    static function updatedNotification()
    {
        notify()->success('Updated Successfully', 'Success');
    }

    // Delete Notification
    static function deletedNotification()
    {
        notify()->success('Deleted Successfully', 'Success');
    }
}
