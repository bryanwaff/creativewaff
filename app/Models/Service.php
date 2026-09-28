<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'meta_catalog_id',
        'short_description',
        'full_description',
        'price',
        'currency',
        'image',
        'whatsapp_message',
        'features',
        'is_featured',
    ];

    protected $casts = [
        'features' => 'array',
        'price' => 'decimal:2',
        'is_featured' => 'boolean',
    ];

    // Helper for generating custom WhatsApp inquiry URLs
    public function getWhatsappUrlAttribute(): string
    {
        $phone = config('services.whatsapp.phone_number', '254707765867');
        $message = $this->whatsapp_message
            ?? "Hi Bryan! I am interested in {$this->name} (Ref: {$this->meta_catalog_id}).";

        return "https://wa.me/{$phone}?text=".rawurlencode($message);
    }
}
