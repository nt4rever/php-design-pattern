<?php

require 'Shape.php';
require 'Circle.php';
require 'Rectangle.php';

class ShapeFactory
{
    public function getShape(string $type): ?Shape
    {
        return match ($type) {
            'circle' => new Circle,
            'rectangle' => new Rectangle,
            default => null,
        };
    }
}

// Test
$factory = new ShapeFactory;
$circle = $factory->getShape('circle');
$circle->draw();
$rectangle = $factory->getShape('rectangle');
$rectangle->draw();
