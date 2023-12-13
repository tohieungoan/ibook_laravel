<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $users = User::whereRaw(1);
        $users = $users->orderBy('id','DESC')->paginate(10);
        $viewData = [
            'users' => $users
        ];
        return view('admin::user.index',$viewData);
    }
    public function create()
    {
        return view('admin::category.create');
    }

    public function action(Request $request , $action , $id) {
        if($action){
            $user = User::find($id);

            switch ($action) {
                case 'delete':
                    $user->delete();
                 
                    break;
                    case 'active':
                        $user->active = $user->active ? 0 : 1;
                        $user->save();
                        break;
            }
        }
       return redirect()->back();

    }
}
