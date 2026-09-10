<?php
/**
 * Nisehatakiti Factory front page.
 *
 * Factory journey:
 * Entrance -> Production Line -> Categories -> New Products
 * -> Featured Product -> About -> Exit.
 */
if (!defined('ABSPATH')) exit;
get_header();

$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/products/');
$category_links = array(
  'alumni'    => home_url('/product-category/alumni/'),
  'stage-art' => home_url('/product-category/stage-art/'),
  'portal'    => home_url('/product-category/portal/'),
);

$featured_id = (int) get_theme_mod('nisehatakiti_featured_product_id', 0);
if (!$featured_id && function_exists('wc_get_products')) {
  $featured = wc_get_products(array('status' => 'publish', 'limit' => 1, 'featured' => true));
  if ($featured) $featured_id = $featured[0]->get_id();
}
?>
<main class="nk-shell nk-factory">

  <!-- 01 / FACTORY ENTRANCE -->
  <section class="nk-factory-section nk-entrance" id="top">
    <div class="nk-entrance__architecture" aria-hidden="true">
      <div class="nk-architecture__pipe nk-architecture__pipe--left"></div>
      <div class="nk-architecture__pipe nk-architecture__pipe--right"></div>
      <div class="nk-architecture__wall nk-architecture__wall--left"></div>
      <div class="nk-architecture__wall nk-architecture__wall--right"></div>
      <div class="nk-architecture__axis"></div>
    </div>
    <div class="nk-entrance__content">
      <p class="nk-kicker">Nisehatakiti Factory</p>
      <h1 class="nk-title">WordPressで、<br>ちょっと便利なものを。</h1>
      <p class="nk-entrance__copy">テーマ、プラグイン、小さな道具。<br>必要なものを、必要な形でつくっています。</p>
      <div class="nk-entrance__actions">
        <a class="nk-button" href="#categories">工場を見てみる ↓</a>
        <a class="nk-button nk-button--ghost" href="#products">製品を見る →</a>
      </div>
    </div>
    <a class="nk-scroll-cue" href="#production"><span>SCROLL</span><b>↓</b></a>
  </section>

  <!-- 02 / MAIN PRODUCTION LINE -->
  <section class="nk-factory-section nk-production" id="production">
    <div class="nk-production__scene" aria-hidden="true">
      <div class="nk-production__machine nk-production__machine--left"></div>
      <div class="nk-production__machine nk-production__machine--right"></div>
      <div class="nk-production__floor">
        <i></i><i></i><i></i><i></i><i></i>
      </div>
      <div class="nk-production__vanishing"></div>
    </div>
    <div class="nk-production__content nk-container">
      <p class="nk-kicker">Main Production Line</p>
      <h2>小さな便利を、<br>たくさんつくる。</h2>
      <p>大きな仕組みをつくる前に、まずは手元の「これがあったら便利」を形にする。<br>この工場から、そんなWordPress製品を送り出しています。</p>
    </div>
  </section>

  <!-- 03 / CATEGORY MACHINES -->
  <section class="nk-factory-section nk-categories-section" id="categories">
    <div class="nk-container">
      <div class="nk-section__head nk-section__head--center">
        <p class="nk-kicker">Category Machines</p>
        <h2>どのラインへ行きますか。</h2>
      </div>
      <div class="nk-category-machines">
        <a class="nk-category-machine nk-category-machine--alumni" href="<?php echo esc_url($category_links['alumni']); ?>">
          <span class="nk-category-machine__pipe" aria-hidden="true"></span>
          <span class="nk-category-machine__label">ALUMNI</span>
          <strong>同窓会</strong>
          <small>名簿・会員・同窓会サイト</small>
          <em>製品を見る →</em>
        </a>
        <a class="nk-category-machine nk-category-machine--stage" href="<?php echo esc_url($category_links['stage-art']); ?>">
          <span class="nk-category-machine__pipe" aria-hidden="true"></span>
          <span class="nk-category-machine__label">STAGE ART</span>
          <strong>舞台芸術</strong>
          <small>劇団・公演・稽古のための道具</small>
          <em>製品を見る →</em>
        </a>
        <a class="nk-category-machine nk-category-machine--portal" href="<?php echo esc_url($category_links['portal']); ?>">
          <span class="nk-category-machine__label">PORTAL BASE</span>
          <strong>Portal</strong>
          <small>みんなのための共通の入口</small>
          <em>詳しく見る →</em>
        </a>
      </div>
    </div>
  </section>

  <!-- 04 / NEW PRODUCTS -->
  <section class="nk-factory-section nk-products-section" id="products">
    <div class="nk-container">
      <div class="nk-section__head">
        <div>
          <p class="nk-kicker">New Products</p>
          <h2>新しく生まれた製品</h2>
        </div>
        <a class="nk-text-link" href="<?php echo esc_url($shop_url); ?>">すべての製品を見る →</a>
      </div>
      <div class="nk-conveyor" aria-hidden="true"><span></span><span></span><span></span></div>
      <div class="nk-product-grid">
        <?php
        $products = new WP_Query(array('post_type' => 'product','posts_per_page' => 6,'post_status' => 'publish','orderby' => 'date','order' => 'DESC'));
        if ($products->have_posts()) :
          while ($products->have_posts()) : $products->the_post();
            $product = function_exists('wc_get_product') ? wc_get_product(get_the_ID()) : null;
            $terms = get_the_terms(get_the_ID(), 'product_cat');
            $category_name = $terms && !is_wp_error($terms) ? $terms[0]->name : '';
        ?>
          <article class="nk-product-card">
            <a href="<?php the_permalink(); ?>" class="nk-product-card__link">
              <div class="nk-product-card__thumb">
                <?php if (has_post_thumbnail()) { the_post_thumbnail('medium'); } else { echo '<span>PRODUCT</span>'; } ?>
              </div>
              <div class="nk-product-card__body">
                <?php if ($category_name) : ?><span class="nk-product-card__category"><?php echo esc_html($category_name); ?></span><?php endif; ?>
                <h3><?php the_title(); ?></h3>
                <span class="nk-product-card__type"><?php echo esc_html(get_post_meta(get_the_ID(), '_nisehatakiti_product_type', true) ?: 'Plugin / Theme'); ?></span>
                <?php if ($product) : ?><strong class="nk-product-card__price"><?php echo wp_kses_post($product->get_price_html()); ?></strong><?php endif; ?>
              </div>
            </a>
          </article>
        <?php endwhile; wp_reset_postdata(); else : ?>
          <?php foreach (array('Alumni','StageArt','Portal Base') as $placeholder) : ?>
            <article class="nk-product-card nk-product-card--placeholder"><div class="nk-product-card__thumb"><span>PRODUCT</span></div><div class="nk-product-card__body"><span class="nk-product-card__category">COMING SOON</span><h3><?php echo esc_html($placeholder); ?></h3><span class="nk-product-card__type">Plugin / Theme</span><strong class="nk-product-card__price">¥1,980</strong></div></article>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- 05 / FEATURED PRODUCT -->
  <section class="nk-factory-section nk-featured-section">
    <div class="nk-featured-machine" aria-hidden="true"><div></div><div></div><div></div></div>
    <div class="nk-container nk-featured">
      <div class="nk-featured__intro">
        <p class="nk-kicker">Selected Product</p>
        <h2>今日の<br>おすすめ。</h2>
      </div>
      <?php if ($featured_id && function_exists('wc_get_product') && ($featured_product = wc_get_product($featured_id))) : ?>
        <article class="nk-featured-card">
          <a href="<?php echo esc_url(get_permalink($featured_id)); ?>">
            <div class="nk-featured-card__thumb"><?php echo get_the_post_thumbnail($featured_id, 'large') ?: '<span>FEATURED</span>'; ?></div>
            <div class="nk-featured-card__body">
              <h3><?php echo esc_html($featured_product->get_name()); ?></h3>
              <p><?php echo esc_html(wp_trim_words(get_post_field('post_excerpt', $featured_id), 28)); ?></p>
              <strong><?php echo wp_kses_post($featured_product->get_price_html()); ?></strong>
              <span>詳細を見る →</span>
            </div>
          </a>
        </article>
      <?php else : ?>
        <article class="nk-featured-card nk-featured-card--placeholder"><div class="nk-featured-card__thumb"><span>SELECTED PRODUCT</span></div><div class="nk-featured-card__body"><h3>Featured Product</h3><p>おすすめの商品がここから送り出されます。</p><strong>¥1,980</strong><span>詳細を見る →</span></div></article>
      <?php endif; ?>
    </div>
  </section>

  <!-- 06 / ABOUT -->
  <section class="nk-factory-section nk-about-section" id="about">
    <div class="nk-about__depth" aria-hidden="true"></div>
    <div class="nk-container nk-about">
      <p class="nk-kicker">About Nisehatakiti</p>
      <h2>大きな工場で、<br>小さな道具をつくる。</h2>
      <p>Nisehatakitiは、WordPressで使えるテーマやプラグインをつくっています。<br>すぐに使えて、ちょっと便利で、試しやすいものを。</p>
      <div class="nk-about__actions">
        <a class="nk-button" href="<?php echo esc_url(home_url('/about/')); ?>">Nisehatakitiについて →</a>
        <a class="nk-text-link" href="https://hatakiti.com/" target="_blank" rel="noopener">もっと大きな仕組みが必要なら HATAKITI →</a>
      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>