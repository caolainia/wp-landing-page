<?php
if ( ! class_exists( 'GFForms' ) ) {
	die();
}

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'GF_REST_Controller' ) ) {
	( new GFWebAPI() )->init_v2();
}

class GF_REST_Sample_Entry_Controller extends GF_REST_Controller {

	/**
	 * @since 2.4
	 *
	 * @var string
	 */
	public $rest_base = 'forms/(?P<form_id>[\d]+)/sample-entry';

	/**
	 * Register the routes for the objects of the controller.
	 *
	 * @since 2.4
	 */
	public function register_routes() {

		$namespace = $this->namespace;

		$base = $this->rest_base;

		register_rest_route( $namespace, '/' . $base, array(
			array(
				'methods'  => WP_REST_Server::READABLE,
				'callback' => array( $this, 'get_sample_entry' ),
				'permission_callback' => array( $this, 'get_item_permissions_check' ),
			),
		) );
	}

	/**
	 * Get a collection of feeds for the form.
	 *
	 * @since 2.4
	 *
	 * @param WP_REST_Request $request Full data about the request.
	 *
	 * @return WP_Error|WP_REST_Response
	 */
	public function get_sample_entry( $request ) {

		$form_id = $request['form_id'];

		$form = GFAPI::get_form( $form_id );

		$sample_entry = GF_Zapier::get_instance()->get_body( null, $form );

		if ( is_wp_error( $sample_entry ) ) {
			return $sample_entry;
		}

		return new WP_REST_Response( $sample_entry, 200 );
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
