<?php /** @noinspection ALL */

namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Customer;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::where('customer_id', session('wechat.customer.id'))->where('status', false)->get();
        foreach ($addresses as $k => $v) {
            $xing = substr($v['tel'], 3, 4);  //获取手机号中间四位
            $addresses[$k]['tel'] = str_replace($xing, '****', $v['tel']);
        }

        $default_address = Address::find(session('wechat.customer.address_id'));
        return view('wechat.address.index', compact('addresses', 'default_address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wechat.address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = Address::where('customer_id', session('wechat.customer.id'))->first();
        if (!$address) {
            $pca = explode(" ", $request->pca);
            Address::create([
                'customer_id' => session('wechat.customer.id'),
                'name' => $request->name,
                'province' => $pca[0],
                'city' => $pca[1],
                'area' => $pca[2],
                'tel' => $request->tel,
                'detail' => $request->detail,
                'status' => 1
            ]);
        } else {
            $pca = explode(" ", $request->pca);
            Address::create([
                'customer_id' => session('wechat.customer.id'),
                'name' => $request->name,
                'province' => $pca[0],
                'city' => $pca[1],
                'area' => $pca[2],
                'tel' => $request->tel,
                'detail' => $request->detail,
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address = Address::find($id);
        return view('wechat.address.edit', compact('address'));
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
        $pca = explode(" ", $request->pca);

        Address::where('id', $id)->update([
                'name' => $request->name,
                'province' => $pca[0],
                'city' => $pca[1],
                'area' => $pca[2],
                'tel' => $request->tel,
                'detail' => $request->detail,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Address::destroy($id);
    }


    /**
     * 设置默认地址
     * @param Request $request
     * @return array
     */
    function default_address(Request $request)
    {
        $address = Address::where('customer_id', session('wechat.customer.id'))->where('status', true)->first();
        if ($address) {
            $address->status = false;
            $address->save();

            Address::where('id', $request->address_id)->update(['status' => true]); // 修改地址表的 status

            Customer::where('id', session('wechat.customer.id'))->update(['address_id' => $request->address_id]);

            //重新设置session
            $customer = session()->get('wechat.customer');
            $customer['address_id'] = $request->address_id;
            session()->put('wechat.customer', $customer);
        } else{
            Address::where('id', $request->address_id)->update(['status' => true]); // 修改地址表的 status

            Customer::where('id', session('wechat.customer.id'))->update(['address_id' => $request->address_id]);

            //重新设置session
            $customer = session()->get('wechat.customer');
            $customer['address_id'] = $request->address_id;
            session()->put('wechat.customer', $customer);
        }
    }
}
