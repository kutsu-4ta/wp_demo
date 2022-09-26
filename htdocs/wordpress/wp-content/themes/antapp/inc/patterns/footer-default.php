<?php
/**
 * Default footer
 */
return array(
	'title'      => __( 'Default footer', 'antapp' ),
	'categories' => array( 'footer' ),
	'blockTypes' => array( 'core/template-part/footer' ),
	'content'    => '<!-- wp:group {"align":"full","layout":{"inherit":true}} -->
					<div class="wp-block-group alignfull">
					<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"1rem","bottom":"1rem"}}}} -->
					    <div class="wp-block-group alignwide" style="padding-top:1rem;padding-bottom:1rem;background-color: rgba(0,63,73,0.51) !important;color: #f0f0f0;">
                            <div id="footer" class="container-fluid">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="pl-5">
                                            <div class="pt-2">
                                            <!-- wp:site-logo {"width":64} /-->
                                            ロゴ
                                            </div>
                                            <div class="pt-2">
                                            フェイスブック
                                            </div>
                                            <div class="pt-2">
                                            ツイッター
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="font-middle">
                                            <a href="/wordpress/?page_id=75">
                                            サービス紹介
                                            </a>
                                        </div>
                                        <ul style="list-style:none;">
                                            <li>
                                                <a href="/wordpress/?page_id=75/#web-develop">
                                                    HP制作
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/wordpress/?page_id=75/#system-develop">
                                                社内システム構築
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/wordpress/?page_id=75/#app-develop">
                                                アプリ開発
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/wordpress/?page_id=75/#marketing">
                                                マーケティング支援
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-3">
                                        <div class="font-middle">
                                            <a href="/wordpress/?page_id=78/">
                                            私たちについて
                                            </a>
                                        </div>
                                        <ul style="list-style:none;">
                                            <li>
                                                <a href="/wordpress/?page_id=78/">
                                                Antappのバリュー
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/wordpress/?page_id=78/">
                                                メンバー紹介
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/wordpress/?page_id=78/">
                                                今後のビジョン
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-3">
                                        <div class="font-middle">
                                            <a href="/wordpress/?page_id=106/">
                                            お役立ち資料
                                            </a>
                                        </div>
                                        <ul style="list-style:none;">
                                            <li>
                                                <a href="/wordpress/?page_id=106/">
                                                web制作
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/wordpress/?page_id=106/">
                                                マーケティング
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                    <!-- wp:paragraph {"align":"right"} -->
                            <p class="has-text-align-right">' .
        sprintf('<a href="' . esc_url( __( 'http://localhost:3000/wordpress/?page_id=3/', 'antapp' ) ) . '" rel="nofollow">プライバシーポリシー</a>'
        ) . '</p><!-- /wp:paragraph -->
                                    </div>
                                </div>
                            </div>
					    </div><!-- /wp:group -->
					</div><!-- /wp:group -->',
);
