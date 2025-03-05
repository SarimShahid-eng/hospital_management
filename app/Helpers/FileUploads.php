<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class FileUploads
{
    /**
     * Create a new class instance.
     */
    public static function upload($fieldName,$file, $destination,$types = "svg,gif,png,jpg,jpeg",$filesize = '2000')
    {

        if (!File::exists($destination)) {
            try {
                File::makeDirectory($destination, 0755, true, true);
                Log::info("Directory created at: $destination");
            } catch (\Exception $e) {
                Log::error("Failed to create directory: $destination", ['error' => $e->getMessage()]);
                return response()->json(['error' => 'Failed to create directory for file upload.'], 500);
            }
        }
        $rules = array($fieldName => 'nullable|image|mimes:' . $types . "|max:" . $filesize);
        $messages=[
            $fieldName.'.mimes'=>'Choose supported format',
            $fieldName.'.image'=>'Select images only'
        ];
        $validator = Validator::make(array($fieldName => $file), $rules,$messages);
        if ($validator->passes()) {
            if ($file && $file->isValid()) {
                $ext = $file->getClientOriginalExtension();
                $newname = md5(rand(0, 100000)) . '.' . strtolower($ext);
                $destinationPath=public_path().$destination;
                $path= $file->move($destinationPath, $newname);
                return $newname ;
            }
        }else{
        return ['error' => $validator->errors()->first($fieldName)];
    }
}
    }
