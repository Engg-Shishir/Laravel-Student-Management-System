<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\Brance;
use App\Models\Course;
use File;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brances = Brance::all();
        $courses = Course::all();
        return view('student.studentregister',compact(['courses','brances']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sname' => 'required',
            'fname' => 'required',
            'class' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ],[
            'sname.required' => 'Please Input Your Name',
            'fname.required' => 'Please Input Your Father Name',
            'class.required' => 'Please Input Your Class',
            'phone.required' => 'Please Input Your Phone',
            'email.required' => 'Please Input Your Email',
        ]);

        $image = $request->file('image');
        $extension =$image->extension();
        $imageName = $request->sname. '.' .$extension;
        $image->move(public_path('images'), $imageName);

        
        student::insert([
        'sname' => $request->sname,
        'fname' => $request->fname,
        'class' => $request->class,
        'phone' => $request->phone,
        'email' => $request->email,
        'branch_id' => $request->bid,
        'course_id' => $request->cid,
        'image' => $imageName,
        ]);
        

        return back()->with('insert-message','Data Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
/*     public function show($id)
    {
      $students = student::orderBy('id','DESC')->get();
      return view('studentdetails',compact('students'));
    } */

    public function show()
    {
      $students = student::orderBy('id','DESC')->get();
      return view('studentdetails',compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = student::findOrFail($id);
        return view('student.edit',compact('student'));
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
        $request->validate([
            'sname' => 'required',
            'fname' => 'required',
            'class' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ],[
            'sname.required' => 'Please Input Your Name',
            'fname.required' => 'Please Input Your Father Name',
            'class.required' => 'Please Input Your Class',
            'phone.required' => 'Please Input Your Phone',
            'email.required' => 'Please Input Your Email',
        ]);
 


        $image = $request->file('image');
        $extension =$image->extension();
        $imageName = $request->sname. '.' .$extension;

        $old_image_path = public_path("images/$imageName");
        if(File::exists($old_image_path)) {
            File::delete($old_image_path);
        }
        $image->move(public_path('images'), $imageName);
   


       student::findOrfail($id)->update([
        'sname' => $request->sname,
        'fname' => $request->fname,
        'class' => $request->class,
        'phone' => $request->phone,
        'email' => $request->email,
        'image' => $imageName,
       ]);
 
       return redirect()->to('/studentdetails')->with('success','Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = student::findOrFail($id);
        unlink(public_path('images').'/'.$student->image);
        student::findOrFail($id)->delete();
 
        return back()->with('success','Data Deleted Successfully');  
    }

    public function courses($id)
    {
        $data['courses'] = Course::where('branch_id',$id)->get();
        echo json_encode($data);
    }
}
