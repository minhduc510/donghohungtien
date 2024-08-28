<?php

namespace App\Traits;

// use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

/**
 *
 */
trait StorageImageTrait
{
    /*
     store image upload and return null || array
     @param
     $request type Request, data input
     $fieldName type string, name of field input file
     $folderName type string; name of folder store
     return array
     [
         "file_name","file_path"
     ]
    */
    public function storageTraitUpload($request, $fieldName, $folderName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->$fieldName;
            return $this->handleFile($file,$folderName);
        } else {
            return null;
        }
    }

    // lấy theo mảng
    // $i là chỉ số mảng file
    public function storageTraitUploadMutipleArray($request, $fieldName, $i, $folderName)
    {
        if ($request->hasFile($fieldName)) {
            if (count($request->$fieldName) >= $i + 1) {
                $file = $request->$fieldName[$i];
                return $this->handleFile($file,$folderName);
            }
        } else {
            return null;
        }
    }

    /*
     store image multiple upload and return null || array
     @param
     $file type Request->file(), data input
     $folderName type string; name of folder store
     return array
     [
         "file_name","file_path"
     ]
    */


    public function storageTraitUploadMutiple($file, $folderName)
    {
        return $this->handleFile($file,$folderName);
    }

    // kieemr tra su ton tai file
    public function checkFile($filePath)
    {
        $isExists = Storage::exists($filePath);
        return $isExists;
    }

    // convert link file to file goc trong storage
    public function makePathOrigin($path){
        $path = Str::after($path, '/storage');
        return 'public'.$path;
    }
    public function deleteAvatarTrait($model, $id)
    {
        try {
            $path = $model->find($id)->avatar_path;

            $model->find($id)->update(['avatar_path' => null]);

            Storage::delete($this->makePathDelete($path));

            //  dd(Storage::delete('public/product/7/jxiPJ1DNjul20uaE2AOG.jpg'));
            // $model->find($id)->delete();
            return response()->json([
                "code" => 200,
                "message" => "success"
            ], 200);
        } catch (\Exception $exception) {
            dd($exception);
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }

    public function deleteIconTrait($model, $id)
    {
        try {
            $path = $model->find($id)->icon_path;

            $model->find($id)->update(['icon_path' => null]);

            Storage::delete($this->makePathDelete($path));

            //  dd(Storage::delete('public/product/7/jxiPJ1DNjul20uaE2AOG.jpg'));
            // $model->find($id)->delete();
            return response()->json([
                "code" => 200,
                "message" => "success"
            ], 200);
        } catch (\Exception $exception) {
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }
    public function deleteAvatarTrait2($model, $id)
    {
        try {
            $path = $model->find($id)->avatar_path2;

            $model->find($id)->update(['avatar_path2' => null]);

            Storage::delete($this->makePathDelete($path));

            //  dd(Storage::delete('public/product/7/jxiPJ1DNjul20uaE2AOG.jpg'));
            // $model->find($id)->delete();
            return response()->json([
                "code" => 200,
                "message" => "success"
            ], 200);
        } catch (\Exception $exception) {
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }
    // public function handleFile($file,$folderName){
    //     $fileNameOrigin = $file->getClientOriginalName();
    //     $fileNamNotExtension =pathinfo($fileNameOrigin, PATHINFO_FILENAME);
    //     $fileExtension =$file->getClientOriginalExtension();
    //     $fileNamNotExtension= Str::slug($fileNamNotExtension);
    //     $fileNameOrigin=$fileNamNotExtension.'.'.$fileExtension;
    //     //   $fileNameHash = Str::random(20) . "." . $file->getClientOriginalExtension();
    //     $fileNameHash =$fileNameOrigin;
    //    // dd($fileNameOrigin,$fileNamNotExtension,$fileExtension);
    //     // file size tinh theo kb
    //     // $fileSize = ceil($file->getSize());
    //     $fileSize = ceil($file->getSize() / 1024);
    //     if ($fileSize > 1024) {
    //         // Dung lượng vượt quá giới hạn cho phép
    
    //         // Giảm kích thước ảnh để giảm dung lượng
    //         $image = Image::make($file);
    //         $image->resize(800, null, function ($constraint) {
    //             $constraint->aspectRatio();
    //         });
    
    //         // Tiếp tục xử lý file như bình thường và lưu trữ ảnh đã thay đổi
    //     }
    //     $i=1;
    //     $filePathCheck="public/" . $folderName . "/" . auth()->id()."/".$fileNameOrigin;

    //     while($this->checkFile($filePathCheck)){
    //         $fileNameHash = $fileNamNotExtension."-".$i.".".$fileExtension;
    //         $filePathCheck="public/" . $folderName . "/" . auth()->id()."/".$fileNameHash;
    //         $i++;
    //     }
    //     $filePath = $file->storeAs("public/" . $folderName . "/" . auth()->id(), $fileNameHash);
    //     $dataUploadTrait = [
    //         "file_name" => $fileNamNotExtension,
    //         "file_path" => Storage::url($filePath),
    //         "file_size"=> $fileSize,
    //     ];
    //   //  dd($dataUploadTrait);
    //     return $dataUploadTrait;
    // }
    
    // public function handleFile($file, $folderName)
    // {
    //     $fileNameOrigin = $file->getClientOriginalName();
    //     $fileNamNotExtension = pathinfo($fileNameOrigin, PATHINFO_FILENAME);
    //     $fileExtension = $file->getClientOriginalExtension();
    //     $fileNamNotExtension = Str::slug($fileNamNotExtension);
    //     $fileNameOrigin = $fileNamNotExtension . '.' . $fileExtension;
    //     $fileNameHash = $fileNameOrigin;
    //     // Kích thước tối đa cho phép (1 MB - 1000 KB)
    //     $maxFileSizeInBytes = 1000 * 1024;

    //     // Dung lượng ảnh gốc
    //     $originalFileSize = $file->getSize();
        
    //     // Kiểm tra dung lượng sau khi thay đổi kích thước
    //     if ($originalFileSize > $maxFileSizeInBytes) {
    //         // Dung lượng vượt quá giới hạn cho phép
            
    //         $newWidth = 800;
    //         $newHeight = null;
    
    //         // Dung lượng tối đa cho phép (đơn vị: byte)
    //         $maxFileSize = 100 * 1024;
    
    //         // Dung lượng ảnh gốc
    //         // $originalFileSize = $file->getSize();
    //         // Xử lý ảnh
            
    //         $image = Image::make($file);
            
    //         // Thay đổi kích thước ảnh
    //         $image->resize($newWidth, $newHeight, function ($constraint) {
    //             $constraint->aspectRatio();
    //             $constraint->upsize();
    //         });
    //         // Lưu ảnh đã xử lý
    //         $filePath = $file->storeAs("public/" . $folderName . "/" . auth()->id(), $fileNameHash);
    //         // dd($filePath);
    //         // Đường dẫn tới ảnh đã xử lý
    //         $processedFilePath = storage_path('app/' . $filePath);
    
    //         // Kiểm tra dung lượng sau khi thay đổi kích thước
    //         if ($originalFileSize > $maxFileSize) {
    //             // Dung lượng vượt quá giới hạn cho phép
    
    //             // Tính tỷ lệ giảm chất lượng ảnh
    //             $quality = ceil(($maxFileSize / $originalFileSize) * 100);
    
    //             // Nén ảnh với chất lượng thấp hơn
    //             $image->encode($fileExtension, $quality);
    
    //             // Lưu ảnh đã nén
    //             $image->save($processedFilePath);
    
    //             // Cập nhật dung lượng sau khi nén
    //             $resizedFileSize = filesize($processedFilePath);
    //             // dd($resizedFileSize);
    //         }
    //         // dd($resizedFileSize);
    //         $dataUploadTrait = [
    //             "file_name" => $fileNamNotExtension,
    //             "file_path" => Storage::url($filePath),
    //             "file_size" => $originalFileSize,
    //         ];
    //     } else {
    //         // Dung lượng nằm trong giới hạn cho phép, không cần nén

    //         // Xử lý ảnh

    //         $image = Image::make($file);

    //         // Thay đổi kích thước ảnh
    //         // $image->resize(800, null, function ($constraint) {
    //         //     $constraint->aspectRatio();
    //         //     $constraint->upsize();
    //         // });

    //         // Lưu ảnh đã xử lý
    //         $filePath = $file->storeAs("public/" . $folderName . "/" . auth()->id(), $file->getClientOriginalName());

    //         // Đường dẫn tới ảnh đã xử lý
    //         $processedFilePath = storage_path('app/' . $filePath);

    //         $dataUploadTrait = [
    //             "file_name" => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
    //             "file_path" => Storage::url($filePath),
    //             "file_size" => $originalFileSize,
    //         ];
    //     }

    //     return $dataUploadTrait;
    // }
//    public function handleFile($file, $folderName)
//    {
//        $fileNameOrigin = $file->getClientOriginalName();
//        $fileNamNotExtension = pathinfo($fileNameOrigin, PATHINFO_FILENAME);
//        $fileExtension = strtolower($file->getClientOriginalExtension());
//        $fileNamNotExtension = Str::slug($fileNamNotExtension);
//        $fileNameOrigin = $fileNamNotExtension . '.' . $fileExtension;
//        $fileNameHash = $fileNameOrigin;
//
//        // Dung lượng ảnh gốc
//        $originalFileSize = $file->getSize();
//
//        // Kích thước tối đa cho phép (1 MB - 1000 KB)
//        $maxFileSizeInBytes = 1000 * 1024;
//
//        // Kiểm tra định dạng ảnh để quyết định cách xử lý
//        $allowedImageFormats = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'];
//
//        if (!in_array($fileExtension, $allowedImageFormats)) {
//            // Định dạng không hỗ trợ, xử lý lỗi ở đây (hoặc bỏ qua xử lý)
//            return null;
//        }
//
//        // Xử lý ảnh SVG
//        if ($fileExtension === 'svg') {
//            // Lưu trực tiếp tập tin SVG
//            $filePath = $file->storeAs("public/" . $folderName . "/" . auth()->id(), $fileNameHash);
//        } else {
//            // Xử lý các định dạng ảnh khác
//
//            // Kiểm tra dung lượng sau khi thay đổi kích thước
//            if ($originalFileSize > $maxFileSizeInBytes) {
//                // Dung lượng vượt quá giới hạn cho phép
//
//                // Kích thước mới sau khi thay đổi (nếu cần)
//                $newWidth = 800;
//                $newHeight = null;
//
//                // Dung lượng tối đa sau khi nén (đơn vị: byte)
//                $maxFileSize = 100 * 1024;
//
//                // Xử lý ảnh
//                $image = Image::make($file);
//
//                // Thay đổi kích thước ảnh (nếu cần)
//                $image->resize($newWidth, $newHeight, function ($constraint) {
//                    $constraint->aspectRatio();
//                    $constraint->upsize();
//                });
//
//                // Lưu ảnh đã xử lý
//                $filePath = $file->storeAs("public/" . $folderName . "/" . auth()->id(), $fileNameHash);
//                // Đường dẫn tới ảnh đã xử lý
//                $processedFilePath = storage_path('app/' . $filePath);
//
//                // Kiểm tra dung lượng sau khi thay đổi kích thước và nén
//                if ($originalFileSize > $maxFileSize) {
//                    // Dung lượng vượt quá giới hạn cho phép
//
//                    // Tính tỷ lệ giảm chất lượng ảnh
//                    $quality = ceil(($maxFileSize / $originalFileSize) * 100);
//
//                    // Nén ảnh với chất lượng thấp hơn
//                    $image->encode($fileExtension, $quality);
//
//                    // Lưu ảnh đã nén
//                    $image->save($processedFilePath);
//
//                    // Cập nhật dung lượng sau khi nén
//                    $resizedFileSize = filesize($processedFilePath);
//                }
//            } else {
//                // Dung lượng nằm trong giới hạn cho phép, không cần nén
//
//                // Xử lý ảnh (nếu muốn)
//
//                // Lưu ảnh đã xử lý
//                $filePath = $file->storeAs("public/" . $folderName . "/" . auth()->id(), $file->getClientOriginalName());
//
//                // Đường dẫn tới ảnh đã xử lý
//                $processedFilePath = storage_path('app/' . $filePath);
//            }
//        }
//
//        $dataUploadTrait = [
//            "file_name" => $fileNamNotExtension,
//            "file_path" => Storage::url($filePath),
//            "file_size" => $originalFileSize,
//        ];
//
//        return $dataUploadTrait;
//    }

    public function handleFile($file, $folderName)
    {
        $fileNameOrigin = $file->getClientOriginalName();
        $fileNamNotExtension = pathinfo($fileNameOrigin, PATHINFO_FILENAME);
        $fileExtension = $file->getClientOriginalExtension();

        // Tạo hình ảnh từ tệp đã tải lên
        $image = Image::make($file);

        $width = $image->width();
        $height = $image->height();

        $image = $image->resize($width*100/100, $height*100/100);

        // Tạo tên tệp mới với phần mở rộng là .webp
//        $fileNameHash = $fileNamNotExtension . '.webp';

        $fileNameHash = $fileNamNotExtension . '_' . time() . '.webp';

        // Lưu hình ảnh với mức chất lượng hiện tại
        // $image->save(storage_path("app/public/{$folderName}/{$fileNameHash}"));
        $image->save(storage_path("app/public/photos/{$fileNameHash}"));

        // Lấy dung lượng của ảnh sau khi đã giảm dung lượng
        // $newFileSize = ceil(Storage::size("public/{$folderName}/{$fileNameHash}"));
        $newFileSize = ceil(Storage::size("public/photos/{$fileNameHash}"));

        // Lấy dung lượng của ảnh trước khi giảm dung lượng
        $originalFileSize = ceil($file->getSize());

        $dataUploadTrait = [
            "file_name" => $fileNamNotExtension,
            "file_path" => Storage::url("public/photos/{$fileNameHash}"),
            // "file_path" => Storage::url("public/{$folderName}/{$fileNameHash}"),
            "original_file_size" => $originalFileSize,
            "new_file_size" => $newFileSize,
            // "quality" => $quality, // Chất lượng cuối cùng của ảnh
        ];

        return $dataUploadTrait;
    }

}
