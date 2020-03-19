<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SchoolClassRequest;
use Illuminate\Support\Facades\Auth;
use App\{SchoolClass, Student, Period, Course};
use DB;

class SchoolClassController extends Controller
{
 
    public function index()
    {
        $data = [
            'title'     => 'Turmas',
            'schoolclass'   => SchoolClass::paginate(10),
        ];

        return view('school.schoolclass.index', compact('data'));
    }

    function list(Request $request, $status) {
        if (Auth::user()) {

            $schoolclasses = new SchoolClass;

            if ($request['pesquisa']) {
                $schoolclasses = $schoolclasses->where('serie', 'like', '%' . $request['pesquisa'] . '%');
            }

            if ($status == 'inativos') {
                $schoolclasses = $schoolclasses->onlyTrashed();
            }

            $schoolclasses = $schoolclasses->paginate(10);

            return view('school.schoolclass.table', compact('schoolclasses', 'status'));
        } else {
            redirect()->back()->with('error', 'Você não tem permissão para acessar esta página');
        }
    }

    public function create()
    {
        $data = ([
            'title'     => 'Cadastro de Turma',
            'model'     => '',
            'url'       => '/schoolclass',
            'period'    => Period::all(),
            'course'    => Course::all(),
            'button'    => 'Salvar',
        ]);

        return view('school.schoolclass.form', compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request);
        DB::beginTransaction();

        try 
        {
            $schoolclass = SchoolClass::Create([
                'period'      => $request['schoolclass']['period'],
                'course'      => $request['schoolclass']['course'],
                'serie'       => $request['schoolclass']['serie'],
                'year'        => $request['schoolclass']['year'],
                'teacher'     => $request['schoolclass']['teacher'],
                'school_id' => '2',
            ]);

            // foreach ($request->student as $student) {
            //     $student = Student::create([
            //         'name'  => $student['nameStudent'],
            //         'schoolclass_id'    => $schoolclass->id,
            //     ]);
            // }

            DB::commit();

            return redirect('schoolclass')->with('success', 'Turma cadastrada com sucesso!');

        } catch(\Exception $e) {
            DB::rollback();
			return $e;
        }
    }

    public function show($id)
    {
        $schoolclass = SchoolClass::findOrFail($id);
       
        $data = [
            'title'     => 'Dados da turma',
            'schoolclass'    => $schoolclass,
        ];

        return view('school.schoolclass.show', compact('data'));
    }

    public function edit($id)
    {
        
        if(Auth::user())
        {
            $schoolclass = SchoolClass::findOrFail($id);

            // foreach($schoolclass->students()->get() as $students){
            //     dd($students->name);
            // }
            
            $data = [
                'title'     => "Atualizar cadastro da turma",
                "url"       => url("schoolclass/$id"),
                "model"     => $schoolclass,
                'students'  => $schoolclass->students()->get(),
                "button"    => "Atualizar"
            ];

            return view('school.schoolclass.form', compact('data'));

        }else {
            redirect()->back()->with('error', 'Você não tem permissão para acessar esta página');
        }
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schoolclass = SchoolClass::withTrashed()->findOrFail($id);

        if($schoolclass->trashed()) {

            $schoolclass->restore();

            return back()->with('success', 'Protocolo ativado com sucesso!');

        } else {

            $schoolclass->delete();

            return back();
        }
    }
}
