<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public static $subCategory, $directory, $image, $imageName, $imageUrl;
    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'upload/sub-category-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newSubCategory($request)
    {
        self::$imageUrl     = self::getImageUrl($request);
        self::$subCategory  = new SubCategory();
        self::saveBasicInfo(self::$subCategory, $request, self::$imageUrl);
    }

    public static function updateSubCategory($request, $id)
    {

        self::$subCategory = SubCategory::find($id);

        if ($request->file('image'))
        {
            if(file_exists(self::$subCategory->image))
            {
                unlink(self::$subCategory->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$subCategory->image;
        }
        self::saveBasicInfo(self::$subCategory, $request, self::$imageUrl);
    }

    public static function deleteSubCategory($id)
    {
        self::$subCategory = SubCategory::find($id);
        if (file_exists(self::$subCategory->image))
        {
            unlink(self::$subCategory->image);
        }
        self::$subCategory->delete();
    }

    public static function saveBasicInfo($subCategory, $request, $imageUrl)
    {
        $subCategory->category_id = $request->category_id;
        $subCategory->name        = $request->name;
        $subCategory->description = $request->description;
        $subCategory->image       = $imageUrl;
        $subCategory->save();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
//        return $this->belongsTo(Category::class, 'category_id');

    }
}
