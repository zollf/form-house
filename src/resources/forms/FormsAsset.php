<?php

namespace formhouse\formhouse\resources\forms;

use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

class FormsAsset extends AssetBundle 
{
  public function init()
  {
    $this->sourcePath = "@formhouse/formhouse/resources/forms/dist";

    $this->depends = [
      CpAsset::class,
    ];

    $this->js = [
      'main.bundle.js'
    ];

    parent::init();
  }
}