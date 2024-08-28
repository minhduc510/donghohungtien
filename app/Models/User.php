<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Point;

class User extends Authenticatable
{
    use Notifiable;
    // status [1=>'khởi tạo chưa điền hoàn thiện thông tin',2=>'đã điền hoàn thiện thông tin']

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'parent_id', 'parent_id2', 'order', 'password', 'active','phone','date_birth','address','hktt','cmt','stk','ctk','bank_id','bank_branch','sex','point','rank','status','avatar_path','day','sale','month','year'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    private $data = [];

    // get role by relationship nhieu-nhieu by table trung gian role_users
    // table trung gian role_users chứa column role_id và user_id
    public function getRoles()
    {
        return $this
            ->belongsToMany(Role::class, RoleUser::class, 'user_id', 'role_id')
            ->withTimestamps();
    }
    public function CheckPermissionAccess($key_code)
    {
        $roles = auth()->user()->getRoles()->get();
        foreach ($roles as $role) {
            $permissions = $role->getPermissions()->pluck('key_code');
            if ($permissions->contains($key_code)) {
                return true;
            }
        }
        return false;
    }
    // lấy point từ model point
    public function points()
    {
        return $this->hasMany(Point::class, "user_id", "id");
    }
    // lấy pay
    public function pays()
    {
        return $this->hasMany(Pay::class, 'user_id', 'id');
    }

