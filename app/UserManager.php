<?php


namespace App;

use Carbon\Carbon;
use App\PermissionManager;
use App\RoleManager;
use App\Models\User;
use App\Models\Room;
use App\Models\Plant;
use App\Models\Category;
use App\Models\Law;
use App\Models\Myplants;
use App\Models\Reminder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserManager
{
    private ?User $user;
    private ?Room $room;
    private ?Plant $plant;
    private ?Category $category;
    private ?Law $law;
    private ?Myplants $myplants;
    private ?Reminder $reminder;

    public function __construct(?User $user = null, ?Room $room = null, ?Myplants $myplants = null, ?Plant $plant = null, ?Category $category = null, ?Law $law = null, ?Reminder $reminder = null)
    {
        $this->user = $user;
        $this->room = $room;
        $this->plant = $plant;
        $this->category = $category;
        $this->law = $law;
        $this->myplants = $myplants;
        $this->reminder = $reminder;
    }

    public function create(array $data): ?User
    {
        $this->user = app(User::class);
        $this->user->fill($data);
        $this->user->password = Hash::make($data['password']);
        $this->user->save();

        app(RoleManager::class, ['user' => $this->user])->giveUserRole();
        app(PermissionManager::class, ['user' => $this->user])->giveUserPermissions();
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

    /**
     * create rooms for user in profile
     */

    public function createRoom($user, $room): ?Room
    {
        $this->room = new Room;
        $this->room->user_id = $user;
        $this->room->fill($room);
        $this->room->save();

        return $this->room;
    }

    public function delRoom($id): ?Room
    {
        $this->room = Room::where('id', $id)->first();
        $this->room->delete();

        return $this->room;
    }

    /**
     * add plant in table myplants
     */

    public function addPlant($user, $myplants): ?Myplants
    {
        $this->myplants = new Myplants;
        $this->myplants->user_id = $user;
        $this->myplants->fill($myplants);
        $this->myplants->save();
 
        return $this->myplants;
    }

    /**
     * add law of an expert
     */

    public function createLaw($user, $law): ?Law
    {
        $this->law = new Law;
        $this->law->user_id = $user;
        $this->law->date_create = Carbon::now();
        $this->law->fill($law);
        $this->law->save();
  
        return $this->law;
    }

    /**
     * delete MyPlants
     */
    public function delPlant($id): ?Myplants
    {
        $this->myplants = Myplants::where('id', $id)->first();
        $this->myplants->delete();

        return $this->myplants;
    }

    /**
     * create remind for plants
     */

    public function createReminder($user, $reminder): ?Reminder
    {
        $this->reminder = new Reminder;
        $this->reminder->user_id = $user;
        $this->reminder->fill($reminder);
        $this->reminder->save();
  
        return $this->reminder;
    }

    /**
     * for postman
     */

    public function createCategories($category): ?Category
    {
        $this->category = new Category;
        $this->category->fill($category);
        $this->category->save();
   
        return $this->category;
    }

    public function createPlants($plant): ?Plant
    {
        $this->plant = new Plant;
        $this->plant->fill($plant);
        $this->plant->save();
   
        return $this->plant;
    }




}