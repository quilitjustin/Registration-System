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
                'name', 'LIKE', "%{$keyword}%"
            );
            $users->orWhere(
                'email', 'LIKE', "%{$keyword}%"
            );
        }

        if(isset($_GET['sort']) && !empty($_GET['sort'])){
            $sortBy = strip_tags($_GET['sort']);
            if(!in_array($sortBy, ['id-asc', 'id-desc', 'n-asc', 'n-desc', 'd-asc', 'd-desc', 'e-asc', 'e-desc', 'g-asc', 'g-desc'])){
                return redirect()->route('staff.students.index');
            }
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
                    $this->sortBy = 'name';
                    $this->sortOrder = 'asc';
                    break;
                
                case 'n-desc':
                    $this->sortBy = 'name';
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

                case 'd-desc':
                    $this->sortBy = 'created_at';
                    $this->sortOrder = 'asc';
                    break;

                case 'd-desc':
                    $this->sortBy = 'created_at';
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
                    //Except Admin
                    ->where('role_id', '!=', 1)
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
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect()->route('admin.users.index')->with('msg', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $id)
    {
        
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
            $password = strip_tags($data['password']);
            $user->password = Hash::make($password);
        }
        if($data['action'] == 'details'){
            $user->name = strip_tags($data['name']);
            $user->email = strip_tags($data['email']);
        }
        
        $user->save();

        return redirect()->route('admin.users.index')->with('msg', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('msg', 'Deleted Successfully');
    }
}
