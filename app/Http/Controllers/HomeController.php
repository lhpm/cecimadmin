<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

// Modelos
use App\Usuario;
use App\Trabajo;
use App\Jurado;
use App\Pregunta;
use App\Fase;
use App\Certificado;
use App\Pago;
use App\Comunicado;


// Llama la función para consulta DB
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;
//use Illuminate\Pagination\Paginator;

// Mensajes Session
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, Usuario $usuario)
    {
        // Sin Buscador
        //$alumnos = Usuario::orderBy('id','DESC')->paginate(5);

        //Incluido el Buscador search declarado en el Modelo Usuario scopeSearch
        $alumnos = Usuario::search($request->name)->orderBy('id','DESC')->paginate(5);
        $certificados = Certificado::all();
        return view('home',['alumnos' => $alumnos], ['certificados' => $certificados]);
    }

    // show es el router get show
    // Consulta directa Modelo User con Controller
    public function show(Usuario $usuario)
    {

        $trabajos = Trabajo::all();

        $pagos = Usuario::find($usuario->id)->pagos()->paginate(1);

        // usuario.show ES LA PAGINA Imprime el detalle en id del usuario
        return view('usuario.show',compact('usuario', 'trabajos', 'pagos'));
    }

    // CREACION DE CERTIFICADO
    public function ccertificar($id)
    {
        // Creación del item certificado para el usuario en tabla certificados, basado en la relación
        $busqueda = Usuario::find($id);
        $perfil = $busqueda->certificados;
        if($perfil) {
        //echo 'tengo perfil ' . json_encode($perfil);
        } else {
        $certificado = new Certificado;
        $certificado->id_usuario = $id;
        $certificado->url = 'url certificado';
        $certificado->habilitado = 'NO';
        $usuario = Usuario::find($id);
        $usuario->certificados()->save($certificado);
        }

        $certificados = Certificado::all();

        $usuario=Usuario::find($id);
        return view('usuario.ccertificar',compact('usuario','perfil','certificados'));
    }

    
    public function scertificar(Request $request, Certificado $certificado, $id)
    {
        // Validación tipo de archivo y tamaño

        $url = Validator::make($request->all(), [
            'url' => 'required|mimes:doc,pdf,docx|max:1000'
        ])->validate();

        if(Input::hasFile('url')){

            //echo 'Uploaded';
            $url = Input::file('url');
            //$destinationPath = public_path('/certificados');

            $url = $url->move('../estudiantes.cecim2019.com/certificados', time().'.pdf');

        }

        //$data = request()->all();

        //$request->update($data);

        // Otras formas de guardar

        //Certificado::findOrFail($id)->first()->fill($request->all())->save();

        //Certificado::find($id)->update($request->all());

        $data = request()->all();

        $resultado = str_replace("../", "", $url);

        Certificado::where('id_usuario',$id)->first()->update([
            'habilitado' => $data['habilitado'],
            'id_usuario' => $data['id_usuario'],
            'url' => 'https://'.$resultado,
        ]);

        Session::flash('mensaje','Certificación y estado actualizado.');

        return redirect()->route('home');
    }
    // FIN CREACION DE CERTIFICADO

    public function edit($id)
    {
        //
        $usuario=Usuario::find($id);
        return view('usuario.edit',compact('usuario'));
    }

    public function update(Usuario $usuario)
    {
        //
        $data = request()->all();

        $usuario->update($data);

        Session::flash('mensaje','Estudiante Actualizado.');

        return redirect()->route('home');
    }

    public function destroy($id)
    {
        // Eliminado de Criterio o Pregunta
        Usuario::find($id)->delete();
        //Pregunta::destroy($id);

        Session::flash('message','Usuario Eliminado');
        return redirect()->route('home')->with('success','Usuario eliminado satisfactoriamente');
    }

    public function lista(Request $request, Usuario $usuario)
    {
        // Sin Buscador
        //$alumnos = Usuario::orderBy('id','DESC')->paginate(5);

        //Incluido el Buscador search declarado en el Modelo Usuario scopeSearch
        $alumnos = Usuario::orderBy('name', 'asc')->get();
        return view('usuario.lista',['alumnos' => $alumnos]);
    }


    // CREACION DE JURADO
    public function cjurado()
    {
        //
        return view('usuario.cjurado');
    }

    
    public function sjurado(Request $request)
    {
        // Validación de datos del formulario
        $validation = Validator::make( $request->all(), [
            'name'=>'required|max:2',
            'email'=>'required|max:200',
            'password'=>'required|max:3',
            'tipo_documento'=>'required',
            'num_documento'=>'required',
            'fec_nac'=>'required',
            'institucion'=>'required',
            'vinculacion'=>'required',
            'asociacion'=>'required',
        ]);

        $data = request()->all();

        Jurado::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
        'tipo_documento'=>$data['tipo_documento'],
        'num_documento'=>$data['num_documento'],
        'fec_nac'=>$data['fec_nac'],
        'institucion'=>$data['institucion'],
        'vinculacion'=>$data['vinculacion'],
        'asociacion'=>$data['asociacion'],
        ]);

        // Guardado a la base de datos del modelo Jurado
        //Jurado::create($request->all());
        // Retorna a una pantalla principal index según route profereg.index
        return redirect()->route('usuario.jurado')->with('success','Registro creado satisfactoriamente');
    }
    // FIN CREACION DE JURADO

    
    // VISTA CONSULTA PRINCIPAL DE JURADO
    public function jurado(Request $request)
    {
  
        //Incluido el Buscador search declarado en el Modelo Profereg scopeSearch
        $jurados = Jurado::search($request->name)->orderBy('id','DESC')->paginate(5);
        
        // Sin Buscador
        //$jurados = Profereg::orderBy('id','DESC')->paginate(5);
 
        // view('carpeta.nombre') dentro de views
        return view('usuario.jurado',[
            'jurados' => $jurados
        ]);
    }

    // Mostrar Jurado
    public function mostrar(Jurado $jurado)
    {

        $jurados = Jurado::find($jurado['id']);

        return view('usuario.mostrar',compact('jurado'));
    }

    public function djurado($id)
    {
        // Eliminando Jurado
        Jurado::find($id)->delete();
        //Jurado::destroy($id);

        // Envio de mensaje de confirmación al fase/index.blade.php
        Session::flash('mensaje','Jurado Eliminada');
        return redirect()->route('usuario.jurado')->with('success','Jurado eliminada');
    }


    // Gestión Criterios Preguntas

    public function preguntas(Request $request)
    {

        $criterios = Pregunta::orderBy('id','DESC')->paginate(10);

        return view('pregunta.index',['criterios' => $criterios]);
    }

    public function create()
    {
        $fases = Fase::all();
        // Últimos registro en una tabla indicando la cantidad
        //$fases = Fase::latest()->take(1)->get();
        return view('pregunta.create',['fases' => $fases]);
        //return view('pregunta.create');
    }

    
    public function store(Request $request)
    {
        // Validación de datos del formulario
        $validation = Validator::make( $request->all(), [
            'id_fase'=>'required|max:2',
            'criterio'=>'required|max:200',
            'puntos'=>'required|max:3',
        ]);
        // Guardado a la base de datos del modelo Criterio
        Pregunta::create($request->all());
        // Retorna a una pantalla principal index según route profereg.index
        return redirect()->route('pregunta.index')->with('success','Registro creado satisfactoriamente');
    }

    public function del($id)
    {
        // Eliminado de Criterio o Pregunta
        Pregunta::find($id)->delete();
        //Pregunta::destroy($id);

        Session::flash('message','Registro Eliminado');
        return redirect()->route('pregunta.index')->with('success','Registro creado satisfactoriamente');
    }

    public function ver(Pregunta $criterio)
    {

        $criterios = Pregunta::find($criterio['id']);

        return view('pregunta.show',compact('criterio'));
    }

    // VISTA DE EDICION PREGUNTA O CRITERIO
    public function ecriterio($id)
    {
        // Consultas
        $criterio=Pregunta::find($id);
        $fase = Fase::find($id);
        $fases = Fase::all();

        return view('pregunta.edit',compact('criterio', 'fase', 'fases'));
    }

    // FUNCION ACTUALIZACION PREGUNTA O CRITERIO
    public function ucriterio(Pregunta $criterio)
    {
        //
        $data = request()->all();

        $criterio->update($data);

        return redirect()->route('pregunta.index');
    }

    // ********** GESTION FASES **************************

    public function fases()
    {

        $fases = Fase::orderBy('id','DESC')->paginate(5);

        return view('fase.index',['fases' => $fases]);
    }

    public function delfase($id)
    {
        // Eliminando Fase
        Fase::find($id)->delete();
        //Pregunta::destroy($id);

        // Envio de mensaje de confirmación al fase/index.blade.php
        Session::flash('message','Fase Eliminada');
        return redirect()->route('fase.index')->with('success','Fase eliminada');
    }

    // VISTA DE EDICION FASE
    public function efase($id)
    {
        //
        $fase=Fase::find($id);
        return view('fase.edit',compact('fase'));
    }

    // FUNCION ACTUALIZACION FASE
    public function ufase(Fase $fase)
    {
        //
        $data = request()->all();

        $fase->update($data);

        return redirect()->route('fase.index');
    }

    public function cfase()
    {
        //
        return view('fase.create');
    }

    
    public function sfase(Request $request)
    {
        // Validación de datos del formulario
        $validation = Validator::make( $request->all(), [
            'nombre'=>'required|max:100',
            'descripcion'=>'required|max:500',
            'fechafin'=>'required|max:15',
            'habilitado'=>'required|max:2',
        ]);
        // Guardado a la base de datos del modelo Fase
        Fase::create($request->all());
        // Retorna a una pantalla principal index según route profereg.index
        return redirect()->route('fase.index')->with('success','Fase creada');
    }

