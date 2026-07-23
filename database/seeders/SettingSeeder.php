<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'TELNET CO., LTD.', 'group' => 'general'],
            ['key' => 'site_tagline_km', 'value' => 'អ្នកផ្តល់សេវាអ៉ីនធឺណិត (ISP)', 'group' => 'general'],
            ['key' => 'site_tagline_en', 'value' => 'Internet Service Provider (ISP)', 'group' => 'general'],
            ['key' => 'phone_main', 'value' => '012 675 775', 'group' => 'contact'],
            ['key' => 'phone_noc', 'value' => '097 513 5135', 'group' => 'contact'],
            ['key' => 'email_main', 'value' => 'nethsokunthearak@telnet.com.kh', 'group' => 'contact'],
            ['key' => 'email_noc', 'value' => 'noc@telnet.com.kh', 'group' => 'contact'],
            ['key' => 'website', 'value' => 'www.telnet.com.kh', 'group' => 'contact'],
            ['key' => 'portal_url', 'value' => 'http://103.115.172.243:8009', 'group' => 'links'],
            ['key' => 'facebook_url', 'value' => '', 'group' => 'social'],
            ['key' => 'telegram_url', 'value' => '', 'group' => 'social'],
            ['key' => 'stat_residential', 'value' => '5,000+', 'group' => 'stats'],
            ['key' => 'stat_enterprise', 'value' => '100+', 'group' => 'stats'],
            ['key' => 'stat_pops', 'value' => '12 PoPs', 'group' => 'stats'],
            ['key' => 'stat_coverage', 'value' => '20', 'group' => 'stats'],
            ['key' => 'seo_title_km', 'value' => 'TELNET CO., LTD. - អ្នកផ្តល់សេវាអ៉ីនធឺណិត (ISP) | Internet Service Provider', 'group' => 'seo'],
            ['key' => 'seo_description_en', 'value' => 'TELNET CO., LTD provides high-speed fiber internet (FTTH, FTTB, FTTX) and ICT solutions in Cambodia.', 'group' => 'seo'],
            ['key' => 'google_maps_embed', 'value' => '', 'group' => 'map'],
        ];

        foreach ($settings as $setting) {
            Setting::firstOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
