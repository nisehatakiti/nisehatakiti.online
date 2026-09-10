<?php
/**
 * Nisehatakiti Factory front page.
 */
if (!defined('ABSPATH')) exit;
get_header();
?>
<main class="nk-shell">
    <section class="nk-hero">
        <div class="nk-hero__perspective" aria-hidden="true"></div>
        <div class="nk-hero__content">
            <p class="nk-kicker">Nisehatakiti / WordPress Factory</p>
            <h1 class="nk-title">WordPressで、<br>ちょっと便利なものを。</h1>
            <p class="nk-tagline">小さなアイデアを、たくさんの人へ。<br>Nisehatakitiは、WordPressのテーマとプラグインをつくる、ちょっと変わった工場です。</p>
            <div class="nk-hero-actions">
                <a class="nk-button" href="#products">製品一覧を見る →</a>
                <a class="nk-button nk-button--ghost" href="#categories">工場を見学する ↓</a>
            </div>
        </div>
    </section>

    <section class="nk-section nk-section--dark" id="categories">
        <div class="nk-container nk-categories">
            <div class="nk-section__head">
                <div>
                    <p class="nk-kicker">Production Lines</p>
                    <h2>用途ごとの製造ライン</h2>
                </div>
                <p>工場の配管をたどるように、必要なものを探してください。</p>
            </div>
            <div class="nk-category-grid">
                <?php
                $categories = array(
                    array('label' => 'ALUMNI', 'title' => '同窓会', 'desc' => 'つながる、またあの頃のように。\n同窓会・OB/OG向けのWordPressテーマ・プラグイン。'),
                    array('label' => 'STAGE ART', 'title' => '舞台芸術', 'desc' => '舞台を支える、Webの力。\n劇団・舞台芸術団体向けのテーマ・プラグイン。'),
                    array('label' => 'PORTAL', 'title' => 'Portal', 'desc' => 'みんなが使える、共通の入口。\nユーザー管理・お知らせ・申請など小規模ポータル基盤。'),
                );
                foreach ($categories as $category) :
                    ?>
                    <article class="nk-category">
                        <div>
                            <span class="nk-category__label"><?php echo esc_html($category['label']); ?></span>
                            <h3><?php echo esc_html($category['title']); ?></h3>
                            <p><?php echo nl2br(esc_html($category['desc'])); ?></p>
                        </div>
                        <a class="nk-button" href="#products">製品を見る →</a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="nk-section nk-products" id="products">
        <div class="nk-container">
            <div class="nk-section__head">
                <div>
                    <p class="nk-kicker">New Products</p>
                    <h2>新しい製品</h2>
                </div>
                <a class="nk-button" href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/products/')); ?>">すべての製品を見る →</a>
            </div>
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
                    while ($products->have_posts()) :
                        $products->the_post();
                        $product = function_exists('wc_get_product') ? wc_get_product(get_the_ID()) : null;
                        ?>
                        <article class="nk-product">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            <?php endif; ?>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo esc_html(nisehatakiti_factory_excerpt()); ?></p>
                            <?php if ($product) : ?>
                                <div class="nk-product__price"><?php echo wp_kses_post($product->get_price_html()); ?></div>
                            <?php endif; ?>
                            <p><a href="<?php the_permalink(); ?>">詳細を見る →</a></p>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    $placeholders = array('Alumni Basic', 'Member List', 'Event Manager', 'StageArt Theme', 'Portal Base');
                    foreach ($placeholders as $name) :
                        ?>
                        <article class="nk-product">
                            <h3><?php echo esc_html($name); ?></h3>
                            <p>ここにWooCommerceの商品が表示されます。</p>
                            <div class="nk-product__price">¥1,980</div>
                        </article>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>

    <section class="nk-section">
        <div class="nk-container">
            <div class="nk-feature-strip">
                <div class="nk-feature"><strong>わかりやすい価格</strong><span>基本すべて1,980円</span></div>
                <div class="nk-feature"><strong>すぐに使える</strong><span>インストールして使い始める</span></div>
                <div class="nk-feature"><strong>充実のドキュメント</strong><span>設定ガイド・マニュアルを用意</span></div>
                <div class="nk-feature"><strong>安心のサポート</strong><span>困ったときもサポート</span></div>
            </div>
        </div>
    </section>

    <section class="nk-section nk-section--dark">
        <div class="nk-container">
            <div class="nk-section__head">
                <div>
                    <p class="nk-kicker">Ideas Flow Into Useful Tools</p>
                    <h2>小さな便利を、たくさんつくる。</h2>
                </div>
                <p>大きな工場に見えても、つくっているのは一つひとつ小さな道具です。</p>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
