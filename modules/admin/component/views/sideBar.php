<?php
use app\modules\admin\assets\AppAsset;
use yii\helpers\Url;
use app\modules\admin\component\WidgetBase;
$bundle=AppAsset::register($this)

?>

<div class="sidebar-shortcuts" id="sidebar-shortcuts">
    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
        <button class="btn btn-success">
            <i class="ace-icon fa fa-signal"></i>
        </button>

        <button class="btn btn-info">
            <i class="ace-icon fa fa-pencil"></i>
        </button>

        <button class="btn btn-warning">
            <i class="ace-icon fa fa-users"></i>
        </button>

        <button class="btn btn-danger">
            <i class="ace-icon fa fa-cogs"></i>
        </button>
    </div>

    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
        <span class="btn btn-success"></span>

        <span class="btn btn-info"></span>

        <span class="btn btn-warning"></span>

        <span class="btn btn-danger"></span>
    </div>
</div>
<ul class="nav nav-list" style="top: 0px;">
    <li class="<?=WidgetBase::isActive('default')?>">
        <a href="<?=Url::toRoute(['default/index'])?>">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> Dashboard </span>
        </a>

        <b class="arrow"></b>
    </li>

    <li class="<?=WidgetBase::isActive('user')?>">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-desktop"></i>
            <span class="menu-text">
								User
							</span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <li class="<?=WidgetBase::isActive('user','index')?>">
                <a href="<?=Url::toRoute(['user/index'])?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    List user
                </a>

                <b class="arrow"></b>
            </li>

            <li class="<?=WidgetBase::isActive('user','create')?>">
                <a href="<?=Url::toRoute(['user/create'])?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Create user
                </a>

                <b class="arrow"></b>
            </li>
        </ul>


    </li>

    <li class="<?=WidgetBase::isActive('category')?>">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-list"></i>
            <span class="menu-text"> Category </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <li class="<?=WidgetBase::isActive('category','index')?>">
                <a href="<?=Url::toRoute(['category/index'])?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    List category
                </a>

                <b class="arrow"></b>
            </li>

            <li class="<?=WidgetBase::isActive('category','create')?>">
                <a href="<?=Url::toRoute(['category/create'])?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                  Create category
                </a>

                <b class="arrow"></b>
            </li>
        </ul>
    </li>

    <li class="<?=WidgetBase::isActive('post')?>">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-pencil-square-o"></i>
            <span class="menu-text"> Post </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <li class="<?=WidgetBase::isActive('post','index')?>">
                <a href="<?=Url::toRoute(['post/index'])?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    ListPost
                </a>

                <b class="arrow"></b>
            </li>

            <li class="<?=WidgetBase::isActive('post','create')?>">
                <a href="<?=Url::toRoute(['post/create'])?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                  create Post
                </a>

                <b class="arrow"></b>
            </li>

        </ul>
    </li>

    <li class="<?=WidgetBase::isActive('video')?>">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon glyphicon glyphicon-film"></i>
            <span class="menu-text"> Video </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <li class="<?=WidgetBase::isActive('video','index')?>">
                <a href="<?=Url::toRoute(['video/index'])?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    List video
                </a>

                <b class="arrow"></b>
            </li>

            <li class="<?=WidgetBase::isActive('video','create')?>">
                <a href="<?=Url::toRoute(['video/create'])?>">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Create video
                </a>

                <b class="arrow"></b>
            </li>

        </ul>
    </li>
    <li class="<?=WidgetBase::isActive('calendar')?>">
        <a href="<?=Url::toRoute(['calendar/index'])?>">
            <i class="menu-icon fa fa-calendar"></i>

            <span class="menu-text">
								Calendar

								<span class="badge badge-transparent tooltip-error" title="" data-original-title="2 Important Events">
									<i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
								</span>
							</span>
        </a>

        <b class="arrow"></b>
    </li>

</ul>
<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
    <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>