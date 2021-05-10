<?php
/**
 * Blur Theme.
 * 
 * @package Blur
 * @author shenlan
 * @version 0.1.0
 * @link https://inmind.ltd
 */

$this->need('header.php'); ?>

<div class="material-layout mdl-js-layout has-drawer is-upgraded">

    <main class="material-layout__content" id="main">

        <div class="material-index mdl-grid">

            <?php if ($this->is('index') && $this->_currentPage == 1): ?>

                <!-- Blog info -->
                <div class="mdl-card mdl-shadow--<?php $this->options->CardElevation() ?>dp something-else mdl-cell mdl-cell--6-col mdl-cell--6-col-desktop index-top-block">
                    <!-- Search -->
                    <?php if ((!empty($this->options->searchis) && $this->options->searchis == '1')): ?>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                            <label id="search-label"
                                   class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--fab mdl-color--accent mdl-shadow--4dp"
                                   for="search">
                                <i class="material-icons mdl-color-text--white" role="presentation">search</i>
                            </label>
                            <form autocomplete="off" id="search-form" method="post" action=""
                                  class="mdl-textfield__expandable-holder">
                                <input type="text" id="search" class="form-control mdl-textfield__input search-input"
                                       name="s" results="0" placeholder=""/>
                                <label id="search-form-label" class="mdl-textfield__label" for="search"></label>
                            </form>
                        </div>
                        <div id="local-search-result"></div>
                    <?php else: ?>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                            <label id="search-label"
                                   class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--fab mdl-color--accent mdl-shadow--4dp"
                                   for="search">
                                <i class="material-icons mdl-color-text--white" role="presentation">search</i>
                            </label>
                            <form autocomplete="off" id="search-form" method="post" action=""
                                  class="mdl-textfield__expandable-holder">
                                <input class="mdl-textfield__input search-input" type="text" name="s" id="search">
                                <label id="search-form-label" class="mdl-textfield__label" for="search"></label>
                            </form>
                        </div>
                    <?php endif; ?>
                    <!-- LOGO -->
                    <div class="something-else-logo mdl-color-text--grey-600">
                        <?php if (!empty($this->options->logoLink)): ?>
                        <a href="<?php $this->options->logoLink() ?>">
                            <?php else: ?>
                            <a href="#">
                                <?php endif; ?>
                                <?php if (!empty($this->options->logo)): ?>
                                    <?php if (!empty($this->options->logosize) && $this->options->logosize == "2"): ?>
                                        <img style="width: 12pc; height: 12pc; margin-top: -2pc"
                                             src="<?php $this->options->logo() ?>">
                                    <?php else: ?>
                                        <img src="<?php $this->options->logo() ?>">
                                    <?php endif; ?>
                                <?php else: ?>
                                    <img src="<?php getThemeFile('img/logo.png', true) ?>">
                                <?php endif; ?>
                            </a>
                    </div>
                    <!-- Infomation -->
                    <div class="mdl-card__supporting-text meta meta--fill mdl-color-text--grey-600">
                        <div>
                            <strong><?php $this->options->title(); ?></strong>
                        </div>
                        <div class="section-spacer"></div>
                        <!-- Pages button -->
                        <button id="show-pages-button"
                                class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                            <i class="material-icons" role="presentation">view_carousel</i>
                            <span class="visuallyhidden">Pages</span>
                        </button>
                        <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right" for="show-pages-button">
                            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                            <?php while ($pages->next()): ?>
                                <a href="<?php $pages->permalink(); ?>" class="index_share-link"
                                   title="<?php $pages->title(); ?>">
                                    <li class="mdl-menu__item mdl-js-ripple-effect">
                                        <?php $pages->title(); ?>
                                    </li>
                                </a>
                            <?php endwhile; ?>
                        </ul>

                        <!--  Menu button-->
                        <button id="menubtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                            <i class="material-icons" role="presentation">more_vert</i>
                            <span class="visuallyhidden">show menu</span>
                        </button>
                        <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right" for="menubtn">

                            <a href="<?php $this->options->feedUrl(); ?>" class="index_share-link">
                                <li class="mdl-menu__item mdl-js-ripple-effect">
                                    <?php lang("share.article_rss") ?>
                                </li>
                            </a>
                            <!-- Share Menu -->
                            <a class="index_share-link"
                               href="#">
                                <li class="mdl-menu__item">
                                    <?php lang("share.toImg") ?>
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>

                <?php if ($this->getTotal() != 0): ?>
                    <?php while ($this->next()): ?>

                        <!-- Article module -->
                        <div class="post_entry-module mdl-card mdl-shadow--<?php $this->options->CardElevation() ?>dp mdl-cell mdl-cell--6-col <?php if (!empty($this->options->switch) && in_array('ShowLoadingLine', $this->options->switch)): ?>fade out<?php endif; ?>">

                            <!-- Article link & title -->
                            <?php if ($this->options->ThumbnailOption == '1'): ?>
                                <div class="post-thumbnail-pure mdl-card__media mdl-color-text--grey-50 lazy "
                                    <?php getBackgroundLazyload(showThumbnail($this)); ?>>
                                    <p class="article-headline-p"><a href="<?php $this->permalink() ?>"
                                                                     target="_self"><?php $this->title() ?></a></p>

                                    
                                </div>
                            <?php elseif ($this->options->ThumbnailOption == '2'): ?>
                                <div class="mdl-card__media mdl-color-text--grey-50"
                                     style="background-color:<?php $this->options->TitleColor() ?> !important;color:#757575 !important;">
                                    <p class="article-headline-p-nopic">
                                        <a href="<?php $this->permalink() ?>" target="_self">
                                            "<br><?php $this->title() ?><br>"
                                        </a>
                                    </p>
                                </div>
                            <?php elseif ($this->options->ThumbnailOption == '3'): ?>
                                <div class="post_thumbnail-random mdl-card__media mdl-color-text--grey-50 lazy "
                                    <?php getBackgroundLazyload(randomThumbnail($this)); ?>>
                                    <p class="article-headline-p"><a href="<?php $this->permalink() ?>"
                                                                     target="_self"><?php $this->title() ?></a></p>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Article info-->
                            <div id="post_entry-info">
                                <div class="mdl-card__supporting-text meta mdl-color-text--gary"
                                     id="post_entry-left-info">
                                    
                                    <div>
                                        <span> RELEASE:
                                        <?php if ($this->options->langis == '0'): ?>
                                            <?php $this->date('F j, Y'); ?>
                                        <?php else: ?>
                                            <?php $this->dateWord(); ?>
                                        <?php endif; ?>
                                    </span>
                                    </div>
                                </div>
                                <div id="post_entry-right-info" style="color:<?php $this->options->alinkcolor(); ?>">
                                    <span class="post_entry-category">
                                        <?php $this->category(', '); ?><?php if ($this->options->commentis == '0' || (!getThemeOptions('SwitchToDisqusSince') == '' || !getThemeOptions('SwitchToDisqusSince') == null) && $this->cid < (int)getThemeOptions('SwitchToDisqusSince')): ?> |
                                    </span>
                                    <a href="<?php $this->permalink() ?>">
                                        <!-- Comment Count -->
                                        <?php $this->commentsNum('%d 评论'); ?>
                                    </a>
                                    <?php endif ?>
                                </div>

                            </div>

                        </div>

                    <?php endwhile; ?>

                <?php else: ?>
                    <!-- Article module -->
                    <div class="post_entry-module mdl-card mdl-shadow--<?php $this->options->CardElevation() ?>dp mdl-cell mdl-cell--12-col <?php if (!empty($this->options->switch) && in_array('ShowLoadingLine', $this->options->switch)): ?>fade out<?php endif; ?>">

                        <!-- Article link & title -->
                        <div class="post-thumbnail-pure mdl-card__media mdl-color-text--grey-50 lazy "
                            <?php getBackgroundLazyload(showThumbnail($this)); ?>>
                            <p class="article-headline-p"><a href="<?php $this->options->siteUrl() ?>"
                                                             target="_self"><?php $this->options->title() ?></a></p>
                        </div>


                        <!-- Article content -->
                        <div class="mdl-color-text--grey-600 mdl-card__supporting-text post_entry-content">
                            <span>
                                <?php if (getThemeOptions("language") === "zh-CN"): ?>未能找到相关文章<?php else: ?>Could not find related articles<?php endif; ?>
                                <a href="<?php $this->options->siteUrl(); ?>"
                                   target="_self"><?php if (getThemeOptions("language") === "zh-CN"): ?>回到主页<?php else: ?>Return to homepage<?php endif; ?></a>
                            </span>
                        </div>

                        <!-- Article info-->
                        <div id="post_entry-info">

                        </div>

                    </div>
                <?php endif; ?>
                <nav class="material-nav mdl-cell mdl-cell--12-col">
                    <?php $this->pageLink(
                        '<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon"><i class="material-icons" role="presentation">arrow_back</i></button>'); ?>
                    <span class="page-number current"><?php if ($this->_currentPage > 1) {
                            echo $this->_currentPage;
                        } else {
                            echo 1;
                        } ?> of <?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?></span>

                    <?php $this->pageLink(
                        '<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon"><i class="material-icons" role="presentation">arrow_forward</i></button>', 'next'); ?>
                </nav>

            </div>

            <?php //include('sidebar.php'); ?>
            <?php include('footer.php'); ?>
