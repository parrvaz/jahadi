<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    "accepted"         => ":attribute باید پذیرفته شده باشد",
    "active_url"       => "آدرس :attribute معتبر نیست",
    "after"            => ":attribute باید تاریخی بعد از :date باشد",
    "alpha"            => ":attribute باید شامل حروف الفبا باشد.",
    "alpha_dash"       => ":attribute باید شامل حروف الفبا و عدد و خظ تیره(-) باشد",
    "alpha_num"        => ":attribute باید شامل حروف الفبا و عدد باشد",
    "array"            => ":attribute باید شامل آرایه باشد",
    "before"           => ":attribute باید تاریخی قبل از :date باشد",
    "between"          => array(
        "numeric" => ":attribute باید بین :min و :max باشد",
        "file"    => ":attribute باید بین :min و :max کیلوبایت باشد",
        "string"  => ":attribute باید بین :min و :max کاراکتر باشد",
        "array"   => ":attribute باید بین :min و :max آیتم باشد",
    ),
    "boolean"          => "The :attribute field must be true or false",
    "confirmed"        => ":attribute با تاییدیه مطابقت ندارد",
    "date"             => ":attribute یک تاریخ معتبر نیست",
    "date_format"      => ":attribute با الگوی :format مطاقبت ندارد",
    "different"        => ":attribute و :other باید متفاوت باشند",
    "digits"           => ":attribute باید :digits رقم باشد",
    "digits_between"   => ":attribute باید بین :min و :max رقم باشد",
    "email"            => "فرمت :attribute معتبر نیست",
    "exists"           => ":attribute انتخاب شده، معتبر نیست",
    "image"            => ":attribute باید تصویر باشد",
    "in"               => ":attribute انتخاب شده، معتبر نیست",
    "integer"          => ":attribute باید نوع داده ای عددی (integer) باشد",
    "string"           => ":attribute باید نوع داده ای متنی (string) باشد",
    "ip"               => ":attribute باید IP آدرس معتبر باشد",
    "max"              => array(
        "numeric" => ":attribute نباید بزرگتر از :max باشد",
        "file"    => ":attribute نباید بزرگتر از :max کیلوبایت باشد",
        "string"  => ":attribute نباید بیشتر از :max کاراکتر باشد",
        "array"   => ":attribute نباید بیشتر از :max آیتم باشد",
    ),
    "mimes"            => ":attribute باید یکی از فرمت های :values باشد",
    "min"              => array(
        "numeric" => ":attribute نباید کوچکتر از :min باشد",
        "file"    => ":attribute نباید کوچکتر از :min کیلوبایت باشد",
        "string"  => ":attribute نباید کمتر از :min کاراکتر باشد",
        "array"   => ":attribute نباید کمتر از :min آیتم باشد",
    ),
    "not_in"           => ":attribute انتخاب شده، معتبر نیست",
    "numeric"          => ":attribute باید شامل عدد باشد",
    "regex"            => ":attribute یک فرمت معتبر نیست",
    "required"         => "فیلد :attribute الزامی است",
    "required_if"      => "فیلد :attribute هنگامی که :other برابر با :value است، الزامیست.",
    "required_with"    => ":attribute الزامی است زمانی که :values موجود است",
    "required_with_all"=> ":attribute الزامی است زمانی که :values موجود است",
    "required_without" => ":attribute الزامی است زمانی که :values موجود نیست",
    "required_without_all" => ":attribute الزامی است زمانی که :values موجود نیست",
    "same"             => ":attribute و :other باید مانند هم باشند",
    "size"             => array(
        "numeric" => ":attribute باید برابر با :size باشد",
        "file"    => ":attribute باید برابر با :size کیلوبایت باشد",
        "string"  => ":attribute باید برابر با :size کاراکتر باشد",
        "array"   => ":attribute باسد شامل :size آیتم باشد",
    ),
    "timezone"         => "The :attribute must be a valid zone",
    "unique"           => ":attribute قبلا انتخاب شده است",
    "url"              => "فرمت آدرس :attribute اشتباه است",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    "custom" => array(),

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    "attributes" => array(
        "name" => "نام",
        "username" => "نام کاربری",
        "email" => "پست الکترونیکی",
        "first_name" => "نام",
        "last_name" => "نام خانوادگی",
        "password" => "رمز عبور",
        "password_confirmation" => "تاییدیه ی کلمه عبور",
        "city" => "شهر",
        "country" => "کشور",
        "address" => "نشانی",
        "phone" => "تلفن",
        "mobile" => "تلفن همراه",
        "age" => "سن",
        "sex" => "جنسیت",
        "gender" => "جنسیت",
        "day" => "روز",
        "melli_code"=>"کد ملی",
        "user_type"=>"نوع کاربری",
        "attach"=>"پیوست",
        "month" => "ماه",
        "year" => "سال",
        "hour" => "ساعت",
        "minute" => "دقیقه",
        "second" => "ثانیه",
        "title" => "عنوان",
        "rent"=>"مبلغ اجاره",
        "text" => "متن",
        "content" => "محتوا",
        "description" => "توضیحات",
        "excerpt" => "گلچین کردن",
        "date" => "تاریخ",
        "time" => "زمان",
        "available" => "موجود",
        "alternative_mobile"=>"شماره تماس مالک",
        "alternative_name"=>"نام مالک",
        "size" => "اندازه",
        "body" => "متن",
        "imageUrl" => "تصویر",
        "videoUrl" => "آدرس ویدیو",
        "slug" => "نامک",
        "tags" => "تگ ها",
        "category" => "دسته",
        "details"=>"توضیحات",
        "summary"=>"خلاصه عمومی",
        "location_status"=>"وضعیت محل",
        "price"=>"ارزش مالی",
        "revenue_from"=>"حداقل درآمد",
        "revenue_to"=>"سقف درآمد",
        "fund"=>" سرمایه در گردش",
        "location"=>"محل",
        "location_details"=>"توضیحات محل",
        "development"=>"پتانسیل توسعه",
        "house_explanation"=>"شرح محل اقامت",
        "area"=>"زیر بنا",
        "subscriber"=>"ایمیل",
        "established_year"=>"سال تاسیس",
        "staff"=>"تعداد کارکنان",
        "hours_of_work"=>"ساعات کاری",
        "support_and_training"=>"پشتیبانی",
        "franchise_terms"=>"قوانین حق امتیاز",
        "reason_for_selling"=>"دلیل فروش",
        "value_of_fittings"=>"ارزش تجهیزات",
        "inventory_value"=>"ارزش سهام",
        "fittings"=>"تجهیزات",
        "home_based"=>"قابل انجام در خانه",
        "franchise"=>"حق امتیاز",
        "relocatable"=>"قابل انتقال",
        "living_house"=>"مسکن در محل کار",
        "emailUsername"=>"ایمیل یا نام کاربری",
        "iranian"=>"ملیت",
        "code"=>"کد",
        "ins_number"=>"شماره بیمه",
        "father_name"=>"نام پدر",
        "NIC"=>"شماره شناسنامه",
        "postal_code"=>"کدپستی",
        "force_status"=>"وضعیت خدمت",
        "birth_date"=>"تاریخ تولد",
        "NIC_date"=>"تاریخ صدور",
        "birth_place"=>"محل تولد",
        "birth_part"=>"محل صدور",
        "history_work"=>"سابقه کار",
        "children"=>"تعداد فرزندان",
        "is_married"=>"وضعیت تاهل",
        "is_active"=>"وضعیت پرسنل",
        "ins_type"=>"نوع بیمه",
        "ins_name"=>"نام یا شرح بیمه",
        "degree"=>"مدرک تحصیلی",
        "course"=>"رشته تحصیلی",
        "job"=>"شغل",
        "job_semat"=>"سمت شغلی",
        "job_raste"=>"رسته شغلی",
        "bank"=>"نام بانک",
        "account_number"=>"شماره حساب",
        "work_place"=>"محل خدمت",
        "work_place_status"=>"وضعیت محل خدمت",
        "employee_type"=>"نوع استخدام",
        "contract_type"=>"نوع قرارداد",
        "contract_end_date"=>"تاریخ پایان قرارداد",
        "contract_start_date"=>"تاریخ شروع قرارداد",
        "tax_moafiat"=>"وضعیت کارمند",
        "salary_data"=>"اطلاعات حقوقی",
        "boss"=>"نام کارفرما",
        "peyman_row"=>"ردیف پیمان",
        "ins_fee"=>"نرخ حق بیمه",
        "act_id"=>"نوع فعالیت",
        "boss_factor"=>"ضریب کارفرما",
        "benefit_factor"=>"معیار محاسبه مزایا",
        "tax_info"=>"اطلاعات مالیاتی",
        "workshop_id"=>"آیدی کارگاه",
        "categories"=>"دسته بندی ها",
        'vacation'=>'مرخصی',
        'mission'=>'ماموریت',
        'station'=>'ایستگاه کاری',
        'entrance_type'=>'نوع تردد',
        'personnel_code'=>'کد پرسنلی',
        'nationalID'=>'کد ملی',
        'workplace'=>'محل کار',
        'from_date'=>'تاریخ شروع',
        'to_date'=>'تاریخ پایان',
        'station_id'=>'آیدی ایستگاه کاری',
        'floating'=>'ساعت شناوری',
        'max_add_work'=>'حداکثر ساعت کاری',
        'follow_weekends'=>'تبعیت از تعطیلات',
        'shift_items'=>'آیتم های شیفت کاری',
        'radius'=>'شعاع',
        'company_name'=>'نام شرکت',
        'company_id'=>'آیدی شرکت',
        "g-recaptcha-response" => [
            "required" => "لطفا تایید که من ربات نیستم",
            "captcha" => "خطای کپچا!! لطفا دوباره تلاش کنید یا با مدیر سایت تماس بگیرید",
        ],
    ),
);
