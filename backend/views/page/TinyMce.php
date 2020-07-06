<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 02/08/2018
 * Time: 11:44 AM
 */
class TinyMce
{
    public function actions()
    {
        return [
            'tinyMceCompressor' => [
                'class' => TinyMceCompressorAction::className(),
            ],
        ];
    }
}