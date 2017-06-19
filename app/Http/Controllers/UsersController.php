<?php

namespace App\Http\Controllers;

use App\User;
use App\Good;

class UsersController extends Controller
{
    private $langs = ['ru', 'en'];

    public function get($lang, User $user)
    {
        if (!$this->checkLang($lang)) {
            return response('Wrong language', 400);
        }
        $goods = Good::find($user->goods_id);
        //dd($user);
        foreach ($goods as $good) {
            $good->caption = isset($good->caption[$lang]) ? $good->caption[$lang] : '';
        }
        $user->goods = $goods;
        $user->makeHidden('goods_id')->toArray();
        return $user;
    }

    public function update($lang, User $user)
    {
        if (!$this->checkLang($lang)) {
            return response('Wrong language', 400);
        }
        $params = array_filter(request(['goods_id', 'name']));
        $user->update($params);
    }

    private function checkLang($lang)
    {
        return in_array($lang, $this->langs);
    }
}
