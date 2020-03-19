<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\{Teacher};
use DB;

class TeacherController extends Controller
{
  
    public function index()
    {
        $data = [
            'title'     => 'Professores',
            'teacher'   => Teacher::paginate(10),
        ];

        return view('school.teacher.index', compact('data'));
    }

    function list(Request $request, $status) {
        if (Auth::user()) {

            $teachers = new Teacher;

            if ($request['pesquisa']) {
                $teachers = $teachers->where('name', 'like', '%' . $request['pesquisa'] . '%');
            }

            if ($status == 'inativos') {
                $teachers = $teachers->onlyTrashed();
            }

            $teachers = $teachers->paginate(10);

            return view('school.teacher.table', compact('teachers', 'status'));
        } else {
            redirect()->back()->with('error', 'Você não tem permissão para acessar esta página');
        }
    }

    public function create()
    {
        $data = ([
            'title'     => 'Cadastro de Professor',
            'model'     => '',
            'url'       => '/teacher',
            'button'    => 'Salvar',
        ]);

        return view('school.teacher.form', compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request);
        DB::beginTransaction();

        try 
        {
            $teacher = Teacher::Create([
                'name'        => $request['teacher']['name'],
                'email'       => $request['teacher']['email'],
                'school_id'   => Auth::user()->id,
            ]);

            DB::commit();

            return redirect('teacher')->with('success', 'Professor cadastrado com sucesso!');

        } catch(\Exception $e) {
            DB::rollback();
			return $e;
        }
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        if(Auth::user())
        {
            $teacher = Teacher::findOrFail($id);
            
            $data = [
                'title'     => "Atualizar cadastro do Professor",
                "url"       => url("teacher/$id"),
                "model"     => $teacher,
                "button"    => "Atualizar"
            ];

            return view('school.teacher.form', compact('data'));

        }else {
            redirect()->back()->with('error', 'Você não tem permissão para acessar esta página');
        }
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {

            $teacher = Teacher::findOrFail($id);

            $teacher->update([
                'name'          => $request['name'],
                'email'         => $request['email'],
            ]);

            return redirect('teacher')->with('success', 'Professor atualizado com sucesso!');

        } catch(Exception $e){
            DB::rollback();
			return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
