<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\WebmasterSection;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->settings_status) {
            return redirect()->route('adminHome');
        }

        // General for all pages
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END

        if (@Auth::user()->permissionsGroup->view_status) {
            $roles = Role::where('created_by', '=', Auth::user()->id)->orwhere('id', '=', Auth::user()->id)->orderby('id',
                'asc')->paginate(env('BACKEND_PAGINATION'));
        } else {
            $roles = Role::orderby('id', 'asc')->paginate(env('BACKEND_PAGINATION'));
        }
        return view("dashboard.roles.list", compact("roles","GeneralWebmasterSections"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->settings_status) {
            return redirect()->route('NoPermission');
        }

        // General for all pages
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END

        return view("dashboard.roles.create", compact("GeneralWebmasterSections"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (!@Auth::user()->permissionsGroup->settings_status) {
            return redirect()->route('NoPermission');
        }

        $this->validate($request, [
            'role' => 'required|string',
            'permissions' => 'required|array|min:1',
        ]);
                
        try {
            $role = new Role;
            $role->role = $request->role;
            $role->permissions = $request->permissions;
            $role->save();
            return redirect()->action('Dashboard\RoleController@index')->with('doneMessage', __('backend.addDone'));
        } catch (\Exception $e) {

        }
        return redirect()->action('Dashboard\RoleController@index')->with('errorMessage', __('backend.error'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->settings_status && @Auth::user()->id != $id) {
            return redirect()->route('NoPermission');
        }
        // General for all pages
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END

        $role = Role::find($id);

        if (!empty($role)) {
            return view("dashboard.roles.edit", compact("role", "GeneralWebmasterSections"));
        } else {
            return redirect()->action('Dashboard\RoleController@index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->settings_status && @Auth::user()->id != $id) {
            return redirect()->route('NoPermission');
        }

        $this->validate($request, [
            'role' => 'required|string',
            'permissions' => 'required|array|min:1',
        ]);

        $role = Role::find($id);

        if (!empty($role)) {
            try {

                $role->role = $request->role;
                $role->permissions = $request->permissions;
                $role->save();
                return redirect()->action('Dashboard\RoleController@index', $id)->with('doneMessage', __('backend.saveDone'));
            } catch (\Exception $e) {

            }
        }
        return redirect()->action('Dashboard\RoleController@index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->settings_status) {
            return redirect()->route('NoPermission');
        }
        $role = Role::find($id);

        $role->delete();

        return redirect()->action('Dashboard\RoleController@index')->with('doneMessage', __('backend.deleteDone'));
    }
}
