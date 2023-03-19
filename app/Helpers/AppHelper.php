<?php
declare(strict_types=1);

namespace App\Helpers;

use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AppHelper {

    public static function defaultTableInput(array $input, array $columns): array
    {
        $length = $input['length'] ?? "-1";
        $start = $input['start'] ?? 0;
        $order = $input['order'][0]['column'] ?? 0;
        $dir = $input['order'][0]['dir'] ?? 'desc';
        $search = $input['search'] ? $input['search']['value'] : '';

        return [
            'length' => $length,
            'start'  => $start,
            'order'  => $columns[$order],
            'dir'    => $dir,
            'search' => $search,
        ];
    }


    public static function renameMediaFileUpload($file): string
    {
        $mediaName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        return Str::of($mediaName)->slug('_') . '_' .uniqid(date('Ymd')). '.' . $file->extension();
    }


    public static function uniqueSlugify($value, $model, $current_id, $dependent_column, $dependent_array = []): array|string|null
    {
        $slug = Str::of($value)->slug('-')->__toString();
        $query = self::prepareQueryForUniqueSlugCheck($model, $slug, $current_id);
        while ($query->exists())
        {
            $slug = self::incrementSlug($slug, $slug, $model, $dependent_column, $dependent_array);
            $query = self::prepareQueryForUniqueSlugCheck($model, $slug, $current_id);
        }

        return $slug;
    }

    public static function incrementSlug($title, $slug, $model, $dependent_column, $dependent_array): array|string|null
    {
        // get the slug of the latest created post
        $query = $model::where($dependent_column, $title);

        foreach ($dependent_array as $k => $v)
        {
            $query->where($k, $v);
        }
        $max = $query->latest('id')->value('slug');
        if (isset($max[- 1]) && is_numeric($max[- 1]))
        {
            $new_slug = preg_replace_callback('/(\d+)$/', function ($matches) {
                return $matches[1] + 1;
            }, $max);
        } else
        {
            //will send two only if last digit of last slug is not number
            $new_slug = "{$slug}-2";
        }

        return $new_slug;
    }

    public static function prepareQueryForUniqueSlugCheck($model, $slug, $current_id)
    {
        $query = $model::where('slug', $slug);
        if (! empty($current_id))
        {
            $query->where('id', '!=', $current_id);
        }

        return $query;
    }

    public static function prepareFileStoragePath(): string
    {
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;
        return "{$currentYear}/{$currentMonth}";
    }

    public static function formatDate(\DateTime|string $date, string $format="Y-m-d"): string
    {
            return Carbon::parse($date)->format($format);
    }

}
