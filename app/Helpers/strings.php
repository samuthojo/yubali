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
 * Return the date string
 */
if (!function_exists('nice_date')) {

	function nice_date($value) {
  	return ($value) ? \Carbon\Carbon::parse($value)->format('l: jS F, Y') : null;
	}

}