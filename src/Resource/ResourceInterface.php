<?php

namespace Tomatophp\TomatoKetchup\Resource;

/**
 *
 */
interface ResourceInterface
{
    /**
     * @return array
     */
    public function fields(): array;

    /**
     * @return array
     */
    public function pages(): array;

    /**
     * @return array
     */
    public function actions(): array;

    /**
     * @return array
     */
    public function widgets(): array;

    /**
     * @return array
     */
    public function filters(): array;

    /**
     * @return array
     */
    public function relations(): array;
}
