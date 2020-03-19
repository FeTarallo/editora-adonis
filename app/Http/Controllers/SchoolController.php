<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\{State, City, School, Address, User};
use DB;

class SchoolController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Escolas',
            'schools'   => School::paginate(10),
        ];

        return view('admin.school.index', compact('data'));
    }

    function list(Request $request, $status) {
        if (Auth::user()) {

            $schools = new School;

            if ($request['pesquisa']) {
                $schools = $schools->where('name', 'like', '%' . $request['pesquisa'] . '%');
            }

            if ($status == 'inativos') {
                $schools = $schools->onlyTrashed();
            }

            $schools = $schools->paginate(10);

            return view('admin.school.table', compact('schools', 'status'));
        } else {
            redirect()->back()->with('error', 'Você não tem permissão para acessar esta página');
        }
    }

    public function create()
    {
        $data = [
            'title'     => 'Cadastro de Escola',
            'model'     => '',
            'url'       => '/school',
            'state'     => State::all(),
            'city'      => City::all(),
            'button'    => 'Salvar',
        ];

        return view('admin.school.form', compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request);
        DB::beginTransaction();

        try
        {
            $address = Address::Create([
                'street'        => $request['address']['street'],
                'number'        => $request['address']['number'],
                'district'      => $request['address']['district'],
                'cep'           => $request['address']['cep'],
                'complement'    => $request['address']['complement'],
                'city'          => $request['address']['city']       
            ]);
    
            $school = School::Create([
                'name'          => $request['school']['name'],
                'principal'     => $request['school']['principal'],
                'email'         => $request['school']['email'],
                'telephone'     => $request['school']['telephone'],
                'address_id'    => $address->id,
                'user_id'       => '2'
            ]);
            
            // $user = User::create([
            //     'name'   => $request['name'],
            //     'email'  => $request['email'],
            //     'level'  => '2',
            //     'password' => Hash::make($data['password']),
            // ]);

            DB::commit();

            return redirect('school')->with('success', 'Escola cadastrada com sucesso!');
        }
        catch(\Exception $e)
        {
			DB::rollback();
			return ($e);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school = School::findOrFail($id);
       
        $data = [
            'title'     => 'Dados da escola',
            'school'    => $school,
            'address'   => $school->address()->get(),
        ];

        return view('admin.school.show', compact('data'));
    }

    public function edit($id)
    {

        if(Auth::user())
        {
            $school = School::findOrFail($id);

            $data = [
                'title' => "Atualizar cadastro da escola",
                "url"       => url("school/$id"),
                "model"     => $school,
                'state'     => State::all(),
                'city'      => City::all(),
                "button" => "Atualizar"
            ];

            return view('admin.school.form', compact('data'));

        }else {
            redirect()->back()->with('error', 'Você não tem permissão para acessar esta página');
        }
    }
    
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {

            $school = School::findOrFail($id);

            $school->update([
                'name'          => $request['name'],
                'principal'     => $request['principal'],
                'email'         => $request['email'],
                'telephone'     => $request['telephone'],
            ]);
        } catch(Exception $e){

        }

    }

    public function destroy($id)
    {
        $school = School::withTrashed()->findOrFail($id);

        if($school->trashed()) {

            $school->restore();

            return back()->with('success', 'Protocolo ativado com sucesso!');

        } else {

            $school->delete();

            return back();
        }
    }

}
