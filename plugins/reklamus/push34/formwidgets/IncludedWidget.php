<?php namespace Reklamus\Push34\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Reklamus\Push34\Models\Included;

/**
 * IncludedWidget Form Widget
 */
class IncludedWidget extends FormWidgetBase
{
    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'reklamus_push34_included_widget';

    /**
     * @inheritDoc
     */
    public function init()
    {
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('includedwidget');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName() . '[]';

        $this->vars['model'] = $this->model;
        $this->vars['subscribers'] = Included::all()->lists('name', 'id');
        if (!empty($this->getLoadValue())) {
            $this->vars['value'] = $this->getLoadValue();
        } else {
            $this->vars['value'] = [];
        }

    }

    /**
     * @inheritDoc
     */
    public function loadAssets()
    {
        $this->addCss('css/includedwidget.css', 'Reklamus.push34');
        $this->addJs('js/includedwidget.js', 'Reklamus.push34');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        return $value;
    }
}
