<?php /** @noinspection ALL */

namespace App\Http\Controllers\Api\Mini;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::where('user_id', auth('users')->user()->id)->get();
        foreach ($addresses as $k => $v) {
            $xing = substr($v['tel'], 3, 4);  //获取手机号中间四位
            $addresses[$k]['tel'] = str_replace($xing, '****', $v['tel']);
        }
        return response()->json(compact('addresses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty($request->name)){
            return response()->json(['status'=>false, 'message'=>'请填写收货人姓名']);
        }
        if(empty($request->tel)){
            return response()->json(['status'=>false, 'message'=>'请填写收货人电话']);
        }
        if(empty($request->city)){
            return response()->json(['status'=>false, 'message'=>'请选择省市区']);
        }
        if(empty($request->detail)){
            return response()->json(['status'=>false, 'message'=>'请填写详细地址']);
        }
        Address::create([
            'user_id' => auth('users')->user()->id,
            'name' => $request->name,
            'province' => $request->province,
            'city' => $request->city,
            'area' => $request->area,
            'tel' => $request->tel,
            'detail' => $request->detail,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 设置默认地址
     * @param Request $request
     * @return array
     */
    function default_address($id)
    {
        User::where('id', auth('users')->user()->id)->update(['address_id' => $id]);
    }
}
