<?php

namespace App\Http\Controllers;

use App\Models\state;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result=State::simplePaginate(5);
        
        return view('/state',compact('result'));
    }

    public function delete(Request $request, $id)
    {
        $model=State::find($id);
        $model->delete();

        $request->session()->flash('message','State Deleted');
        return redirect('/state');
    }

    public function manage_state(Request $request ,$id='')
    {
        if($id>0){
            $arr=State::where(['id'=>$id])->get();

            $result['country_id']=$arr['0']->country_id;
            $result['state']=$arr['0']->state;
            $result['id']=$arr['0']->id;
        }else{
            $result['country_id']='';
            $result['state']='';
            $result['id']='0';
        }
        return view('/manage_state', $result);
    }

    public function manage_state_process(Request $request)
    {
         //return $request->post();

        //validation
        $request->validate([
            'state'=>'required|unique:states,state,'.$request->post('id'),
        ]);

        if($request->post('id')>0){
            $model=State::find($request->post('id'));
            $msg="State Updated";
        }else{
            $model=new State();
            $msg="State Inserted";
        }

        // save in database
        $model->country_id=$request->{'country_id'};
        $model->state=$request->{'state'};
        $model->save();

        // Show success massage
        $request->session()->flash('message', $msg);
        return redirect('/state');
    }
    
}


