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
use App\Models\Advice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminManager{

    private ?User $user;
    private ?Advice $advice;
    private ?Query $query;

    public function __construct(?User $user = null, ?Advice $advice = null, ?Query $query = null)
    {
        $this->user = $user;
        $this->advice = $advice;
        $this->query = $query;
        
    }

    public function createAdvice($user, $advice): ?Advice
    {
        $this->advice = new Advice;
        $this->advice->user_id = $user;
        $this->advice->date_publish = Carbon::now();
        $this->advice->fill($advice);
        $this->advice->save();

        return $this->advice;
    }

    


}