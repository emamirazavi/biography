<?php
namespace App\Helper;

class Validator {
    public static function bioCreateValidate($request){
        $request->validate([
            'english_name' => 'regex:/^[a-z0-9]{10}/i',
            'name' => 'required',
            'job_title' => 'required'
        ]);
    }
}