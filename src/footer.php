    </div><!-- wrapper -->

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-pane copyright">
                <p>&copy; {{Name}}.</p>
            </div>
        </div>
    </footer>

    <!-- SweetScroll -->
    <script src="https://unpkg.com/sweet-scroll/sweet-scroll.min.js"></script>
    <script>
        const sweetScroll = new SweetScroll({
            trigger: "a[href^='#']",
            offset: isPhone() ? -360 : -80,
            duration: 500
        });
    </script>

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