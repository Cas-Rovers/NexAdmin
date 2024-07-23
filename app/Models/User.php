<?php

    namespace App\Models;

    // use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Sanctum\HasApiTokens;
    use Spatie\MediaLibrary\HasMedia;
    use Spatie\MediaLibrary\InteractsWithMedia;
    use Spatie\MediaLibrary\MediaCollections\Models\Media;
    use Spatie\Permission\Traits\HasRoles;

//    use Laravel\Fortify\TwoFactorAuthenticatable;

    class User extends Authenticatable implements HasMedia
    {
        use HasApiTokens, HasFactory, HasRoles, InteractsWithMedia, Notifiable, SoftDeletes;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'first_name',
            'last_name',
            'email',
            'password',
            'is_active',
        ];

        /**
         * The attributes that should be hidden for serialization.
         *
         * @var array<int, string>
         */
        protected $hidden = [
            'password',
            'remember_token',
        ];

        /**
         * Get the attributes that should be cast.
         *
         * @return array<string, string>
         */
        protected function casts(): array
        {
            return [
                'email_verified_at' => 'datetime',
                'password' => 'hashed',
                'is_active' => 'boolean',
            ];
        }

        /**
         * Get the user's full name.
         *
         * @return string
         */
        public function getFullNameAttribute(): string
        {
            $nameParts = explode(' ', $this->last_name);

            $firstName = $this->first_name;
            $lastName = array_shift($nameParts);
            $infix = implode(' ', $nameParts);

            return trim($firstName . ' ' . $infix . ' ' . $lastName);
        }

        /**
         * Get the URL of the profile avatar thumbnail.
         *
         * @return string
         */
        public function getProfileAvatar(): string
        {
            if ($this->hasMedia('avatar')) {
                return $this->getFirstMedia('avatar')->getUrl('thumbnail');
            } else {
                return asset('images/default-avatar.jpg');
            }
        }

        /**
         * Get the URL of the original profile avatar image.
         *
         * @return string
         */
        public function getOriginalAvatar(): string
        {
            if ($this->hasMedia('avatar')) {
                return $this->getFirstMedia('avatar')->getUrl('thumbnail');
            } else {
                return asset('images/default-avatar.jpg');
            }
        }

        /**
         * Save the profile picture and return the URL of the thumbnail.
         *
         * @param $file
         *
         * @return string
         * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
         * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
         */
        public function saveProfilePicture($file): string
        {
            $this->clearMediaCollection('avatar');
            $this->addMedia($file)->toMediaCollection('avatar');

            return $this->getFirstMedia('avatar')->getUrl('thumbnail');
        }

        /**
         * Register the media conversions for the profile avatar.
         *
         * @param \Spatie\MediaLibrary\MediaCollections\Models\Media|null $media
         *
         * @return void
         */
        public function registerMediaConversions(?Media $media = null): void
        {
            $this->addMediaConversion('thumbnail')
                ->keepOriginalImageFormat()
                ->width(96)
                ->height(96)
                ->sharpen(10)
                ->nonQueued();

            $this->addMediaConversion('original')
                ->keepOriginalImageFormat()
                ->width(368)
                ->height(232)
                ->sharpen(10);
        }
    }
