<?php

if(!function_exists('route_is')){
    function route_is($route=null){
        if(Request::routeIs($route)){
            return true;
        }else{
            return false;
        }
    }
}

if(!function_exists('route_is')){
    function route_is($routes=[]){
        foreach($routes as $route){
            if(Request::routeIs($route)){
                return true;
            }else{
                return false;
            }
        }
    }
}

if(!function_exists('notify')){
    function notify($message , $type='success'){
        return array(
            'message'=> $message,
            'alert-type' => $type,
        );
    }
}

if(!function_exists('csvToArray')){
    function csvToArray($filename = '', $delimiter = ','){
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false){
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }

}


if(!function_exists('importCsv')){
    function importCsv($file, $model){
        $modelArray = $this->csvToArray($file);
    
        for ($i = 0; $i < count($modelArray); $i ++)
        {
            $model::firstOrCreate($modelArray[$i]);
        }
        return $this->notify('csv data imported successfully');    
    }
}


if(!function_exists('is_rtl')){
    /**
     * Whether the given locale (the active one by default) is written right-to-left.
     */
    function is_rtl($locale = null){
        return in_array($locale ?: app()->getLocale(), config('app.rtl_locales', []), true);
    }
}

if(!function_exists('locale_direction')){
    /**
     * The text direction ("rtl" or "ltr") of the given locale, for the dir attribute.
     */
    function locale_direction($locale = null){
        return is_rtl($locale) ? 'rtl' : 'ltr';
    }
}
