<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends  Model
{
	// 定义关联表名, 默认是该模型类的复数,即该类中默认的表名为:students
    protected $table = 'student';

    // 定义关联表的主键, 默认是id,
   	protected $primaryKey = 'id';

   	// 是否使用 laravel 自动管理的数据列(字段) created_at 和 updated_at 的格式化时间;
    public $timestamps = true;

    // 如果你需要自定义用于存储时间戳的字段名称，可以在模型中设置 CREATED_AT 和 UPDATED_AT 常量：
    const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';

    // 性别
    const SEX_BOY  = '男'; //男
    const SEX_GIRL = '女'; //女

    // 批量赋值白名单
    protected $fillable = ['name', 'age', 'sex'];

    // 批量赋值黑名单
    // protected $guarded = ['guarded_field'];

    // 不使用 laravel 自动管理的数据列的时间格式设置, 自定义存储数据库的时间格式

    protected function getDateFormat()
    {
    	// 注意数据库中的数据类型;
    	// return date('Y-m-d');
    	// return date('Y-m-d H:i:s');
    	return time();
    }

    // 不使用 laravel 自动转化的时间格式, 保留输出的时间类型
    protected function asDateTime($val)
    {
    	return $val;
    }

    // 性别
    public function getSex($bool = null)
    {
        $sexArray = [
            0 => self::SEX_BOY,
            1 => self::SEX_GIRL,
        ];

        if($bool !== null){
            return ($bool)? self::SEX_BOY : self::SEX_GIRL;
        }

        return $sexArray;
    }

}