<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Company extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'industory_id',
        'prefecture_id',
        'city_id',
        'address',
        'president',
        'count_of_employee',
        'img',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function industory() {
        return $this->belongsTo(Industory::class);
    }

    public function prefecture() {
        return $this->belongsTo(Prefecture::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function jobs() {
        return $this->hasMany(Job::class);
    }

    //jobsテーブルを通じてエントリーを取得
    public function entries() {
        return $this->hasManyThrough(Entry::class, Job::class);
    }

    //選択された業界に属する会社を返す
    public function scopeSelectIndustory($query, $industoryId) {
        if($industoryId !== '0') {
            return $query->where('industory_id', $industoryId);
        } else {
            return;
        }
    }

    //選択された都道府県にある会社を返す
    public function scopeSelectPrefecture($query, $prefectureId) {
        if($prefectureId !== '0') {
            return $query->where('prefecture_id', $prefectureId);
        } else {
            return;
        }
    }

    //キーワード検索
    public function scopeSearchKeyWord($query, $keyword) {
        if(!is_null($keyword)) {

            //全角スペースを半角に変換
            $spaceConvert = mb_convert_kana($keyword, 's');

            //空白で区切る
            $keywords = preg_split('/[\s,]+/', $spaceConvert, -1, PREG_SPLIT_NO_EMPTY);

            //単語をループで回す
            foreach($keywords as $keyword) {
                $query->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('president', 'like', '%' . $keyword . '%');
            }

            return $query;

        } else {
            return;
        }
    }
}
