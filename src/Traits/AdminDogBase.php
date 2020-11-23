<?php

namespace SmallRuralDog\AdminDog\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

trait AdminDogBase
{
    public function validatorData(Request $request, $rules, $message = [])
    {
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            abort(400, $validator->errors()->first());
        }
        return $validator;
    }

    public function response($data, $message = '', $code = 200, $headers = [])
    {
        return Response::json([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ], 200, $headers);
    }

    public function responseMessage($message = '', $code = 200)
    {
        return $this->response([], $message, $code);
    }

    public function responseError($message = '', $code = 400)
    {
        return $this->response([], $message, $code);
    }

    public function responseRedirect($url = '', $message = '', $code = 301)
    {
        return $this->response($url, $message, $code);
    }

    /**
     * vue路由重定向
     * @param $fullPath
     * @return \Illuminate\Http\JsonResponse
     */
    public function fullPath($fullPath)
    {
        return $this->response($fullPath, '', 302);
    }

    public function vueRouterTo($fullPath)
    {
        return $this->response($fullPath, '', 302);
    }

    /**
     * 浏览器URL重定向
     * @param $href
     * @return \Illuminate\Http\JsonResponse
     */
    public function href($href)
    {
        return $this->response($href, '', 301);
    }
}
