<?php

namespace Tomatophp\TomatoKetchup\Resource;

interface ResourceInterface
{
    public function fields();
    public function table();
    public function form();
    public function pages();
    public function actions();
    public function filters();
    public function relations();
}
