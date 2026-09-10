<?php
if (!defined('ABSPATH')) exit;
get_header();
$shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/products/');
$category_links = array('alumni'=>home_url('/product-category/alumni/'),'stage'=>home_url('/product-category/stage-art/'),'portal'=>home_url('/product-category/portal/'));
?>
<main class="nk-factory"><div class="nk-factory-art" aria-hidden="true"></div><div class="nk-factory-art__veil" aria-hidden="true"></div><div class="nk-factory-content">
<section class="nk-factory-scene" id="top">
<div class="nk-factory-scene__pipes" aria-hidden="true"></div><div class="nk-factory-scene__ink" aria-hidden="true"></div>
<div class="nk-category-board nk-category-board--alumni"><a href="<?php echo esc_url($category_links['alumni']); ?>"><span class="nk-board-icon">●●●</span><b>ALUMNI</b><strong>同窓会</strong><small>つながる、<br>またあの頃のように。</small><em>製品を見る　→</em></a></div>
<div class="nk-category-board nk-category-board--stage"><a href="<?php echo esc_url($category_links['stage']); ?>"><span class="nk-board-icon">◖◗</span><b>STAGE ART</b><strong>舞台芸術</strong><small>舞台を支える、<br>Webの力。</small><em>製品を見る　→</em></a></div>
<div class="nk-category-board nk-category-board--portal nk-category-board--portal-left"><a href="<?php echo esc_url($category_links['portal']); ?>"><span class="nk-board-icon">⚙</span><b>PORTAL</b><strong>ポータル</strong><small>みんなが使える<br>共通の入口。</small><em>製品を見る　→</em></a></div>
<div class="nk-category-board nk-category-board--portal nk-category-board--portal-right"><a href="<?php echo esc_url($category_links['portal']); ?>"><span class="nk-board-icon">⚙</span><b>PORTAL</b><strong>ポータル</strong><small>みんなが使える<br>共通の入口。</small><em>製品を見る　→</em></a></div>
<section class="nk-reactor" aria-label="Nisehatakiti WordPress Factory"><div class="nk-reactor__shell"><div class="nk-reactor__cap"></div><div class="nk-reactor__name">Nisehatakiti</div><div class="nk-reactor__sub">WordPress Factory</div><h1>小さなアイデアを、<br>大きな力に。</h1><p>WordPressで、<br>ちょっと便利なものを。</p><a href="#products" class="nk-reactor__cta">製品一覧を見る　↓</a></div></section>
<div class="nk-factory-gate"><span>GOOD WEBSITES<br>MAKE A BETTER TOMORROW</span></div><div class="nk-scene-mark nk-scene-mark--l">A1</div><div class="nk-scene-mark nk-scene-mark--r">B1</div>
</section>
<section class="nk-product-line" id="products"><div class="nk-product-line__pipes" aria-hidden="true"></div><div class="nk-product-line__heading"><div><h2>新しい製品</h2><span>NEW PRODUCTS</span></div><a href="<?php echo esc_url($shop_url); ?>">すべての製品を見る　→</a></div>
<div class="nk-conveyor"><div class="nk-conveyor__rollers" aria-hidden="true"></div><div class="nk-product-grid">
<?php $products=new WP_Query(array('post_type'=>'product','posts_per_page'=>5,'post_status'=>'publish','orderby'=>'date','order'=>'DESC')); if($products->have_posts()): while($products->have_posts()):$products->the_post();$product=function_exists('wc_get_product')?wc_get_product(get_the_ID()):null; ?>
<article class="nk-product-crate"><a href="<?php the_permalink(); ?>"><div class="nk-product-crate__icon"><?php if(has_post_thumbnail()){the_post_thumbnail('medium');}else{echo '▣';} ?></div><h3><?php the_title(); ?></h3><p><?php echo esc_html(get_post_meta(get_the_ID(),'_nisehatakiti_product_type',true)?:'WordPress Plugin / Theme'); ?></p><strong><?php echo $product?wp_kses_post($product->get_price_html()):'¥1,980'; ?></strong><span>詳細を見る　→</span></a></article>
<?php endwhile;wp_reset_postdata();else:$placeholders=array(array('Alumni Basic','同窓会サイト構築テーマ','●●●'),array('Member List','名簿管理プラグイン','☷'),array('Event Manager','イベント管理プラグイン','▣'),array('StageArt Theme','舞台芸術向けテーマ','◖◗'),array('Portal Base','ポータル基盤プラグイン','⚙'));foreach($placeholders as $item): ?>
<article class="nk-product-crate"><div class="nk-product-crate__icon"><?php echo esc_html($item[2]); ?></div><h3><?php echo esc_html($item[0]); ?></h3><p><?php echo esc_html($item[1]); ?></p><strong>¥1,980</strong><span>詳細を見る　→</span></article>
<?php endforeach;endif; ?></div><div class="nk-conveyor__rollers nk-conveyor__rollers--bottom" aria-hidden="true"></div></div>
<div class="nk-factory-values"><div><i>￥</i><span><b>すべての製品</b><strong>¥1,980</strong></span></div><div><i>ϟ</i><span><b>すぐに使える</b><small>インストールしてすぐ使える</small></span></div><div><i>◈</i><span><b>小さなツールが、</b><strong>大きな現場を動かす。</strong></span></div></div>
</section>
<section class="nk-factory-outro" id="about"><div class="nk-factory-outro__pipes" aria-hidden="true"></div><div class="nk-factory-outro__content"><p>Nisehatakitiは、WordPressで使える<br>小さくて便利な道具をつくる工場です。</p><a href="<?php echo esc_url(home_url('/about/')); ?>">Nisehatakitiについて　→</a></div></section>
</div></main>
<?php get_footer(); ?>