<?php namespace thiagoalessio\TesseractOCR;

class TesseractOCR
{
    private $image;
    private $executable = '"tesseract"';
    private $options = [];

    public function __construct($image)
    {
        $this->image = '"'.addcslashes($image, '\\"').'"';
        return $this;
    }

    public function run()
    {
        exec($this->buildCommand(), $output);
        return trim(join(PHP_EOL, $output));
    }

    public function buildCommand()
    {
        $command = "{$this->executable} {$this->image} stdout";
        foreach ($this->options as $option) {
            $command .= "$option";
        }
        if ($this->isVersion303()) {
            $command .= ' quiet';
        }
        return $command;
    }

    public function getTesseractVersion()
    {
        exec("{$this->executable} --version 2>&1", $output);
        return explode(' ', $output[0])[1];
    }

    public function executable($executable)
    {
        $this->executable = '"'.addcslashes($executable, '\\"').'"';
        return $this;
    }

    public function __call($method, $args)
    {
        if ($this->isShortcut($method)) {
            $class = $this->getShortcutClassName($method);
            $this->options[] = $class::buildOption($args);
            return $this;
        }
        if ($this->isOption($method)) {
            $class = $this->getOptionClassName($method);
            $this->options[] = new $class($args);
            return $this;
        }
        $var = $this->getConfigVarName($method);
        $value = $args[0];
        $this->options[] = new Option\Config($var, $value);
        return $this;
    }

    private function isShortcut($name)
    {
        return class_exists($this->getShortcutClassName($name));
    }

    private function getShortcutClassName($name)
    {
        return __NAMESPACE__.'\\Shortcut\\'.ucfirst($name);
    }

    private function isOption($name)
    {
        return class_exists($this->getOptionClassName($name));
    }

    private function getOptionClassName($name)
    {
        return __NAMESPACE__.'\\Option\\'.ucfirst($name);
    }

    private function getConfigVarName($name)
    {
        return strtolower(preg_replace('/([A-Z])+/', '_$1', $name));
    }

    private function isVersion303()
    {
        $version = $this->getTesseractVersion();
        return version_compare($version, '3.03', '>=')
            && version_compare($version, '3.04', '<');
    }
}
