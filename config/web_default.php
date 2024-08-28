<?php
return [
    'frontend' => [
        'noImage' => '/frontend/images/noimage.jpg',
        'userNoImage' => '/frontend/images/usernoimage.png',
    ],
    'backend' => [
        'noImage' => '/admin_asset/images/noimage.png',
        'userNoImage' => '/admin_asset/images/usernoimage.png',
    ],
    'type_slider' => [
        1 => 'Slider',
        2 => 'Banner',
    ],
    'priceSearch' => [
        1 => [
            'value' => 1,
            'start' => 0,
            'end' => 999999,
            'name' => 'Dưới 1 triệu'
        ],
        2 => [
            'value' => 2,
            'start' => 1000000,
            'end' => 3000000,
            'name' => 'Từ 1 - 3 triệu'
        ],
        3 => [
            'value' => 3,
            'start' => 3000000,
            'end' => 5000000,
            'name' => 'Từ 3 - 5 triệu'
        ],
        4 => [
            'value' => 4,
            'start' => 5000000,
            'end' => 10000000,
            'name' => 'Từ 5 - 10 triệu'
        ],
        5 => [
            'value' => 5,
            'start' => 10000000,
            'end' => 15000000,
            'name' => 'Từ 10 - 15 triệu'
        ],
        6 => [
            'value' => 6,
            'start' => 15000000,
            'end' => 20000000,
            'name' => 'Từ 15 - 20 triệu'
        ],
        7 => [
            'value' => 7,
            'start' => 20000000,
            'end' => 30000000,
            'name' => 'Từ 20 - 30 triệu'
        ],
        8 => [
            'value' => 8,
            'start' => 30000000,
            'end' => null,
            'name' => 'Trên 30 triệu'
        ],
    ],
    'httt' => [
        1 => [
            'value' => 1,
            'name' => 'Thanh toán tại cửa hàng'
        ],
        2 => [
            'value' => 2,
            'name' => 'Thanh toán qua thẻ ngân hàng'
        ],
        3 => [
            'value' => 3,
            'name' => 'COD'
        ],
    ],
    'typePrice' => [
        1 => [
            'value' => 1,
            'name' => 'VNĐ'
        ],
        //2=>[
        //    'value'=>2,
        //    'name'=>'EUR'
        //],
        //3=>[
        //    'value'=>3,
        //    'name'=>'$'
        //],

    ]
];
