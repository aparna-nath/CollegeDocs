<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicYear;
use App\Models\TcCcConfiguration;


use Illuminate\Support\Facades\Redirect;
class DocumentController extends Controller
{
    public function tcconfig()
    {
        $academicyears=AcademicYear::all(['id','name']);
        return view ('TCconfig',compact('academicyears'));
    }
    public function TcCcGenerate(Request $request)
    {
        $this->validate($request, [
            'tc_intro_text' => 'required',
            'tc_instruction' => 'required',
            'tc_file' => 'required',
            'tc_start_num' => 'required',            
            
        ]);
        $tcintro=$request->post('tc_intro_text');
        $tcinstruction=$request->post('tc_instruction');
        $tcfile=$request->file('tc_file');
        $tcnotify=json_encode($request->post('tc_notification'));
        $tc_start_num=$request->post('tc_start_num');
        $academic_year_tc=$request->post('academic_year_tc[]');
        $tcformat=$request->post('tcformat');

        $fileName=$tcfile->getClientOriginalName();
        $destinationPath=public_path('/Forms'); //store in a new folder 'CV'
        $tcfile->move($destinationPath,$fileName);

        $newdoc=new TcCcConfiguration();
        $newdoc->tc_intro_text=$tcintro;
        $newdoc->tc_instruction=$tcinstruction;
        $newdoc->tc_file=$fileName;
        $newdoc->tc_notification_option=$tcnotify;
        $newdoc->tc_start_num=$tc_start_num;
        $newdoc->mz_academic_year_tc=$academic_year_tc;
        $newdoc->formattype_tc=$tcformat;
        $newdoc->save();
        return back()->with("Msg","TC is generated");


    }
}
