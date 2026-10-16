<?php

function runPosts()
{
    $posts = get_posts();
    $blog = '';
    foreach ($posts as $post) {
        $blog .= '
            <a class="card-link" href="'. get_permalink($post->ID) .'">
                <div id="'. $post->ID .'" class="collection-card" data-category="'. get_the_category($post->ID)[0]->slug .'">
                    <div class="collection-thumbnail">
                        <img src="'. get_the_post_thumbnail_url($post->ID, 'full') .'" loading="lazy" alt="'. $post->post_title .'" title="'. $post->post_title .'">
                    </div>
                    <div class="card-content">
                        <span class="card-badge">'. $post->comment_status .'</span>
                        <h3 class="card-title">'. $post->post_title .'</h3>
                        <p class="card-subtitle">'. $post->post_content .'</p>
                        <span class="card-price">'.__('En savoir plus', 'walhain-child').'</span>
                    </div>
                </div>
            </a>
        ';
    }

    return $blog;
}

function runCategories()
{
    $categories = get_categories();

    $cats = '';
    foreach ($categories as $categorie) {
        $cats .= '<button class="tab-btn" data-category="'.$categorie->slug.'">'.$categorie->cat_name.'</button>';
    }

    return $cats;
}

function runServices()
{
    $categories = get_categories();

    $cats = '';
    foreach ($categories as $index => $categorie) {
        if ($index == 1) {
            $icon = "✨";
        }
        else if ($index == 4) {
            $icon = "👑";
            }
            else {
            $icon = "🌱";
        }
        $cats .= '
        <div class="highlight-item">
            <div class="highlight-icon">' . $icon . '</div>
            <div class="highlight-title">' . $categorie->cat_name . '</div>
            <div class="highlight-desc">' . $categorie->description . '</div>
        </div>
        ';
    }

    return $cats;
}

