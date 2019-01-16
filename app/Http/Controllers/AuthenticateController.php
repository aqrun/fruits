<?php
namespace App\Http\Controllers;

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
     *   "token": "xxxx"
     * }
     *
     * @response 401 {
     *   "error" : "invalid_credentials"
     * }
     *
     * @response 500 {
     *   "error" : "could_not_create_token"
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
                return response()->json(['error'=>'invalid_credentials'], 401);
            }
        }catch(\Exception $e){
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
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
                return response()->json([
                    'code' => 404,
                    'msg' => 'user not found',
                    'result' => []
                ]);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['token_expired'], 400);
        } catch (TokenInvalidException $e) {
            return response()->json(['token_invalid'], 400);
        } catch (JWTException $e) {
            return response()->json(['token_absent'], 400);
        }

        return response()->json(compact('user'));
    }

    /**
     * refresh the token
     */
    public function getToken()
    {
        $token = JWTAuth::getToken();

        if(!$token) {
            return $this->response->errorMethodNotAllowed('Token not provided');
        }

        try {
            $refreshedToken = JWTAuth::refresh($token);
        } catch (JWTException $e) {
            return $this->response->errorInternal('Not able to refresh Token');
        }

        return $this->response->withArray(['token' => $refreshedToken]);
    }

}