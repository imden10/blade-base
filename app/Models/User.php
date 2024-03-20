<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 * @package App
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $email_verified_at
 * @property string $phone
 * @property string $color
 * @property string $phone_verified_at
 * @property string $password
 * @property string $remember_token
 * @property integer $status
 * @property string $last_seen_at
 * @property string $initials
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'photo',
        'color',
        'phone',
        'phone_verified_at',
        'status',
        'last_seen_at',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_seen_at' => 'datetime',
        'password' => 'hashed',
    ];

    const STATUS_NOT_ACTIVE = 0; // Не активний
    const STATUS_ACTIVE   = 1; // Активний

    const COLORS = [
        '#3498db', // Синій
        '#2ecc71', // Зелений
        '#e74c3c', // Червоний
        '#f39c12', // Помаранчевий
        '#9b59b6', // Фіолетовий
        '#1abc9c', // Блакитний
        '#e67e22', // Темно-помаранчевий
        '#27ae60', // Темно-зелений
        '#2980b9', // Темно-синій
        '#d35400'  // Гарбузовий
    ];

    public function generateRandomColor()
    {
        $usedColors = User::query()->pluck('color')->all();
        $availableColors = array_diff(self::COLORS, $usedColors);

        if (empty($availableColors)) {
            // Якщо всі кольори вже використані, виберіть колір з найменшою кількістю користувачів
            $colorCounts = array_count_values($usedColors);
            asort($colorCounts);
            $leastUsedColor = key($colorCounts);
            $this->color = $leastUsedColor;
        } else {
            // Виберіть випадковий колір із доступних
            $this->color = $availableColors[array_rand($availableColors)];
        }
    }

    // Додатковий метод для отримання ініціалів користувача
    public function getInitialsAttribute()
    {
        $nameParts = explode(' ', $this->name);
        $initials = '';

        // Визначаємо максимум 2 слова
        $nameParts = array_slice($nameParts, 0, 2);

        foreach ($nameParts as $part) {
            $initials .= strtoupper(mb_substr($part, 0, 1));
        }

        return $initials;
    }

    /**
     * @return \string[][]
     */
    public static function getStatuses(): array
    {
        return [
            self::STATUS_NOT_ACTIVE => [
                'title'    => 'Не активний',
                'color'    => '#f05252'
            ],
            self::STATUS_ACTIVE     => [
                'title'    => 'Активний',
                'color'    => '#31c48d'
            ]
        ];
    }

    /**
     * @return string[]
     */
    public function getStatus(): array
    {
        return self::getStatuses()[$this->status];
    }

    /**
     * @param Builder $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('users.status', self::STATUS_ACTIVE);
    }
}
