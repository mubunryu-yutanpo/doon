<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use App\Drill;
use App\Problem;
use App\Http\Requests\ValidRequest;
use App\Http\Requests\UserValidRequest;
use Illuminate\Support\Facades\Hash;



class MypageController extends Controller
{
        //mypageへ
        public function mypage(){
            //drillとproblem情報を取得して変数に
            $user = Auth::user();
            $user_id = Auth::id();
            $drills = DB::table('drills')->where('user_id', $user_id)->paginate(5);
            $problems = DB::table('problems')->where('user_id', $user_id)->get();

            return view('mypage/mypage', compact('user', 'drills', 'problems'));
        }

        //プロフィール編集画面へ
        public function prof($id){
            if(!ctype_digit($id)){
                return redirect('/welcome')->with('flash_message', __('Invalid operation was performed'));
            }

            $user = DB::table('users')->find($id);
            return view('mypage/profEdit', compact('user'));
        }

        //プロフィール更新処理
        public function profEdit(ValidRequest $request,$id){
            if(!ctype_digit($id)){
                return redirect('/welcome')->with('flash_message', __('Invalid operation was performed'));
            }

            $user = Auth::user()->find($id);
            
            $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            ]);
            return redirect('/mypage')->with('flash_message', __('registered!'));
        }

        //ログアウト
        public function logOut(){
            Auth::logout();
            return redirect('/');
        }

        //退会ページへ
        public function toWithdraw(){
            $user_id = Auth::user()->id;

            return view('mypage/withdraw', compact('user_id'));
        }

        // 退会処理
        public function withdrawal(ValidRequest $request, $id){
            if(!ctype_digit($id)){
                return redirect('/welcome')->with('flash_message', __('Invalid operation was performed'));
            }

            //入力されたパスワードと一致した場合は削除
            $user = DB::table('users')->find($id);
            $pass = $request->password;

            if(password_verify($pass, $user->password)){
                //ユーザー情報削除
                DB::table('users')->where('id', $id)->delete();
                return redirect('/')->with('flash_message', __('退会しました'));

            }else{
                return redirect('/mypage')->with('flash_message', __('Invalid operation was performed'));
            }

        }

}
