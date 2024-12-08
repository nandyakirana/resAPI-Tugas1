<?

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',  // Menambahkan kolom 'username' ke dalam $fillable
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
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Menentukan kolom yang digunakan untuk autentikasi.
     * Secara default, Laravel menggunakan 'email' untuk login.
     * Namun, kita ingin menggunakan 'username'.
     */
    public function getAuthIdentifierName()
    {
        return 'username';  // Menetapkan kolom 'username' sebagai identifier autentikasi
    }
}
