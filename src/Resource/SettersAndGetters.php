<?php

namespace TomatoPHP\TomatoKetchup\Resource;

use Illuminate\Support\Str;

/**
 *
 */
trait SettersAndGetters
{

    public function __construct()
    {
        $this->title ?: $this->title = $this->getTitle();
        $this->single ?: $this->single = $this->getSingle();
        $this->group ?: $this->group = $this->getTitle();
        $this->slug ?: $this->slug = $this->getSlug();
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title ?: Str::of(app($this->model)->getTable())->replace('_', ' ')->title()->toString();
    }

    /**
     * @return string
     */
    public function getSingle(): string
    {
        return $this->single ?: Str::of(app($this->model)->getTable())->replace('_', ' ')->title()->singular()->toString();
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getGroup(): ?string
    {
        return $this->group;
    }

    /**
     * @param string|null $group
     */
    public function setGroup(?string $group): void
    {
        $this->group = $group;
    }

    /**
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @param string|null $icon
     */
    public function setIcon(?string $icon): void
    {
        $this->icon = $icon;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug ?: $this->slug = $this->generateTitle()->replace('_', '-')->lower();
    }

    /**
     * @param string|null $slug
     */
    public function setSlug(?string $slug): void
    {
        $this->slug = $slug;
    }

}
