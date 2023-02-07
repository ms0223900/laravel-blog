<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    // use SoftDeletes;

    // 這很重要，一定要填！
    // 對應的資料表(table)名稱
    protected $table = 'posts';

    // /**
    //  * The primary key associated with the table.
    //  *
    //  * @var string
    //  */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $hidden = [
        'deleted_at'
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // 在創建一筆新資料時，需要填寫的欄位
    protected $fillable = [
        'title', 
        'subTitle',
        'content'
    ];

    // 對應外鍵關聯(將post自己的id，對應到comment表格的post_id)
    public function comment_list() {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    // public function getCommentListAttribute() {
    //     return $this->body;
    // }
}
