<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class Filter extends AbstractWidget
{
    public $group;
    public $attrs;
    public $tpl;
    public $filter;

    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    public function __construct(array $config = [])
    {
        parent::__construct($config);
        $this->filter = $this->config['filter'];
        $this->tpl = $this->config['tpl'];
    }

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $this->group = $this->getGroups();
        $this->attrs = $this->getAttrs();

        return view($this->tpl, [
            'config' => $this->config,
            'groups' => $this->group,
            'attrs' => $this->attrs,
            'filter' => $this->filter,
        ]);
    }


    private function getAttrs()
    {
        $data = \DB::table('attribute_values')->get();
        $attr = [];
        foreach ($data as $key => $value) {
            $attrs[$value->attr_group_id][$value->id] = $value->value;
        }
        return $attrs;
    }

    private function getGroups()
    {
        $data = \DB::table('attribute_groups')->get();
        $groups = [];
        foreach ($data as $key => $value) {
            $groups[$value->id] = $value->title;
        }
        return $groups;
    }

    public function getFilter()
    {
        $filter = null;
    }
}
