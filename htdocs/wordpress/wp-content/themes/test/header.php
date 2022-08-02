<?php
/**
 * @package test
 * @author Yamashita <yamashita.antapp@gmail.com>
 * @subpackage test
 * @since test 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php get_template_directory_uri( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<!-- TODO:これいるのか？ -->
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<?php wp_body_open();?>

		<header id="site-header" class="header-footer-group">

			<div class="header-inner section-inner">

				<div class="header-titles">
					<?php
					// 任意のロゴ
					get_custom_logo();
					// サイトの名前
					bloginfo('name');
					// サイトの説明
					bloginfo( 'description' );
					?>
					<!-- 任意のヘッダー背景イメージ -->
					<!-- TODO:取得方法調べる -->
					<!-- <image /> -->
				</div><!-- .header-titles -->

				<!-- ナビゲーションバー -->
				<div class="header-navigation-wrapper">
					<?php
					if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) {
						?>
							<nav class="primary-menu-wrapper" aria-label="<?php echo esc_attr_x( 'Horizontal', 'menu'); ?>">
								<ul class="primary-menu reset-list-style">
								<?php
								if ( has_nav_menu( 'primary' ) ) {
									wp_nav_menu(
										array(
											'container'  => '',
											'items_wrap' => '%3$s',
											'theme_location' => 'primary',
										)
									);
								} elseif ( ! has_nav_menu( 'expanded' ) ) {
									wp_list_pages(
										array(
											'match_menu_classes' => true,
											'show_sub_menu_icons' => true,
											'title_li' => false,
											'walker'   => false, // walkerとはWPのツリー構造を持ってる抽象クラスのことらしい
										)
									);
								}
								?>
								</ul>
							</nav><!-- .primary-menu-wrapper -->
						<?php
					}
					?>
				</div><!-- .header-navigation-wrapper -->

			</div><!-- .header-inner -->
		</header><!-- #site-header -->

		<?php
		// Output the menu modal.
		get_template_part( 'template-parts/modal-menu' );
