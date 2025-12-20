<?php

namespace App\Enums;

/**
 * دول الخوادم والمناطق
 */
enum ServerCountry: string
{
    case UAE = 'ae';
    case SAUDI = 'sa';
    case KUWAIT = 'kw';
    case QATAR = 'qa';
    case BAHRAIN = 'bh';
    case OMAN = 'om';
    case EGYPT = 'eg';
    case JORDAN = 'jo';
    case LEBANON = 'lb';
    case PALESTINE = 'ps';
    case IRAQ = 'iq';
    case MOROCCO = 'ma';
    case ALGERIA = 'dz';
    case TUNISIA = 'tn';
    case USA = 'us';
    case UK = 'uk';
    case CANADA = 'ca';
    case GERMANY = 'de';
    case FRANCE = 'fr';
    case SINGAPORE = 'sg';
    case INDIA = 'in';

    /**
     * الحصول على اسم البلد بالعربية
     */
    public function label(): string
    {
        return match($this) {
            self::UAE => 'الإمارات العربية المتحدة',
            self::SAUDI => 'المملكة العربية السعودية',
            self::KUWAIT => 'الكويت',
            self::QATAR => 'قطر',
            self::BAHRAIN => 'البحرين',
            self::OMAN => 'عمان',
            self::EGYPT => 'مصر',
            self::JORDAN => 'الأردن',
            self::LEBANON => 'لبنان',
            self::PALESTINE => 'فلسطين',
            self::IRAQ => 'العراق',
            self::MOROCCO => 'المغرب',
            self::ALGERIA => 'الجزائر',
            self::TUNISIA => 'تونس',
            self::USA => 'الولايات المتحدة الأمريكية',
            self::UK => 'المملكة المتحدة',
            self::CANADA => 'كندا',
            self::GERMANY => 'ألمانيا',
            self::FRANCE => 'فرنسا',
            self::SINGAPORE => 'سنغافورة',
            self::INDIA => 'الهند',
        };
    }

    /**
     * الحصول على جميع الخيارات كمصفوفة
     */
    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn($case) => [$case->value => $case->label()])
            ->toArray();
    }
}
