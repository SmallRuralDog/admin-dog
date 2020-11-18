<?php


namespace SmallRuralDog\AdminDog\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class AdminDogController extends Controller
{


    protected function validatorData(Request $request, $rules, $message = [])
    {
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            abort(400, $validator->errors()->first());
        }
        return $validator;
    }

    protected function response($data, $message = '', $code = 200, $headers = [])
    {
        return Response::json([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ], 200, $headers);
    }

    protected function responseMessage($message = '', $code = 200)
    {
        return $this->response([], $message, $code);
    }

    protected function responseError($message = '', $code = 400)
    {
        return $this->response([], $message, $code);
    }

    protected function responseRedirect($url = '', $message = '', $code = 301)
    {
        return $this->response($url, $message, $code);
    }

    /**
     * vue路由重定向
     * @param $fullPath
     * @return \Illuminate\Http\JsonResponse
     */
    protected function fullPath($fullPath)
    {
        return $this->response($fullPath, '', 302);
    }

    /**
     * 浏览器URL重定向
     * @param $href
     * @return \Illuminate\Http\JsonResponse
     */
    protected function href($href)
    {
        return $this->response($href, '', 301);
    }

}
