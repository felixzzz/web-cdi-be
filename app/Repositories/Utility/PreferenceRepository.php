<?php

namespace App\Repositories\Utility;

use App\Enums\PreferenceKey;
use App\Helpers\Helper;
use App\Helpers\Optimize;
use App\Models\Utility\Preference;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Crypt;

class PreferenceRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAllContentPage($type, $paramKeys = [])
    {
        $keys = [];
        if ($type == 'home') {
            $keys = PreferenceKey::getAllHomeKey();
        }

        if ($type == 'about-us-who-we-are') {
            $keys = PreferenceKey::getAllAboutUsKey('who-we-are');
        }

        if ($type == 'about-us-management') {
            $keys = PreferenceKey::getAllAboutUsKey('management');
        }

        if ($type == 'about-us-award') {
            $keys = PreferenceKey::getAllAboutUsKey('award');
        }

        if ($type == 'investor') {
            $keys = PreferenceKey::getAllInvestorKey();
        }

        if ($type == 'governance') {
            $keys = PreferenceKey::getAllGovernanceKey();
        }

        if ($type == '') {
            $keys = $paramKeys;
        }

        $cacheKey = Helper::getPreferenceCacheKey($keys);

        return Optimize::cache($cacheKey, function () use ($keys, $type) {
            $data = [];

            foreach ($keys as $key => $value) {
                $preference = Preference::query()->where("key", $value)->first();
                if ($preference) {
                    $preference->file_url = previewFile($preference->file);
                    $preference->title = $preference->title;
                    $preference->content = $preference->content;
                    $preference->content_table_trans = $preference->content_table_trans;
                    if ($type == 'home') {
                        $preference->video_url = asset(getPageManagementVideo($preference->file));
                    }
                }

                $data[$value] = $preference;
            }

            return (object)$data;

        }, config('cache.content_lifetime'));
    }

    public function find($value)
    {
        $preference = Preference::query()->where("key", $value)->first();
        if ($preference) {
            $preference->file_url = previewFile($preference->file);
            $preference->title = $preference->title;
            $preference->content = $preference->content;
            $preference->content_table_trans = $preference->content_table_trans;
        }

        return $preference;
    }

    public function findMediaStatus()
    {
        $blog = $this->find(PreferenceKey::media_blog_status->value);

        return (object) [
            'blog' => $blog && $blog->content_en == 'show' ? 'show' : 'hide',
            'news' => 'show',
            'press_release' => 'show',
        ];
    }
}
