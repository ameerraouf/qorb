<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Teacher;
use App\Models\Children;
use App\Models\ConsultingReport;
use App\Models\Report;
use App\Models\StatusReport;
use App\Models\Teacher as ModelsTeacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   private $uploadPath = "uploads/users/";

   public function index()
   {
    return view('teacher.home');
   }

   function showChildrenReports($id){
      $reports = Report::where('children_id', $id)->paginate(6);
      return view('teacher.reports.list', compact('reports'));
   }

   function showChildrenConsultingReports($id){
      $reports = ConsultingReport::where('children_id', $id)->paginate(6);
      return view('teacher.consulting-reports.list', compact('reports'));
   }

   function showChildrenStatusReports($id){
      $reports = StatusReport::where('children_id', $id)->paginate(6);
      return view('teacher.status_reports.list', compact('reports'));
   }

   function showTeacherProfile(){
      $user = Auth::user();
      return view('teacher.profile', compact('user'));
   }


   function updateTeacherProfile(Request $request) {
      $id = Auth::user()->id;
      $user = ModelsTeacher::find($id);
      $this->validate($request, [
          'name' => 'required',
          'email' => 'required|email',
          'phone' => 'required|min:6',
          'photo' => 'nullable|mimes:png,jpeg,jpg,gif,svg',
      ]);

      try{
          $user->name = $request->name;
          $user->email = $request->email;
          $user->phone = $request->phone;
          if ($request->password) {
              $user->password = bcrypt($request->password);
          }
          else{
              $user->password = "";
          }
          if ($request->photo) {
              $photo = time() . rand(1111,
                      9999) . '.' . $request->file('photo')->getClientOriginalExtension();
              $path = $this->getUploadPath();
              $request->photo->move($path, $photo);
              $user->photo = $photo;
          }
          $user->update();
          return redirect()->route('TeacherProfile')->with('doneMessage', __('backend.saveDone'));
      }
      catch(\Exception $e){
          return redirect()->route('TeacherProfile')->with('errorMessage', $e->getMessage());
      }
  }

  public function getUploadPath()
  {
      return $this->uploadPath;
  }

   

}
