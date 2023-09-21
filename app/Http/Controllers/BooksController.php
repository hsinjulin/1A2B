<?php

namespace App\Http\Controllers;

use App\Models\guessHistory;
use Illuminate\Http\Request;
//session_start();
class BooksController extends Controller
{
    //index
    public function index(){
        return view("index");
    }

    public function guess(Request $request) {
        if($request->isMethod('get')){
            $id = $request->input('player');
            $guess = $request->input('guess');
            session(['player'=>$id]);
            session(['guess'=>$guess]);
            $randomNumbers = session('randomNumbers',[]);
            
            //$_SESSION["player"] = $request->input("player");
            //$_SESSION["guess"] = $request->input("guess");
        
            $guessString = str_split($guess);
            $A = 0;
            $ans_appear_times = array_fill(0, 10, 0);
            $guess_appear_times = array_fill(0, 10, 0);

            //計算有幾個A
            for($i=0; $i< 4; $i++) {                
                if($guessString[$i] == $randomNumbers[$i]) {
                    $A++;
                }
                else {
                    $ans_appear_times[$randomNumbers[$i]]++;
                    $guess_appear_times[$guessString[$i]]++;
                }
            }
            //計算有幾個B(已排除計算過的A)
            $B = 0;
            for($i=0; $i<10; $i++) { 
                $B +=  min($guess_appear_times[$i], $ans_appear_times[$i]);
            }
            $results = isset($_SESSION['results']) ? $_SESSION['results'] : array();
            $results[] = "$guess >> {$A}A{$B}B";  
            $_SESSION['results'] = $results;
        }
        return view('index', ['results' => session('results', [])]);
    }

    public function img(){
        //檢測是否已有randomNumbers
        if (!session()->has('randomNumbers')) {
            $randomNumbers = array();
            while (count($randomNumbers) < 4) {
                $randomNumber = rand(0, 9);
                if (!in_array($randomNumber, $randomNumbers)) {
                    $randomNumbers[] = $randomNumber;
                }
            }
            session(['randomNumbers' => $randomNumbers]);
        } else {
            $randomNumbers = session('randomNumbers', []);
        }
        return view('index');
    }

    public function show(){
        if(session()->has('results')){
            $results = session('results');
            //echo $results;
            return respones()->json($results);
        }       
    }

    public function insert(){
        guessHistory::create([
            'id' => session('player'),
            'guess' => session('guess'),
            'result' => session('result'),
        ]);
        return view('index');
    }

    public function clear(){
        //清空session內所有資料
        session()->flush();
        //重新導回一開始的樣子
        return redirect()->route('start');
    }
}
