<?php


namespace App;


use App\PermissionManager;
use App\RoleManager;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserManager
{
    private ?User $user;

    public function __construct(?User $user = null)
    {
        $this->user = $user;
    }

    public function create(array $data): ?User
    {
        $this->user = app(User::class);
        $this->user->fill($data);
        $this->user->password = Hash::make($data['password']);
        $this->user->save();

        // app(RoleManager::class, ['user' => $this->user])->giveUserRole();
        // app(PermissionManager::class, ['user' => $this->user])->giveUserPermissions();
        return $this->user;
    }

    public function auth($email, $password, $remember)
    {
        $this->user = User::where('email', $email)->first();

        if($this->user == null){
            return 0;
        } else {
            if(!Hash::check($password, optional($this->user)->password)){
                return 1;
            } else {
                $ttl = env('JWT_TTL');
                if ($remember == true)
                {
                    $ttl = env('JWT_REMEMBER_TTL');
                }

                return auth()->setTTL($ttl)->login($this->user);
            }
        }
    }

    public function logout(){
        auth()->logout();
    }
    
    public function update(array $params): User
    {
        $this->user->update($params);

        return $this->user;
    }
}