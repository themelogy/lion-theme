<?php namespace Themes\Lion\Presenter;

use Nwidart\Menus\Presenters\Presenter;

class IconMenuPresenter extends Presenter
{
    /**
     * {@inheritdoc }.
     */
    public function getOpenTagWrapper()
    {
        return PHP_EOL.'<ul class="footer-box">'.PHP_EOL;
    }

    /**
     * {@inheritdoc }.
     */
    public function getCloseTagWrapper()
    {
        return PHP_EOL.'</ul>'.PHP_EOL;
    }

    public function getCloseMegaTagWrapper()
    {
        return PHP_EOL.'</div>
                    </div>'.PHP_EOL;
    }

    public function getOpenMegaTagWrapper()
    {
        return PHP_EOL.'<div class="gfx-mega-content">
                            <div class="row">'.PHP_EOL;
    }

    public function getOpenMegaColumnTagWrapper()
    {
        return PHP_EOL.'<div class="col-lg-3 col-sm-3">
                            <ul class="mega-menu-list">'.PHP_EOL;
    }

    public function getCloseMegaColumnTagWrapper()
    {
        return PHP_EOL.'     </ul>
                         </div>'.PHP_EOL;
    }

    /**
     * {@inheritdoc }.
     */
    public function getMenuWithoutDropdownWrapper($item)
    {
        return '<li'.$this->getActiveState($item).' class="'.$item->attributes['class'].'"><a href="'.$item->getUrl().'" '.$item->getAttributes().'>'.$item->getIcon().' <span>'.$item->title.'</span></a></li>'.PHP_EOL;
    }

    /**
     * {@inheritdoc }.
     */
    public function getActiveState($item, $state = ' class=""')
    {
        return '';
    }

    /**
     * Get active state on child items.
     *
     * @param $item
     * @param string $state
     *
     * @return null|string
     */
    public function getActiveStateOnChild($item, $state = 'active')
    {
        return $item->hasActiveOnChild() ? $state : null;
    }

    /**
     * {@inheritdoc }.
     */
    public function getDividerWrapper()
    {
        return '';
    }

    /**
     * {@inheritdoc }.
     */
    public function getHeaderWrapper($item)
    {
        return '<li class="dropdown-menu">'.$item->title.'</li>';
    }

    /**
     * {@inheritdoc }.
     */
    public function getMenuWithDropDownWrapper($item)
    {
        return '<li class="c-menu-type-classic '.$this->getActiveStateOnChild($item, ' c-active').'">
		          <a href="'.$item->getUrl().'" class="c-link dropdown-toggle">
					'.$item->getIcon().' '.$item->title.'
					<span class="c-arrow c-toggler"></span>
			      </a>
			      <ul class="dropdown-menu c-menu-type-classic c-pull-left">
			      	'.$this->getChildMenuItems($item).'
			      </ul>
		      	</li>'
        .PHP_EOL;
    }

    /**
     * @param $item
     * @return string
     */
    public function getMegaMenuWithDropDownWrapper($item)
    {
        return '<li class="c-menu-type-classic '.$this->getActiveStateOnChild($item, ' c-active').'">
		          <a href="#" class="c-link dropdown-toggle">
					'.$item->getIcon().' '.$item->title.'
			      </a>
			      <ul class="dropdown-menu c-menu-type-classic c-pull-left">
			        '.$this->getMegaMenuItems($item).'
			      </ul>
		      	</li>'
        .PHP_EOL;
    }

    /**
     * @param \Nwidart\Menus\MenuItem $item
     * @return string
     */
    public function getMultiLevelDropdownWrapper($item)
    {
        return '<li class="dropdown-submenu '.$this->getActiveStateOnChild($item, ' c-active').'">
		          <a href="'.$item->getUrl().'">
					'.$item->getIcon().' '.$item->title.'
					<span class="c-arrow c-toggler"></span>
			      </a>
			      <ul class="dropdown-menu c-pull-right">
			      	'.$this->getChildMenuItems($item).'
			      </ul>
		      	</li>'
        .PHP_EOL;
    }
}
