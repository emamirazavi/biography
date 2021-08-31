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
            'image' => 'mimes:jpeg,png|max:10000',
        ]);
    }
}