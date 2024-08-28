<?php
    return [
        'typePoint' => [
            1 => [
                'type' => 1,
                'name' => 'Điểm được thưởng khi tạo tài khoản',
                // mặc định 100
            ],
            2 => [
                'type' => 2,
                'name' => 'Điểm thưởng hệ thống',
                // số phằn trăm giá trị đơn hàng khi các con mua
                // 20 lớp
            ],
            3 =>  [
                'type' => 3,
                'name' => 'Điểm thưởng tiêu dùng',
                // điểm cộng từ sơ đồ 7 lớp
            ],
            4 =>  [
                'type' => 4,
                'name' => 'Nạp từ thành viên',
            ],
            5 =>  [
                'type' => 5,
                'name' => 'Rút tiền',
            ],
            6 =>  [
                'type' => 6,
                'name' => 'Mua sản phẩm',
            ],
            7 =>  [
                'type' => 7,
                'name' => 'Hoàn điểm',
            ],
            8 =>  [
                'type' => 8,
                'name' => 'Điểm được bắn từ admin',
            ],
            'defaultPoint' => 100,
            'pointReward' => 10,
        ],
        'rose' => [
            1 => [
                'row' => 1,
                'percent' => 8,
            ],
            2 => [
                'row' => 2,
                'percent' => 5,
            ],
            3 => [
                'row' => 3,
                'percent' => 3,
            ],
            4 => [
                'row' => 4,
                'percent' => 2,
            ],
            5 => [
                'row' => 5,
                'percent' => 1,
            ],
            6 => [
                'row' => 6,
                'percent' => 1,
            ],
            7 => [
                'row' => 7,
                'percent' => 1,
            ],
            8 => [
                'row' => 8,
                'percent' => 1,
            ],
            9 => [
                'row' => 9,
                'percent' => 1,
            ],
            10 => [
                'row' => 11,
                'percent' => 1,
            ],
            11 => [
                'row' => 11,
                'percent' => 0.5,
            ],
            12 => [
                'row' => 12,
                'percent' => 0.5,
            ],
            13 => [
                'row' => 13,
                'percent' => 0.5,
            ],
            14 => [
                'row' => 14,
                'percent' => 0.5,
            ],
            15 => [
                'row' => 15,
                'percent' => 0.5,
            ],
            16 => [
                'row' => 16,
                'percent' => 0.5,
            ],
            17 => [
                'row' => 17,
                'percent' => 0.5,
            ],
            18 => [
                'row' => 18,
                'percent' => 0.5,
            ],
            19 => [
                'row' => 19,
                'percent' => 0.5,
            ],
            20 => [
                'row' => 20,
                'percent' => 0.5,
            ],
        ],

        // trạng thái pay
        'typePay' => [
            1 => [
                'type' => 1,
                'name' => 'Đang chờ xử lý',

            ],
            2 => [
                'type' => 2,
                'name' => 'Đã rút thành công',
            ],
            3 =>  [
                'type' => 3,
                'name' => 'Rút không thành công. Đã hoàn điểm lại',
            ],
        ],
        'typeStore' => [
            1 => [
                'type' => 1,
                'name' => 'Nhập kho',

            ],
            2 => [
                'type' => 2,
                'name' => 'Đã đặt hàng đang chờ xuất kho',
            ],
            3 =>  [
                'type' => 3,
                'name' => 'Xuất kho',
            ],
        ],
        // thời gian mở cổng rút điểm
        'datePay'=>[
            'start'=>1,
            'end'=>30
        ],
        // số điểm bắn mắc định
        'transferPointDefault'=>10,
        // đơn vị của điểm
        'pointUnit'=>'Điểm',
        'pointToMoney'=>1000,
        'namePointDefault'=>"Phạm Văn Hưng",
    ];
?>
