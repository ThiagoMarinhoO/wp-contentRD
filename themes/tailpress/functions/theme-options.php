<?php 

function cpt_produtos() {
	register_post_type('products',
		array(
			'labels'      => array(
				'name'          => __( 'Produtos', 'textdomain' ),
				'singular_name' => __( 'Produto', 'textdomain' ),
			),
			'public'      => true,
			'has_archive' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
			'rewrite'     => array( 'slug' => 'products' ),
            'query_var' => true,
            'menu_icon' => 'dashicons-products',
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'author',
                'excerpt',
                'comments'
            ),
        )
	);
}
add_action('init', 'cpt_produtos');

function cpt_vendas() {
	register_post_type('sales',
		array(
			'labels'      => array(
				'name'          => __( 'Vendas', 'textdomain' ),
				'singular_name' => __( 'Venda', 'textdomain' ),
			),
			'public'      => true,
			'has_archive' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
			'rewrite'     => array( 'slug' => 'sales' ),
            'query_var' => true,
            'menu_icon' => 'dashicons-products',
            'supports' => array(
                // 'title',
                // 'editor',
                // 'thumbnail',
                'author',
                // 'excerpt',
            ),
        )
	);
}
add_action('init', 'cpt_vendas');

function cpt_transacoes() {
	register_post_type('transacoes',
		array(
			'labels'      => array(
				'name'          => __( 'Transações', 'textdomain' ),
				'singular_name' => __( 'Transação', 'textdomain' ),
			),
			'public'      => true,
			'has_archive' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
			'rewrite'     => array( 'slug' => 'transacoes' ),
            'query_var' => true,
            'menu_icon' => 'dashicons-products',
            'supports' => array(
                'title',
                'author',
                'comments'
            ),
        )
	);
}
add_action('init', 'cpt_transacoes');

function cpt_caixa() {
	register_post_type('caixa',
		array(
			'labels'      => array(
				'name'          => __( 'Caixa', 'textdomain' ),
				'singular_name' => __( 'Caixa', 'textdomain' ),
			),
			'public'      => true,
			'has_archive' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
			'rewrite'     => array( 'slug' => 'caixa' ),
            'query_var' => true,
            'menu_icon' => 'dashicons-products',
            'supports' => array(
                'title',
                'author',
                'comments'
            ),
        )
	);
}
add_action('init', 'cpt_caixa');

function redirecionar_admin_logado() {
    if ( is_user_logged_in() && current_user_can('manage_options') && is_page('login') ) {
        wp_redirect( '/admin-dashboard' );
        exit;
    }
}
add_action( 'template_redirect', 'redirecionar_admin_logado' );

function redirecionar_usuario_logado() {
    if ( is_user_logged_in() && ! current_user_can('manage_options') && is_page('login') ) {
        wp_redirect( '/dashboard' );
        exit;
    }
}
add_action( 'template_redirect', 'redirecionar_usuario_logado' );

add_role(
	'Vendedor',
	__( 'Vendedor' ),
	array(
		'read' => false,
		'delete_posts' => true,
		'delete_published_posts' => true,
		'edit_posts' => true,
		'publish_posts' => true,
		'upload_files' => false,
		'edit_pages' => false,
		'edit_published_pages' => false,
		'publish_pages' => false,
		'delete_published_pages' => false,
	)
);


?>