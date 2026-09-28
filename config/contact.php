<?php

return [
    'inquiry_recipients' => array_values(array_filter(array_map(
        'trim',
        explode(',', env('CONTACT_INQUIRY_RECIPIENTS', 'creativewaff@gmail.com,bryanwaff5@gmail.com')),
    ))),
];
