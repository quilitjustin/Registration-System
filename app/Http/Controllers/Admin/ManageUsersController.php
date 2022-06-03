<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\UserUpdateFormRequest;
use Illuminate\Support\Facades\Hash;

class ManageUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $sortBy = 'created_at';
    private $sortOrder = 'desc';

    public function index()
    {
        $users = User::select('*');
        if(isset($_GET['search']) && !empty($_GET['search'])){
            if(isset($_GET['rule'])){
                if($_GET['rule'] == 'ns-reset'){
                    $this->sortBy = 'created_at';
                    $this->sortOrder = 'desc';
                }
                unset($_GET['rule']);
                unset($_GET['sort']);
            }
            $keyword = strip_tags($_GET['search']);
            $users->where(
                'id', 'LIKE', "%{$keyword}%"
            );
            $users->orWhere(
                'l_name', 'LIKE', "%{$keyword}%"
            );
            $users->orWhere(
                'email', 'LIKE', "%{$keyword}%"
            );
            $users->orWhere(
                'role', 'LIKE', "%{$keyword}%"
            );
        }

        if(isset($_GET['sort']) && !empty($_GET['sort'])){
            $sortBy = strip_tags($_GET['sort']);
            switch ($sortBy) {
                case 'id-asc':
                    $this->sortBy = 'id';
                    $this->sortOrder = 'asc';
                    break;

                case 'id-desc':
                    $this->sortBy = 'id';
                    $this->sortOrder = 'desc';
                    break;
        
                case 'n-asc':
                    $this->sortBy = 'l_name';
                    $this->sortOrder = 'asc';
                    break;
                
                case 'n-desc':
                    $this->sortBy = 'l_name';
                    $this->sortOrder = 'desc';
                    break;
                
                case 'e-asc':
                    $this->sortBy = 'email';
                    $this->sortOrder = 'asc';
                    break;

                case 'e-desc':
                    $this->sortBy = 'email';
                    $this->sortOrder = 'desc';
                    break;

                case 'd-asc':
                    $this->sortBy = 'created_at';
                    $this->sortOrder = 'asc';
                    break;

                case 'd-desc':
                    $this->sortBy = 'created_at';
                    $this->sortOrder = 'desc';
                    break;

                case 't-asc':
                    $this->sortBy = 'role';
                    $this->sortOrder = 'asc';
                    break;

                case 't-desc':
                    $this->sortBy = 'role';
                    $this->sortOrder = 'desc';
                    break;

                default:
                    $this->sortBy = 'created_at';
                    $this->sortOrder = 'desc';
                    break;
            }
        }

        $users = $users
                    ->orderBy($this->sortBy, $this->sortOrder)
                    ->paginate(7);

        return view('Admin.Users.index',[
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Users.create');
    }

    private function capitalize($data){
        return ucwords(strtolower($data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $data = $request->validated();

        $user = new User;
        $user->f_name = $this->capitalize($data['f-name']);
        $user->l_name = $this->capitalize($data['l-name']);
        $user->m_name = $this->capitalize($data['m-name']);
        $user->gender = $this->capitalize($data['gender']);
        $user->email = $data['email'];
        $user->contact_no = $data['contact-no'];
        $user->password = Hash::make($data['password']);
        $user->created_by = \Auth::id();
        $user->updated_by = \Auth::id();
        $user->save();

        return redirect()->route('admin.users.show', [
            'user' => $user->id
        ])->with('msg', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('Admin.Users.show', [
            'user' => $user,
            'created_by' => User::where('id', $user['created_by'])->first(),
            'updated_by' => User::where('id', $user['updated_by'])->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('Admin.Users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateFormRequest $request, User $user)
    {
        $data = $request->validated();
        if($data['action'] == 'password'){
            $user->password = Hash::make($data['password']);
        }
        if($data['action'] == 'details'){
            $user->f_name = $this->capitalize($data['f-name']);
            $user->l_name = $this->capitalize($data['l-name']);
            $user->m_name = $this->capitalize($data['m-name']);
            $user->gender = $this->capitalize($data['gender']);
            $user->email = $data['email'];
            $user->contact_no = $data['contact-no'];
        }
        
        $user->updated_by = \Auth::id();
        $user->save();

        return redirect()->route('admin.users.show', [
            'user' => $user->id
        ])->with('msg', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user['id'] == \Auth::id() && $user['role'] == "admin"){
            return redirect()->route('admin.users.index')->with('msg', 'You cant delete the current admin account that you are using. Update instead?');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('msg', 'Deleted Successfully');
    }
}
