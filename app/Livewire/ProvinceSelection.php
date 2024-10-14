<?php

namespace App\Livewire;

use Livewire\Component;

class ProvinceSelection extends Component
{
    public $provinces = [
        'آذربایجان شرقی',
        'آذربایجان غربی',
        'اردبیل',
        'اصفهان',
        'البرز',
        'ایلام',
        'بوشهر',
        'تهران',
        'چهارمحال و بختیاری',
        'خراسان جنوبی',
        'خراسان رضوی',
        'خراسان شمالی',
        'خوزستان',
        'زنجان',
        'سمنان',
        'سیستان و بلوچستان',
        'فارس',
        'قزوین',
        'قم',
        'کردستان',
        'کرمان',
        'کرمانشاه',
        'کهگیلویه و بویراحمد',
        'گلستان',
        'گیلان',
        'لرستان',
        'مازندران',
        'مرکزی',
        'هرمزگان',
        'همدان',
        'یزد'
    ];

    public $selectedProvince = null;
    public $counties = [];
    public $selectedCounty = null;

    // Array of counties for آذربایجان شرقی and آذربایجان غربی
    protected $allCounties = [
        'آذربایجان شرقی' => [
            'تبریز',
            'مراغه',
            'مرند',
            'میانه',
            'اهر',
            'سراب',
            'بناب',
            'کلیبر',
            'هشترود',
            'شبستر',
            'ملکان',
            'بستان‌آباد',
            'عجب‌شیر',
            'جلفا',
            'ورزقان',
            'اسکو',
            'آذرشهر',
            'خدا‌آفرین',
            'چاراویماق',
            'هریس',
        ],
        'آذربایجان غربی' => [
            'ارومیه',
            'خوی',
            'مهاباد',
            'سردشت',
            'پلدشت',
            'نقده',
            'اشنویه',
            'سلماس',
            'چالدران',
            'بوکان',
            'میاندوآب',
            'تکاب',
            'شاهین‌دژ',
            'سرو',
            'انزل',
            'سیلوانا',
            'آواجیق'
        ]
    ];

    public function updatedSelectedProvince($value)
    {
        // Reset the selected county if the province changes
        $this->selectedCounty = null;

        // If province is آذربایجان شرقی or آذربایجان غربی, show counties
        if (array_key_exists($value, $this->allCounties)) {
            $this->counties = $this->allCounties[$value];
        } else {
            $this->counties = [];
        }
    }

    public function render()
    {
        return view('livewire.province-selection');
    }
}
