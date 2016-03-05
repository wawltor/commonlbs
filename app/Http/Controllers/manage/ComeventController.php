<?php namespace  App\Http\Controllers\manage;
use App\Http\Controllers\Controller;
use Input;
use Request;
use Hash;
use Redirect;
use App\Comevent;
class ComeventController extends Controller{
    
	//下面是查找所有的未分类的事件，并返回JSON格式的数据
    public function getALLComevent(){
        //下面查找所有未分类的
        //echo Comevent::find(1)->toJson();
        $comevents = Comevent::where('state','=',0)->get()->toJson();
        return $comevents;
    }

    //更新事件的处理状态
    public function updateComevent(){
    //更新事件的处理内容，并且更新一集状态，二级状态
        //$content =iconv('utf-8','gbk',Input::get('content'));
        /*$content = Input::get('晚上开演唱会');
        $content = '晚上开演唱会';
        $cate = Input::get('cate');
       $sub_cate = Input::get('sub_cate');
        //下面对这些数据更新到数据库中
        $comevent = Comevent::where('content','=',$content)->get();
        echo count($comevent);
        $comevent=$comevent[0];
        //$comevent->cate = $cate;
        $comevent->cate= 'test';
        //$comevent->sub_cate = $sub_cate;
        $comevent->sub_cate='tst';
        $comevent->boolean_cate = 1 ;*/
        $com = Comevent::find(3);
        echo $com->Id;
        $com->state = 1212;
        $com->address='test';
        $com->save();   
       
        


    }
}