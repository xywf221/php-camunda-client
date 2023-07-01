<?php

namespace Camunda;

interface RequestPropertiesInterface
{
    /**
     * @return array
     */
    public function properties(): array;
}