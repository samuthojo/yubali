<?php

/**
 * Check if value isset and not empty
 */
if (!function_exists('is_set')) {

	function is_set($value = null) {
		return isset($value) && !empty($value);
	}

}
 
/**
 * Return fullName
 */
if (!function_exists('fullName')) {

  function fullName($fname, $mname, $lname) {
          if(is_set($fname) && is_set($mname) && is_set($lname)) {
      return $fname . " " . $mname . " " . $lname;
    }
          else if(is_set($fname) && is_set($lname)) {
                  return $fname . " " . $lname;
          }
    return '';
  }

}

/**
 * Return service category
 */
if (!function_exists('service_category')) {

  function service_category($cat) {
    if (is_set($cat)) {
      if ($cat === 'church_service') {
      	return 'Church Service';
      } 
			return ucfirst($cat);
    }
    return '';
  }

}

/**
 * Return salvation status
 */
if (!function_exists('salvation_status')) {

  function salvation_status($status) {
    if (is_set($status)) {
      if ($status === 'not_saved') {
      	return 'Not Saved';
      } 
			return ucfirst($status);
    }
    return '';
  }

}

/**
 * Return the date string
 */
if (!function_exists('nice_date')) {

	function nice_date($value) {
  	return ($value) ? \Carbon\Carbon::parse($value)->format('jS F, Y') : null;
	}

}

/**
 * Return the time string
 */
if (!function_exists('nice_time')) {

	function nice_time($value) {
  	return ($value) ? \Carbon\Carbon::parse($value)->format('h:i A') : null;
	}

}

/**
 * Return the age string
 */
if (!function_exists('age')) {

	function age($birthdate) {
		if($birthdate) {
			$date = new DateTime($birthdate);
			$now = new DateTime();
			$interval = $now->diff($date);
			return $interval->y;
		}
		return null;
	}

}