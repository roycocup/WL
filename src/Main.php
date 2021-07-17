<?php

namespace Experiment;

class Main 
{
    function run()
    {
        $output = [
            'title',
            'description',
            'price',
            'discount'
        ];
        return json_encode($output);
    }
}
