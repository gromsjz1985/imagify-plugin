<?php
defined( 'ABSPATH' ) || die( 'Cheatin’ uh?' );

$settings = Imagify_Settings::get_instance();
?>
<div>
	<h3 class="imagify-options-subtitle"><?php _e( 'Webp format', 'imagify' ); ?></h3>

	<div class="imagify-setting-line">
		<?php
		$settings->field_checkbox( [
			'option_name' => 'convert_to_webp',
			'label'       => __( 'Convert images to webp format', 'imagify' ),
			'attributes'  => [
				'aria-describedby' => 'describe-convert_to_webp',
			],
		] );
		?>

		<div class="imagify-options-line">
			<?php
			$settings->field_checkbox( [
				'option_name' => 'display_webp',
				'label'       => __( 'Display images in webp format on the site', 'imagify' ),
				'attributes'  => [
					'aria-describedby' => 'describe-convert_to_webp',
				],
			] );
			?>

			<div class="imagify-options-line">
				<?php
				$settings->field_radio_list( [
					'option_name' => 'display_webp_method',
					'values'      => [
						'picture' => __( 'Use &lt;picture&gt; tags', 'imagify' ),
						'rewrite' => __( 'Use rewrite rules', 'imagify' ),
					],
					'attributes'  => [
						'aria-describedby' => 'describe-convert_to_webp',
					],
				] );
				?>
			</div>
		</div>

		<div id="describe-convert_to_webp" class="imagify-info">
			<span class="dashicons dashicons-info"></span>
			<?php
			printf(
				/* translators: 1 and 2 are HTML tag names, 3 is a <strong> tag opening, 4 is the <strong> tag closing. */
				esc_html__( 'The first option replaces the %1$s tags by %2$s tags. %3$sThis is the prefered solution but some themes may break%4$s, so make sure to verify that all seems fine.', 'imagify' ),
				'<code>&lt;img&gt;</code>',
				'<code>&lt;picture&gt;</code>',
				'<strong>',
				'</strong>'
			);

			echo '<br/>';

			$conf_file_path = \Imagify\Webp\Display::get_instance()->get_file_path( true );

			if ( $conf_file_path ) {
				printf(
					/* translators: 1 is a file name, 2 is a <strong> tag opening, 3 is the <strong> tag closing. */
					esc_html__( 'The second option adds rewrite rules to your site’s configuration file (%1$s) and does not alter your pages code. %2$sThis does not work with CDN though.%3$s', 'imagify' ),
					'<code>' . esc_html( $conf_file_path ) . '</code>',
					'<strong>',
					'</strong>'
				);

				echo '<br/>';
			}

			/**
			 * Add more information about webp.
			 *
			 * @since  1.9
			 * @author Grégory Viguier
			 */
			do_action( 'imagify_settings_webp_info' );
			?>
		</div>
	</div>
</div>
<?php