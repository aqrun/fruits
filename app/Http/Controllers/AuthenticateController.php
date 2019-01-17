<?php
namespace App\Http\Controllers;

use App\Helpers\JsonHelper;
use JWTAuth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class AuthenticateController extends BaseController
{

    /**
     * Token request
     *
     * api login on success return jwt auth token
     *
     * @bodyParam email string required email
     * @bodyParam password string required password
     *
     * @response {
     *   "code": 0,
     *   "msg": "success",
     *   "result": {
     *      "token": "xxx"
     *   }
     * }
     *
     * @response {
     *   "code": 4001,
     *   "msg" : "invalid_credentials",
     *   "result": {}
     * }
     *
     * @response {
     *   "code": 500,
     *   "msg" : "could_not_create_token",
     *   "result": {}
     * }
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try{
            if(!$token = JWTAuth::attempt($credentials)){
                return JsonHelper::error([], 'invalid_credentials', 4001);
            }
        }catch(\Exception $e){
            return JsonHelper::error([], 'could_not_create_token', 500);
        }

        return JsonHelper::success(compact('token'));
    }

    /**
     * log out
     * @param Request $request
     */
    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
        ]);

        JWTAuth::invalidate($request->input('token'));
    }

    /**
     * returns the authenticated user
     *
     * @response {
     *   "user" : {
     *     "id": 1,
     *     "name": "alex",
     *     "email": "alex@qq.com",
     *     "email_verified_at": null,
     *     "created_at": "2019-01-15 07:40:31",
     *     "updated_at": "2019-01-15 07:40:31"
     *   }
     * }
     *
     * @response 400 {
     *   "token_expired",
     *   "token_invalid",
     *   "token_absent"
     * }
     *
     * @response 404 {
     *   "user_not_found",
     * }
     *
     */
    public function authenticatedUser()
    {
        try{
            if(!$user = JWTAuth::authenticate()) {
                return JsonHelper::error([], 'User not found', 4004);
            }
        } catch (TokenExpiredException $e) {
            return JsonHelper::error([], 'token_expired', 4004);
        } catch (TokenInvalidException $e) {
            return JsonHelper::error([], 'token_invalid', 4004);
        } catch (JWTException $e) {
            return JsonHelper::error([], 'token_absent', 4004);
        }
        return JsonHelper::success(compact('user'));
    }

    /**
     * refresh the token
     */
    public function getToken()
    {
        $token = JWTAuth::getToken();

        if(!$token) {
            return JsonHelper::error([], 'Token not provided');
        }

        try {
            $refreshedToken = JWTAuth::refresh($token);
        } catch (JWTException $e) {
            return JsonHelper::error([], 'Not able to refresh Token');
        }

        return JsonHelper::success(['token'=>$refreshedToken]);
    }

}