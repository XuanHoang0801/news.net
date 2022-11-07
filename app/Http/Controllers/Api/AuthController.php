<?php

namespace App\Http\Controllers\Api;

use LDAP\Result;
use Carbon\Carbon;
use App\Models\User;
use Facebook\Facebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        $user = new User();
        $user->name =$request->name;
        $user->email = $request->email;
        $user->password  = bcrypt($request->password);
        $user->save();
        return $user;
    }

    public function login( Request $request){
        if(Auth::attempt(['email' =>$request->email, 'password'=>$request->password])){
            $user = Auth::user(); //Lấy thông tin user
            $responseArray = [];
            $responseArray['token'] = $user->createToken('MyApp')->accessToken; //Tạo token mới
            $responseArray['name'] = $user->name; //thông tin tên đăng nhập
            $responseArray['email'] = $user->email; //Thông tin email đăng nhập
            return response()->json($responseArray,200); 

        }
        else{
            return response()->json(['error'=>'Tài khoản và mật khẩu không đúng!'], 203);
        }
    }

    public function logout(Request $request){
        // $request->user()->token()->revoke();
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'Successfully logged out',
            
        ]);
    }
    public function user(Request $request){
        return response()->json($request->user());
    }
//login facebook
    public function facebook(Request $request){
        $facebook = $request->only('access_token');
        if (!$facebook || !isset($facebook['access_token'])) {
            return $this->responseErrors(config('code.user.login_facebook_failed'), trans('messages.user.login_facebook_failed'));
        }
        // Khởi tạo instance của Facebook Graph SDK
        $fb = new Facebook([
            'app_id' => config('services.facebook.app_id'),
            'app_secret' => config('services.facebook.app_secret'),
        ]);
    
        try {
            $response = $fb->get('/me?fields=id,name,email,link,birthday', $facebook['access_token']); // Lấy thông tin 
            // user facebook sử dụng access_token được gửi lên từ client
            $profile = $response->getGraphUser();
            if (!$profile || !isset($profile['id'])) { // Nếu access_token không lấy đc thông tin hợp lệ thì trả về login false luôn
                return $this->responseErrors(config('code.user.login_facebook_failed'), trans('messages.user.login_facebook_failed'));
            }
    
            $email = $profile['email'] ?? null;
            $social = SocialNetwork::where('social_id', $profile['id'])->where('type', config('user.social_network.type.facebook'))->first();
            // Lấy được userId của Facebook ta kiểm tra trong bảng social_networks đã có chưa, nếu có thì tài khoản facebook này 
            // đã từng đăng nhập vào hệ thống ta chỉ cần lấy ra user rồi generate jwt trả về cho client; Ngược lại nếu chưa có thì 
            // ta sẽ tiếp tục dùng email trả về từ facebook kiểm tra xem nếu có user với email như thế rồi thì lấy luôn user đó nếu 
            // không thì tạo user mới với email trên và tạo bản ghi social_network lưu thông tin userId của facebook rồi generate jwt
            // để trả về cho client
            
            if ($social) {
                $user = $social->user;
            } else {
                $user = $email ? User::firstOrCreate(['email' => $email]) : User::create();
                $user->socialNetwork()->create([
                    'social_id' => $profile['id'],
                    'type' => config('user.social_network.type.facebook'),
                ]);
                $user->name = $profile['name'];
                $user->save();
            }
    
            $token = JWTAuth::fromUser($user);
    
            return $this->responseSuccess(compact('token', 'user'));
        } catch (\Exception $e) {
            Log::error('Error when login with facebook: ' . $e->getMessage());
            return $this->responseErrors(config('code.user.login_facebook_failed'), trans('messages.user.login_facebook_failed'));
        }
    }

}
