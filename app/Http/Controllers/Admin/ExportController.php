<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Records;
use App\Models\Address;

class ExportController extends Controller{
    public function exportUsers(){
        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Content-type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename=users.csv',
            'Expires'             => '0',
            'Pragma'              => 'public',
        ];

        $list = User::all()->toArray();

        if(empty($list)){
            return redirect()->route('admin.export')
                ->with('msg', 'No Information available for this table to export');
        }

        //Add headers for each column in the CSV download
        array_unshift($list, array_keys($list[0]));

        $callback = function() use ($list){
            $FH = fopen('php://output', 'w');
            foreach ($list as $row) { 
                fputcsv($FH, $row);
            }
            fclose($FH);
        };

        return response()->stream($callback, 200, $headers);
    }
    
    public function exportStudents(){
        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Content-type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename=student_record.csv',
            'Expires'             => '0',
            'Pragma'              => 'public',
        ];

        $list = Records::all()->toArray();

        if(empty($list)){
            return redirect()->route('admin.export')
                ->with('msg', 'No Information available for this table to export');
        }

        //Add headers for each column in the CSV download
        array_unshift($list, array_keys($list[0]));

        $callback = function() use ($list){
            $FH = fopen('php://output', 'w');
            foreach ($list as $row) { 
                fputcsv($FH, $row);
            }
            fclose($FH);
        };

        return response()->stream($callback, 200, $headers);
    }

    protected function exportAddress(){
        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Content-type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename=address.csv',
            'Expires'             => '0',
            'Pragma'              => 'public',
        ];

        $list = Address::all()->toArray();

        if(empty($list)){
            return redirect()->route('admin.export')
                ->with('msg', 'No Information available for this table to export');
        }

        //Add headers for each column in the CSV download
        array_unshift($list, array_keys($list[0]));

        $callback = function() use ($list){
            $FH = fopen('php://output', 'w');
            foreach ($list as $row) { 
                fputcsv($FH, $row);
            }
            fclose($FH);
        };

        return response()->stream($callback, 200, $headers);
    }
}
