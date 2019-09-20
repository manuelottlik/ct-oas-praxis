<?php
/**
 * Task
 */
namespace app\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Task
 */
class Task extends Model
{

    /** @var int $id */
    private $id;

    /** @var string $text */
    private $text;

    /** @var bool $done */
    private $done;

    protected $fillable = ['text', 'done'];

}
