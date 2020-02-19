<?php

namespace App\Http\Controllers;

use App\KeysController;
use Blockavel\LaraBlockIo\LaraBlockIo;
use phpseclib\Crypt\RSA;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $block  = new LaraBlockIo();
        $balance = $block->getAvailableBalance();
        $network=$block->getNetwork();
        $keypairs=KeysController::generate_keys();
//        dd($keypairs);
        return view('dashboard', ['balance' => $balance,'network' => $network,'keypairs' => $keypairs]);
    }
}
