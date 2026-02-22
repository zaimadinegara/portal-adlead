<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
	protected $guarded = [];

	protected $appends = ['image_url'];

	protected function casts(): array
	{
		return [
			'is_published' => 'boolean',
		];
	}

	public function category(): BelongsTo
	{
		return $this->belongsTo(Category::class);
	}

	public function scopePublished(Builder $query): Builder
	{
		return $query->where('is_published', true);
	}

	public function getRouteKeyName(): string
	{
		return 'slug';
	}

	public function getImageUrlAttribute(): ?string
	{
		if (! $this->image) {
			return null;
		}

		if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
			return $this->image;
		}

		return asset('storage/' . ltrim($this->image, '/'));
	}
}
