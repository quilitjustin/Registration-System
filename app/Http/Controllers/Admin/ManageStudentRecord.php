<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentFormRequest;
use App\Models\Records;
use App\Models\Address;
use Illuminate\Support\Facades\DB;

class ManageStudentRecord extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Students.index',[
            'records' => Records::paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentFormRequest $request)
    {
        $data = $request->validated();

        $record = new Records;
        $record->student_id = $data['student-id'];
        $record->f_name = $data['f-name'];
        $record->l_name = $data['l-name'];
        $record->m_name = $data['m-name'];
        $record->contact_no = $data['contact-no'];
        $record->gender = $data['gender'];
        $record->birthdate = $data['birthdate'];
        $record->birthplace = $data['birthplace'];
        $record->guardian = $data['guardian'];
        $record->relationship_to_guardian = $data['relation'];
        $record->guardian_contact = $data['guardian-contact'];
       
        $record->save();

        $address = new Address;

        $address->block = $data['block'];
        $address->house_no = $data['house-no'];
        $address->street = $data['street'];
        $address->barangay = $data['barangay'];
        $address->municipality = $data['municipality'];
        $address->province = $data['province'];
        $address->student_id = $record->id;

        $address->save();

        return redirect()->route('admin.students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Records $student)
    {
        $data =  DB::table('address')
        ->join('student_record as student', 'student.id', '=', 'address.student_id')
        ->select(DB::raw('CONCAT(f_name, " ", m_name, " ", l_name) as name'), 'student.id as st_id', 
            'student.f_name', 'student.l_name', 'student.m_name','student.student_id', 'student.contact_no','student.gender', 
            'student.birthdate', 'student.birthplace', 'address.block', 'address.house_no', 'address.street', 'address.barangay',
            'address.municipality', 'address.province','student.guardian', 'student.relationship_to_guardian', 'student.guardian_contact')
        ->where('address.student_id', $student->id)    
        ->get();

        return view('Admin.Students.show', [
            'record' => json_decode($data, true)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Records $student)
    {        
        $data =  DB::table('address')
        ->join('student_record as student', 'student.id', '=', 'address.student_id')
        ->select(DB::raw('CONCAT(f_name, " ", m_name, " ", l_name) as name'), 'student.id as st_id', 
            'student.f_name', 'student.l_name', 'student.m_name','student.student_id', 'student.contact_no','student.gender', 
            'student.birthdate', 'student.birthplace', 'address.block', 'address.house_no', 'address.street', 'address.barangay',
            'address.municipality', 'address.province','student.guardian', 'student.relationship_to_guardian', 'student.guardian_contact')
        ->where('address.student_id', $student->id)    
        ->get();

        return view('Admin.Students.edit', [
            'record' => json_decode($data, true)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentFormRequest $request, Records $student)
    {
        $data = $request->validated();

        $student->f_name = $data['f-name'];
        $student->l_name = $data['l-name'];
        $student->m_name = $data['m-name'];
        $student->student_id = $data['student-id'];
        $student->contact_no = $data['contact-no'];
        $student->gender = $data['gender'];
        $student->birthdate = $data['birthdate'];
        $student->birthplace = $data['birthplace'];
        $student->guardian = $data['guardian'];
        $student->relationship_to_guardian = $data['relation'];
        $student->guardian_contact = $data['guardian-contact'];

        $student->save();

        $address = Address::where('student_id', $student->id)->first();

        $address->block = $data['block'];
        $address->house_no = $data['house-no'];
        $address->street = $data['street'];
        $address->barangay = $data['barangay'];
        $address->municipality = $data['municipality'];
        $address->province = $data['province'];

        $address->save();

        return redirect()->route('admin.students.show', [
            'student' => $student->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Records $student)
    {
        $address = Address::where('student_id', $student->id);
        $student->delete();
        $address->delete();
        return redirect()->route('admin.students.index');
    }
}