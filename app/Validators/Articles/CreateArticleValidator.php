<?php

namespace App\Validators\Articles;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class CreateArticleValidator.
 *
 * @package namespace App\Validators\Articles;
 */
class CreateArticleValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        'title' => 'required',
        'content' => 'required',
    ];

    protected $messages = [
        'title.*' => 'chua co tieu de'
    ];
}
