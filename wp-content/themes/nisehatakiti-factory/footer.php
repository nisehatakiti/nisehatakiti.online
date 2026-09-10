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
          <?php wp_nav_menu(array('theme_location'=>'footer','container'=>false,'menu_class'=>'nk-footer-menu')); ?>
        <?php else : ?>
          <ul>
            <li><a href="<?php echo esc_url(home_url('/product-category/alumni/')); ?>">同窓会</a></li>
            <li><a href="<?php echo esc_url(home_url('/product-category/stage-art/')); ?>">舞台芸術</a></li>
            <li><a href="<?php echo esc_url(home_url('/product-category/portal/')); ?>">Portal</a></li>
            <li><a href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/products/')); ?>">すべての製品</a></li>
          </ul>
        <?php endif; ?>
      </div>
      <div>
        <h3>サイト</h3>
        <ul>
          <li><a href="<?php echo esc_url(home_url('/demo/')); ?>">デモ</a></li>
          <li><a href="<?php echo esc_url(home_url('/blog/')); ?>">ブログ</a></li>
          <li><a href="<?php echo esc_url(home_url('/about/')); ?>">Nisehatakitiについて</a></li>
        </ul>
      </div>
      <div>
        <h3>会社情報</h3>
        <ul>
          <li><a href="<?php echo esc_url(home_url('/commercial-transactions/')); ?>">特定商取引法に基づく表記</a></li>
          <li><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">プライバシーポリシー</a></li>
          <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a></li>
        </ul>
      </div>
    </div>
    <div class="nk-footer__bottom">&copy; <?php echo esc_html(wp_date('Y')); ?> Nisehatakiti. All rights reserved.</div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>