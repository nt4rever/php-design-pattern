<?php

namespace Creational\AbstractFactory;

interface Button
{
    public function paint();
}

class WinButton implements Button
{
    public function paint()
    {
        echo "Windows Button";
    }
}

class MacButton implements Button
{
    public function paint()
    {
        echo "MacOS Button";
    }
}

interface Checkbox
{
    public function paint();
}

class WinCheckbox implements Checkbox
{
    public function paint()
    {
        echo "Windows checkbox.";
    }
}

class MacCheckbox implements Checkbox
{
    public function paint()
    {
        echo "MacOS checkbox.";
    }
}

interface GUIFactory
{
    public function createButton(): Button;

    public function createCheckbox(): Checkbox;
}

class WinFactory implements GUIFactory
{
    public function createButton(): Button
    {
        return new WinButton;
    }

    public function createCheckbox(): Checkbox
    {
        return new WinCheckbox;
    }
}

class MacFactory implements GUIFactory
{
    public function createButton(): Button
    {
        return new MacButton;
    }

    public function createCheckbox(): Checkbox
    {
        return new MacCheckbox;
    }
}

class Application
{
    private Button $button;
    private Checkbox $checkbox;

    public function __construct(private GUIFactory $factory)
    {
        $this->factory = $factory;
    }

    public function createUI()
    {
        $this->button = $this->factory->createButton();
        $this->checkbox = $this->factory->createCheckbox();

        return $this;
    }

    public function paint()
    {
        $this->button->paint();
        echo PHP_EOL;
        $this->checkbox->paint();
    }
}

$app = new Application(new MacFactory);
$app->createUI()->paint();
