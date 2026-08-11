<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);


        $isKm = app()->getLocale() === 'km';
        $serviceTypes = [
            [
                "id" => 1,
                "name" => "FTTH-Package",
                "name_km" => "FTTH-Package",
                "images" => asset('storage/home/serviceTypes/home.png'),
                "icon" => "fa fa-home",
                "types" => [
                    [
                        "name" => "Home-Package",
                        "services" => [
                            [
                                "id" => 1,
                                "name" => "Home-S", 
                                "bandwidth" => 10,
                                "price_month" => 16
                            ],
                            [
                                "id" => 2,
                                "name" => "Home-M",
                                "bandwidth" => 20,
                                "price_month" => 29
                            ],
                            [
                                "id" => 3,
                                "name" => "Home-L",
                                "bandwidth" => 30,
                                "price_month" => 41
                            ],
                            [
                                "id" => 1,
                                "name" => "Home-S", 
                                "bandwidth" => 10,
                                "price_month" => 16
                            ],
                            [
                                "id" => 2,
                                "name" => "Home-M",
                                "bandwidth" => 20,
                                "price_month" => 29
                            ],
                            [
                                "id" => 3,
                                "name" => "Home-L",
                                "bandwidth" => 30,
                                "price_month" => 41
                            ],
                            [
                                "id" => 1,
                                "name" => "Home-S", 
                                "bandwidth" => 10,
                                "price_month" => 16
                            ],
                            [
                                "id" => 2,
                                "name" => "Home-M",
                                "bandwidth" => 20,
                                "price_month" => 29
                            ],
                            [
                                "id" => 3,
                                "name" => "Home-L",
                                "bandwidth" => 30,
                                "price_month" => 41
                            ]
                        ],
                    ],
                    [
                        "name" => "TN-Plan",
                        "services" => [
                            [
                                "id" => 1,
                                "name" => "TN-Plan-S",
                                "bandwidth" => 10,
                                "price_month" => 16
                            ],
                            [
                                "id" => 2,
                                "name" => "TN-Plan-M",
                                "bandwidth" => 20,
                                "price_month" => 29
                            ],
                            [
                                "id" => 3,
                                "name" => "TN-Plan-L",
                                "bandwidth" => 30,
                                "price_month" => 41
                            ]
                        ],
                    ],
                ]
            ],
            [
                "id" => 2,
                "name" => "FTTB-Package",
                "name_km" => "FTTB-Package",
                "images" => asset('storage/home/serviceTypes/biz.png'),
                "icon" => "fa fa-industry",
                "types" => [
                    [
                        "name" => "Biz",
                        "services" => [
                            [
                                "id" => 4,
                                "name" => "Business-S",
                                "bandwidth" => 10,
                                "price_month" => 48
                            ],
                            [
                                "id" => 5,
                                "name" => "Business-M",
                                "bandwidth" => 20,
                                "price_month" => 96
                            ],
                            [
                                "id" => 6,
                                "name" => "Business-L",
                                "bandwidth" => 30,
                                "price_month" => 150
                            ],

                        ]
                    ],
                    [
                        "name" => "SME",
                        "services" => [
                            [
                                "id" => 4,
                                "name" => "SME-S",
                                "bandwidth" => 10,
                                "price_month" => 48
                            ],
                            [
                                "id" => 5,
                                "name" => "SME-M",
                                "bandwidth" => 20,
                                "price_month" => 96
                            ],
                            [
                                "id" => 6,
                                "name" => "SME-L",
                                "bandwidth" => 30,
                                "price_month" => 150
                            ],

                        ]
                    ],
                ]
            ],
            [
                "id" => 3,
                "name" => "FTTX-Packages",
                "name_km" => "FTTX-Packages",
                "images" => asset('storage/home/serviceTypes/dia.png'),
                "icon" => "fa fa-globe",
                "types" => [
                    [
                        "name" => "DIA",
                        "services" => [
                            [
                                "id" => 4,
                                "name" => "Dedicated-S",
                                "bandwidth" => 10,
                                "price_month" => 120
                            ],
                            [
                                "id" => 5,
                                "name" => "Dedicated-M",
                                "bandwidth" => 20,
                                "price_month" => 240
                            ],
                            [
                                "id" => 6,
                                "name" => "Dedicated-L",
                                "bandwidth" => 30,
                                "price_month" => 360
                            ],
                        ]
                    ],
                    [
                        "name" => "Dedicated-Global",
                        "services" => [
                            [
                                "id" => 4,
                                "name" => "Dedicated-Global-S",
                                "bandwidth" => 10,
                                "price_month" => 120
                            ],
                            [
                                "id" => 5,
                                "name" => "Dedicated-Global-M",
                                "bandwidth" => 20,
                                "price_month" => 240
                            ],
                            [
                                "id" => 6,
                                "name" => "Dedicated-Global-L",
                                "bandwidth" => 30,
                                "price_month" => 360
                            ],
                        ]
                    ],
                    [
                        "name" => "Dedicated-Premuim",
                        "services" => [
                            [
                                "id" => 4,
                                "name" => "Dedicated-Premuim-S",
                                "bandwidth" => 10,
                                "price_month" => 120
                            ],
                            [
                                "id" => 5,
                                "name" => "Dedicated-Premuim-M",
                                "bandwidth" => 20,
                                "price_month" => 240
                            ],
                            [
                                "id" => 6,
                                "name" => "Dedicated-Premuim-L",
                                "bandwidth" => 30,
                                "price_month" => 360
                            ],
                        ]
                    ],
                ]
            ],
        ];
    }
}
