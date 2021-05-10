<!-- Floating Action Button -->
<div id="back-to-top" class="toTop-wrap">
    <a href="#top" class="toTop">
        <i class="material-icons footer_top-i">expand_less</i>
    </a>
</div>


<!--Footer-->
<!-- <footer class="mdl-mini-footer" id="bottom">
</footer>
-->
</main>


<!-- UC Browser Compatible -->
<script>
    var agent = navigator.userAgent.toLowerCase();
    if(agent.indexOf('ucbrowser')>0) {
        document.write('<link rel="stylesheet" href="<?php getThemeFile('css/uc.css', true); ?>">');
        alert('由于 UC 浏览器使用极旧的内核，而本网站使用了一些新的特性。\n为了您能更好的浏览，推荐使用 Chrome 或 Firefox 浏览器。');
    }
</script>

<!--Analysis code-->
<?php $this->options->analysis(); ?>

<!-- Material js -->
<?php jsLsload("jq_js", "js/jquery.min.js") ?>
<?php jsLsload("js_js", "js/js.min.js") ?>
<?php jsLsload("lazyload_js", "js/lazyload.min.js") ?>

<!-- SmoothScroll -->
<?php if (UACheck::is() !== "Safari"): ?>
    <?php jsLsload("smooth_js", 'js/smoothscroll.js'); ?>
<?php endif; ?>

<!-- Cache -->
<?php if (in_array("LocalStorage", getThemeOptions("switch"))): ?>
    <script type="text/ls-javascript" id="lazy-load">
        // Offer LazyLoad
        queue.offer(function(){
            $('.lazy').lazyload({
                effect : 'show'
            });
        });

        // Start Queue
        $(document).ready(function(){
            setInterval(function(){
                queue.execNext();
            },200);
        });
    </script>
<?php else: ?>
    <script type="text/javascript" id="lazy-load">
        $('.lazy').lazyload({
            effect : 'show'
        });
    </script>
<?php endif ?>

<!-- loading tips -->
<?php if (!empty($this->options->switch) && in_array('ShowLoadingLine', $this->options->switch)): ?>
    <!-- Nprogress -->
    <?php jsLsload('np_js', 'js/nprogress.js'); ?>

    <script type="<?php getScriptType() ?>" id="NProgress-script">
        NProgress.configure({
            showSpinner: true
        });
        NProgress.start();
        $('#nprogress .bar').css({
            'background': '<?php $this->options->loadingcolor(); ?>'
        });
        $('#nprogress .peg').css({
            'box-shadow': '0 0 10px <?php $this->options->loadingcolor(); ?>, 0 0 15px <?php $this->options->loadingcolor(); ?>'
        });
        $('#nprogress .spinner-icon').css({
            'border-top-color': '<?php $this->options->loadingcolor(); ?>',
            'border-left-color': '<?php $this->options->loadingcolor(); ?>'
        });
        setTimeout(function() {
            NProgress.done();
            $('.fade').removeClass('out');
        }, <?php $this->options->loadingbuffer(); ?>);
    </script>
<?php endif; ?>

<?php if (!empty($this->options->switch) && in_array('atargetblank', $this->options->switch)): ?>
    <!-- _blank -->
    <script>
        //Add target="_blank" to a tags
        $(document).bind('DOMNodeInserted', function(event) {
            $('a[href^="http"]').each(
                function() {
                    if (!$(this).attr('target')) {
                        $(this).attr('target', '_blank')
                    }
                }
            );
        });
    </script>
<?php endif; ?>

<?php if (!empty($this->options->switch) && in_array('Pangu', $this->options->switch) && !in_array('PanguPHP', $this->options->switch)): ?>
    <!-- Pangu -->
    <?php jsLsload('pangu_js', 'js/pangu.min.js'); ?>
    <script type="<?php getScriptType() ?>" id="pangu-script"> pangu.spacingPage(); </script>
<?php endif; ?>

<?php if (!empty($this->options->switch) && in_array('HighLight', $this->options->switch)): ?>
    <!-- highlight js -->
    <?php jsLsload('highlight_js', 'js/highlight.min.js'); ?>
    <?php cssLsload('highlight_css', 'css/highlight.min.css') ?>
    <script type="<?php getScriptType() ?>" id="highlight-script"> hljs.initHighlightingOnLoad(); </script>
<?php endif; ?>

<?php if (getThemeOptions("searchis") == 1): ?>
    <!-- Local Search -->
    <script type="<?php getScriptType() ?>" id="search-local-js-script">
        var searchFunc=function(c,a,b){$.ajax({url:c,dataType:"xml",success:function(e){var d=$("entry",e).map(function(){return{title:$("title",this).text(),content:$("content",this).text(),url:$("url",this).text()}}).get();var g=document.getElementById(a);var f=document.getElementById(b);g.addEventListener("input",function(){var i='<ul class="search-result-list">';var h=this.value.trim().toLowerCase().split(/[\s\-]+/);f.innerHTML="";if(this.value.trim().length<=0){return}d.forEach(function(o){var n=true;var s=[];var t=o.title.trim().toLowerCase();var m=o.content.trim().replace(/<[^>]+>/g,"").toLowerCase();var j=o.url;var u=-1;var q=-1;var p=-1;if(t!==""&&m!==""){h.forEach(function(w,x){u=t.indexOf(w);q=m.indexOf(w);if(u<0&&q<0){n=false}else{if(q<0){q=0}if(x===0){p=q}}})}if(n){i+='<li><a href="'+j+'" class="search-result-title" target="_blank">'+t;var r=o.content.trim().replace(/<[^>]+>/g,"");if(p>=0){var k=p-6;var l=p+6;if(k<0){k=0}if(k===0){l=10}if(l>r.length){l=r.length}var v=r.substr(k,l);h.forEach(function(w){var x=new RegExp(w,"gi");v=v.replace(x,'<em class="search-keyword">'+w+"</em>")});i+='<p class="search-result">'+v+"...</p></a>"}}});f.innerHTML=i})}})};
    </script>
    <script type="<?php getScriptType() ?>" id="search-input-script">
        var inputArea = document.querySelector('#search');
        var getSearchFile = function() {
            var path = '<?php echo Helper::options()->index . "?mod=search-xml" ?>';
            searchFunc(path, 'search', 'local-search-result');
        };

        if(inputArea) {
            inputArea.onfocus = function() {
                getSearchFile();
            }
        }
    </script>
<?php endif; ?>

<?php if (in_array("LocalStorage", getThemeOptions("switch"))): ?>
    <script>
        (function(){
            var scriptList = document.querySelectorAll('script[type="text/ls-javascript"]');

            for (var i = 0; i < scriptList.length; ++i) {
                var item = scriptList[i];
                lsloader.runInlineScript(item.id,item.id);
            }
        })()
    </script>
<?php endif ?>

<?php $this->footer(); ?>

</body>
</html>
