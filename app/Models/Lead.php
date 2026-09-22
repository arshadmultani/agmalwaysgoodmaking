<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'service_type',
        'location',
        'message',
        'status',
    ];

    public function getCleanPhoneAttribute(): string
    {
        return preg_replace('/[^0-9]/', '', $this->phone);
    }

    public function getWhatsAppUrlAttribute(): string
    {
        $phone = $this->clean_phone;
        if (strlen($phone) === 10) {
            $phone = '91'.$phone;
        }

        $text = rawurlencode("Hello {$this->name}, this is Nasir Multani from AGM Always Good Making regarding your inquiry on {$this->service_type}. How can we assist you today?");

        return "https://wa.me/{$phone}?text={$text}";
    }
}
