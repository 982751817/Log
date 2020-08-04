<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;


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
        $data=DB::table('logs')->paginate(3);
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
        $result = Logs::create($data);
        return redirect('/log');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
