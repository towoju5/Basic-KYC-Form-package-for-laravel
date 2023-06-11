<?php

namespace Towoju5\KycForm\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KycVerification extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public static function save_image($path, $image, $defaultName=null)
    {
        // $image_path = '/storage/' . $path;
        if (!null == $defaultName) {$file_name = $defaultName;} else { $file_name = sha1(time());}
        $path = public_path($path);
        $filename = "$file_name.jpg";
        $image->move($path, $filename);
        $img_url = url($filename);
        return $img_url;
    }
}
