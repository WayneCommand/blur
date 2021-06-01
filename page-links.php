<?php
/**
 * 友情链接页面
 *
 * @package custom
 */
$this->need('header.php'); ?>

<style>
    .md-links {
        min-height: calc(100% - 120px - 5pc - 6em);
        text-align: center;
        overflow: auto;
        padding-bottom: 2em;
        margin: 0 auto;
        max-width: 320px;
    }

    @media screen and (min-width: 680px) {
        .md-links {
            max-width: 640px;
        }
    }

    @media screen and (min-width: 1000px) {
        .md-links {
            max-width: 960px;
        }
    }

    @media screen and (min-width: 1320px) {
        .md-links {
            max-width: 1280px;
        }
    }

    @media screen and (min-width: 1640px) {
        .md-links {
            max-width: 1600px;
        }
    }

    @media screen and (max-width: 480px) {
        .md-links {
            min-height: calc(100% - 200px - 5pc - 6em);
            margin-top: 6em;
        }
    }

    .md-links-item {
        background: #fff;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, .14), 0 3px 1px -2px rgba(0, 0, 0, .2), 0 1px 5px 0 rgba(0, 0, 0, .12);
        height: 120px;
        width: 120px;
        line-height: 15px;
        margin: 20px 10px;
        padding: 0px 0px;
        transition: box-shadow 0.25s;
        float: left;
        border-radius: 90px;
    }

    .md-links a {
        color: #333;
        text-decoration: none;
    }

    .md-links-item img {
        float: left;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, .14), 0 3px 11px -2px rgba(0, 0, 0, .2), 0 1px 5px 0 rgba(0, 0, 0, .12);
        border-radius: 90px;
        width: 120px
    }

    .md-links-item:hover {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    .md-links-item a:hover{
        cursor: pointer;
    }

    .md-links-title {
        font-size: 20px;
        line-height: 35px;
        width: 100%;
        text-shadow: 3px 3px 10px rgba(0, 0, 0, 0.4);
        padding-top: 80%;
    }

    #scheme-Paradox .mdl-mini-footer{
        clear: left;
    }
    #bottom{
        position: relative;
    }

    .md-content-text {
        margin: 0 auto;
        padding: 0;
        width: 100%;
        max-width: 900px;
        flex-shrink: 0;
        display: flex;
    }
    .mdl-content-padding {
        padding: 50px;
    }
</style>

<div class="material-layout  mdl-js-layout has-drawer is-upgraded">

    <main class="material-layout__content" id="main">

        <!-- Top Anchor -->
        <div id="top"></div>

        <!-- Hamburger Button -->
        <button class="MD-burger-icon sidebar-toggle">
            <span id="MD-burger-id" class="MD-burger-layer"></span>
        </button>

        <div class="md-content-text mdl-grid">
            <div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">
                <div class="mdl-color-text--grey-700 mdl-card__supporting-text fade">

                    <div class="mdl-content-padding">
                        <h3>这里是深蓝的朋友们 </h3>
                        <div class="md-links">
                            <?php if (class_exists("Links_Plugin")): ?>
                                <?php Links_Plugin::output('
                                    <a href="{url}" title="{title}" target="_blank">
                                        <div class="md-links-item">
                                            <img src="{image}" alt="{name}"/>
                                            <div class="md-links-title">{name}</div>
                                        </div>
                                    </a>
                                    '); ?>
                            <?php endif; ?>
                        </div>

                        <!-- Articel content -->
                        <div id="post-content" class="mdl-color-text--grey-700 mdl-card__supporting-text fade out">
                            <?php
                            if (!empty($this->options->switch) && in_array('PanguPHP', $this->options->switch)) {
                                print pangu($this->content);
                            } else {
                                $this->content();
                            }
                            ?>
                        </div>

                        <!-- Article comments -->
                        <?php include('comments.php'); ?>
                    </div>

                </div>
            </div>
        </div>


        <?php include('sidebar.php'); ?>
        <?php include('footer.php'); ?>
