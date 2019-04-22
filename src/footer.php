    </div><!-- wrapper -->

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-menu">
            <?php wp_nav_menu(array(
                'theme_location' => 'footer'
            )); ?>
            </div>
            <div class="pane-container">
                <div class="pane"><?php dynamic_sidebar('footer-left'); ?></div>
                <div class="pane"><?php dynamic_sidebar('footer-right'); ?></div>
            </div>
            <div id="copyright" class="copyright">
                <?php global $wwata; ?>
                &copy; <span itemprop="copyrightYear"><?php echo date( 'Y' ); ?></span> <a href="<?php echo $wwata['home_url'] ?>" target="_blank"><span itemprop="copyrightHolder" itemscope itemtype="http://schema.org/Organization"><span itemprop="name"><?php echo $wwata['site_name']; ?></span></span></a>
                <p><a href="https://wwata.wararyo.com/" rel="noopener" target="_blank">Made by wwata Theme</a></p>
            </div>
        </div>
    </footer>

    <!-- SweetScroll -->
    <script src="https://unpkg.com/sweet-scroll/sweet-scroll.min.js"></script>

    <!-- SVG Effect -->
    <svg height="0" style="display: none;">
    <filter id="drop-shadow">
        <feGaussianBlur in="SourceAlpha" stdDeviation="4"></feGaussianBlur>
        <feColorMatrix result="matrixOut" in="offOut" type="matrix" values="1 0 0 0 0
                0 1 0 0 0
                0 0 1 0 0
                0 0 0 0.25 0"></feColorMatrix>
        <feOffset dx="0" dy="2" result="offsetblur"></feOffset>
        <feMerge>
            <feMergeNode></feMergeNode>
            <feMergeNode in="SourceGraphic"></feMergeNode>
        </feMerge>
    </filter>
    </svg>
    <?php wp_footer() ?>
  </body>
</html>