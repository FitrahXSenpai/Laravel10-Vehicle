<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Enums\VehicleType;

class VehicleList extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['brand'];
    protected $casts = ['type' => VehicleType::class];

    public function scopeFilter($query, array $filters) {

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
                 $query->where('name', 'like', '%' . $search . '%')
                 ->orWhere('type', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['brand'] ?? false, function($query, $brand) {
            return $query->whereHas('brand', function($query) use ($brand) {
                $query->where('slug', $brand);
            });
        });
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function getRouteKeyName() {
        return 'slug';
    }

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
