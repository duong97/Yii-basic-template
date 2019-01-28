<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

use yii\i18n\I18N;

class NewI18N extends I18N
{
    public function translate($category, $message, $params, $language)
    {
        return parent::translate($category, strtolower($message), $params, $language);
    }
}