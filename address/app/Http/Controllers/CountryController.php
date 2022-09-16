<?php

namespace App\Http\Controllers;

use App\Models\country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result=Country::simplePaginate(5);
        $trashPosts=Country::onlyTrashed()->simplePaginate(5);
        return view('/country',compact('result','trashPosts'));
    }

    public function delete(Request $request, $id)
    {
        $model=Country::find($id);
        $model->delete();

        $request->session()->flash('message','Country Deleted');
        return redirect('/country');
    }

    public function manage_country(Request $request ,$id='')
    {
        if($id>0){
            $arr=Country::where(['id'=>$id])->get();

            $result['country']=$arr['0']->country;
            $result['id']=$arr['0']->id;
        }else{
            $result['country']='';
            $result['id']='0';
        }
        return view('/manage_country', $result);
    }

    public function manage_country_process(Request $request)
    {
         //return $request->post();

        //validation
        $request->validate([
            'country'=>'required|unique:countries,country,'.$request->post('id'),
        ]);

        if($request->post('id')>0){
            $model=Country::find($request->post('id'));
            $msg="Country Updated";
        }else{
            $model=new Country();
            $msg="Country Inserted";
        }

        // save in database
        $model->country=$request->{'country'};
        $model->save();

        // Show success massage
        $request->session()->flash('message', $msg);
        return redirect('/country');
    }

    public function restore_country(Request $request, $id)
    {
        $model=Country::withTrashed()->find($id);
        $model->restore();

        $request->session()->flash('message','Country Restored');
        return redirect('/country');
    }

    public function permanent_delete(Request $request, $id)
    {
        $model=Country::withTrashed()->find($id);
        $model->forceDelete();

        $request->session()->flash('message','Country Force Deleted');
        return redirect('/country');
    }
}
