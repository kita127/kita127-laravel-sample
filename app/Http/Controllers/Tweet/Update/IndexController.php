<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException as ExceptionNotFoundHttpException;
use Symforny\Component\HttpKernel\Exception\NotFoundHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $tweetId = (int) $request->route('tweetId');
        $tweet = Tweet::where('id', $tweetId)->first();
        if (is_null($tweet)) {
            throw new ExceptionNotFoundHttpException('存在しないつぶやきです');
        }

        // firstOrFail メソッドを使用すれば null チェックが不要
        // null の場合はModelNotFoundException を投げキャッチされなければ 404 NotFound となる
        // $tweet = Tweet::where('id', $tweetId)->firstOrFail();s

        dd($tweet);
    }
}
