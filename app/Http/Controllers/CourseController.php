<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{

    //View List
    public function viewCoursesList()
    {
        try {
            //Get All Courses
            $course = Course::all();
            return view('manageCourse/viewListOfCourse', compact('course'));

            //Single data
            // $course = Course::where('id', 1)->first(); // only one result
            //  $course = Course::where('id', 1)->get();    // result more than one

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }


    //Create
    public function createCourse(Request $request)
    {
        try {
            //Validate
            $validate = $request->validate([
                'course_name' => 'required|string|max:255',
                'course_code' => 'required|min:2|max:10',
                'course_credit' => 'required',
                'course_description' => 'required|max:255'
            ]);

            if (!$validate) {
                return redirect()->back()->with('error', 'Validation Error');
            }

            //Insert Data using ORM Method

            $course = new Course();
            $course->course_name = $request->course_name;
            $course->course_code = $request->course_code;
            $course->course_credit = $request->course_credit;
            $course->course_description = $request->course_description;
            $course->save();

            return redirect()->route('viewCoursesList')->with('success', 'Course Added Successfully');
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', $th->getMessage());
        }
    }



    //Delete
    public function deleteCourse($id)
    {
        try {
            //Delete Course
            $course = Course::find($id);
            $course->delete();

            return redirect()->back()->with('success', 'Course Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
