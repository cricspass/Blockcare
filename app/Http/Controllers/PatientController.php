<?php

namespace App\Http\Controllers;

use App\KeysController;
use App\Patient;
use Blockavel\LaraBlockIo\LaraBlockIo;
use BlockIo;
use Illuminate\Http\Request;
use BitcoinPHP\BitcoinECDSA\BitcoinECDSA;



class PatientController extends Controller
{

    public function index()
    {
//        $block = new LaraBlockIo();
//        ($block->getAddresses());
        $patients = Patient::all();
        return view('patients.patients_home', compact('patients'));
    }


    public function create()
    {
        return view('patients.patients_create');
    }


    public function store(Request $request,Patient $patient)
    {
        $patient->name= $request->name;
        $patient->email=$request->email;
        $key_pair = KeysController::generate_keys();
        $patient->private_key = $key_pair["privatekey"];
        $patient->public_key = $key_pair["publickey"];
        $bitcoinECDSA = new BitcoinECDSA();
        $bitcoinECDSA->setNetworkPrefix('6f'); // 6f for testnet

        $private_key_to_hex = bin2hex($key_pair["privatekey"]);
        $bitcoinECDSA->setPrivateKey($private_key_to_hex);
        $pubKey = $bitcoinECDSA->getPubKey();
        $address = $bitcoinECDSA->getAddress();
        $hashedData = $bitcoinECDSA->hash256('candidate 1');
        $signedHash = $bitcoinECDSA->signHash($hashedData);
        $random = hash('sha256', hex2bin(hash('sha256', 'candidate 1')));
        $verifiedhash = $bitcoinECDSA->checkDerSignature($pubKey, $signedHash, $random);
//        dd($verifiedhash);
        $address = $bitcoinECDSA->getUncompressedAddress();
//        $patient->bitcoin_address = $request->bitcoin_address;
//        $patient->network = $request->network;
//        $patient->verify_token = sha1(uniqid($patient->private_key, true));

        $patient->save();
        return redirect()->route('patient.index')->withStatus(__('Patient successfully created.'));
    }


    public function show($id)
    {
        //
    }


    public function edit(Patient $patient)
    {
        return view('patients.patients_edit',compact('patient'));
    }


    public function update(Request $request, Patient $patient)
    {
        $patient->name = $request->get('name');
        $patient->email = $request->get('email');
        $patient->update();
        return redirect()->route('patient.index')->withStatus(__('Patient successfully created.'));
    }


    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patient.index')->withStatus(__('Patient successfully created.'));
    }
}
