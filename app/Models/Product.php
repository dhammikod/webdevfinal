<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $products = [
        [
            'id' => 0,
            'imgsrc' => 'mooneyes.jpg',
            'name' => 'Mooneyes Volkspod with Boxer Engine',
            'desc' => '(1:18 scale) VW Fender bike with Boxer R60 engine',
            'modalId' => 'mooneyes',
            'reviews' => [
                [
                    'name' => 'Anthony Gondokusumo',
                    'reviews' => 'Gila keren bang, stylenya estetik banget',
                    'time' => '4:20 pm',
                    'score' => 4.65
                ],
                [
                    'name' => 'Bayu Tri',
                    'reviews' => 'WOW',
                    'time' => '2:45 pm',
                    'score' => 4.95
                ],
                [
                    'name' => 'gading K',
                    'reviews' => 'Edyan',
                    'time' => '11:22 pm',
                    'score' => 3.95
                ]
            ]
        ],
        [
            'id' => 1,
            'imgsrc' => 'garuda.jpg',
            'name' => 'GARUDA',
            'desc' => "(1:18 scale) tampil pada 'Mandalika Custom Show' November 2021",
            'modalId' => 'garuda',
            'reviews' => [
                [
                    'name' => 'Toropriant',
                    'reviews' => 'Sedappp',
                    'time' => '5:20 pm',
                    'score' => 4.55
                ],
                [
                    'name' => 'razorcombbicycles',
                    'reviews' => 'like komen share subkrek give away motor kastem nih wkwk',
                    'time' => '3:15 pm',
                    'score' => 4.9
                ],
                [
                    'name' => 'cak_cun',
                    'reviews' => 'Setiker mau Boss',
                    'time' => '4:00 pm',
                    'score' => 4.15
                ]
            ]
        ],
        [
            'id' => 2,
            'imgsrc' => 'gareng.jpg',
            'name' => 'GARENG',
            'desc' => "(1:18 scale) tampil pada 'Mandalika Custom Show' November 2021",
            'modalId' => 'gareng',
            'reviews' => [
                [
                    'name' => 'tommy_sunu',
                    'reviews' => 'bengkele gawe penginn',
                    'time' => '5:25 pm',
                    'score' => 5
                ],
                [
                    'name' => 'yofanhalim',
                    'reviews' => 'Kereeeennn',
                    'time' => '8:12 pm',
                    'score' => 4.25
                ],
                [
                    'name' => 'belo645',
                    'reviews' => 'Kerrreeenn Mase',
                    'time' => '7:35 pm',
                    'score' => 3.95
                ]
            ]
        ],
        [
            'id' => 3,
            'imgsrc' => 'yamaha.JPG',
            'name' => 'Yamaha XT500 Norev',
            'desc' => "(1:18 scale) Black and Yellow Colorway",
            'modalId' => 'yamaha',
            'reviews' => [
                [
                    'name' => 'omarannas',
                    'reviews' => 'Keren sekali ini mas',
                    'time' => '2:01 pm',
                    'score' => 4.95
                ],
                [
                    'name' => 'garasi mini project',
                    'reviews' => 'Aku selalu suka! T.O.P. S.E.L.A.L.U',
                    'time' => '8:45 pm',
                    'score' => 4.12
                ],
                [
                    'name' => 'flameink_go',
                    'reviews' => 'Jiga rangka asli euy',
                    'time' => '12:45 pm',
                    'score' => 4.28
                ]
            ]
        ],
        [
            'id' => 4,
            'imgsrc' => 'speedy.jpg',
            'name' => 'Speedy Trinity',
            'desc' => "(1:18 scale) Blue and Red American Stylez",
            'modalId' => 'speedy',
            'reviews' => [
                [
                    'name' => 'toropriant',
                    'reviews' => 'Mewah Shocknya Om Que',
                    'time' => '5:29 pm',
                    'score' => 2.95
                ],
                [
                    'name' => 'ta1ma2o',
                    'reviews' => 'cool!',
                    'time' => '9:40 pm',
                    'score' => 4.55
                ],
                [
                    'name' => 'oclinkbengal',
                    'reviews' => 'Semua maenannya mencekam mas \m/',
                    'time' => '1:45 am',
                    'score' => 4.95
                ]
            ]
        ],
        [
            'id' => 5,
            'imgsrc' => 'norton.jpg',
            'name' => 'Norton Manx Solido',
            'desc' => "(1:18 scale) Silver Colorway w/ live suspension",
            'modalId' => 'norton',
            'reviews' => [
                [
                    'name' => 'dwiprasetya',
                    'reviews' => 'Ngeri perdetail an dunyawi!!!',
                    'time' => '1:15 pm',
                    'score' => 4.65
                ],
                [
                    'name' => 'fvkri_warehouse',
                    'reviews' => 'Mevvah',
                    'time' => '12:00 pm',
                    'score' => 3.95
                ],
                [
                    'name' => 'wibiesimulya',
                    'reviews' => 'lhaaaa iki',
                    'time' => '1:23 pm',
                    'score' => 4.56
                ]
            ]
        ],
    ];

    public static function index() {
        return self::$products;
    }
}
