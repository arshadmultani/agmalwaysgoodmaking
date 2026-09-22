<?php

return [
    'number' => file_exists(base_path('version.txt'))
        ? trim(file_get_contents(base_path('version.txt')))
        : '0.000',
];
