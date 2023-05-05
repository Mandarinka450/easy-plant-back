<?php


namespace App;

use Carbon\Carbon;
use App\PermissionManager;
use App\RoleManager;
use App\Models\User;
use App\Models\Room;
use App\Models\Plant;
use App\Models\Query;
use App\Models\Myplants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ExpertManager{

    private ?User $user;
    private ?Query $query;

    public function __construct(?User $user = null, ?Query $query = null)
    {
        $this->user = $user;
        $this->query = $query;
        
    }

    public function createQuery($user, $query): ?Query
    {
        $this->query = new Query;
        $this->query->user_id = $user;
        $this->query->date_create = Carbon::now();
        $this->query->fill($query);
        $this->query->save();

        return $this->query;
    }


}