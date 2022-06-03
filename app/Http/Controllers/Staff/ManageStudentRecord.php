<?php

namespace App\Http\Controllers\Staff;

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

    private $sortBy = 'created_at';
    private $sortOrder = 'desc';
    
    public function index()
    {
        $records = Records::select('*');
        if(isset($_GET['search']) && !empty($_GET['search'])){
            if(isset($_GET['rule'])){
                if($_GET['rule'] == 'ns-reset'){
                    $this->sortBy = 'created_at';
                    $this->sortOrder = 'desc';
                }
                unset($_GET['rule']);
                unset($_GET['sort']);
            }
            $keyword = strip_tags($_GET['search']);
            $records->where(
                'student_id', 'LIKE', "%{$keyword}%"
            );
            $records->orWhere(
                'f_name', 'LIKE', "%{$keyword}%"
            );
            $records->orWhere(
                'l_name', 'LIKE', "%{$keyword}%"
            );
            $records->orWhere(
                'm_name', 'LIKE', "%{$keyword}%"
            );
        }

        if(isset($_GET['sort']) && !empty($_GET['sort'])){
            $sortBy = strip_tags($_GET['sort']);
            switch ($sortBy) {
                case 'id-asc':
                    $this->sortBy = 'student_id';
                    $this->sortOrder = 'asc';
                    break;

                case 'id-desc':
                    $this->sortBy = 'student_id';
                    $this->sortOrder = 'desc';
                    break;

                case 'n-asc':
                    $this->sortBy = 'l_name';
                    $this->sortOrder = 'asc';
                    break;
                
                case 'n-desc':
                    $this->sortBy = 'l_name';
                    $this->sortOrder = 'desc';
                    break;

                default:
                    $this->sortBy = 'created_at';
                    $this->sortOrder = 'desc';
                    break;
            }
        }

        $records = $records
                    ->orderBy($this->sortBy, $this->sortOrder)
                    ->paginate(7);

        return view('Staff.Students.index',[
            'records' => $records
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $query = DB::select("SHOW TABLE STATUS LIKE 'users'");
        $nextStudentId = $query[0]->Auto_increment;

        return view('Staff.Students.create', [
            'student_id' => $nextStudentId
        ]);
    }

    private function capitalize($data){
        return ucwords(strtolower($data));
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
        $record->f_name = $this->capitalize($data['f-name']);
        $record->l_name = $this->capitalize($data['l-name']);
        $record->m_name = $this->capitalize($data['m-name']);
        $record->contact_no = $data['contact-no'];
        $record->gender = $data['gender'];
        $record->birthdate = $data['birthdate'];
        $record->birthplace = $this->capitalize($data['birthplace']);
        $record->guardian = $this->capitalize($data['guardian']);
        $record->relationship_to_guardian = $this->capitalize($data['relation']);
        $record->guardian_contact = $data['guardian-contact'];
        $record->created_by = \Auth::id();
        $record->updated_by = \Auth::id();
       
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

        return redirect()->route('staff.students.show', [
            'student' => $record->id
        ])->with('msg', 'Created Successfully');
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
            'address.municipality', 'address.province','student.guardian', 'student.relationship_to_guardian', 'student.guardian_contact',
            'student.created_at', 'student.created_by', 'student.updated_by', 'student.updated_at')
        ->where('address.student_id', $student->id)    
        ->get();
        
        $record = json_decode($data, true);
        $created_by = DB::table('users')->where('id', $record[0]['created_by'])->first();
        $updated_by = DB::table('users')->where('id', $record[0]['updated_by'])->first();
       
        return view('Staff.Students.show', [
            'record' => $record,
            'created_by' => json_decode(json_encode($created_by), true),
            'updated_by' => json_decode(json_encode($updated_by), true)
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

        return view('Staff.Students.edit', [
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

        $student->f_name = $this->capitalize($data['f-name']);
        $student->l_name = $this->capitalize($data['l-name']);
        $student->m_name = $this->capitalize($data['m-name']);
        $student->student_id = $data['student-id'];
        $student->contact_no = $data['contact-no'];
        $student->gender = $data['gender'];
        $student->birthdate = $data['birthdate'];
        $student->birthplace = $this->capitalize($data['birthplace']);
        $student->guardian = $this->capitalize($data['guardian']);
        $student->relationship_to_guardian = $this->capitalize($data['relation']);
        $student->guardian_contact = $data['guardian-contact'];
        $student->updated_by = \Auth::id();

        $student->save();

        $address = Address::where('student_id', $student->id)->first();

        $address->block = $data['block'];
        $address->house_no = $data['house-no'];
        $address->street = $data['street'];
        $address->barangay = $data['barangay'];
        $address->municipality = $data['municipality'];
        $address->province = $data['province'];

        $address->save();

        return redirect()->route('staff.students.show', [
            'student' => $student->id
        ])->with('msg', 'Updated Successfully');
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
        return redirect()->route('staff.students.index')->with('msg', 'Deleted Successfully');
    }
}
