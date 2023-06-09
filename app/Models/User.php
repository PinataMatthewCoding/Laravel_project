<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "name",
        "gender",
        "email",
        "password",
        "phone_number",
        "province",
    ];

    // // RELATIONSHIP 1 USER HAS MANY EVENTS
    public function events(): HasMany
    {
        return $this->hasMany(Event::class,'created_by','id');
    }
    // RELATIONSHIP 1 USER HAS MANY TEAM
    public function teams(): HasMany
    {
        return $this->hasMany(Team::class,'created_by','id');
    }
    
    // // RELATIONSHIP 1 USER HAS MANY TICKET
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class,'buy_ticket','id');
    }

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function store($request, $id = null)
    {
        $user = $request->only([
            "name",
            "gender",
            "email",
            "password",
            "phone_number",
            "province",
        ]);
        // PASSWORD INCREASE
        $user["password"] = Hash::make($request->password);
        // CONDITION
        if ($id) {
            $dataUser = self::updateOrCreate(["id" => $id], $user);
        } else {
            $dataUser = self::create($user);
            $id = $dataUser->id;
        }
        return $dataUser;
    }
}