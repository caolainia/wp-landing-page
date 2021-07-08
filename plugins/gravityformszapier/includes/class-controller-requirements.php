<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'GFForms' ) ) {
	die();
}

if ( ! class_exists( 'GF_REST_Controller' ) ) {
	( new GFWebAPI() )->init_v2();
}

class GF_REST_Requirements_Controller extends GF_REST_Controller {

	/**
	 * @since 4.0
	 *
	 * @var string
	 */
	public $rest_base = 'zapier-requirements';

	/**
	 * Register the routes for the objects of the controller.
	 *
	 * @since 4.0
	 */
	public function register_routes() {

		$namespace = $this->namespace;

		$base = $this->rest_base;

		register_rest_route( $namespace, '/' . $base, array(
			array(
				'methods'  => WP_REST_Server::READABLE,
				'callback' => array( $this, 'get_items' ),
				'permission_callback' => array( $this, 'get_item_permissions_check' ),
			),
		) );
	}

	/**
	 * Returns the Zapier app requirements for this version of the Zapier Add-On.
	 *
	 * @since 4.0
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 *
	 * @return WP_Error|WP_REST_Response
	 */
	public function get_items( $request ) {

		$response = array(
			'zapier-version' => GF_ZAPIER_TARGET_ZAPIER_APP_VERSION,
		);

		return new WP_REST_Response( $response, 200 );
	}

	/**
	 * Set the requirements for getting the sample entry for a form.
	 *
	 * @since 4.0
	 *
	 * @param WP_REST_Request $request The full data for the request.
	 *
	 * @return bool|WP_Error
	 */
	public function get_item_permissions_check( $request ) {

		$capability = 'gravityforms_edit_forms';

		return $this->current_user_can_any( $capability, $request );
	}
}
