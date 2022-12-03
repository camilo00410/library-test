<?php

namespace App\ViewModels;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;
use ReflectionMethod;

abstract class ViewModel implements Arrayable
{
    public function toArray(): array
    {
        return collect((new \ReflectionClass($this))->getMethods())
            ->reject(function(ReflectionMethod $method) {
                return in_array($method->getName(), ['__construct', 'toArray']);
            })
            ->filter(function(ReflectionMethod $method) {
                return in_array('public', \Reflection::getModifierNames($method->getModifiers()));
            })
            ->mapWithKeys(function(ReflectionMethod $method){ 
                return [Str::snake($method->getName()) => $this->{$method->getName()}() ];
            })
            ->toArray();
    }
}
