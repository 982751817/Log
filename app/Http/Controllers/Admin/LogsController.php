<?php

namespace App\Http\Controllers\Admin;

use App\Events\LogShipped;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Validate\LogValidate;

class LogsController extends Controller
{
    public function __construct(){
        $this->middleware('log')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Auth $auth)
    {
        $data=DB::table('logs')->where(['isdel'=>0])->paginate(10);
        return view('log',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Logs $logs,User $user)
    {

//        $result =new LogValidate($request->all());
//        $res = $result->goCheck();
        $data['userName'] = $request->post('userName');
        $user = User::where(['userName'=>$data['userName']])->first();
        if(!$user){
            throw new \Exception('没有此用户',404);
        }
        $data['adminId']=$user->id;
        $data['method']=$request->post('method','post');
        $data['uri']=$request->post('uri','www.baidu.com');
        $data['ip']=$request->post('ip','114.245.111.1');
        $data['statusCode']=$request->post('statusCode','200');
        event(new LogShipped($data));
//        return redirect('/log');
        return response()->json(['data'=>$data,'code'=>201,'message'=>'新增成功'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $log = Logs::where(['id'=>$id])->first();
        return response()->json($log->toArray(),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        Logs::where(['id'=>$id])->update(['isdel'=>1]);
        return response()->json(['messsage'=>'删除成功','code'=>204],204);
    }
}
