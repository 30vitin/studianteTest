<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Estudiante;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class RegisterStudentController extends Controller
{
    //


    protected function showFormRegisterStudent(){

    	return view('/pages/register-student');
    }

    protected function showFormEdit($id){
    	$filter=array(
    		     'field'=> 'id_num',
    		     'operator'=> '=',
    		     'search'=> $id );
    	$student=$this->getStudentListFilters($filter);
    	return view('/pages/edit-student',[
    			'student'=>$student
    	  ]);

    }

    protected function deleteStudent($id,$nameId){

      try {

            Estudiante::where("id_num",'=',$id)->delete();
            DB::commit();
            $objs = $this->getAllStudentList();
            $titles = $this->getTitles();

         return view('/pages/consult-student',[
                'students'=>$objs,
                'titles'=>$titles,
                'searchOperator'=>'',
                'searchField'=>'',
                'searchText'=>'',
                'mensaje'=>'EL estudiante '.$nameId.' se elimino exitosamente!'
              ]);

        } catch (Exception $e) {
             DB::rollback();
                //throw $e;
              $sessionManager->flash('mensaje', $e->getMessage());
              $sessionManager->flash('type','error');
            return back();
        }

    }
    protected function updateStudent(Request $request,$id,SessionManager $sessionManager){

        $this->validatorUpdate($request->all(),$id)->validate();
        try {
            $this->update($request->all(),$id);
            DB::commit();

              $sessionManager->flash('mensaje', 'El registros del estudiante se actualizo exitosamente!');
              $sessionManager->flash('type','success');

              return back();
        } catch (Exception $e) {
            DB::rollback();
                //throw $e;
              $sessionManager->flash('mensaje', $e->getMessage());
              $sessionManager->flash('type','error');
            return back();
        }
    }
    protected function tableConsultStudent(Request $request){
    	$operator = array('=','%%','>','<');
    	$page = $request->get('page');
    	$searchField = $request->get('searchField');
    	$searchOperator = $request->get('searchOperator');
    	$searchText = $request->get('searchText');


    	$titles = $this->getTitles();

    	$checkFiltersField=FALSE;
    	$checkFiltersOper=FALSE;


    	//check field
    	if(in_array($searchField, $titles))
    		$checkFiltersField=TRUE;
		//check operator
		if(in_array($searchOperator, $operator))
    		$checkFiltersOper=TRUE;

	   	if($checkFiltersField && $checkFiltersOper && $searchText!=''){

	   		$filters=array(
    		     'field'=> $searchField,
    		     'operator'=> $searchOperator!='%%' ? $searchOperator :'like',
    		     'search'=> $searchOperator!='%%' ? $searchText :"%$searchText%" );
            $objs = $this->getStudentListFilters($filters);
           // return $filters;
	    }else{
	    	$objs = $this->getAllStudentList();

	    }



    	 return view('/pages/consult-student',[
    	 	'students'=>$objs,
    	 	'titles'=>$titles,
    	 	'searchOperator'=>$searchOperator,
    	 	'searchField'=>$searchField,
    	 	'searchText'=>$searchText
    	  ]);

    }

    protected function getTitles(){
    	 return array('Cedula'=>'cedula',
    	 	          'Id_Num'=>'id_num',
    	 	          'Primer Nombre'=>'fisrt_name',
    	 	          'Apellido'=>'last_name',
    	 	          'Celular'=>'cell_phone',
    	 	          'Email'=>'email',
    	 	          'Type'=>'type',
    	 	          'Editar'=>'Editar');
    }


    protected function getStudentListFilters(array $filters){
            $studentList = Estudiante::where($filters['field'],$filters['operator'],$filters['search'])->paginate(3);
           // $studentList = Estudiante::where("cedula","like","%5498%")->paginate(3);
        return $studentList;
    }
    protected function getAllStudentList(){
        $studentList = Estudiante::Paginate(3);
        return $studentList;

    }

    protected function saveStudent(Request $request,SessionManager $sessionManager){

    	$this->validator($request->all())->validate();

    	try {

    		 $this->create($request->all());

	   	      DB::commit();

			  $sessionManager->flash('mensaje', 'El Estudiante se registro exitosamente!');
			  $sessionManager->flash('type','success');

	   		  return back();

    	} catch (Exception $e) {

    		DB::rollback();
	   			//throw $e;
	   	      $sessionManager->flash('mensaje', $e->getMessage());
			  $sessionManager->flash('type','error');
	   		return back();
    	}

    }

    protected function update(array $data,$id){

        $studentList=Estudiante::where("id",'=',$id)->update([
                 'fisrt_name' => $data['fisrt_name'],
                'last_name' => $data['last_name'],
                'home_phone' => $data['home_phone'],
                'work_phone' => $data['work_phone'],
                'cell_phone' => $data['cell_phone'],
                'email' => $data['email'],
                'address' => $data['address'],
                'type' => $data['student_type'],
                'updated_by'=>auth()->user()->name
                ]);
        return   $studentList;
    }
  protected function create(array $data)
    {
        return Estudiante::create([
            'id_num' => $data['id_num'],
            'cedula' => $data['cedula'],
            'fisrt_name' => $data['fisrt_name'],
            'last_name' => $data['last_name'],
            'home_phone' => $data['home_phone'],
            'work_phone' => $data['work_phone'],
            'cell_phone' => $data['cell_phone'],
            'email' => $data['email'],
            'address' => $data['address'],
            'type' => $data['student_type'],
        ]);
    }
    protected function validator(array $data)
    {
    	$this->type=array('Regular','Media');

        return Validator::make($data, [
            'id_num' => ['required', 'string', 'max:50','unique:students'],
            'cedula' => ['required', 'max:50','unique:students'],
            'fisrt_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'cell_phone' => ['required', 'max:50'],
            'email' => ['required', 'email','unique:students'],
            'address' => ['required'],
            'student_type'=>['required',Rule::in($this->type)]
        ]);

    }
    protected function validatorUpdate(array $data,$id)
    {
        $this->type=array('Regular','Media');

        return Validator::make($data, [

            'fisrt_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'cell_phone' => ['required', 'max:50'],
            'email' => ['required', 'email',Rule::unique('students')->ignore($id)],
            'address' => ['required'],
            'student_type'=>['required',Rule::in($this->type)]
        ]);

    }

}
