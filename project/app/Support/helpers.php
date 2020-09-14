<?php

use App\Support\Flash;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Support\MoneyHelper;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

if (!function_exists('current_user')) {
	function current_user()
	{
		return auth()->user();
	}
}

if (!function_exists('in_production')) {
	function in_production()
	{
		$actualEnv = app()->environment();
		return (Str::startsWith($actualEnv, 'prod'));
	}
}

if (!function_exists('get_common_message_translate')) {
	function get_common_message_translate($key)
	{
		$path = "flash.common.{$key}";
		$translated = __($path);
		if ($path === $translated) {
			return $key;
		}
		return $translated;
	}
}

if (!function_exists('find_message')) {
	function find_message($key, $default = null)
	{
		$separated_key = $key;
		if (!is_array($separated_key)) {
			$exploded = explode('.', $separated_key);
			$separated_key = [];
			$separated_key['domain'] = head($exploded);
			$separated_key['message_path'] = implode('.', array_slice($exploded, 1));
		}

		$message_path = implode('.', Arr::flatten($separated_key));
		$message_path = "flash.{$message_path}";

		$translated = __($message_path);

		if ($translated === $message_path) {
			if ($default != null) {
				return $default;
			}
			$common = get_common_message_translate($separated_key['message_path']);
			if ($common === $separated_key['message_path']) {
				return $message_path;
			}
			return $common;
		}

		return $translated;
	}
}

if (!function_exists('_m')) {
	function _m($key, $default = null)
	{
		return find_message($key, $default);
	}
}

if (!function_exists('has_error')) {
	function has_error($field, $output = null)
	{
		$errors = Session::get('errors');
		if (empty($errors)) {
			return '';
		}

		$output = ($output != null) ? $output : 'has-danger';
		return $errors->has($field) ? $output : '';
	}
}

if (!function_exists('has_error_class')) {
	function has_error_class($field)
	{
		$errors = Session::get('errors');
		if (empty($errors)) {
			return '';
		}

		return $errors->has($field) ? 'form-control-danger' : '';
	}
}

if (!function_exists('is_current_route')) {
	function is_current_route($routeName, $strict = false)
	{
		$routeNamePrefix = implode('.', explode('.', $routeName, -1));
		$routeComparePrefix = implode('.', explode('.', Route::currentRouteName(), -1));

		$hasSamePrefix = ($routeComparePrefix !== '' && $routeComparePrefix === $routeNamePrefix);
		$isActualRoute = ($routeName === Route::currentRouteName());

		if ($strict) {
			return $isActualRoute;
		}

		return ($hasSamePrefix || $isActualRoute);
	}
}

if (!function_exists('is_active')) {
	function is_active($routeName, $output = 'active', $strict = false)
	{
		return (is_current_route($routeName, $strict)) ? $output : '';
	}
}

if (!function_exists('is_active_route')) {
	function is_active_route(array $routes, $output = 'active')
	{
		$currentRouteName = Route::currentRouteName();
		$isActive = in_array($currentRouteName, $routes);
		return ($isActive) ? $output : '';
	}
}

if (!function_exists('selected')) {
	function selected($value, $compared)
	{
		return $value == $compared ? 'selected' : '';
	}
}

if (!function_exists('money')) {
	function money($value, $moneyFormat = 'BRL')
	{
		return MoneyHelper::money($value, $moneyFormat);
	}
}

if (!function_exists('remove_mask_money')) {
	function remove_mask_money($value, $fromMoneyFormat = 'BRL')
	{
		return MoneyHelper::removeMaskMoney($value, $fromMoneyFormat);
	}
}

if (!function_exists('flash')) {
	function flash()
	{
		return new Flash();
	}
}

if (!function_exists('is_valid_url')) {
    function is_valid_url($url)
    {
        return (bool)filter_var($url, FILTER_VALIDATE_URL);
    }
}

function format_date($date, $format = null, $from_format = null)
{
    if ($date == null) {
        return null;
    }

    if ($format == null) {
        $format = __('dates.php.dateTimeFormat');
    }

    if ($date instanceof \Carbon\Carbon) {
        return $date->format($format);
    }

    if ($from_format != null) {
        $date = \Carbon\Carbon::createFromFormat($from_format, $date);
    } else {
        $date = \Carbon\Carbon::parse($date);
    }

    return $date->format($format);
}
