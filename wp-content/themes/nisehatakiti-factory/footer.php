<?php
/** Nisehatakiti Factory footer. */
if (!defined('ABSPATH')) exit;
?>
<footer class="nk-footer" id="about">
    <div class="nk-container">
        <div class="nk-footer__grid">
            <div>
                <div class="nk-brand">Nisehatakiti<span class="nk-brand-arrow">↩</span><small>WordPress Factory</small></div>
                <p>WordPressで、<br>ちょっと便利なものを。</p>
            </div>
            <div>
                <h3>製品一覧</h3>
                <?php if (has_nav_menu('footer')) : ?>
                    <?php wp_nav_menu(array('theme_location' => 'footer', 'container' => false, 'menu_class' => 'nk-footer-menu')); ?>
                <?php else : ?>
                    <ul>
                        <li><a href="#categories">同窓会</a></li>
                        <li><a href="#categories">舞台芸術</a></li>
                        <li><a href="#categories">Portal</a></li>
                        <li><a href="#products">すべての製品</a></li>
                    </ul>
                <?php endif; ?>
            </div>
            <div>
                <h3>サポート</h3>
                <ul>
                    <li><a href="#">ご利用ガイド</a></li>
                    <li><a href="#">よくある質問</a></li>
                    <li><a href="#">お問い合わせ</a></li>
                </ul>
            </div>
            <div>
                <h3>会社情報</h3>
                <ul>
                    <li><a href="#about">Nisehatakitiについて</a></li>
                    <li><a href="#">特定商取引法に基づく表記</a></li>
                    <li><a href="#">プライバシーポリシー</a></li>
                </ul>
            </div>
        </div>
        <div class="nk-footer__bottom">
            &copy; <?php echo esc_html(wp_date('Y')); ?> Nisehatakiti. All rights reserved.
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
