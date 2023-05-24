<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faqs';

    protected $primaryKey = 'id';

    public function getFaq()
    {
        return Faq::select()->get();
    }
}