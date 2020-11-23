<?php


namespace SmallRuralDog\AdminDog\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class AdminDogUser extends Authenticatable
{


    protected $table = 'admin_dog_users';
    protected $guarded = [];
    protected $hidden = ['password', 'remember_token'];


    /**
     * Get avatar attribute.
     *
     * @param string $avatar
     *
     * @return string
     */
    public function getAvatarAttribute($avatar)
    {
        if (url()->isValidUrl($avatar)) {
            return $avatar;
        }

        $disk = config('admin.upload.disk');

        if ($avatar && array_key_exists($disk, config('filesystems.disks'))) {
            return Storage::disk(config('admin.upload.disk'))->url($avatar);
        }

        return config('admin.default_avatar');
    }

}
