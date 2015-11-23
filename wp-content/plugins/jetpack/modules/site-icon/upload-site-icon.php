<<<<<<< HEAD
<?php 
=======
<?php
>>>>>>> develop


/**
 * Uploading a site_icon is a 3 step process
<<<<<<< HEAD
 * 
 * 1. Select the file to upload 
 * 2. Crop the file
 * 3. Confirmation page 
=======
 *
 * 1. Select the file to upload
 * 2. Crop the file
 * 3. Confirmation page
>>>>>>> develop
 */
$step = ( isset( $_REQUEST['step'] ) ? $_REQUEST['step'] : 1 );
$nonce = ( isset( $_REQUEST[ '_nonce' ] ) ? $_REQUEST[ '_nonce' ] : false );

if( ! wp_verify_nonce( $nonce , 'update-site_icon-' . $step ) && $step > 1 ) {
<<<<<<< HEAD
	
=======

>>>>>>> develop
	echo esc_html__( 'You are not supposed to be here!', 'jetpack' );
	return;
}
switch( $step ){
	case '1':
		Jetpack_Site_Icon::select_page();
	break;

	case '2':
		Jetpack_Site_Icon::crop_page();
	break;

	case '3':
		Jetpack_Site_Icon::all_done_page();
	break;
<<<<<<< HEAD
}
=======
}
>>>>>>> develop
