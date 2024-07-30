<?php

namespace Creational\FactoryMethod;

interface Button
{
    public function render();

    public function onClick();
}

abstract class Dialog
{
    abstract public function createButton(): Button;

    public function render()
    {
        $okButton = $this->createButton();
        $okButton->render();
    }
}

class WindowsButton implements Button
{
    public function render()
    {
        echo "Windows Button";
    }

    public function onClick()
    {

    }
}

class HTMLButton implements Button
{
    public function render()
    {
        echo "HTML Button";
    }

    public function onClick()
    {

    }
}

class WindowsDialog extends Dialog
{
    public function createButton(): Button
    {
        return new WindowsButton;
    }
}

class HTMLDialog extends Dialog
{
    public function createButton(): Button
    {
        return new HTMLButton;
    }
}

class DialogFactory
{
    /**
     * Factory create method
     *
     * @param string $type
     * @return \Creational\FactoryMethod\Dialog
     * @throws \InvalidArgumentException
     */
    public function create(string $type): Dialog
    {
        return match ($type) {
            'windows' => new WindowsDialog,
            'html' => new HTMLDialog,
            default => throw new \InvalidArgumentException('Dialog type not found.')
        };
    }
}

$dialog = (new DialogFactory())->create('html');
$dialog->render();
