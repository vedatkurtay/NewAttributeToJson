<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';
    protected $fillable = ['name', 'effectiveDate'];


    protected $appends = ['remaining_time'];

    public function getRemainingTimeAttribute()
    {
        $currentTime = $this->effectiveDate;

        $date = Carbon::parse($currentTime);
        $now = Carbon::now('Europe/Istanbul');
        $date->locale('tr');

        if ($date >= $now) {
            $diff = $date->diffForHumans($now, ['long' => true, 'parts' => 4]);
            return  $diff;
        } else {
            return "Bildirim " . $diff = $date->diffForHumans($now, ['long' => true, 'parts' => 4]) . " sona erdi";
        }
    }
}
