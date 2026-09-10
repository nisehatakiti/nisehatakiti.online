<?php
if (!defined('ABSPATH')) exit;
get_header();

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/products/');
$category_links = array(
  'alumni' => home_url('/product-category/alumni/'),
  'stage'  => home_url('/product-category/stage-art/'),
  'portal' => home_url('/product-category/portal/'),
);
?>
<main class="nk-showcase">

  <section class="nk-factory-hero" id="top">
    <div class="nk-factory-hero__scene" aria-hidden="true"></div>
    <div class="nk-factory-hero__shade" aria-hidden="true"></div>

    <a class="nk-sign nk-sign--alumni" href="<?php echo esc_url($category_links['alumni']); ?>">
      <span class="nk-sign__icon">●●●</span>
      <b>ALUMNI</b>
      <strong>同窓会</strong>
      <small>つながる、<br>あの頃のように。</small>
      <em>→</em>
    </a>

    <a class="nk-sign nk-sign--stage" href="<?php echo esc_url($category_links['stage']); ?>">
      <span class="nk-sign__icon">◖◗</span>
      <b>STAGE ART</b>
      <strong>舞台芸術</strong>
      <small>舞台を支える、<br>Webの力。</small>
      <em>→</em>
    </a>

    <a class="nk-sign nk-sign--portal nk-sign--portal-left" href="<?php echo esc_url($category_links['portal']); ?>">
      <span class="nk-sign__icon">⚙</span><b>PORTAL</b><strong>ポータル</strong><small>みんなが使える<br>共通の入口。</small><em>→</em>
    </a>

    <a class="nk-sign nk-sign--portal nk-sign--portal-right" href="<?php echo esc_url($category_links['portal']); ?>">
      <span class="nk-sign__icon">⚙</span><b>PORTAL</b><strong>ポータル</strong><small>みんなが使える<br>共通の入口。</small><em>→</em>
    </a>

    <div class="nk-hero-core">
      <div class="nk-hero-core__plate">
        <p>Nisehatakiti</p>
        <span>WordPress Factory</span>
      </div>
      <div class="nk-hero-copy">
        <h1>小さなアイデアを、<br>たくさんの人へ。</h1>
        <p>WordPressで使える、ちょっと便利な<br>テーマとプラグインをつくる工場です。</p>
        <div class="nk-hero-copy__arrow">↓</div>
        <a class="nk-dark-button" href="#products">製品一覧を見る　→</a>
      </div>
    </div>

    <div class="nk-side-label nk-side-label--left">A1</div>
    <div class="nk-side-label nk-side-label--right">A2</div>
    <div class="nk-side-label nk-side-label--left-bottom">A1</div>
    <div class="nk-side-label nk-side-label--right-bottom">B2</div>

    <div class="nk-hero-bottomline">
      <span>Plugins</span><span>Themes</span><span>A WEB FOR MORE PEOPLE</span>
    </div>
  </section>

  <section class="nk-product-deck" id="products">
    <div class="nk-product-deck__head">
      <div><h2>新しい製品</h2><span>NEW PRODUCTS</span></div>
      <a href="<?php echo esc_url($shop_url); ?>">すべての製品を見る　→</a>
    </div>

    <div class="nk-product-rail" aria-hidden="true"></div>

    <div class="nk-product-grid">
      <?php
      $products = new WP_Query(array(
        'post_type' => 'product',
        'posts_per_page' => 5,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
      ));
      if ($products->have_posts()) :
        while ($products->have_posts()) : $products->the_post();
          $product = function_exists('wc_get_product') ? wc_get_product(get_the_ID()) : null;
      ?>
        <article class="nk-product">
          <a href="<?php the_permalink(); ?>">
            <div class="nk-product__thumb">
              <?php if (has_post_thumbnail()) { the_post_thumbnail('medium'); } else { echo '<span>●</span>'; } ?>
            </div>
            <h3><?php the_title(); ?></h3>
            <p><?php echo esc_html(get_post_meta(get_the_ID(), '_nisehatakiti_product_type', true) ?: 'WordPress Plugin / Theme'); ?></p>
            <strong><?php echo $product ? wp_kses_post($product->get_price_html()) : '¥1,980'; ?></strong>
            <span class="nk-product__button">詳細を見る　→</span>
          </a>
        </article>
      <?php endwhile; wp_reset_postdata(); else :
        $placeholders = array(
          array('Alumni Basic','同窓会サイト構築テーマ','●●●'),
          array('Member List','名簿管理プラグイン','☷'),
          array('Event Manager','イベント管理プラグイン','□'),
          array('StageArt Theme','舞台芸術向けテーマ','◖◗'),
          array('Portal Base','ポータル基盤プラグイン','⚙'),
        );
        foreach ($placeholders as $item) :
      ?>
        <article class="nk-product nk-product--placeholder">
          <div class="nk-product__thumb"><span><?php echo esc_html($item[2]); ?></span></div>
          <h3><?php echo esc_html($item[0]); ?></h3>
          <p><?php echo esc_html($item[1]); ?></p>
          <strong>¥1,980</strong>
          <span class="nk-product__button">詳細を見る　→</span>
        </article>
      <?php endforeach; endif; ?>
    </div>

    <div class="nk-benefits">
      <div><i>⚙</i><span><b>わかりやすい価格</b><small>すべて1,980円</small></span></div>
      <div><i>⇩</i><span><b>すぐに使える</b><small>インストールしてすぐ使える</small></span></div>
      <div><i>▤</i><span><b>充実のドキュメント</b><small>設定ガイド・マニュアル完備</small></span></div>
      <div><i>◉</i><span><b>安心のサポート</b><small>困ったときもサポート</small></span></div>
    </div>
  </section>

  <section class="nk-factory-about" id="about">
    <div class="nk-factory-about__inner">
      <p>Nisehatakitiは、WordPressで使える小さくて便利な道具をつくる場所です。</p>
      <a href="<?php echo esc_url(home_url('/about/')); ?>">Nisehatakitiについて　→</a>
    </div>
  </section>
</main>
<?php get_footer(); ?>