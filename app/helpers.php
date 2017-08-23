<?php

/**
 * Global helpers file with misc functions
 */



if (! function_exists('includeRouteFiles')) {

	/**
	 * Loops through a folder and requires all PHP files
	 * Searches sub-directories as well
	 * @param $folder
	 */
	function includeRouteFiles($folder)
	{
		$directory =  $folder;
		$handle = opendir($directory);
		$directory_list = [$directory];

		while (false !== ($filename = readdir($handle))) {
			if($filename != "." && $filename != ".." && is_dir($directory.$filename))
				array_push($directory_list, $directory.$filename."/");
		}

		foreach ($directory_list as $directory) {
			foreach (glob($directory."*.php") as $filename) {
				require($filename);
			}
		}
	}
}

if (! function_exists('app_name')) {

    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well
     * @param $folder
     */
    function app_name()
    {
        return 'app';
    }
}

if (! function_exists('auth_user')) {

    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well
     * @param $folder
     */
    function auth_user()
    {
        $user =  Auth::user();
        if(empty($user)){

            throw new Exception('用户未登录');
        }
        return $user;
    }
}