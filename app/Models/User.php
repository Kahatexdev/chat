<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Namu\WireChat\Traits\Chatable;
use Illuminate\Support\Collection;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
use Chatable;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
        ];
    }

public function searchChatables(string $query): ?Collection
    {
        $searchableFields = ['name'];
        return User::where(function ($queryBuilder) use ($searchableFields, $query) {
            foreach ($searchableFields as $field) {
                $queryBuilder->orWhere($field, 'LIKE', '%' . $query . '%');
            }
        })
            ->limit(20)
            ->get();
    }
    
    public function canCreateChats(): bool
    {
        return $this->hasVerifiedEmail();
    }

    public function canCreateGroups(): bool
    {
        return $this->hasVerifiedEmail() === true;
    }

    public function canSendMessages(): bool
    {
        return $this->hasVerifiedEmail() === true;
    }

    public function canReceiveMessages(): bool
    {
        return $this->hasVerifiedEmail() === true;
    }

}
