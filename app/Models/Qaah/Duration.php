<?php

namespace App\Models\Qaah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Qaah\OfferHall;
use App\Models\Qaah\Facility;
use Carbon\Carbon;


class Duration extends Model
{
    use HasFactory;
    protected $fillable = [
        'from',
        'to',
        'facility_id'
    ];
    public function hallsoffer(){
        return $this->hasMany(OfferHall::class);
    }
    // public function from()
    // {
    //     $fromTime = date('h:i A', strtotime($this->from));
    //     $fromSuffix = date('a', strtotime($this->from));

    //     return $fromTime . ' ' . $fromSuffix;
    // }

    // public function to()
    // {
    //     $toTime = date('h:i A', strtotime($this->to));
    //     $toSuffix = date('a', strtotime($this->to));

    //     return $toTime . ' ' . $toSuffix;
    // }
//     public function from()
// {
//     return date('g:i A', strtotime($this->from));
// }

// public function to()
// {
//     return date('g:i A', strtotime($this->to));
// }
    public function from()
    {
        $fromTime = Carbon::parse($this->from)->format('h:i A');
        $fromTime = $this->translateToArabic($fromTime);
        return $fromTime;
    }

    public function to()
    {
        $toTime = Carbon::parse($this->to)->format('h:i A');
        $toTime = $this->translateToArabic($toTime);
        return $toTime;
    }
    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
    public function getFormattedTimeAttribute()
    {
        $from = Carbon::parse($this->duration->from)->locale('ar')->isoFormat('h:mm A');
        $to = Carbon::parse($this->duration->to)->locale('ar')->isoFormat('h:mm A');

        $from = $this->translateToArabic($from);
        $to = $this->translateToArabic($to);

        return $from . ' - ' . $to;
    }

    private function translateToArabic($time)
    {
        $time = str_replace(['AM', 'PM'], ['ص', 'م'], $time);
        return $time;
    }
}