// ********** GESTION COMUNICADOS **************************

    public function comunicados()
    {

        $comunicados = Comunicado::orderBy('id','DESC')->paginate(5);

        return view('comunicado.index',['comunicados' => $comunicados]);
    }

    public function delcomunicado($id)
    {
        // Eliminando Fase
        Comunicado::find($id)->delete();
        //Pregunta::destroy($id);

        // Envio de mensaje de confirmación al fase/index.blade.php
        Session::flash('message','Comunicado Eliminada');
        return redirect()->route('comunicado.index')->with('success','Comunicado eliminada');
    }

    // VISTA DE EDICION FASE
    public function ecomunicado($id)
    {
        //
        $comunicado=Comunicado::find($id);
        return view('comunicado.edit',compact('comunicado'));
    }

    // FUNCION ACTUALIZACION FASE
    public function ucomunicado(Comunicado $comunicado)
    {
        //
        $data = request()->all();

        $comunicado->update($data);

        return redirect()->route('comunicado.index');
    }

    public function ccomunicado()
    {
        //
        return view('comunicado.create');
    }

    
    public function scomunicado(Request $request)
    {
        // Validación de datos del formulario
        $validation = Validator::make( $request->all(), [
            'titulo'=>'required|max:100',
            'descripcion'=>'required|max:1000'
        ]);
        // Guardado a la base de datos del modelo Fase
        Comunicado::create($request->all());
        // Retorna a una pantalla principal index según route profereg.index
        return redirect()->route('comunicado.index')->with('success','Comunicado creada');
    }

    // Consulta directa Modelo User con Controller
    public function showcom($id)
    {
        //
        $comunicado=Comunicado::find($id);
        return view('comunicado.show',compact('comunicado'));
    }
}
