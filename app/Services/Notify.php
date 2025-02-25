<?php

namespace App\Services;


class Notify
{
    // Create Notification
    static function createdNotification()
    {
        notyf()->addSuccess('Created Successfully.');
    }

    // Update Notification
    static function updatedNotification()
    {
        notyf()->addSuccess('Updated Successfully.');
    }

    // Delete Notification
    static function deletedNotification()
    {
        notyf()->addSuccess('Deleted Successfully.');
    }

    // error Notification
    static function errorNotification(string $error)
    {
        notyf()->addError($error, 'Error!');
    }
}
