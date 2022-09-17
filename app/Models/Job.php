<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'message',
        'company_id',
        'occupation_id',
        'employment_type_id',
        'img',
        'prefecture_id',
        'city_id',
        'access',
        'payment',
        'content',
        'status',
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function features() {
        return $this->belongsToMany(Feature::class);
    }

    public function occupation() {
        return $this->belongsTo(Occupation::class);
    }

    public function prefecture() {
        return $this->belongsTo(Prefecture::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function employment_type() {
        return $this->belongsTo(Employment_type::class);
    }

    public function entries() {
        return $this->hasMany(Entry::class);
    }

    //公開している求人
    public function scopeOpen($query) {
        return $query->where('status', 1);
    }

    //選択された職種を返す
    public function scopeSelectOccupation($query, $occupationId) {
        if($occupationId !== '0') {
            return $query->where('occupation_id', $occupationId);
        } else {
            return;
        }
    }

    //選択された都道府県の求人を返す
    public function scopeSelectPrefecture($query, $prefectureId) {
        if($prefectureId !== '0') {
            return $query->where('prefecture_id', $prefectureId);
        } else {
            return;
        }
    }

    //選択された雇用形態の求人を返す
    public function scopeSelectEmploymentType($query, $employmentTypeId) {
        if($employmentTypeId !== '0') {
            return $query->where('employment_type_id', $employmentTypeId);
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
                ->orWhere('message', 'like', '%' . $keyword . '%')
                ->orWhere('access', 'like', '%' . $keyword . '%')
                ->orWhere('payment', 'like', '%' . $keyword . '%')
                ->orWhere('content', 'like', '%' . $keyword . '%');
            }

            return $query;

        } else {
            return;
        }
    }
}
