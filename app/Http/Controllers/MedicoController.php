<?php

namespace App\Http\Controllers;
use App\{Area, Medico};
use DB;

use Illuminate\Http\Request;
use App\Http\Requests\MedicoRequest;

class MedicoController extends Controller
{
    //
    // public function index() {
    //     $areas = Area::all();
    //     return view('Area.index', compact('areas'));
    // }

    public function index() {
        //Apenas os ativos
        $medicos = Medico::all();
        //Excluídos e não excluídos
        //$medicosDeletadoseNaoDeletados = Medico::withTrashed()->get();
        //Só excluídos
        $medicosInativos = Medico::onlyTrashed()->get();
        return view('index', compact('medicos', 'medicosInativos'));
    }



    public function create() {
        $areas = Area::all();
        return view('form', compact('areas'));
    }

    public function store(MedicoRequest $request) {
        
        DB::beginTransaction();
        try{
        
            $medico = Medico::create($request->all());
            
            DB::commit();
    
            return redirect('/')->with('success', 'Médico cadastrado com sucesso');

        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error', 'Erro no servidor');
        }
    }

    
    public function edit($id) {
        $medico = Medico::findOrFail($id);
        $areas = Area::all();
        return view('form', compact('medico','areas'));
    }

    public function update(MedicoRequest $request, $id) {
        $medico = Medico::findOrFail($id);
        // $usuario->update([
        //     'nome' => $request->nome,
        //     'email' => $request->email,
        //     'data_nascimento' => $request->data_nascimento,
        //     'nivel_id' => $request->nivel_id
        // ]);
        $medico->update($request->all());
        return redirect('/');
    }

    public function destroy($id){
        $medico = Medico::findOrFail($id);
        $medico->delete();
        return back();
     }

     public function restore($id){
        $medico = Medico::onlyTrashed()->findOrFail($id);
        $medico->restore();
        return back();
    }
}
