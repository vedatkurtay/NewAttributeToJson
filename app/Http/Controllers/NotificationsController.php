<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index() {
        $notifications = Notification::all();
        return $notifications;
    }
}
