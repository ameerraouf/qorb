<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use App\Models\WebmasterSection;
use Illuminate\Http\Request;

class PackageController extends Controller
{

    // Define Default Variables

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
            $packages = Package::where('created_by', '=', Auth::user()->id)->orwhere('id', '=', Auth::user()->id)->orderby('id',
                'asc')->paginate(env('BACKEND_PAGINATION'));
        } else {
            $packages = Package::orderby('id', 'asc')->paginate(env('BACKEND_PAGINATION'));
        }
        return view("dashboard.packages.list", compact("packages","GeneralWebmasterSections"));
        
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
        // $Permissions = Permissions::orderby('id', 'asc')->get();

        return view("dashboard.packages.create", compact("GeneralWebmasterSections"));
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
            'title' => 'required|string',
            'advantages' => 'required|string',
            'price' => 'required|numeric|min:1|regex:/^\d+(\.\d{1,2})?$/',
        ]);
        
        
        try {
            $package = new Package;
            $package->title = $request->title;
            $package->advantages = $request->advantages;
            $package->price = $request->price;
            $package->save();
            return redirect()->action('Dashboard\PackageController@index')->with('doneMessage', __('backend.addDone'));
        } catch (\Exception $e) {

        }
        return redirect()->action('Dashboard\PackageController@index')->with('errorMessage', __('backend.error'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
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

        $package = Package::find($id);

        if (!empty($package)) {
            return view("dashboard.packages.edit", compact("package", "GeneralWebmasterSections"));
        } else {
            return redirect()->action('Dashboard\PackageController@index');
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
            'title' => 'required|string',
            'advantages' => 'required|string',
            'price' => 'required|numeric|min:1|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        $package = Package::find($id);

        if (!empty($package)) {
            try {

                $package->title = $request->title;
                $package->advantages = $request->advantages;
                $package->price = $request->price;
                $package->save();
                return redirect()->action('Dashboard\PackageController@index', $id)->with('doneMessage', __('backend.saveDone'));
            } catch (\Exception $e) {

            }
        }
        return redirect()->action('Dashboard\PackageController@index');
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
        $package = Package::find($id);

        $package->delete();

        return redirect()->action('Dashboard\PackageController@index')->with('doneMessage', __('backend.deleteDone'));
    }
}
