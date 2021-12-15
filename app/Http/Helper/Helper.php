<?php


use App\Models\Setting;
use Illuminate\Support\Facades\Storage;


if( !function_exists('get_setting') ){

	function get_setting( $name ){

		if(!Setting::where('type', $name)->exists()){

			return null;
			
		}

		$s = Setting::where('type', $name)->first();

		return $s->value;

	}

}


if( !function_exists('get_site_logo') ){

	function get_site_logo( ){

		$s = Setting::where('type', 'site_logo')->first();

		if($s->value == null || $s->value == ""){

			return "https://ui-avatars.com/api/?name=LaughHall&color=E50916&background=000000";
			
		}

		return  Storage::url($s->value);

	}

}


if( !function_exists('get_site_favicon') ){

	function get_site_favicon( ){

		$s = Setting::where('type', 'site_favicon')->first();

		if($s->value == null || $s->value == ""){

			return "https://ui-avatars.com/api/?name=LaughHall&color=E50916&background=000000";
			
		}

		return  Storage::url($s->value);

	}

}


if( !function_exists('get_site_background_image') ){

	function get_site_background_image( ){

		$s = Setting::where('type', 'site_background_image')->first();

		if($s->value == null || $s->value == ""){

			return "https://ui-avatars.com/api/?name=LaughHall&color=E50916&background=000000";
			
		}

		return asset('app/'.$s->value);

	}

}