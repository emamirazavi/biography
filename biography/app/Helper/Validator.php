<?php
namespace App\Helper;

class Validator {
    public static function bioCreateValidate($request){
        $request->validate([
            'english_name' => 'regex:/^[a-z0-9]{5}/i',
            'name' => 'required',
            'email_address' => 'email:rfc,dns',
            'job_title' => 'required',
            // 'location' => 'sometimes|string',
            'avatar' => 'mimes:jpeg,png|max:10000',
        ]);
    }

    public static function portfolioCreateValidate($request, $create = true){
        $validate = [
            'title' => 'required',
            'description' => 'required',
            'img' => 'required|mimes:jpeg,png|max:10000',
        ];
        if (!$create) {
            $validate['img'] = 'mimes:jpeg,png|max:10000';
        }
        $request->validate($validate);
    }

    public static function skillCreateValidate($request, $create = true){
        $validate = [
            'title' => 'required',
        ];
        $request->validate($validate);
    }
}