    // lấy user con 20 tầng
    public function childs()
    {
        return $this->hasMany(User::class, 'parent_id', 'id');
    }
    // lấy user cha 20 tầng
    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id', 'id');
    }

    // lấy user con 20 tầng
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'user_id', 'id');
    }
    public function addressOfUser()
    {
        return $this->hasMany(AddressOfUser::class, 'user_id', 'id');
    }
    // lấy user con 7 tầng
    public function childs2()
    {
        return $this->hasMany(User::class, 'parent_id2', 'id');
    }
    // lấy user cha 7 tầng
    public function parent2()
    {
        return $this->belongsTo(User::class, 'parent_id2', 'id');
    }


    // lấy list user theo cấp
    public function listUser20($user)
    {
        $i = 1;
        $this->data = [];
        $data = [];
        $userLoop = [$user];
        // dd($userLoop->childs()->first()->childs()->first()->childs()->first()->childs()->first());
        $data =  $this->getListUser20Recusive($userLoop, 1);
        //  $data=collect($data);
        // dd($data->orderby('created_at'));
        return $data;
    }



    // lấy user đệ quy
    public function getListUser20Recusive($userLoop, $i = 1, $imax = 20)
    {
        if ($i <= $imax) {
            if ($userLoop) {
                foreach ($userLoop as $loopItem) {
                    if ($loopItem->childs->count() > 0) {
                        $list = $loopItem->childs()->get();
                        foreach ($list as $item) {
                            $item->level = $i;
                            array_push($this->data, $item);
                        }
                    }
                }
                foreach ($userLoop as $loopItem) {
                    if ($loopItem->childs->count() > 0) {
                        $this->getListUser20Recusive($loopItem->childs, $i + 1);
                    }
                }
            }
        }
        return $this->data;
    }

    // lấy số thứ tự lớn nhất sau đó +1 để được thứ tự mới
    public function getOrderOfNewUser()
    {
        return $this->max('order') + 1;
    }

    // lấy id của thành phần cha mô hình 7 lớp
    public function getParentIdOfNewUser()
    {
        $numberChild = 3;
        // công thức tính tổng số phần tử ở vòng thứ n là x*0 + (x^(n+1)-x)/(x-1);
        // công thức tính số phần tử của vòng thứ n = x^n;
        $numberUserDatabase = $this->whereIn('active', [1,2])->get()->count();
        if ($numberUserDatabase > 0) {

            $numberUser = $numberUserDatabase + 1;
           // dd(  $numberUserDatabase );
            if ($numberUser <= 4) {
                $stt = 1;
            } else {
                // dd($numberUser);
                $totalCicle = log((($numberUser - 1) * ($numberChild - 1) + $numberChild), $numberChild) - 1;
                // vòng hoàn thiện cuối cùng
                //  dd($totalCicle-floor($totalCicle)==0);
                if ($totalCicle - floor($totalCicle) == 0) {
                    $n = $totalCicle - 1;
                } else {
                    $n = floor($totalCicle);
                }
                // dd($n);
                // tổng số user đến vòng thứ n là
                $totalUser = 1 + (pow($numberChild, $n + 1) - $numberChild) / ($numberChild - 1);
                // tổng số user đến vòng thứ n -1 là
                $totalUserNPrev = 1 + (pow($numberChild, $n + 1 - 1) - $numberChild) / ($numberChild - 1);
                // dd( $numberUserN);
                // dd($numberUserN);
                // số user đã có ở vòng tiếp theo
                $numberUserNNext = $numberUser - $totalUser;
                // dd($numberUserNNext);
                // số user tối đa ở vòng tiếp theo là
                $numberUserMaxNNext = pow($numberChild, $n + 1);
                $start = $totalUserNPrev + 1;
                $end = $totalUser;
                $ck= $end-$start+1;
              //  dd($start);
                if($numberUserNNext%$ck==0){
                    $stt=$end;
                }else{
                    $m=$numberUserNNext;
                    while($m>=$ck){
                        $m=$m%$ck;
                    }
                  //  dd($m);
                    $stt=$start+$m-1;
                }

              // dd($stt);
             // dd($ck, $start, $end);
            }

            $userParent = $this->whereIn('active', [1,2])->orderBy('order', 'asc')->offset($stt - 1)->limit(1)->first();
            $parent_id2=$userParent->id;
          //  dd($stt);
        } else {
            $parent_id2 = 0;
        }
        return $parent_id2;
    }

    public function test($start, $end, $chuki, $nNext)
    {
        $numberChild = 3;
        // công thức tính tổng số phần tử ở vòng thứ n là x*0 + (x^(n+1)-x)/(x-1);
        // công thức tính số phần tử của vòng thứ n = x^n;
        $numberUserDatabase = $this->where([
            'active' => 1,
        ])->get()->count();
        if ($numberUserDatabase > 0) {
            $numberUser = $numberUserDatabase + 1;
            // dd($numberUser);
            $totalCicle = log((($numberUser - 1) * ($numberChild - 1) + $numberChild), $numberChild) - 1;
            // vòng hoàn thiện cuối cùng
            //  dd($totalCicle-floor($totalCicle)==0);
            if ($totalCicle - floor($totalCicle) == 0) {
                $n = $totalCicle - 1;
            } else {
                $n = floor($totalCicle);
            }

            // dd($n);
            // tổng số user đến vòng thứ n là
            $numberUserN = 1 + (pow($numberChild, $n + 1) - $numberChild) / ($numberChild - 1);
            // dd( $numberUserN);
            // dd($numberUserN);
            // số user đã có ở vòng tiếp theo
            $numberUserNNext = $numberUser - $numberUserN;
            // dd($numberUserNNext);
            // số user tối đa ở vòng tiếp theo là
            $numberUserMaxNNext = pow($numberChild, $n + 1);
            //  dd( $numberUserN - pow($numberChild, $n) );
            //  dd($numberUserMaxNNext);
            // số lượt rải chu kì ở vòng tiếp theo
            $nchuki = $numberUserMaxNNext / $numberChild;
            $nU = $numberUserNNext;
            $start = 1;
            $end =  $nchuki;
            $ck = $nchuki;
            //  dd('chu ki', $nchuki ,'nU', $nU ,'start', $start ,'end', $end,'ck',  $ck ,);
            //  dd($numberUserMaxNNext);
            //   dd($nU);
            if ($nU % $nchuki == 0) {
                $nUserParent = $nchuki;
                //  dd($nUserParent);
                $stt = $numberUserN - pow($numberChild, $n)  + $nUserParent;
            } else {
                $m = $nU;
                $st = $start;
                $en = $end;

                if ($m < 3) {
                    switch ($m) {
                        case 1:
                            # code...
                            $st = $start;
                            $en = $ck / 3 + $start - 1;
                            break;
                        case 2:
                            $st = $start + $ck / 3;
                            $en = 2 * $ck / 3 + $start - 1;
                            # code...
                            // dd($en);
                            break;
                        case 0:
                            $st = 2 * $ck / 3 + $start;
                            $en = $ck + $start - 1;
                            # code...
                            break;

                        default:
                            # code...
                            break;
                    }
                    $start = $st;
                    $end = $en;
                    $ck = $ck / 3;
                    $nUserParent = $start;

                    //  dd($start,$end);
                } else {
                    while ($nU >= 3) {
                        if ($nU % $ck == 0) {
                            $nUserParent = $ck;
                        }
                        // dd($nU);
                        $m = $nU;
                        while ($m  >= 3) {
                            $m = $m % 3;
                        }
                        //  dd($m);
                        switch ($m) {
                            case 1:
                                # code...
                                $st = $start;
                                $en = $ck / 3 + $start - 1;
                                break;
                            case 2:
                                $st = $start + $ck / 3;
                                $en = 2 * $ck / 3 + $start - 1;
                                # code...
                                break;
                            case 0:
                                $st = 2 * $ck / 3 + $start;
                                $en = $ck + $start - 1;
                                # code...
                                break;

                            default:
                                # code...
                                break;
                        }
                        $start = $st;
                        $end = $en;
                        $nU = floor($nU / 3);
                        // dd($nU);
                        $ck = $ck / 3;
                    }
                    dd($m);
                    if ($m != 0) {
                        $nUserParent = $start + $nU - 1;
                    } else {
                        $nUserParent = $start + $nU - 1;
                    }
                }

                //  dd('chu ki', $nchuki ,'nU', $nU ,'start', $start ,'end', $end,'ck',  $ck ,);
                //  dd($m);



                // vị trị của thằng cha là
                $stt = $numberUserN - pow($numberChild, $n) + $nUserParent;
                //  dd($stt);
            }


            // dd('chu ki', $nchuki, 'nU', $nU, 'start', $start, 'end', $end, 'ck',  $ck, 'stt', $stt, 'nUserParent', $nUserParent);
            // dd($nchuki);
            //  dd($nUserParent);
            // dd($stt);
            $userParent = $this->where([
                'active' => 1
            ])->orderBy('order', 'asc')->offset($stt - 1)->limit(1)->first();
            //   dd($nchuki);
            //  dd($n);
            //   dd($userParent);
            $parent_id2 = $userParent->id;
        } else {
            $parent_id2 = 0;
        }
        dd($parent_id2);
        return $parent_id2;
    }
}
