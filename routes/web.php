<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function () {
    //DB::insert('insert into students(name, date_of_birth, GPA, advisor) values(?,?,?,?)', ['Laura', '2010-10-01', 4.0, 'Kai']);
    //DB::insert('insert into students(name, date_of_birth, GPA, advisor) values(?,?,?,?)', ['Leila', '2011-09-11', 3.8, 'Lisa']);
    //DB::insert('insert into students(name, date_of_birth, GPA, advisor) values(?,?,?,?)', ['Ruslan', '2012-03-08', 3.5, 'Jiso']);
    //DB::insert('insert into students(name, date_of_birth, GPA, advisor) values(?,?,?,?)', ['Aiaru', '2013-06-17', 3.0, 'Samat']);
    DB::insert('insert into students(name, date_of_birth, GPA, advisor) values(?,?,?,?)', ['Dana', '2014-12-08', 2.8, 'Aiman']);
});

Route::get('/select', function () {
$results=DB::select('select * from students');
foreach($results as $student) {
    echo "ID: ".$student->id." ";
    echo "Name is: ".$student->name." ";
    echo "Date of birth: ".$student->date_of_birth." ";
    echo "GPA: ".$student->GPA." ";
    echo "Advisor: ".$student->advisor;
    echo "<br>";
}
});

Route::get('/update', function () {
    $updated=DB::update('update students set advisor="Maral" where id=?',[2]);
    return $updated;
});

Route::get('/delete', function () {
    $deleted=DB::delete('delete from students where id=?',[5]);
    return $deleted;
});

Route::get('/insert2', function () {
    $student = new Student;
    $student->name='Hasan';
    $student->date_of_birth='2018-07-03';
    $student->GPA=2.5;
    $student->advisor='Jessi';
    $student->save();
});

Route::get('/select2', function () {
    $students = Student::all();
    foreach($students as $student) {
        echo "ID: ".$student->id." ";
        echo "Name is: ".$student->name." ";
        echo "Date of birth: ".$student->date_of_birth." ";
        echo "GPA: ".$student->GPA." ";
        echo "Advisor: ".$student->advisor;
        echo "<br>";
    }
});

Route::get('/update2', function () {
    $student = Student::find(3);
    $student->name='Aru';
    $student->date_of_birth='2017-06-17';
    $student->GPA=3.35;
    $student->advisor='Jackson';
    $student->save();
});

Route::get('/delete2', function () {
    $student = Student::find(4);
    $student->delete();
});