function walhain_addBlocks()
{
    register_block_type(
        'walhain-child/hero',
        [
          'title' => 'Hero',
          'icon' => 'button',
          'render_callback' => function ($attributes) {
              return sprintf(
                  '<section class="hero">
                        <div class="hero-bg"></div>
                        <div class="hero-container">
                            <div class="hero-left">
                                <div class="hero-badge">%s</div>
                                <h1 class="hero-title">
                                    <span class="line"><span>%s</span></span>
                                    <span class="line"><span><span class="accent">%s</span></span></span>
                                    <span class="line"><span>%s</span></span>
                                </h1>
                                <p class="hero-description">
                                %s
                                </p>
                                <div class="cta-group">
                                    <a href="%s" class="cta-button primary">%s</a>
                                    <a href="%s" class="cta-button outline">%s</a>
                                </div>
                            </div>
                            <div class="hero-right">
                                <div class="hero-image-wrapper">
                                    <div class="hero-carousel">
                                        <div class="carousel-slide active">
                                            <img src="%s" loading="lazy">
                                        </div>
                                        <div class="carousel-slide">
                                            <img src="%s" loading="lazy">
                                        </div>
                                        <div class="carousel-slide">
                                            <img src="%s" loading="lazy">
                                        </div>
                                        <div class="carousel-overlay"></div>
                                        <div class="carousel-indicators">
                                            <span class="indicator active" data-slide="0"></span>
                                            <span class="indicator" data-slide="1"></span>
                                            <span class="indicator" data-slide="2"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="scroll-indicator">
                            <span></span>
                        </div>
                    </section>',
                  esc_html($attributes['title']),
                  esc_html($attributes['main_title_1']),
                  esc_html($attributes['main_title_2']),
                  esc_html($attributes['main_title_3']),
                  esc_html($attributes['description']),
                  esc_url($attributes['url_btn_1']),
                  esc_html($attributes['title_btn_1']),
                  esc_url($attributes['url_btn_2']),
                  esc_html($attributes['title_btn_2']),
                  esc_url($attributes['url_img_1']),
                  esc_url($attributes['url_img_2']),
                  esc_url($attributes['url_img_3']),
              );
          },
          'supports' => [
            'autoRegister' => true,
          ],
          'attributes' => [
          'title' => [
            'type' => 'string',
            'default' => 'Hello World!',
          ],
          'main_title_1' => [
            'type' => 'string',
            'default' => 'Redefine!',
          ],
          'main_title_2' => [
            'type' => 'string',
            'default' => 'Style!',
          ],
          'main_title_3' => [
            'type' => 'string',
            'default' => 'Revolution!',
          ],
          'description' => [
            'type' => 'string',
            'default' => 'Discover our avant-garde collection where high fashion meets street culture. Each piece tells a story of rebellion, elegance, and innovation.',
          ],
           'title_btn_1' => [
            'type' => 'string',
            'default' => 'Explore blog',
          ],
          'url_btn_1' => [
            'type' => 'string',
            'default' => '#blog',
          ],
           'title_btn_2' => [
            'type' => 'string',
            'default' => 'Explore Services',
          ],
          'url_btn_2' => [
            'type' => 'string',
            'default' => '#services',
          ],
          'url_img_1' => [
            'type' => 'string',
            'default' => get_stylesheet_directory_uri() . '/assets/images/noir-fashion-hero-01.avif',
          ],
          'url_img_2' => [
            'type' => 'string',
            'default' => get_stylesheet_directory_uri() . '/assets/images/noir-fashion-hero-02.avif',
          ],
          'url_img_3' => [
            'type' => 'string',
            'default' => get_stylesheet_directory_uri() . '/assets/images/noir-fashion-hero-03.avif',
          ],
      ]
        ]
    );

    register_block_type(
        'walhain-child/blog',
        [
          'title' => 'Blog',
          'icon' => 'post',
          'render_callback' => function ($attributes) {
              return sprintf(
                  '<section id="blog" class="collections">
                        <div class="section-header">
                            <h2 class="section-title">%s</h2>
                            <p class="section-subtitle">%s</p>
                        </div>

                        <div class="category-tabs">
                            <button class="tab-btn active" data-category="all">All</button>
                            '. runCategories() .'
                        </div>

                        <div class="grid" id="collectionsGrid">
                            '. runPosts() .'
                        </div>
                    </section>',
                  esc_html($attributes['title']),
                  esc_html($attributes['subtitle']),
              );
          },
            'supports' => [
                    'autoRegister' => true,
                ],
                'attributes' => [
                'title' => [
                    'type' => 'string',
                    'default' => 'Latest articles',
                ],
                'subtitle' => [
                    'type' => 'string',
                    'default' => 'Discover our curated news',
                ],
            ]
        ]
    );

    register_block_type(
        'walhain-child/services',
        [
          'title' => 'Services',
          'icon' => 'archive',
          'render_callback' => function ($attributes) {
              return sprintf(
                  '<section class="featured" id="services">
                        <div class="featured-container">
                            <div class="featured-hero">
                                <div class="featured-content">
                                    <span class="label">%s</span>
                                    <h2>%s</h2>
                                    <p>%s</p>
                                    <div class="feature-highlights">
                                        ' . runServices() . '
                                    </div>
                                    <a href="%s" class="feature-cta">%s</a>
                                </div>
                                <div class="featured-image-section">
                                    <div class="featured-image-grid">
                                        <div class="featured-img">
                                            <img src="%s" alt="Fashion Collection Showcase">
                                        </div>
                                        <div class="featured-img">
                                            <img src="%s" alt="Luxury Fashion Details">
                                        </div>
                                        <div class="featured-img">
                                            <img src="%s" alt="Artisan Craftsmanship">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                ',
                  esc_html($attributes['title']),
                  esc_html($attributes['subtitle']),
                  esc_html($attributes['description']),
                  esc_url($attributes['cta_link']),
                  esc_html($attributes['cta_text']),
                  esc_url($attributes['url_img_1']),
                  esc_url($attributes['url_img_2']),
                  esc_url($attributes['url_img_3']),
              );
          },
            'supports' => [
                    'autoRegister' => true,
                ],
                'attributes' => [
                'title' => [
                    'type' => 'string',
                    'default' => 'Un service de qualité',
                ],
                'subtitle' => [
                    'type' => 'string',
                    'default' => 'Nos services sur mesure',
                ],
                 'description' => [
                    'type' => 'string',
                    'default' => 'Ce que nous collaborons avec vous',
                ],
                'cta_link' => [
                    'type' => 'string',
                    'default' => '#contact',
                ],
                'cta_text' => [
                    'type' => 'string',
                    'default' => 'Contactez-moi',
                ],
                'url_img_1' => [
                    'type' => 'string',
                    'default' =>  get_stylesheet_directory_uri() . '/assets/images/art-of-fashion-01.avif',
                ],
                'url_img_2' => [
                    'type' => 'string',
                    'default' =>  get_stylesheet_directory_uri() . '/assets/images/art-of-fashion-02.avif',
                ],
                'url_img_3' => [
                    'type' => 'string',
                    'default' =>  get_stylesheet_directory_uri() . '/assets/images/art-of-fashion-03.avif',
                ],
            ]
        ]
    );
}
add_action('init', 'walhain_addBlocks');
