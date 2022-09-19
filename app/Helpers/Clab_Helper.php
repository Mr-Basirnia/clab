<?php

namespace MrBasirnia\App\Helpers;

class Clab_Helper {


	/**
	 * It defines a constant if it is not already defined.
	 *
	 * @param string $cont_name cont_name The name of the constant.
	 * @param mixed $value The value of the constant.
	 *
	 * @return void The value of the constant.
	 */
	public static function define( string $cont_name, mixed $value ): void {

		if ( defined ( $cont_name ) ) {
			return;
		}
		define ( $cont_name, $value );
	}
}