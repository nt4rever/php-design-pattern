<?php

require 'Singleton.php';

/**
 * Applying the Singleton pattern to the configuration storage is also a common
 * practice. Often you need to access application configurations from a lot of
 * different places of the program. Singleton gives you that comfort.
 */
class Config extends Singleton
{
    /**
     * @var array<string, mixed>
     */
    private $hashmap = [];

    public function getValue(string $key, $default = null): mixed
    {
        return $this->hashmap[$key] ?? $default;
    }

    public function setValue(string $key, $value): void
    {
        $this->hashmap[$key] = $value;
    }
}

// Test
$config = Config::getInstance();
$config->setValue('env', 'development');
var_dump($config->getValue('env'));
var_dump($config->getValue('locale', 'en'));
