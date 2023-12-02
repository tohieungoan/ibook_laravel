<?php

namespace App\Models;
use Illuminate\Support\Arr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    use HasFactory;
    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;  
    const hot_on =1;
    const hot_off =0;
    protected $hot = [
        1 =>[
            'name' => 'Nổi bật',
            'class' =>'label-success'
        ],
        0 =>[
            'name' => 'Không',
            'class' =>'label-default'
        ]
        ];
    protected $status = [
        1 =>[
            'name' => 'Public',
            'class' =>'label-danger'
        ],
        0 =>[
            'name' => 'Private',
            'class' =>'label-default'
        ]
        ];
        public function getStatus(){
            return Arr::get($this->status,$this->pro_active,'[N\A]');
        }
        public function getHot(){
            return Arr::get($this->hot,$this->pro_hot,'[N\A]');
        }
        public function category(){
            return $this->belongsTo(Category::class,'pro_category_id');
        }
}
