<?php

    namespace App\Models;

use App\Notifications\VerifyEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Sanctum\HasApiTokens;

    use Illuminate\Database\Eloquent\Relations\HasMany;
    class User extends Authenticatable implements MustVerifyEmail 
    {
        use HasFactory, Notifiable, HasApiTokens;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'id',
            'name',
            'first_email',
            'phone',
            'email',
            'diachi',
            'password',
            'status',
            'role', 
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
        protected $listen = [
            'Illuminate\Auth\Events\Registered' => [
                'Illuminate\Auth\Listeners\SendEmailVerificationNotification',
            ],
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
            ];
        }
        public function binh_luan(): HasMany {
            return $this->hasMany(binhluan::class);
        }
        public function sendEmailVerificationNotification()
        {
            $this->notify(new VerifyEmailNotification());
        }
    }
