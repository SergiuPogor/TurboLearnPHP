<?php

// Lazy loading example in PHP

class HeavyResource
{
    public function __construct()
    {
        // Simulate heavy resource initialization
        sleep(3);
    }

    public function getResourceData(): string
    {
        return "Data from heavy resource";
    }
}

class LazyLoader
{
    private $resource;

    public function getResource(): HeavyResource
    {
        if ($this->resource === null) {
            $this->resource = new HeavyResource();
        }
        return $this->resource;
    }
}

// Usage
$loader = new LazyLoader();

// Resource is not initialized until getResource() is called
$resource = $loader->getResource();
echo $resource->getResourceData();