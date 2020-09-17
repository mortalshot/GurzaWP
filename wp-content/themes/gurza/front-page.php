<?php get_header(); ?>
<main class="site-content">
    <section class="first-screen">
        <div class="first-screen__container container">
            <div class="first-screen__offer main-offer anim-items anim-no-hide">
                <h2 class="main-offer__title"><?php the_field('main-offer_title'); ?></h2>
                <div class="main-offer__wrapper">
                    <div class="main-offer__text"><?php the_field('main-offer_text'); ?></div>
                    <div class="main-offer__buttons">
                        <a href="#request" class="main-offer__button button button-bg popup-link" data-whatever="С главной страницы, кнопка Оптом">Оптом</a>
                        <a href="#request" class="main-offer__button button popup-link" data-whatever="С главной страницы, кнопка В розницу">В розницу</a>
                    </div>
                </div>
            </div>
            <div class="first-screen__point-first first-screen__absolute anim-items">
                <img src="<?php echo get_template_directory_uri(); ?>/gurza/img/main/points-1.png" alt="">
            </div>

            <div class="first-screen__point-second first-screen__absolute anim-items">
                <img src="<?php echo get_template_directory_uri(); ?>/gurza/img/main/points-2.png" alt="">
            </div>
        </div>

        <div class="first-screen__aim aim first-screen__absolute">
            <div class="aim__first">
                <div class="aim__second"></div>
            </div>
        </div>
    </section>

    <section id="catalog" class="catalog">
        <div class="catalog__container container">
            <h2 class="catalog__title title title-with-points">Каталог</h2>
            <div class="catalog__cards">
                <?php 
                // параметры по умолчанию
                $posts = get_posts( array(
                    'numberposts' => -1,
                    'category'    => 0,
                    'orderby'     => 'date',
                    'order'       => 'DESC',
                    'include'     => array(),
                    'exclude'     => array(),
                    'meta_key'    => '',
                    'meta_value'  =>'',
                    'post_type'   => 'product-item',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ) );

                $i=1;
                foreach( $posts as $key => $post ){
                    setup_postdata($post);
                    ?>
                    <div class="catalog__card card-item">
                        <div class="card-item__wrapper">
                            <div class="card-item__top">
                                <!-- absolute position for points and rectangles -->
                                <div class="card-item__left">
                                <?php 
                                if($i%2==0) :
                                    echo '<div class="card-item__block">';
                                        echo '<div class="card-item__point"></div>';
                                        echo '<div class="card-item__point"></div>';
                                    echo '</div>';
                                else :
                                    echo '<div class="card-item__block">';
                                        echo '<div class="card-item__rect"></div>';
                                        echo '<div class="card-item__point"></div>';
                                    echo '</div>';
                                endif;
                                ?>
                                </div>
                                <div class="card-item__img">
                                    <?php $image = get_field('card-item_img_1'); ?>
                                    <img src="<?php echo $image['url'] ?>" alt="<?php $image['alt'] ?>">
                                </div>
                                <!-- absolute position for points and rectangles -->
                                <div class="card-item__right">
                                    <?php 
                                        if($i%2==0) :
                                            echo '<div class="card-item__rect"></div>';
                                        else :
                                            echo '<div class="card-item__point"></div>';
                                        endif;
                                    ?>
                                </div>
                            </div>
                            <div class="card-item__body">
                                <div class="card-item__name"><?php the_field('card-item_name'); ?></div>
                                <div class="card-item__table">
                                    <div class="card-item__column card-item__details details">
                                        <div class="details__headline headline">
                                            <div class="headline__title">Пол:</div>
                                            <div class="headline__title">Размеры:</div>
                                        </div>
                                        <div class="details__attribute attribute">
                                            <div class="attribute__text"><?php the_field('attribute_sex'); ?></div>
                                            <div class="attribute__text"><?php the_field('attribute_size'); ?></div>
                                        </div>
                                    </div>
                                    <div class="card-item__column">
                                        <div class="card-item__price">
                                            <?php the_field('card-item_price'); ?> –.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-item__footer">
                                <a href="#product-<?php echo $i ?>" class="card-item__button button popup-link">Подробнее</a>
                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                }
                wp_reset_postdata(); // сброс
                ?>
            </div>
            <a href="#request" class="catalog__button button popup-link" data-whatever="Секция: Каталог, кнопка: Скачать каталог">Скачать каталог</a>
            
            <?php 
                // параметры по умолчанию
                $posts = get_posts( array(
                    'numberposts' => -1,
                    'category'    => 0,
                    'orderby'     => 'date',
                    'order'       => 'DESC',
                    'include'     => array(),
                    'exclude'     => array(),
                    'meta_key'    => '',
                    'meta_value'  =>'',
                    'post_type'   => 'product-item',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ));
                $j = 1;
                foreach( $posts as $key => $post ) {
                    setup_postdata($post);
                    ?>
                    <div id="product-<?php echo $j ?>" class="popup">
                        <div class="popup__body">
                            <div class="popup__content product-content">
                                <a href="" class="popup__close close-popup">
                                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L12 12" stroke="white" />
                                        <path d="M12 1L1 12" stroke="white" />
                                    </svg>

                                </a>
                                <div class="product-content__row">
                                    <div class="product-content__column product-content__column--first">
                                        <div class="product-content__name">
                                            <div class="product-content__title"><?php the_field('card-item_name'); ?></div>
                                            <div class="product-content__vendor"><?php the_field('product-content_vendor'); ?></div>
                                        </div>

                                        <div class="product-content__item-photoes item-photoes">
                                            <?php 
                                            $i = 1;
                                            $images=get_field('card-item_img_' . $i);
                                            while ($images) {
                                                ?>
                                                    <div class="item-photoes__item">
                                                        <img class="drift-demo-trigger" data-zoom-image="<?=$images['url'] ?>" src="<?php echo $images['url'] ?>" alt="">
                                                    </div>
                                                <?php
                                                $images=get_field('card-item_img_' . ++$i);
                                            }
                                            ?>
                                        </div>
                                        <span class="pagingInfo">Фото 1 из <?php echo $i-1; ?></span>
                                    </div>

                                    <div class="product-content__column product-content__column--second">
                                        <div class="product-content__name">
                                            <div class="product-content__title"><?php the_field('card-item_name'); ?></div>
                                            <div class="product-content__vendor">Артикул: <?php the_field('product-content_vendor'); ?></div>
                                        </div>

                                        <div class="product-content__wrapper">
                                            <div class="product-content__prices prices">
                                                <div class="prices__column product-content__column">
                                                    <div class="prices__title">Рекомендуемая <br> розничная цена</div>
                                                    <div class="prices__price"><?php the_field('card-item_price'); ?> –.</div>
                                                </div>
                                                <div class="prices__column product-content__column">
                                                    <div class="prices__title">Оптовая стоимость <br> по запросу</div>
                                                    <div class="prices__price"></div>
                                                </div>
                                            </div>

                                            <div class="product-content__attributes product-attributes">
                                                <div class="product-attributes__about about-attributes">
                                                    <div class="about-attributes__sex product-content__column">Пол: <span><?php the_field('attribute_sex'); ?></span>
                                                    </div>
                                                    <div class="about-attributes__season product-content__column">Сезон:
                                                        <span>Весна/Осень</span></div>
                                                </div>

                                                <div class="product-attributes__details details-attributes">
                                                    <div class="details-attributes__size size product-content__column">
                                                        <a href="#table-1" class="size__title popup-link">Таблица размеров</a>
                                                        <div class="size__row">
                                                            <?php 
                                                                $terms = get_terms( array(
                                                                    'taxonomy' => 'size',
                                                                    'orderby'       => 'slug', 
                                                                    'order'         => 'ASC',
                                                                    'object_ids' => get_the_ID(),
                                                                ));
                                                                if ($terms) {
                                                                    foreach ($terms as $cat) {
                                                                        echo "<div class='size__item'>{$cat->name}</div>";
                                                                    }
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>

                                                    <div class="details-attributes__color color product-content__column">
                                                        <div class="color__title">Цвет</div>
                                                        <div class="color__row">
                                                            <?php 
                                                                $terms = get_terms( array(
                                                                    'taxonomy' => 'color',
                                                                    'orderby'       => 'none', 
                                                                    'order'         => 'ASC',
                                                                    'object_ids' => get_the_ID(),
                                                                ));
                                                                if ($terms) {
                                                                    foreach ($terms as $cat) {
                                                                        echo "<div class='color__item' style='background-color: #$cat->name;'></div>";
                                                                    }
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content__buttons">
                                            <a href="#request" class="product-content__button button button-bg popup-link" data-whatever="Страница продукта Толстовка с капюшоном “Силы специльных операций”, кнопка Оптом">Оптом</a>
                                            <a href="#request" class="product-content__button button popup-link" data-whatever="Страница продукта Толстовка с капюшоном “Силы специльных операций”, кнопка В розницу">В
                                                розницу</a>
                                        </div>
                                        <a href="#delivery-1" class="product-content__delivery popup-link">Условия доставки и оплаты</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $j++;
                }
                wp_reset_postdata(); // сброс
            ?>
        </div>
    </section>

    <section class="conditions">
        <div class="conditions__container container">
            <div class="conditions__row">
                <div class="conditions__column conditions__column--first">
                    <h2 class="conditions__title angle-title anim-items"><?php the_field('conditions_title'); ?></h2>
                    <div class="conditions__text"><?php the_field('conditions_text'); ?></div>
                    <div class="conditions__buttons">
                        <a href="#request" class="conditions__button button button-bg popup-link" data-whatever="Секция <?php the_field('conditions_title'); ?>, кнопка Оптом">Оптом</a>
                        <a href="#request" class="conditions__button button popup-link" data-whatever="Секция <?php the_field('conditions_title'); ?>, кнопка В розницу">В розницу</a>
                    </div>
                </div>
                <div class="conditions__column">
                    <div class="conditions__img" data-da="conditions__column--first, 2, 767">
                        <img src="<?php echo get_template_directory_uri(); ?>/gurza/img/conditions/1.png" alt="">
                    </div>
                </div>
            </div>

            <div class="conditions__features features-conditions">
                <?php 
                for ($i=1; $i < 4; $i++) { 
                    ?>
                    <div class="features-conditions__item">
                        <div class="features-conditions__icon">
                            <?php $image = get_field('features-conditions_icon-' . $i); ?>
                            <img src="<?php echo $image['url'] ?>" alt="<?php $image['alt'] ?>">
                        </div>
                        <div class="features-conditions__title"><?php the_field('features-conditions_title-' . $i); ?></div>
                        <div class="features-conditions__text"><?php the_field('features-conditions_text-' . $i); ?></div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>

    <section class="conditions markup">
        <div class="conditions__container container">
            <div class="conditions__row">
                <div class="conditions__column conditions__column--first">
                    <h2 class="conditions__title angle-title anim-items"><?php the_field('conditions_title_1'); ?></h2>
                    <div class="conditions__text"><?php the_field('conditions_text_2'); ?></div>
                </div>
                <div class="conditions__column">
                </div>
            </div>
            <div class="markup__features features-markup">
                <div class="features-markup__item">
                    <div class="features-markup__body">
                        <div class="features-markup__icon">
                            <?php $image = get_field('features-markup_icon_1'); ?>
                            <img src="<?php echo $image['url'] ?>" alt="<?php $image['alt'] ?>">
                        </div>
                        <div class="features-markup__title"><?php the_field('features-markup_title_1'); ?></div>
                        <div class="card-item__right">
                            <div class="d-flex">
                                <div class="card-item__point"></div>
                                <div class="card-item__wrapper">
                                    <div class="card-item__rect-vert"></div>
                                    <div class="card-item__point"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-item__bottom-right">
                            <div class="d-flex">
                                <div class="card-item__point"></div>
                                <div class="card-item__rect"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="features-markup__item">
                    <div class="features-markup__body">
                        <div class="features-markup__icon">
                            <?php $image = get_field('features-markup_icon_2'); ?>
                            <img src="<?php echo $image['url'] ?>" alt="<?php $image['alt'] ?>">
                        </div>
                        <div class="features-markup__title"><?php the_field('features-markup_title_2'); ?></div>

                        <div class="card-item__right">
                            <div class="d-flex">
                                <div class="card-item__rect"></div>
                                <div class="card-item__point"></div>
                            </div>
                        </div>
                        <div class="card-item__bottom-right">
                            <div class="card-item__point"></div>
                            <div class="card-item__point"></div>
                        </div>
                    </div>
                </div>

                <div class="features-markup__item">
                    <div class="features-markup__body">
                        <div class="features-markup__icon">
                            <?php $image = get_field('features-markup_icon_3'); ?>
                            <img src="<?php echo $image['url'] ?>" alt="<?php $image['alt'] ?>">
                        </div>
                        <div class="features-markup__title"><?php the_field('features-markup_title_3'); ?></div>

                        <div class="card-item__right">
                            <div class="d-flex">
                                <div class="card-item__point"></div>
                                <div class="card-item__point"></div>
                            </div>
                        </div>
                        <div class="card-item__bottom-right">
                            <div class="card-item__point"></div>
                            <div class="card-item__rect"></div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#request" class="markup__button button button-bg popup-link" data-whatever="Секция <?php the_field('conditions_title_1'); ?>, кнопка Получить предложение">Получить
                предложение</a>
        </div>
    </section>

    <section class="rashguard">
        <div class="rashguard__top">
            <div class="rashguard__container rashguard__container--top container">
                <div class="rashguard__wrapper">
                    <div class="rashguard__photoes">
                    <?php
                        // параметры по умолчанию
                        $posts = get_posts(array(
                            'numberposts' => -1,
                            'category_name'    => 'rashguard',
                            'orderby'     => 'date',
                            'order'       => 'ASC',
                            'post_type'   => 'post',
                            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                        ));

                        foreach ($posts as $post) {
                            setup_postdata($post);
                            ?>
                            <div class="rashguard__item">
                                <?php $image = get_field('rashguard_item'); ?>
                                <img src="<?php echo $image['url'] ?>" alt="<?php $image['alt'] ?>">
                            </div>
                            <?
                        }
                        wp_reset_postdata(); // сброс
				    ?>
                    </div>

                    <div class="rashguard__aim">
                        <img src="<?php echo get_template_directory_uri(); ?>/gurza/img/rashguard/aim.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="rashguard__bottom">
            <div class="rashguard__container container">
                <div class="rashguard__row rashguard__features">
                    
                <?php 
                for ($i=1; $i < 5; $i++) { 
                    ?>
                    <div class="rashguard__card">
                        <div class="rashguard__icon">
                            <?php $image = get_field('rashguard_icon_' . $i); ?>
                            <img src="<?php echo $image['url'] ?>" alt="<?php $image['alt'] ?>">
                        </div>
                        <div class="rashguard__title"><?php the_field('rashguard_title_' . $i); ?></div>
                        <div class="rashguard__text"><?php the_field('rashguard_text_' . $i); ?></div>
                    </div>
                    <?php
                }
                ?>

                </div>
            </div>
        </div>
    </section>

    <section id="partnership" class="partnership">
        <div class="partnership__container container">
            <div class="partnership__row">
                <div class="partnership__column partnership__column--first">
                    <h2 class="partnership__title title title-with-points"><?php the_field('partnership_title'); ?></h2>
                    <?php 
                        for ($i=1; $i < 6; $i++) { 
                            ?>
                            <div class="partnership__text-wrapper">
                                <div class="partnership__subtitle"><?php the_field('partnership_subtitle_' . $i); ?></div>
                                <div class="partnership__text"><?php the_field('partnership_text_' . $i); ?></div>
                            </div>
                            <?php
                        }
                    ?>
                    <div class="partnership__pendant">
                        <img src="<?php echo get_template_directory_uri(); ?>/gurza/img/partnership/2.png" alt="">
                    </div>
                    <a href="#request" class="partnership__button button button-bg popup-link" data-whatever="Секция Стать партнером, кнопка Стать партнером">Стать партнером</a>
                </div>
                <div class="partnership__column partnership__column--second">
                    <div class="partnership__img">
                        <img src="<?php echo get_template_directory_uri(); ?>/gurza/img/partnership/1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shop">
        <div class="shop__container container">
            <div class="shop__wrapper">
                <h2 class="shop__title title"><?php the_field('shop_title'); ?></h2>
                <div class="shop__text"><?php the_field('shop_text'); ?>
                </div>
                <a href="#request" class="shop__button button popup-link" data-whatever="Секция <?php the_field('shop_title'); ?>, кнопка Список партнеров">Список партнеров</a>
            </div>
        </div>
        <div class="shop__bg">
            <img src="<?php echo get_template_directory_uri(); ?>/gurza/img/shop/bg-small.png" alt="">
        </div>

        <div class="shop__aim aim first-screen__absolute">
            <div class="aim__first">
                <div class="aim__second"></div>
            </div>
        </div>

        <div class="shop__line-container anim-items anim-no-hide">
            <div id="line1" class="line"></div>
            <div id="line2" class="line"></div>
            <div id="line3" class="line"></div>
            <div id="line4" class="line"></div>
            <div id="line5" class="line"></div>
            <div id="line6" class="line"></div>
            <div id="line7" class="line"></div>
            <div id="line8" class="line"></div>
            <div id="line9" class="line"></div>
            <div id="line10" class="line"></div>
            <div id="line11" class="line"></div>
            <div id="line12" class="line"></div>
            <div id="line13" class="line"></div>
            <div id="line14" class="line"></div>
            <div id="line15" class="line"></div>
            <div id="line16" class="line"></div>
            <div id="line17" class="line"></div>
            <div id="line18" class="line"></div>
            <div id="line19" class="line"></div>
            <div id="line20" class="line"></div>
            <div id="line21" class="line"></div>
            <div id="line22" class="line"></div>
            <div id="line23" class="line"></div>
            <div id="line24" class="line"></div>
        </div>

        <div class="shop__chevron-container">
            <div id="shop__chevron1" class="shop__chevron shop__chevron--1 anim-items anim-no-hide">
            </div>
            <div id="shop__chevron2" class="shop__chevron shop__chevron--2 anim-items anim-no-hide">
            </div>
            <div id="shop__chevron3" class="shop__chevron shop__chevron--3 anim-items anim-no-hide">
            </div>
            <div id="shop__chevron4" class="shop__chevron shop__chevron--4 anim-items anim-no-hide">
            </div>
            <div id="shop__chevron5" class="shop__chevron shop__chevron--5 anim-items anim-no-hide">
            </div>
            <div id="shop__chevron6" class="shop__chevron shop__chevron--6 anim-items anim-no-hide">
            </div>
            <div id="shop__chevron7" class="shop__chevron shop__chevron--7 anim-items anim-no-hide">
            </div>
            <div id="shop__chevron8" class="shop__chevron shop__chevron--8 anim-items anim-no-hide">
            </div>
            <div id="shop__chevron9" class="shop__chevron shop__chevron--9 anim-items anim-no-hide">
            </div>
            <div id="shop__chevron10" class="shop__chevron shop__chevron--10 anim-items anim-no-hide">
            </div>
            <div id="shop__chevron11" class="shop__chevron shop__chevron--11 anim-items anim-no-hide">
            </div>
            <div id="shop__chevron12" class="shop__chevron shop__chevron--12 anim-items anim-no-hide">
            </div>
            <div id="shop__chevron13" class="shop__chevron shop__chevron--13 anim-items anim-no-hide">
            </div>
            <div id="shop__chevron14" class="shop__chevron shop__chevron--14 anim-items anim-no-hide">
            </div>
        </div>

    </section>

    <section class="mail">
        <div class="mail__container container">
            <div class="mail__wrapper">
                <h2 class="mail__title title title-with-points"><?php the_field('mail_title'); ?></h2>
                <div class="mail__text"><?php the_field('mail_text'); ?></div>
            </div>

            <form class="mail__form" enctype="multipart/form-data" method="POST" id="form">
                <!-- hidden -->
                <input type="hidden" name="MAX_FILE_SIZE" value="20000000">
                <!-- hidden -->
                <div class="mail__row">
                    <div class="input-wrapper">
                        <input type="text" name="name" id="mail__name" class="input-wrapper__text" placeholder="Имя" required>
                    </div>

                    <div class="input-wrapper">
                        <input type="text" name="phone" id="mail__phone" class="input-wrapper__text mask-phone" placeholder="Телефон" required>
                    </div>

                    <div class="input-wrapper">
                        <input type="email" name="email" id="mail__email" class="input-wrapper__text" placeholder="Почта" required>
                    </div>
                </div>

                <div class="mail__row">
                    <div class="input-wrapper input-wrapper--textarea">
                        <textarea name="text" placeholder="Комментарий" class="input-wrapper__text input-wrapper__textarea"></textarea>
                    </div>

                    <div class="input-wrapper input-wrapper--file">
                        <input type="file" class="file" name="myfile[]" id="myfile" data-jcf='{"buttonText": "", "placeholderText": "Прикрепить файл"}' />
                    </div>

                    <div class="input-wrapper">
                        <button class="mail__button button button-bg" type="submit">Отправить</button>
                    </div>
                </div>

                <div class="mail__policy">Я принимаю условия <a class="accent popup-link" href="#policy">пользовательского соглашения</a> и согласен на обработку персональных данных
                </div>
            </form>
        </div>
    </section>

    <section class="review">
        <div class="review__container container">
            <h2 class="review__title title title-with-points">Отзывы наших клиентов</h2>

            <div class="review__cards">
                <?php
                    // параметры по умолчанию
                    $posts = get_posts(array(
                        'numberposts' => -1,
                        'category_name'    => 'review',
                        'orderby'     => 'date',
                        'order'       => 'ASC',
                        'post_type'   => 'post',
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    ));

                    foreach ($posts as $post) {
                        setup_postdata($post);
                        ?>
                        <div class="review__card">
                            <div class="review__body">
                                <div class="review__text"><?php the_field('review_text'); ?></div>
                                <div class="review__author author-review">
                                    <div class="author-review__wrapper">
                                        <div class="author-review__name"><?php the_field('author-review_name'); ?></div>
                                        <div class="author-review__post"><?php the_field('author-review_post'); ?></div>
                                    </div>
                                    <div class="author-review__photo">
                                        <?php $image = get_field('avatar_avtora'); ?>
                                        <img src="<?php echo $image['url'] ?>" alt="<?php $image['alt'] ?>">
                                    </div>
                                    <div class="card-item__bottom-left">
                                        <div class="card-item__point"></div>
                                        <div class="d-flex">
                                            <div class="card-item__rect"></div>
                                            <div class="card-item__point"></div>
                                        </div>
                                    </div>
                                    <div class="card-item__right">
                                        <div class="d-flex">
                                            <div class="card-item__point"></div>
                                            <div class="card-item__rect-vert"></div>
                                        </div>
                                        <div class="card-item__point"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?
                    }
                    wp_reset_postdata(); // сброс
                ?>
            </div>
        </div>
    </section>

    <section class="faq">
        <div class="faq__container container">
            <h2 class="faq__title title title-with-points">Часто задаваемые вопросы</h2>
            <div class="faq__accordion accordion accordion-one">
            
            <?php
                    // параметры по умолчанию
                    $posts = get_posts(array(
                        'numberposts' => -1,
                        'category_name'    => 'faq',
                        'orderby'     => 'date',
                        'order'       => 'ASC',
                        'post_type'   => 'post',
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    ));

                    foreach ($posts as $post) {
                        setup_postdata($post);
                        ?>
                        <div class="accordion__item">
                            <h2 class="accordion__title"><?php the_title(); ?></h2>
                            <div class="accordion__text"><?php the_field('faq_accordion_text'); ?></div>
                         </div>
                        <?
                    }
                    wp_reset_postdata(); // сброс
                ?>
            </div>
        </div>
    </section>

    <section id="contacts" class="contacts">
        <div class="contacts__container container">
            <h2 class="contacts__title title angle-title anim-items"><?php the_field('contacts_title'); ?></h2>
            <div class="contacts__row">
                <div class="contacts__column contacts__column--first">
                    <div class="contacts__text">
                       <?php the_field('contacts_text'); ?>
                    </div>
                </div>
                <div class="contacts__column contacts__column--second">
                    <div class="contacts__contact contact">
                        <div class="contact__title">Контакты</div>
                        <div class="contact__text contact__text--address"><?php the_field('contact_text--address') ?></div>
                        <div class="contact__text contact__text--mail">
                            <a href="mailto:<?php the_field('contact_text--mail', 8); ?>" class="contact__link"><?php the_field('contact_text--mail', 8) ?></a>
                        </div>
                        <div class="contact__text contact__text--phone">
                            <a class="contact__link" href="tel:<?php
                                                                $field = get_field('contact_text--phone', 8);
                                                                $field = preg_replace("/[^0-9]/", '', $field);
                                                                print_r('+' . $field);
                                                                ?>"><?php the_field('contact_text--phone', 8) ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="instagram">
        <div class="instagram__container container">
            <div class="instagram__top">
                <h2 class="instagram__title title"><?php the_field('instagram_title'); ?></h2>
                <div class="instagram__text"><?php the_field('instagram_text'); ?></div>
                <div class="elfsight-app-87acf53a-00c3-43b6-8933-5c9441663a02"></div>
            </div>

            <div class="instagram__footer">
                <div class="footer__text">Становись партнером и продавай продукцию с наценкой до 100%</div>
                <a href="#request" class="footer__button button button-bg popup-link" data-whatever="Секция Становись партнером и продавай продукцию с наценкой до 100%, кнопка Получить предложение">Получить
                    предложение</a>
                <div class="footer__social social" data-da="footer__body, 1, 767">
                    <div class="social__item">
                        <a href="<?php the_field('social_item--youtube', 8); ?>">
                            <svg width="36" height="37" viewBox="0 0 36 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M27.9398 6.05176H8.65254C4.86841 6.05176 1.80078 9.17872 1.80078 13.036V22.8641C1.80078 26.7214 4.86841 29.8484 8.65254 29.8484H27.9398C31.7239 29.8484 34.7915 26.7214 34.7915 22.8641V13.036C34.7915 9.17872 31.7239 6.05176 27.9398 6.05176ZM23.306 18.4282L14.2847 22.814C14.0443 22.9309 13.7667 22.7523 13.7667 22.4808V13.4351C13.7667 13.1598 14.0516 12.9813 14.2925 13.1058L23.3138 17.7657C23.582 17.9043 23.5774 18.2963 23.306 18.4282Z" fill="white" />
                            </svg>
                        </a>
                    </div>
                    <div class="social__item"><a href="<?php the_field('social_item--vk', 8); ?>">
                            <svg width="37" height="22" viewBox="0 0 37 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M36.8038 19.4011C36.759 19.3071 36.7172 19.2292 36.6784 19.1668C36.0365 18.0418 34.8097 16.6611 32.9989 15.0241L32.9607 14.9866L32.9415 14.9682L32.9221 14.9494H32.9027C32.0809 14.1871 31.5604 13.6746 31.3425 13.4122C30.9437 12.9123 30.8544 12.4063 31.0723 11.8937C31.2263 11.5063 31.8047 10.6883 32.8061 9.43855C33.3329 8.7762 33.7501 8.24535 34.0582 7.84541C36.2802 4.97123 37.2435 3.1346 36.948 2.33478L36.8332 2.14787C36.7561 2.03535 36.557 1.93241 36.2363 1.83853C35.9149 1.74484 35.504 1.72935 35.003 1.79178L29.455 1.82907C29.3652 1.79809 29.2368 1.80097 29.0696 1.83853C28.9026 1.87608 28.8191 1.89492 28.8191 1.89492L28.7225 1.94186L28.6459 1.99825C28.5817 2.03554 28.511 2.10113 28.4339 2.19488C28.3572 2.2883 28.293 2.39793 28.2417 2.52287C27.6377 4.03486 26.9509 5.44063 26.1802 6.74012C25.705 7.51499 25.2685 8.18653 24.87 8.75512C24.472 9.32353 24.138 9.74231 23.8685 10.0108C23.5986 10.2795 23.3551 10.4947 23.1363 10.6573C22.9179 10.82 22.7512 10.8888 22.6357 10.8636C22.52 10.8385 22.411 10.8135 22.3079 10.7886C22.1282 10.6761 21.9836 10.523 21.8747 10.3294C21.7652 10.1357 21.6915 9.89193 21.653 9.59827C21.6147 9.30442 21.592 9.05167 21.5855 8.83916C21.5795 8.62691 21.5823 8.32669 21.5953 7.93935C21.6087 7.55182 21.6147 7.28961 21.6147 7.15214C21.6147 6.67722 21.6242 6.1618 21.6433 5.60574C21.6627 5.04968 21.6785 4.6091 21.6916 4.28453C21.7047 3.95962 21.7108 3.61588 21.7108 3.25349C21.7108 2.8911 21.6881 2.6069 21.6433 2.40062C21.599 2.19461 21.5311 1.99464 21.4416 1.80078C21.3515 1.60711 21.2196 1.45729 21.0466 1.35094C20.8733 1.24472 20.6578 1.16042 20.4013 1.09779C19.7206 0.947913 18.8537 0.866834 17.8004 0.854229C15.4117 0.829282 13.8769 0.979359 13.1962 1.30426C12.9265 1.44154 12.6825 1.6291 12.4643 1.86636C12.233 2.14137 12.2008 2.29145 12.3677 2.31613C13.1384 2.42846 13.684 2.69717 14.0051 3.12199L14.1208 3.34711C14.2108 3.50953 14.3007 3.79707 14.3907 4.20936C14.4805 4.62164 14.5384 5.07772 14.5639 5.57732C14.628 6.48966 14.628 7.27064 14.5639 7.92031C14.4996 8.57025 14.4389 9.07622 14.3809 9.43861C14.323 9.801 14.2363 10.0947 14.1208 10.3195C14.0051 10.5444 13.9281 10.6819 13.8895 10.7318C13.851 10.7817 13.8189 10.8131 13.7934 10.8255C13.6264 10.8877 13.4528 10.9194 13.2732 10.9194C13.0932 10.9194 12.875 10.8318 12.6182 10.6568C12.3614 10.4818 12.095 10.2414 11.8188 9.93519C11.5426 9.62893 11.2312 9.20096 10.8843 8.6512C10.5377 8.10144 10.1781 7.4517 9.8056 6.70197L9.49744 6.15826C9.3048 5.80847 9.04165 5.29916 8.70772 4.63077C8.37359 3.96212 8.07826 3.31533 7.82152 2.69054C7.71889 2.42813 7.56471 2.22836 7.35926 2.09089L7.26284 2.03449C7.19874 1.9846 7.09584 1.93162 6.95468 1.87516C6.81332 1.81876 6.66583 1.77832 6.51158 1.75344L1.23316 1.79073C0.693768 1.79073 0.327789 1.90963 0.135083 2.14708L0.0579602 2.25941C0.0194325 2.32198 0 2.4219 0 2.55943C0 2.69691 0.0385277 2.86563 0.11565 3.0654C0.886204 4.82746 1.72416 6.52682 2.62953 8.16375C3.5349 9.80067 4.32164 11.1193 4.9893 12.1183C5.65709 13.1181 6.33777 14.0617 7.03133 14.9487C7.7249 15.8359 8.18399 16.4045 8.40861 16.6543C8.6335 16.9046 8.81015 17.0917 8.93855 17.2166L9.42025 17.6664C9.72847 17.9663 10.1811 18.3256 10.7783 18.7441C11.3756 19.1629 12.037 19.5752 12.7626 19.9816C13.4883 20.3874 14.3326 20.7185 15.296 20.9746C16.2591 21.231 17.1966 21.3339 18.1085 21.2842H20.324C20.7733 21.2465 21.1137 21.109 21.3451 20.8718L21.4217 20.7778C21.4733 20.7032 21.5215 20.5874 21.566 20.4314C21.6111 20.2753 21.6335 20.1032 21.6335 19.916C21.6204 19.3788 21.6624 18.8946 21.7585 18.4636C21.8545 18.0326 21.9639 17.7077 22.0863 17.4889C22.2087 17.2703 22.3467 17.0858 22.5004 16.9363C22.6543 16.7864 22.764 16.6956 22.8284 16.6644C22.8924 16.6329 22.9435 16.6116 22.982 16.5988C23.2902 16.4989 23.653 16.5956 24.0707 16.8895C24.4882 17.1832 24.8798 17.5458 25.246 17.9767C25.6121 18.408 26.0519 18.8919 26.5655 19.4292C27.0794 19.9666 27.5288 20.3661 27.9139 20.6289L28.2991 20.8538C28.5563 21.0038 28.8902 21.1413 29.3013 21.2663C29.7116 21.3911 30.0711 21.4224 30.3798 21.3599L35.3112 21.2851C35.799 21.2851 36.1786 21.2065 36.4478 21.0506C36.7175 20.8944 36.8778 20.7223 36.9295 20.5352C36.981 20.3478 36.9838 20.1352 36.9393 19.8976C36.8936 19.6605 36.8486 19.4947 36.8038 19.4011Z" fill="white" />
                            </svg>
                        </a></div>
                    <div class="social__item"><a href="<?php the_field('social_item--facebook', 8); ?>">
                            <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M27.0058 3.32845L23.0414 3.32227C18.5874 3.32227 15.7091 6.19556 15.7091 10.6427V14.018H11.723C11.3785 14.018 11.0996 14.2897 11.0996 14.6248V19.5151C11.0996 19.8503 11.3789 20.1217 11.723 20.1217H15.7091V32.4615C15.7091 32.7966 15.988 33.068 16.3325 33.068H21.5332C21.8776 33.068 22.1565 32.7963 22.1565 32.4615V20.1217H26.8172C27.1617 20.1217 27.4406 19.8503 27.4406 19.5151L27.4425 14.6248C27.4425 14.4639 27.3767 14.3098 27.2599 14.1959C27.1432 14.082 26.9842 14.018 26.8188 14.018H22.1565V11.1567C22.1565 9.78152 22.4934 9.08339 24.3345 9.08339L27.0052 9.08246C27.3493 9.08246 27.6282 8.81076 27.6282 8.47593V3.93499C27.6282 3.60047 27.3496 3.32907 27.0058 3.32845Z" fill="white" />
                            </svg>
                        </a></div>
                    <div class="social__item"><a href="<?php the_field('social_item--inst', 8); ?>">
                            <svg width="36" height="37" viewBox="0 0 36 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.7591 18.6184C22.7591 21.2667 20.6128 23.4134 17.9645 23.4134C15.317 23.4134 13.17 21.2667 13.17 18.6184C13.17 15.9705 15.317 13.8239 17.9645 13.8239C20.6128 13.8239 22.7591 15.9705 22.7591 18.6184Z" fill="white" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M31.5896 9.21411C32.0168 10.3461 32.2429 11.5432 32.2593 12.7523C32.3474 14.2733 32.3482 14.7707 32.3513 18.6215V18.6742C32.3513 22.5749 32.331 23.0618 32.2624 24.5976C32.2382 25.7935 32.0129 26.9719 31.5935 28.0894C31.2232 29.0436 30.658 29.9106 29.9337 30.6344C29.2103 31.3583 28.3433 31.9231 27.3891 32.2934C26.2719 32.7128 25.0916 32.9389 23.8988 32.9623C22.3739 33.052 21.8742 33.052 17.9754 33.052C14.0767 33.052 13.5894 33.0309 12.052 32.9623C10.8569 32.9229 9.67737 32.6801 8.56333 32.2439C7.60909 31.8744 6.7414 31.3099 6.01793 30.5861C5.29368 29.8626 4.72847 28.9961 4.35816 28.0415C3.93796 26.9223 3.71265 25.744 3.68926 24.5496C3.59961 23.0236 3.59961 22.5254 3.59961 18.6262C3.59961 14.7274 3.62066 14.2406 3.68926 12.7028C3.71187 11.5104 3.93796 10.3305 4.35816 9.21411C4.72769 8.25949 5.29212 7.39257 6.01637 6.66871C6.73984 5.94486 7.60754 5.38004 8.56177 5.0105C9.67815 4.59108 10.8585 4.36461 12.0505 4.33966C13.5754 4.25195 14.0751 4.25195 17.9739 4.25195C20.4125 4.25195 21.5164 4.25936 22.3771 4.28197C22.8924 4.29522 23.3204 4.31393 23.8957 4.33966C25.0885 4.36422 26.2688 4.59108 27.386 5.0105C27.7641 5.15707 28.129 5.33443 28.4767 5.54024C29.0052 5.85325 29.494 6.23253 29.9314 6.6691C30.3001 7.03786 30.6276 7.44364 30.909 7.87904C31.1795 8.29886 31.408 8.74596 31.5896 9.21411ZM10.5833 18.6184C10.5833 22.6961 13.8864 25.9997 17.9645 25.9997C19.9221 25.9997 21.7994 25.222 23.184 23.8375C24.5677 22.4533 25.3458 20.576 25.3458 18.6184C25.3458 16.6609 24.5677 14.7832 23.184 13.399C21.7994 12.0148 19.9221 11.2372 17.9645 11.2372C13.8864 11.2372 10.5833 14.5407 10.5833 18.6184ZM23.9183 10.9643C23.9183 11.9158 24.6862 12.6853 25.6397 12.6853C26.5892 12.6853 27.3587 11.9158 27.3587 10.9643C27.3587 10.7382 27.3143 10.5145 27.2277 10.3059C27.1412 10.097 27.0149 9.90757 26.8551 9.74775C26.6953 9.58793 26.5058 9.46124 26.2969 9.37471C26.088 9.28817 25.8642 9.24374 25.6389 9.24374C25.4128 9.24374 25.1891 9.28817 24.9802 9.37471C24.7712 9.46124 24.5818 9.58793 24.422 9.74775C24.2621 9.90757 24.1358 10.097 24.0493 10.3059C23.9628 10.5145 23.9183 10.7382 23.9183 10.9643Z" fill="white" />
                            </svg>
                        </a></div>
                </div>
            </div>
        </div>
        <div class="instagram__aim aim first-screen__absolute">
            <div class="aim__first">
                <div class="aim__second"></div>
            </div>
        </div>
    </section>

    <a class="up-btn" href="">
        <span></span>
    </a>

    <div>
        <div id="table-1" class="popup">
            <div class="popup__body">
                <div class="popup__content table-content">
                    <a href="#product-1" class="popup__back popup-link">
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.5 7L1.5 9L3.5 11" stroke="white" stroke-miterlimit="10" stroke-linecap="square" />
                            <path d="M2 9H14.5V13" stroke="white" stroke-miterlimit="10" stroke-linecap="square" />
                        </svg>
                        <span>Назад</span>
                    </a>

                    <a href="" class="popup__close close-popup">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L12 12" stroke="white" />
                            <path d="M12 1L1 12" stroke="white" />
                        </svg>
                    </a>
                    <h1 class="table-content__title">Толстовки мужские</h1>
                    <div class="table-content__table size-table">
                        <div class="size-table__column">
                            <div class="size-table__title">Российский размер</div>
                            <div class="size-table__text">46</div>
                            <div class="size-table__text">48</div>
                            <div class="size-table__text">50</div>
                            <div class="size-table__text">52</div>
                            <div class="size-table__text">54</div>
                            <div class="size-table__text">56</div>
                            <div class="size-table__text">58</div>
                            <div class="size-table__text">60</div>
                        </div>

                        <div class="size-table__column">
                            <div class="size-table__title">Обхват груди, в см</div>
                            <div class="size-table__text">92</div>
                            <div class="size-table__text">96</div>
                            <div class="size-table__text">100</div>
                            <div class="size-table__text">104</div>
                            <div class="size-table__text">108</div>
                            <div class="size-table__text">112</div>
                            <div class="size-table__text">116</div>
                            <div class="size-table__text">120</div>
                        </div>

                        <div class="size-table__column">
                            <div class="size-table__title">Обхват талии, в см</div>
                            <div class="size-table__text">80</div>
                            <div class="size-table__text">84</div>
                            <div class="size-table__text">88</div>
                            <div class="size-table__text">92</div>
                            <div class="size-table__text">96</div>
                            <div class="size-table__text">100</div>
                            <div class="size-table__text">104</div>
                            <div class="size-table__text">108</div>
                        </div>

                        <div class="size-table__column">
                            <div class="size-table__title">Обхват бедер, в см</div>
                            <div class="size-table__text">92</div>
                            <div class="size-table__text">96</div>
                            <div class="size-table__text">100</div>
                            <div class="size-table__text">104</div>
                            <div class="size-table__text">108</div>
                            <div class="size-table__text">112</div>
                            <div class="size-table__text">116</div>
                            <div class="size-table__text">120</div>
                        </div>

                        <div class="size-table__column">
                            <div class="size-table__title">Размер производителя</div>
                            <div class="size-table__text">S</div>
                            <div class="size-table__text">M</div>
                            <div class="size-table__text">L</div>
                            <div class="size-table__text">XL</div>
                            <div class="size-table__text">2XL</div>
                            <div class="size-table__text">3XL</div>
                            <div class="size-table__text">4XL</div>
                            <div class="size-table__text">5XL</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="delivery-1" class="popup">
            <div class="popup__body">
                <div class="popup__content delivery-content">
                    <a href="#product-1" class="popup__back popup-link">
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.5 7L1.5 9L3.5 11" stroke="white" stroke-miterlimit="10" stroke-linecap="square" />
                            <path d="M2 9H14.5V13" stroke="white" stroke-miterlimit="10" stroke-linecap="square" />
                        </svg>
                        <span>Назад</span>
                    </a>

                    <a href="" class="popup__close close-popup">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L12 12" stroke="white" />
                            <path d="M12 1L1 12" stroke="white" />
                        </svg>
                    </a>
                    <h1 class="delivery-content__title">Доставка и возврат</h1>

                    <div class="delivery-content__wrapper">
                        <div class="delivery-content__subtitle">1. Покупка</div>
                        <div class="delivery-content__text">Цены на Товары, размещенные в Интернет-магазине на сайте указывается
                            в рублях Российской Федерации.</div>
                        <div class="delivery-content__text">Оплата стоимости товара и доставки осуществляется Покупателем в
                            рублях Российской Федерации при помощи одного из способов, указанных в форме заказа.</div>
                        <div class="delivery-content__text">Общая стоимость Заказа формируется на основании стоимости всех
                            заказанных Товаров, включая стоимость доставки Заказа.</div>
                        <div class="delivery-content__text">С момента размещения Покупателем Заказа, цена на Товар изменению не
                            подлежит.</div>
                        <div class="delivery-content__text">Пункт самовывоза в г. Москва: ул. Новодмитровская дом 1, строение 6.
                        </div>
                    </div>

                    <div class="delivery-content__wrapper">
                        <div class="delivery-content__subtitle">2. Доставка</div>
                        <div class="delivery-content__text">По Москве и в населенные пункты Московской области в пределах МКАД
                            осуществляется нашими курьерами. Стоимость доставки – 450 руб., при сумме заказа от 15 000 рублей –
                            бесплатно.</div> <br>
                        <div class="delivery-content__text">В населенные пункты Московской области, расположенные от МКАД, а
                            также другие города и страны СНГ доставка осуществляется с помощью компании СДЭК. Стоимость доставки
                            насчитывается по факту оформления заказа согласно тарифам транспортной компании. Обращаем Ваше
                            внимание, что доставка для регионов, где отсутствует услуга «Наложенный платеж», осуществляется
                            только при полной предоплате.</div>
                    </div>

                    <div class="delivery-content__wrapper">
                        <div class="delivery-content__subtitle">3. Примерка</div>
                        <div class="delivery-content__text">В Москве Вы можете примерить вещи из вашего заказа в момент доставки
                            курьером и оплатить только те товары, которые вам подошли. При полном отказе от заказа оплачивается
                            только стоимость доставки. </div> <br>
                        <div class="delivery-content__text">Доставка в населенные пункты Московской области, а также другие
                            города и страны СНГ услугу «Примерка» не предусматривает. </div>
                    </div>

                    <div class="delivery-content__wrapper">
                        <div class="delivery-content__subtitle">4. Возврат</div>
                        <div class="delivery-content__text">Возврат товара, сохранившего свой первоначальный вид, фабричные
                            ярлыки, пломбы и т. д., может быть совершен в течение 14 календарных дней после его доставки.
                            Необходимо будет заполнить бланк возврата, приложив к нему чек или скриншот заказа из почты -
                            документ подтверждающий покупку в нашем магазине. Возврат денежных средств осуществляется в течение
                            10 рабочих дней. В случае, если Вы захотите поменять товар на другой, нужно будет произвести возврат
                            ранее купленного артикула и обменять его на новый. Возврат можно осуществить по адресу: г. Москва,
                            ул. Новодмитровская д. 1, стр. 6. Возврат из регионов осуществляется собственными силами, покупатель
                            оформляет доставку до магазина в Москве с заполненным бланком возврата. Бланк возврата можно так же,
                            прислать на почту shop.daniillandar@gmail.com, указав номер заказа и номер накладной отправленной
                            посылки.</div>
                    </div>
                </div>
            </div>
        </div>

        <div id="table-2" class="popup">
            <div class="popup__body">
                <div class="popup__content table-content">
                    <a href="#product-2" class="popup__back popup-link">
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.5 7L1.5 9L3.5 11" stroke="white" stroke-miterlimit="10" stroke-linecap="square" />
                            <path d="M2 9H14.5V13" stroke="white" stroke-miterlimit="10" stroke-linecap="square" />
                        </svg>
                        <span>Назад</span>
                    </a>

                    <a href="" class="popup__close close-popup">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L12 12" stroke="white" />
                            <path d="M12 1L1 12" stroke="white" />
                        </svg>
                    </a>
                    <h1 class="table-content__title">Толстовки мужские</h1>
                    <div class="table-content__table size-table">
                        <div class="size-table__column">
                            <div class="size-table__title">Российский размер</div>
                            <div class="size-table__text">46</div>
                            <div class="size-table__text">48</div>
                            <div class="size-table__text">50</div>
                            <div class="size-table__text">52</div>
                            <div class="size-table__text">54</div>
                            <div class="size-table__text">56</div>
                            <div class="size-table__text">58</div>
                            <div class="size-table__text">60</div>
                        </div>

                        <div class="size-table__column">
                            <div class="size-table__title">Обхват груди, в см</div>
                            <div class="size-table__text">92</div>
                            <div class="size-table__text">96</div>
                            <div class="size-table__text">100</div>
                            <div class="size-table__text">104</div>
                            <div class="size-table__text">108</div>
                            <div class="size-table__text">112</div>
                            <div class="size-table__text">116</div>
                            <div class="size-table__text">120</div>
                        </div>

                        <div class="size-table__column">
                            <div class="size-table__title">Обхват талии, в см</div>
                            <div class="size-table__text">80</div>
                            <div class="size-table__text">84</div>
                            <div class="size-table__text">88</div>
                            <div class="size-table__text">92</div>
                            <div class="size-table__text">96</div>
                            <div class="size-table__text">100</div>
                            <div class="size-table__text">104</div>
                            <div class="size-table__text">108</div>
                        </div>

                        <div class="size-table__column">
                            <div class="size-table__title">Обхват бедер, в см</div>
                            <div class="size-table__text">92</div>
                            <div class="size-table__text">96</div>
                            <div class="size-table__text">100</div>
                            <div class="size-table__text">104</div>
                            <div class="size-table__text">108</div>
                            <div class="size-table__text">112</div>
                            <div class="size-table__text">116</div>
                            <div class="size-table__text">120</div>
                        </div>

                        <div class="size-table__column">
                            <div class="size-table__title">Размер производителя</div>
                            <div class="size-table__text">S</div>
                            <div class="size-table__text">M</div>
                            <div class="size-table__text">L</div>
                            <div class="size-table__text">XL</div>
                            <div class="size-table__text">2XL</div>
                            <div class="size-table__text">3XL</div>
                            <div class="size-table__text">4XL</div>
                            <div class="size-table__text">5XL</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="delivery-2" class="popup">
            <div class="popup__body">
                <div class="popup__content delivery-content">
                    <a href="#product-2" class="popup__back popup-link">
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.5 7L1.5 9L3.5 11" stroke="white" stroke-miterlimit="10" stroke-linecap="square" />
                            <path d="M2 9H14.5V13" stroke="white" stroke-miterlimit="10" stroke-linecap="square" />
                        </svg>
                        <span>Назад</span>
                    </a>

                    <a href="" class="popup__close close-popup">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L12 12" stroke="white" />
                            <path d="M12 1L1 12" stroke="white" />
                        </svg>
                    </a>
                    <h1 class="delivery-content__title">Доставка и возврат</h1>

                    <div class="delivery-content__wrapper">
                        <div class="delivery-content__subtitle">1. Покупка</div>
                        <div class="delivery-content__text">Цены на Товары, размещенные в Интернет-магазине на сайте указывается
                            в рублях Российской Федерации.</div>
                        <div class="delivery-content__text">Оплата стоимости товара и доставки осуществляется Покупателем в
                            рублях Российской Федерации при помощи одного из способов, указанных в форме заказа.</div>
                        <div class="delivery-content__text">Общая стоимость Заказа формируется на основании стоимости всех
                            заказанных Товаров, включая стоимость доставки Заказа.</div>
                        <div class="delivery-content__text">С момента размещения Покупателем Заказа, цена на Товар изменению не
                            подлежит.</div>
                        <div class="delivery-content__text">Пункт самовывоза в г. Москва: ул. Новодмитровская дом 1, строение 6.
                        </div>
                    </div>

                    <div class="delivery-content__wrapper">
                        <div class="delivery-content__subtitle">2. Доставка</div>
                        <div class="delivery-content__text">По Москве и в населенные пункты Московской области в пределах МКАД
                            осуществляется нашими курьерами. Стоимость доставки – 450 руб., при сумме заказа от 15 000 рублей –
                            бесплатно.</div> <br>
                        <div class="delivery-content__text">В населенные пункты Московской области, расположенные от МКАД, а
                            также другие города и страны СНГ доставка осуществляется с помощью компании СДЭК. Стоимость доставки
                            насчитывается по факту оформления заказа согласно тарифам транспортной компании. Обращаем Ваше
                            внимание, что доставка для регионов, где отсутствует услуга «Наложенный платеж», осуществляется
                            только при полной предоплате.</div>
                    </div>

                    <div class="delivery-content__wrapper">
                        <div class="delivery-content__subtitle">3. Примерка</div>
                        <div class="delivery-content__text">В Москве Вы можете примерить вещи из вашего заказа в момент доставки
                            курьером и оплатить только те товары, которые вам подошли. При полном отказе от заказа оплачивается
                            только стоимость доставки. </div> <br>
                        <div class="delivery-content__text">Доставка в населенные пункты Московской области, а также другие
                            города и страны СНГ услугу «Примерка» не предусматривает. </div>
                    </div>

                    <div class="delivery-content__wrapper">
                        <div class="delivery-content__subtitle">4. Возврат</div>
                        <div class="delivery-content__text">Возврат товара, сохранившего свой первоначальный вид, фабричные
                            ярлыки, пломбы и т. д., может быть совершен в течение 14 календарных дней после его доставки.
                            Необходимо будет заполнить бланк возврата, приложив к нему чек или скриншот заказа из почты -
                            документ подтверждающий покупку в нашем магазине. Возврат денежных средств осуществляется в течение
                            10 рабочих дней. В случае, если Вы захотите поменять товар на другой, нужно будет произвести возврат
                            ранее купленного артикула и обменять его на новый. Возврат можно осуществить по адресу: г. Москва,
                            ул. Новодмитровская д. 1, стр. 6. Возврат из регионов осуществляется собственными силами, покупатель
                            оформляет доставку до магазина в Москве с заполненным бланком возврата. Бланк возврата можно так же,
                            прислать на почту shop.daniillandar@gmail.com, указав номер заказа и номер накладной отправленной
                            посылки.</div>
                    </div>
                </div>
            </div>
        </div>

        <div id="table-3" class="popup">
            <div class="popup__body">
                <div class="popup__content table-content">
                    <a href="#product-3" class="popup__back popup-link">
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.5 7L1.5 9L3.5 11" stroke="white" stroke-miterlimit="10" stroke-linecap="square" />
                            <path d="M2 9H14.5V13" stroke="white" stroke-miterlimit="10" stroke-linecap="square" />
                        </svg>
                        <span>Назад</span>
                    </a>

                    <a href="" class="popup__close close-popup">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L12 12" stroke="white" />
                            <path d="M12 1L1 12" stroke="white" />
                        </svg>
                    </a>
                    <h1 class="table-content__title">Толстовки мужские</h1>
                    <div class="table-content__table size-table">
                        <div class="size-table__column">
                            <div class="size-table__title">Российский размер</div>
                            <div class="size-table__text">46</div>
                            <div class="size-table__text">48</div>
                            <div class="size-table__text">50</div>
                            <div class="size-table__text">52</div>
                            <div class="size-table__text">54</div>
                            <div class="size-table__text">56</div>
                            <div class="size-table__text">58</div>
                            <div class="size-table__text">60</div>
                        </div>

                        <div class="size-table__column">
                            <div class="size-table__title">Обхват груди, в см</div>
                            <div class="size-table__text">92</div>
                            <div class="size-table__text">96</div>
                            <div class="size-table__text">100</div>
                            <div class="size-table__text">104</div>
                            <div class="size-table__text">108</div>
                            <div class="size-table__text">112</div>
                            <div class="size-table__text">116</div>
                            <div class="size-table__text">120</div>
                        </div>

                        <div class="size-table__column">
                            <div class="size-table__title">Обхват талии, в см</div>
                            <div class="size-table__text">80</div>
                            <div class="size-table__text">84</div>
                            <div class="size-table__text">88</div>
                            <div class="size-table__text">92</div>
                            <div class="size-table__text">96</div>
                            <div class="size-table__text">100</div>
                            <div class="size-table__text">104</div>
                            <div class="size-table__text">108</div>
                        </div>

                        <div class="size-table__column">
                            <div class="size-table__title">Обхват бедер, в см</div>
                            <div class="size-table__text">92</div>
                            <div class="size-table__text">96</div>
                            <div class="size-table__text">100</div>
                            <div class="size-table__text">104</div>
                            <div class="size-table__text">108</div>
                            <div class="size-table__text">112</div>
                            <div class="size-table__text">116</div>
                            <div class="size-table__text">120</div>
                        </div>

                        <div class="size-table__column">
                            <div class="size-table__title">Размер производителя</div>
                            <div class="size-table__text">S</div>
                            <div class="size-table__text">M</div>
                            <div class="size-table__text">L</div>
                            <div class="size-table__text">XL</div>
                            <div class="size-table__text">2XL</div>
                            <div class="size-table__text">3XL</div>
                            <div class="size-table__text">4XL</div>
                            <div class="size-table__text">5XL</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="delivery-3" class="popup">
            <div class="popup__body">
                <div class="popup__content delivery-content">
                    <a href="#product-3" class="popup__back popup-link">
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.5 7L1.5 9L3.5 11" stroke="white" stroke-miterlimit="10" stroke-linecap="square" />
                            <path d="M2 9H14.5V13" stroke="white" stroke-miterlimit="10" stroke-linecap="square" />
                        </svg>
                        <span>Назад</span>
                    </a>

                    <a href="" class="popup__close close-popup">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L12 12" stroke="white" />
                            <path d="M12 1L1 12" stroke="white" />
                        </svg>
                    </a>
                    <h1 class="delivery-content__title">Доставка и возврат</h1>

                    <div class="delivery-content__wrapper">
                        <div class="delivery-content__subtitle">1. Покупка</div>
                        <div class="delivery-content__text">Цены на Товары, размещенные в Интернет-магазине на сайте указывается
                            в рублях Российской Федерации.</div>
                        <div class="delivery-content__text">Оплата стоимости товара и доставки осуществляется Покупателем в
                            рублях Российской Федерации при помощи одного из способов, указанных в форме заказа.</div>
                        <div class="delivery-content__text">Общая стоимость Заказа формируется на основании стоимости всех
                            заказанных Товаров, включая стоимость доставки Заказа.</div>
                        <div class="delivery-content__text">С момента размещения Покупателем Заказа, цена на Товар изменению не
                            подлежит.</div>
                        <div class="delivery-content__text">Пункт самовывоза в г. Москва: ул. Новодмитровская дом 1, строение 6.
                        </div>
                    </div>

                    <div class="delivery-content__wrapper">
                        <div class="delivery-content__subtitle">2. Доставка</div>
                        <div class="delivery-content__text">По Москве и в населенные пункты Московской области в пределах МКАД
                            осуществляется нашими курьерами. Стоимость доставки – 450 руб., при сумме заказа от 15 000 рублей –
                            бесплатно.</div> <br>
                        <div class="delivery-content__text">В населенные пункты Московской области, расположенные от МКАД, а
                            также другие города и страны СНГ доставка осуществляется с помощью компании СДЭК. Стоимость доставки
                            насчитывается по факту оформления заказа согласно тарифам транспортной компании. Обращаем Ваше
                            внимание, что доставка для регионов, где отсутствует услуга «Наложенный платеж», осуществляется
                            только при полной предоплате.</div>
                    </div>

                    <div class="delivery-content__wrapper">
                        <div class="delivery-content__subtitle">3. Примерка</div>
                        <div class="delivery-content__text">В Москве Вы можете примерить вещи из вашего заказа в момент доставки
                            курьером и оплатить только те товары, которые вам подошли. При полном отказе от заказа оплачивается
                            только стоимость доставки. </div> <br>
                        <div class="delivery-content__text">Доставка в населенные пункты Московской области, а также другие
                            города и страны СНГ услугу «Примерка» не предусматривает. </div>
                    </div>

                    <div class="delivery-content__wrapper">
                        <div class="delivery-content__subtitle">4. Возврат</div>
                        <div class="delivery-content__text">Возврат товара, сохранившего свой первоначальный вид, фабричные
                            ярлыки, пломбы и т. д., может быть совершен в течение 14 календарных дней после его доставки.
                            Необходимо будет заполнить бланк возврата, приложив к нему чек или скриншот заказа из почты -
                            документ подтверждающий покупку в нашем магазине. Возврат денежных средств осуществляется в течение
                            10 рабочих дней. В случае, если Вы захотите поменять товар на другой, нужно будет произвести возврат
                            ранее купленного артикула и обменять его на новый. Возврат можно осуществить по адресу: г. Москва,
                            ул. Новодмитровская д. 1, стр. 6. Возврат из регионов осуществляется собственными силами, покупатель
                            оформляет доставку до магазина в Москве с заполненным бланком возврата. Бланк возврата можно так же,
                            прислать на почту shop.daniillandar@gmail.com, указав номер заказа и номер накладной отправленной
                            посылки.</div>
                    </div>
                </div>
            </div>
        </div>

        <div id="policy" class="popup">
            <div class="popup__body">
                <div class="popup__content">
                    <a href="" class="popup__close close-popup">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L12 12" stroke="white" />
                            <path d="M12 1L1 12" stroke="white" />
                        </svg>
                    </a>

                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ex odio incidunt, quia molestias ab velit optio!
                    Blanditiis tenetur, enim assumenda facere vero dolorem explicabo? Sunt exercitationem optio omnis, nesciunt,
                    porro vitae sit, eligendi aut veritatis velit quidem hic quis possimus necessitatibus cupiditate. Officia
                    ipsam amet facilis sit blanditiis quis praesentium. Dolor, quaerat maiores est error eius accusantium,
                    placeat quas eos sit dignissimos porro magni, in architecto illo amet reiciendis soluta quod magnam qui
                    expedita. Assumenda natus libero omnis officia dolorem ut error expedita accusantium ratione quidem sit nam
                    temporibus, soluta fugit quia explicabo et facilis sed consequatur delectus dolores? Blanditiis ducimus
                    velit laboriosam assumenda! Amet officiis quam repudiandae incidunt exercitationem ullam assumenda nobis
                    illum, eius nihil adipisci consectetur corrupti excepturi iure qui fugit commodi quae distinctio, quibusdam
                    voluptas vitae porro ad repellendus voluptatum? Libero praesentium sed reprehenderit magnam harum,
                    accusantium alias, assumenda dolor voluptates, totam non molestias esse voluptate. Distinctio nisi maxime
                    voluptates! Dignissimos, harum optio. Accusamus in dicta voluptatibus minima porro praesentium nihil labore
                    ab ipsam. Culpa quod illum distinctio facilis quae maiores eum corporis dicta est vero voluptate debitis, et
                    recusandae tenetur ullam rerum repudiandae, adipisci quia quidem? Dolorum error laboriosam eaque quasi
                    voluptates aliquam, necessitatibus, odit dignissimos sint minus id impedit reiciendis, reprehenderit
                    voluptatibus aut esse molestiae exercitationem amet! Laudantium excepturi recusandae ipsa veniam temporibus
                    molestiae neque, at distinctio perferendis sunt dignissimos rem repellat iusto sequi sapiente quasi, rerum
                    ipsam numquam inventore eos alias nemo, facere repellendus consequuntur. Amet minima assumenda inventore
                    nihil perspiciatis consequuntur animi molestiae! Tenetur eveniet beatae quos, nemo nobis ex officiis eius
                    molestiae nisi numquam, sapiente, exercitationem praesentium? Officia, itaque laborum. A voluptate, harum
                    asperiores quia doloremque quo expedita pariatur architecto mollitia quis aspernatur minus qui impedit eius
                    obcaecati magni ut aperiam repellat veniam exercitationem recusandae. Ipsum sed deserunt inventore
                    accusantium omnis, nemo quia fugit sint possimus exercitationem totam doloremque quos ipsam tempora,
                    quibusdam impedit sit? Ducimus animi illo voluptatem praesentium quibusdam dolorem, possimus voluptates,
                    nobis fugiat repudiandae dolorum fuga harum ratione nam nostrum vel quia nulla quasi beatae. Nulla,
                    reiciendis temporibus? Soluta, dolores suscipit vero repudiandae provident obcaecati laborum, esse itaque
                    eos, ad tempore error mollitia sapiente iste porro voluptates culpa? Ut magnam accusantium est saepe quo
                    blanditiis fuga enim nesciunt sunt! Quisquam eligendi, itaque harum voluptas sed sapiente natus autem amet
                    tempore earum assumenda ipsum modi obcaecati neque minima suscipit sit praesentium rerum provident vero? Id,
                    corrupti fugit. Iusto quas placeat eos hic possimus impedit alias inventore obcaecati! Temporibus, et esse
                    neque perferendis, veritatis officiis itaque modi sunt assumenda doloribus a, eos beatae necessitatibus
                    officia? Voluptas sequi iusto atque vero expedita distinctio? Officiis quasi totam, eius voluptas optio
                    distinctio quam vero, hic labore officia molestiae debitis sint quidem, asperiores et tenetur voluptatem.
                    Magnam molestias quos architecto expedita sunt aliquam blanditiis accusamus. Provident totam fuga quibusdam
                    quis nam, ullam voluptas non, repellat dicta unde illum voluptatem voluptate quos optio distinctio mollitia
                    voluptatibus iusto maiores tempore explicabo soluta veniam maxime! Provident cupiditate odit ea
                    exercitationem, delectus numquam eos, alias nesciunt non facilis nemo.
                </div>
            </div>
        </div>

        <div id="request" class="popup">
            <div class="popup__body">
                <div class="popup__content request-content">
                    <a href="" class="popup__close close-popup">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L12 12" stroke="white" />
                            <path d="M12 1L1 12" stroke="white" />
                        </svg>
                    </a>

                    <h1 class="request-content__title title">Заполните заявку</h1>
                    <div class="request-content__text">Рост спортсмена важен для подбора длины рукава. Он должен доходить до
                        кисти. И тут тоже имеет значение масса тела. На накачанного человека одежда сядет иначе, чем на
                        худощавого.</div>


                    <form class="request-content__form" action="mail.php">
                        <!-- Hidden Required Fields -->
                        <input type="hidden" name="project_name" value="Gurza">
                        <input type="hidden" name="admin_email" value="seregagl1996@gmail.com">
                        <input type="hidden" name="form_subject" value="Заявка с сайта Gurza">
                        <input type="hidden" name="whatever" value="whatever" id="whatever">
                        <!-- END Hidden Required Fields -->

                        <div class="mail__row">
                            <div class="input-wrapper">
                                <input type="text" name="name" id="request-content__name" class="input-wrapper__text" placeholder="Имя" required>
                            </div>

                            <div class="input-wrapper">
                                <input type="text" name="phone" id="request-content__phone" class="input-wrapper__text mask-phone" placeholder="Телефон" required>
                            </div>

                            <div class="input-wrapper">
                                <input type="email" name="email" id="request-content__email" class="input-wrapper__text" placeholder="Почта" required>
                            </div>
                        </div>

                        <div class="mail__row">
                            <div class="input-wrapper input-wrapper--textarea">
                                <textarea name="text" placeholder="Комментарий" class="input-wrapper__text input-wrapper__textarea"></textarea>
                            </div>

                            <div class="input-wrapper input-wrapper--button">
                                <button class="mail__button button button-bg" type="submit">Отправить</button>
                            </div>
                        </div>

                        <div class="mail__policy">Я принимаю условия <a class="accent popup-link" href="#policy">пользовательского соглашения</a> и согласен на обработку персональных данных
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="thanks" class="popup">
            <div class="popup__body">
                <div class="popup__content thanks-content">
                    <a href="" class="popup__close close-popup">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L12 12" stroke="white" />
                            <path d="M12 1L1 12" stroke="white" />
                        </svg>
                    </a>
                    <div class="thanks-content__wrapper">
                        <h1 class="thanks-content__title title">Спасибо, <br> ваша заявка принята!</h1>
                        <div class="thanks-content__text">Мы свяжемся с вами в ближайшее время</div>
                        <div class="thanks-content__social social-thanks">
                            <div class="social-thanks__title">Следите за нами в социальных сетях:</div>
                            <div class="thanks-content__social-items social">
                                <div class="social__item"><a href="">
                                        <svg width="36" height="37" viewBox="0 0 36 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M27.9398 6.05176H8.65254C4.86841 6.05176 1.80078 9.17872 1.80078 13.036V22.8641C1.80078 26.7214 4.86841 29.8484 8.65254 29.8484H27.9398C31.7239 29.8484 34.7915 26.7214 34.7915 22.8641V13.036C34.7915 9.17872 31.7239 6.05176 27.9398 6.05176ZM23.306 18.4282L14.2847 22.814C14.0443 22.9309 13.7667 22.7523 13.7667 22.4808V13.4351C13.7667 13.1598 14.0516 12.9813 14.2925 13.1058L23.3138 17.7657C23.582 17.9043 23.5774 18.2963 23.306 18.4282Z" fill="white" />
                                        </svg>
                                    </a></div>
                                <div class="social__item"><a href="">
                                        <svg width="37" height="22" viewBox="0 0 37 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M36.8038 19.4011C36.759 19.3071 36.7172 19.2292 36.6784 19.1668C36.0365 18.0418 34.8097 16.6611 32.9989 15.0241L32.9607 14.9866L32.9415 14.9682L32.9221 14.9494H32.9027C32.0809 14.1871 31.5604 13.6746 31.3425 13.4122C30.9437 12.9123 30.8544 12.4063 31.0723 11.8937C31.2263 11.5063 31.8047 10.6883 32.8061 9.43855C33.3329 8.7762 33.7501 8.24535 34.0582 7.84541C36.2802 4.97123 37.2435 3.1346 36.948 2.33478L36.8332 2.14787C36.7561 2.03535 36.557 1.93241 36.2363 1.83853C35.9149 1.74484 35.504 1.72935 35.003 1.79178L29.455 1.82907C29.3652 1.79809 29.2368 1.80097 29.0696 1.83853C28.9026 1.87608 28.8191 1.89492 28.8191 1.89492L28.7225 1.94186L28.6459 1.99825C28.5817 2.03554 28.511 2.10113 28.4339 2.19488C28.3572 2.2883 28.293 2.39793 28.2417 2.52287C27.6377 4.03486 26.9509 5.44063 26.1802 6.74012C25.705 7.51499 25.2685 8.18653 24.87 8.75512C24.472 9.32353 24.138 9.74231 23.8685 10.0108C23.5986 10.2795 23.3551 10.4947 23.1363 10.6573C22.9179 10.82 22.7512 10.8888 22.6357 10.8636C22.52 10.8385 22.411 10.8135 22.3079 10.7886C22.1282 10.6761 21.9836 10.523 21.8747 10.3294C21.7652 10.1357 21.6915 9.89193 21.653 9.59827C21.6147 9.30442 21.592 9.05167 21.5855 8.83916C21.5795 8.62691 21.5823 8.32669 21.5953 7.93935C21.6087 7.55182 21.6147 7.28961 21.6147 7.15214C21.6147 6.67722 21.6242 6.1618 21.6433 5.60574C21.6627 5.04968 21.6785 4.6091 21.6916 4.28453C21.7047 3.95962 21.7108 3.61588 21.7108 3.25349C21.7108 2.8911 21.6881 2.6069 21.6433 2.40062C21.599 2.19461 21.5311 1.99464 21.4416 1.80078C21.3515 1.60711 21.2196 1.45729 21.0466 1.35094C20.8733 1.24472 20.6578 1.16042 20.4013 1.09779C19.7206 0.947913 18.8537 0.866834 17.8004 0.854229C15.4117 0.829282 13.8769 0.979359 13.1962 1.30426C12.9265 1.44154 12.6825 1.6291 12.4643 1.86636C12.233 2.14137 12.2008 2.29145 12.3677 2.31613C13.1384 2.42846 13.684 2.69717 14.0051 3.12199L14.1208 3.34711C14.2108 3.50953 14.3007 3.79707 14.3907 4.20936C14.4805 4.62164 14.5384 5.07772 14.5639 5.57732C14.628 6.48966 14.628 7.27064 14.5639 7.92031C14.4996 8.57025 14.4389 9.07622 14.3809 9.43861C14.323 9.801 14.2363 10.0947 14.1208 10.3195C14.0051 10.5444 13.9281 10.6819 13.8895 10.7318C13.851 10.7817 13.8189 10.8131 13.7934 10.8255C13.6264 10.8877 13.4528 10.9194 13.2732 10.9194C13.0932 10.9194 12.875 10.8318 12.6182 10.6568C12.3614 10.4818 12.095 10.2414 11.8188 9.93519C11.5426 9.62893 11.2312 9.20096 10.8843 8.6512C10.5377 8.10144 10.1781 7.4517 9.8056 6.70197L9.49744 6.15826C9.3048 5.80847 9.04165 5.29916 8.70772 4.63077C8.37359 3.96212 8.07826 3.31533 7.82152 2.69054C7.71889 2.42813 7.56471 2.22836 7.35926 2.09089L7.26284 2.03449C7.19874 1.9846 7.09584 1.93162 6.95468 1.87516C6.81332 1.81876 6.66583 1.77832 6.51158 1.75344L1.23316 1.79073C0.693768 1.79073 0.327789 1.90963 0.135083 2.14708L0.0579602 2.25941C0.0194325 2.32198 0 2.4219 0 2.55943C0 2.69691 0.0385277 2.86563 0.11565 3.0654C0.886204 4.82746 1.72416 6.52682 2.62953 8.16375C3.5349 9.80067 4.32164 11.1193 4.9893 12.1183C5.65709 13.1181 6.33777 14.0617 7.03133 14.9487C7.7249 15.8359 8.18399 16.4045 8.40861 16.6543C8.6335 16.9046 8.81015 17.0917 8.93855 17.2166L9.42025 17.6664C9.72847 17.9663 10.1811 18.3256 10.7783 18.7441C11.3756 19.1629 12.037 19.5752 12.7626 19.9816C13.4883 20.3874 14.3326 20.7185 15.296 20.9746C16.2591 21.231 17.1966 21.3339 18.1085 21.2842H20.324C20.7733 21.2465 21.1137 21.109 21.3451 20.8718L21.4217 20.7778C21.4733 20.7032 21.5215 20.5874 21.566 20.4314C21.6111 20.2753 21.6335 20.1032 21.6335 19.916C21.6204 19.3788 21.6624 18.8946 21.7585 18.4636C21.8545 18.0326 21.9639 17.7077 22.0863 17.4889C22.2087 17.2703 22.3467 17.0858 22.5004 16.9363C22.6543 16.7864 22.764 16.6956 22.8284 16.6644C22.8924 16.6329 22.9435 16.6116 22.982 16.5988C23.2902 16.4989 23.653 16.5956 24.0707 16.8895C24.4882 17.1832 24.8798 17.5458 25.246 17.9767C25.6121 18.408 26.0519 18.8919 26.5655 19.4292C27.0794 19.9666 27.5288 20.3661 27.9139 20.6289L28.2991 20.8538C28.5563 21.0038 28.8902 21.1413 29.3013 21.2663C29.7116 21.3911 30.0711 21.4224 30.3798 21.3599L35.3112 21.2851C35.799 21.2851 36.1786 21.2065 36.4478 21.0506C36.7175 20.8944 36.8778 20.7223 36.9295 20.5352C36.981 20.3478 36.9838 20.1352 36.9393 19.8976C36.8936 19.6605 36.8486 19.4947 36.8038 19.4011Z" fill="white" />
                                        </svg>
                                    </a></div>
                                <div class="social__item"><a href="">
                                        <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M27.0058 3.32845L23.0414 3.32227C18.5874 3.32227 15.7091 6.19556 15.7091 10.6427V14.018H11.723C11.3785 14.018 11.0996 14.2897 11.0996 14.6248V19.5151C11.0996 19.8503 11.3789 20.1217 11.723 20.1217H15.7091V32.4615C15.7091 32.7966 15.988 33.068 16.3325 33.068H21.5332C21.8776 33.068 22.1565 32.7963 22.1565 32.4615V20.1217H26.8172C27.1617 20.1217 27.4406 19.8503 27.4406 19.5151L27.4425 14.6248C27.4425 14.4639 27.3767 14.3098 27.2599 14.1959C27.1432 14.082 26.9842 14.018 26.8188 14.018H22.1565V11.1567C22.1565 9.78152 22.4934 9.08339 24.3345 9.08339L27.0052 9.08246C27.3493 9.08246 27.6282 8.81076 27.6282 8.47593V3.93499C27.6282 3.60047 27.3496 3.32907 27.0058 3.32845Z" fill="white" />
                                        </svg>
                                    </a></div>
                                <div class="social__item"><a href="">
                                        <svg width="36" height="37" viewBox="0 0 36 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22.7591 18.6184C22.7591 21.2667 20.6128 23.4134 17.9645 23.4134C15.317 23.4134 13.17 21.2667 13.17 18.6184C13.17 15.9705 15.317 13.8239 17.9645 13.8239C20.6128 13.8239 22.7591 15.9705 22.7591 18.6184Z" fill="white" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M31.5896 9.21411C32.0168 10.3461 32.2429 11.5432 32.2593 12.7523C32.3474 14.2733 32.3482 14.7707 32.3513 18.6215V18.6742C32.3513 22.5749 32.331 23.0618 32.2624 24.5976C32.2382 25.7935 32.0129 26.9719 31.5935 28.0894C31.2232 29.0436 30.658 29.9106 29.9337 30.6344C29.2103 31.3583 28.3433 31.9231 27.3891 32.2934C26.2719 32.7128 25.0916 32.9389 23.8988 32.9623C22.3739 33.052 21.8742 33.052 17.9754 33.052C14.0767 33.052 13.5894 33.0309 12.052 32.9623C10.8569 32.9229 9.67737 32.6801 8.56333 32.2439C7.60909 31.8744 6.7414 31.3099 6.01793 30.5861C5.29368 29.8626 4.72847 28.9961 4.35816 28.0415C3.93796 26.9223 3.71265 25.744 3.68926 24.5496C3.59961 23.0236 3.59961 22.5254 3.59961 18.6262C3.59961 14.7274 3.62066 14.2406 3.68926 12.7028C3.71187 11.5104 3.93796 10.3305 4.35816 9.21411C4.72769 8.25949 5.29212 7.39257 6.01637 6.66871C6.73984 5.94486 7.60754 5.38004 8.56177 5.0105C9.67815 4.59108 10.8585 4.36461 12.0505 4.33966C13.5754 4.25195 14.0751 4.25195 17.9739 4.25195C20.4125 4.25195 21.5164 4.25936 22.3771 4.28197C22.8924 4.29522 23.3204 4.31393 23.8957 4.33966C25.0885 4.36422 26.2688 4.59108 27.386 5.0105C27.7641 5.15707 28.129 5.33443 28.4767 5.54024C29.0052 5.85325 29.494 6.23253 29.9314 6.6691C30.3001 7.03786 30.6276 7.44364 30.909 7.87904C31.1795 8.29886 31.408 8.74596 31.5896 9.21411ZM10.5833 18.6184C10.5833 22.6961 13.8864 25.9997 17.9645 25.9997C19.9221 25.9997 21.7994 25.222 23.184 23.8375C24.5677 22.4533 25.3458 20.576 25.3458 18.6184C25.3458 16.6609 24.5677 14.7832 23.184 13.399C21.7994 12.0148 19.9221 11.2372 17.9645 11.2372C13.8864 11.2372 10.5833 14.5407 10.5833 18.6184ZM23.9183 10.9643C23.9183 11.9158 24.6862 12.6853 25.6397 12.6853C26.5892 12.6853 27.3587 11.9158 27.3587 10.9643C27.3587 10.7382 27.3143 10.5145 27.2277 10.3059C27.1412 10.097 27.0149 9.90757 26.8551 9.74775C26.6953 9.58793 26.5058 9.46124 26.2969 9.37471C26.088 9.28817 25.8642 9.24374 25.6389 9.24374C25.4128 9.24374 25.1891 9.28817 24.9802 9.37471C24.7712 9.46124 24.5818 9.58793 24.422 9.74775C24.2621 9.90757 24.1358 10.097 24.0493 10.3059C23.9628 10.5145 23.9183 10.7382 23.9183 10.9643Z" fill="white" />
                                        </svg>
                                    </a></div>
                            </div>
                        </div>
                        <a href="#thanks" class="popup-link"></a>
                    </div>
                    <div class="thanks-content__aim shop__aim aim first-screen__absolute">
                        <div class="aim__first">
                            <div class="aim__second"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>