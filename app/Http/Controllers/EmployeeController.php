<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function byID(){
        $employees = Employee::rderBy('id', 'asc')->get();
    }
}
