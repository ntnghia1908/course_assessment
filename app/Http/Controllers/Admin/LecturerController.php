<?php

namespace App\Http\Controllers\Admin;

use App\ClassSession;
use App\Http\Controllers\Controller;
use App\Instructor;
use DebugBar;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function __construct()
    {
        //
    }

    function getLecturers() {
        $lecturers = Instructor::all();
        return view('Admin/lecturer-list', compact('lecturers'));
    }

    function getLecturerDetail($id) {
        $lecturer = Instructor::find($id);

        // eager load course
        $classSessions = ClassSession::with('course')->where(['instructor_id'=> $id])->get();
//        DebugBar::info($classSessions);
        return view('admin.lecturer-detail', compact('lecturer', 'classSessions'));
    }

    function getEditLecturer($id) {
        $lecturer = Instructor::find($id);
        return view('admin.lecturer-edit', compact('lecturer'));
    }

    function deleteLecturer(Request $request) {

        if ( $request->isMethod('post') ) {
            $result = Instructor::find($request->lecturer_id)->delete();
//            DebugBar::info($request->lecturer_id);
            if( isset($result) ) {
                return redirect()->back()->with(['flag' => 'success', 'message' => 'Course is deleted!', 'key' => 'Success']);
            }

//            $result = $instructor->delete();
            // Todo: xem lại coi khi xóa lec thì cần xóa những gì (mức độ ưu tiên 3)
//            if ( $result ) {
//                \App\CourseDetail::where('course_id', $request->course_id)->delete();
//                \App\CourseOutcome::where('course_id', $request->course_id)->delete();
//                \App\StudentCourse::where('course_id', $request->course_id)->delete();
//                \App\Reference::where('course_id', $request->course_id)->delete();
//                \App\StudentScore::where('course_id', $request->course_id)->delete();
//                $result2 = \App\Syllabus::where('course_id', $request->course_id)->delete();
//            }
//            if ( isset($result2) ) {
//                return redirect()->back()->with(['flag' => 'success', 'message' => 'Course is deleted!', 'key' => 'Success']);
//            }
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Cannot delete lecturer', 'key' => 'Fail']);
        }
    }

    function getAddLecturer() {
        return view('admin.lecturer-edit');
    }

    function addLecturer(Request $request) {
        if ( $request->isMethod('post') ) {
            $checkEmail = Instructor::where('email', $request->email)->first();
            if($checkEmail) {
                return redirect()->back()->with(['flag' => 'danger', 'message'=>'Email is existed',
                                                'key' => 'Fail', 'icon'=> 'warning']);
            }

            $attributes = $request->except('_token');
            $attributes['name'] = ucfirst($request->name);;
            $attributes['email'] = $request->email;
            $attributes['degree'] = $request->degree;

//            if ( $request->hasFile('avatar') ) {
//                $file = $request->file('avatar');
//                $path = 'users/'.date('FY');
//                $attributes['avatar'] =  Storage::disk()->put($path, $file);
//            }

            $instructor = new Instructor();
            $instructor->fill($attributes);
            $result = $instructor->save();
            if ( $result )
                return redirect()->route('admin_edit_lecturer', ['id' => $instructor->id])->with(
                    ['flag' => 'success', 'message' => 'New instructor is created!', 'key' => 'Success', 'icon' => 'check']);
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Cannot create new user', 'key' => 'Fail', 'icon' => 'warning']);
        }
    }
}
