<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Children;
use App\Models\ConsultingReport;
use App\Models\Report;
use App\Models\StatusReport;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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

}
