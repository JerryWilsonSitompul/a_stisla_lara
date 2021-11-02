<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
Use Illuminate\Support\Facades\Auth;




class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (request()->ajax()) {
            // $query = User::all();
        //    $query = User::with('roles')->all();
            $query = User::select(['id', 'name', 'email', 'created_at'])->with('roles')->get();

            return Datatables::of($query)

                ->addColumn('role', function ($user) {
                    // return '<a class="btn btn-primary" href="#">'. ucfirst($user->id) .'</a>';
                   return $user->getRoleNames()->all();
                })

                ->addColumn('action', function ($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                                    type="button" id="action' .  $item->id . '"
                                        data-toggle="dropdown" 
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="action' .  $item->id . '">
                                    <a class="dropdown-item" href="' . route('user.edit', $item->id) . '">
                                        Edit
                                    </a>
                                    <form action="' . route('user.destroy', $item->id) . '" method="POST">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make();
        }
        
        return view('pages.admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = User::where('email',$request->input('email'))->count();

        if($count>0){
            Alert::warning('Warning', 'Already exist!');
            return back();
        }

        $this->validate($request, [
            'nip' => 'required|string|max:255',
            // 'username' => 'required|string|max:20|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);


    

        $createStatus = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt(($request->input('password')))
        ])->assignRole('user');
        if ($createStatus) {
            activity(Auth::user()->name)
                ->performedOn($createStatus)
                ->causedBy(Auth::user())
                //->withProperties(['customProperty' => 'customValue'])
                ->log('User created by ' . Auth::user()->name);

        Alert::success('Success', 'Berhasil ditambahkan!');

        return redirect()->route('user.index');
        }
        else{
            Alert::warning('Warning', 'Gagal ditambahkan!');
        }

            

    // dd($request->email);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::where('users.id', '=', $id)->first();
        // $data = User::FindorFail($id);
        return view('pages.admin.user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = User::findOrFail($id);
        
        if($request->input('password')) {
           $data['password'] = bcrypt(($request->input('password')));
        }
        else{
            unset($data['password']);
        }
        
        $item->update($data);

        Alert::success('Success', 'Berhasil diubah!');

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findorFail($id);
        $item->delete();
        Alert::success('Success', 'Berhasil dihapus!');
        return redirect()->route('user.index');
    }
}
