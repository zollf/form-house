<?php

namespace formhouse\formhouse\resources\fields;

use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

class FieldsAsset extends AssetBundle
{
    public function init()
    {
        $this->sourcePath = "@formhouse/formhouse/resources/fields/dist";

        $this->depends = [
          CpAsset::class,
        ];

        $this->js = [
          'main.bundle.js'
        ];

        parent::init();
    }
}
