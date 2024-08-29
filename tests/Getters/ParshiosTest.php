<?php

namespace Test\Getters;

use Zman\Zman;

class ParshiosTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function the_first_week_after_simchas_torah_is_breishis()
    {
        $this->assertEquals('Breishis', Zman::parse('10/26/16')->parsha);
        $this->assertEquals('Breishis', Zman::parse('10/27/16')->parsha);
        $this->assertEquals('Breishis', Zman::parse('10/28/16')->parsha);
        $this->assertEquals('Breishis', Zman::parse('10/29/16')->parsha);

        $this->assertEquals('בראשית', Zman::parse('10/26/16')->parshaHebrew);

        $this->assertNotEquals('Breishis', Zman::parse('10/30/16')->parsha);
    }

    /** @test */
    public function sunday_through_shabbos_all_are_part_of_the_parsha_normally()
    {
        $this->assertEquals('Noach', Zman::parse('10/30/16')->parsha);
        $this->assertEquals('Noach', Zman::parse('10/31/16')->parsha);
        $this->assertEquals('Noach', Zman::parse('11/1/16')->parsha);
        $this->assertEquals('Noach', Zman::parse('11/2/16')->parsha);
        $this->assertEquals('Noach', Zman::parse('11/3/16')->parsha);
        $this->assertEquals('Noach', Zman::parse('11/4/16')->parsha);
        $this->assertEquals('Noach', Zman::parse('11/5/16')->parsha);

        $this->assertEquals('נח', Zman::parse('10/30/16')->parshaHebrew);
    }

    /** @test */
    public function until_vayakhel_the_parshios_go_in_order_after_breishis()
    {
        $this->assertEquals('Noach', Zman::parse('10/30/16')->parsha);
        $this->assertEquals('Noach', Zman::parse('11/2/16')->parsha);

        $this->assertEquals('Lech Licha', Zman::parse('11/7/16')->parsha);
        $this->assertEquals('Lech Licha', Zman::parse('11/9/16')->parsha);

        $this->assertEquals('Shmos', Zman::parse('1/17/17')->parsha);
        $this->assertEquals('Mishpatim', Zman::parse('2/22/17')->parsha);
    }

    /** @test */
    public function during_a_regular_year_the_4_are_doubled()
    {
        $this->assertEquals('Ki Sisa', Zman::parse('3/16/17')->parsha);
        $this->assertEquals('Vayakheil - Pekudei', Zman::parse('3/23/17')->parsha);
        $this->assertEquals('Vayikra', Zman::parse('3/30/17')->parsha);
        $this->assertEquals('Tzav', Zman::parse('4/6/17')->parsha);
        $this->assertEquals('Shmini', Zman::parse('4/20/17')->parsha);
        $this->assertEquals('Tazria - Metzora', Zman::parse('4/27/17')->parsha);
        $this->assertEquals('Acharei Mos - Kedoshim', Zman::parse('5/4/17')->parsha);
        $this->assertEquals('Emor', Zman::parse('5/11/17')->parsha);
        $this->assertEquals('Behar - Bechukosai', Zman::parse('5/18/17')->parsha);
        $this->assertEquals('Bamidbar', Zman::parse('5/25/17')->parsha);
        $this->assertEquals('Naso', Zman::parse('6/1/17')->parsha);

        $this->assertEquals('כי תשא', Zman::parse('3/16/17')->parshaHebrew);
        $this->assertEquals('ויקהל - פקודי', Zman::parse('3/23/17')->parshaHebrew);
        $this->assertEquals('ויקרא', Zman::parse('3/30/17')->parshaHebrew);
        $this->assertEquals('צו', Zman::parse('4/6/17')->parshaHebrew);
        $this->assertEquals('שמיני', Zman::parse('4/20/17')->parshaHebrew);
        $this->assertEquals('תזריע - מצרע', Zman::parse('4/27/17')->parshaHebrew);
        $this->assertEquals('אחרי מות - קדושים', Zman::parse('5/4/17')->parshaHebrew);
        $this->assertEquals('אמר', Zman::parse('5/11/17')->parshaHebrew);
        $this->assertEquals('בהר - בחקתי', Zman::parse('5/18/17')->parshaHebrew);
        $this->assertEquals('במדבר', Zman::parse('5/25/17')->parshaHebrew);
        $this->assertEquals('נשא', Zman::parse('6/1/17')->parshaHebrew);
    }

    /** @test */
    public function during_a_leap_year_the_4_are_separated()
    {
        $this->assertEquals('Ki Sisa', Zman::parse('2/29/24')->parsha);
        $this->assertEquals('Vayakheil', Zman::parse('3/7/24')->parsha);
        $this->assertEquals('Pekudei', Zman::parse('3/14/24')->parsha);
        $this->assertEquals('Vayikra', Zman::parse('3/21/24')->parsha);
        $this->assertEquals('Tzav', Zman::parse('3/28/24')->parsha);
        $this->assertEquals('Shmini', Zman::parse('4/4/24')->parsha);
        $this->assertEquals('Tazria', Zman::parse('4/11/24')->parsha);
        $this->assertEquals('Metzora', Zman::parse('4/18/24')->parsha);
        $this->assertEquals('Acharei Mos', Zman::parse('5/2/24')->parsha);
        $this->assertEquals('Kedoshim', Zman::parse('5/9/24')->parsha);
        $this->assertEquals('Emor', Zman::parse('5/16/24')->parsha);
        $this->assertEquals('Behar', Zman::parse('5/23/24')->parsha);
        $this->assertEquals('Bechukosai', Zman::parse('5/30/24')->parsha);
        $this->assertEquals('Bamidbar', Zman::parse('6/6/24')->parsha);
        $this->assertEquals('Naso', Zman::parse('6/13/24')->parsha);

        $this->assertEquals('כי תשא', Zman::parse('2/29/24')->parshaHebrew);
        $this->assertEquals('ויקהל', Zman::parse('3/7/24')->parshaHebrew);
        $this->assertEquals('פקודי', Zman::parse('3/14/24')->parshaHebrew);
        $this->assertEquals('ויקרא', Zman::parse('3/21/24')->parshaHebrew);
        $this->assertEquals('צו', Zman::parse('3/28/24')->parshaHebrew);
        $this->assertEquals('שמיני', Zman::parse('4/4/24')->parshaHebrew);
        $this->assertEquals('תזריע', Zman::parse('4/11/24')->parshaHebrew);
        $this->assertEquals('מצרע', Zman::parse('4/18/24')->parshaHebrew);
        $this->assertEquals('אחרי מות', Zman::parse('5/2/24')->parshaHebrew);
        $this->assertEquals('קדושים', Zman::parse('5/9/24')->parshaHebrew);
        $this->assertEquals('אמר', Zman::parse('5/16/24')->parshaHebrew);
        $this->assertEquals('בהר', Zman::parse('5/23/24')->parshaHebrew);
        $this->assertEquals('בחקתי', Zman::parse('5/30/24')->parshaHebrew);
        $this->assertEquals('במדבר', Zman::parse('6/6/24')->parshaHebrew);
        $this->assertEquals('נשא', Zman::parse('6/13/24')->parshaHebrew);
    }

    /** @test */
    public function during_a_year_the_last_day_of_pesach_is_shabbos_we_skip_another_week_in_galus()
    {
        $this->assertEquals('Ki Sisa', Zman::parse('2/21/19')->parsha);
        $this->assertEquals('Vayakheil', Zman::parse('2/28/19')->parsha);
        $this->assertEquals('Pekudei', Zman::parse('3/7/19')->parsha);
        $this->assertEquals('Vayikra', Zman::parse('3/14/19')->parsha);
        $this->assertEquals('Tzav', Zman::parse('3/21/19')->parsha);
        $this->assertEquals('Shmini', Zman::parse('3/28/19')->parsha);
        $this->assertEquals('Tazria', Zman::parse('4/4/19')->parsha);
        $this->assertEquals('Metzora', Zman::parse('4/11/19')->parsha);
        $this->assertEquals(null, Zman::parse('4/21/19')->parsha);
        $this->assertEquals('Acharei Mos', Zman::parse('4/29/19')->parsha);
        $this->assertEquals('Acharei Mos', Zman::parse('5/2/19')->parsha);
        $this->assertEquals('Kedoshim', Zman::parse('5/9/19')->parsha);
        $this->assertEquals('Emor', Zman::parse('5/16/19')->parsha);
        $this->assertEquals('Behar', Zman::parse('5/23/19')->parsha);
        $this->assertEquals('Bechukosai', Zman::parse('5/30/19')->parsha);
        $this->assertEquals('Bamidbar', Zman::parse('6/6/19')->parsha);
        $this->assertEquals('Naso', Zman::parse('6/13/19')->parsha);
    }

    /** @test */
    public function during_a_normal_year_chukas_and_balak_are_separate()
    {
        $this->assertEquals('Korach', Zman::parse('6/24/17')->parsha);
        $this->assertEquals('Chukas', Zman::parse('7/1/17')->parsha);
        $this->assertEquals('Balak', Zman::parse('7/8/17')->parsha);
        $this->assertEquals('Pinchas', Zman::parse('7/15/17')->parsha);

        $this->assertEquals('קרח', Zman::parse('6/24/17')->parshaHebrew);
        $this->assertEquals('חקת', Zman::parse('7/1/17')->parshaHebrew);
        $this->assertEquals('בלק', Zman::parse('7/8/17')->parshaHebrew);
        $this->assertEquals('פנחס', Zman::parse('7/15/17')->parshaHebrew);
    }

    /** @test */
    public function when_shavuos_starts_on_a_friday_chukas_and_balak_are_together_in_galus()
    {
        $this->assertEquals('Bamidbar', Zman::parse('5/20/23')->parsha);
        $this->assertEquals('Naso', Zman::parse('6/3/23')->parsha);

        $this->assertEquals('Korach', Zman::parse('6/24/23')->parsha);
        $this->assertEquals('Chukas - Balak', Zman::parse('7/1/23')->parsha);
        $this->assertEquals('Pinchas', Zman::parse('7/8/23')->parsha);

        $this->assertEquals('במדבר', Zman::parse('5/20/23')->parshaHebrew);
        $this->assertEquals('נשא', Zman::parse('6/3/23')->parshaHebrew);

        $this->assertEquals('קרח', Zman::parse('6/24/23')->parshaHebrew);
        $this->assertEquals('חקת - בלק', Zman::parse('7/1/23')->parshaHebrew);
        $this->assertEquals('פנחס', Zman::parse('7/8/23')->parshaHebrew);
    }

    /** @test */
    public function even_when_shavuos_starts_on_a_friday_chukas_and_balak_are_separate_in_israel()
    {
        $this->assertEquals('Korach', Zman::parse('6/17/23')->parshaInIsrael);
        $this->assertEquals('Chukas', Zman::parse('6/24/23')->parshaInIsrael);
        $this->assertEquals('Balak', Zman::parse('7/1/23')->parshaInIsrael);
        $this->assertEquals('Pinchas', Zman::parse('7/8/23')->parshaInIsrael);

        $this->assertEquals('קרח', Zman::parse('6/17/23')->parshaInIsraelHebrew);
        $this->assertEquals('חקת', Zman::parse('6/24/23')->parshaInIsraelHebrew);
        $this->assertEquals('בלק', Zman::parse('7/1/23')->parshaInIsraelHebrew);
        $this->assertEquals('פנחס', Zman::parse('7/8/23')->parshaInIsraelHebrew);
    }

    /** @test */
    public function galus_mode_can_be_set_globally()
    {
        $date = Zman::parse('6/17/23')->setGalusMode(false);
        $this->assertEquals('Korach', $date->parsha);
        $this->assertEquals('Korach', $date->parshaInIsrael);

        $date = Zman::parse('6/17/23')->setGalusMode(true);
        $this->assertEquals('Shlach', $date->parsha);
        $this->assertEquals('Korach', $date->parshaInIsrael);
    }

    /** @test */
    public function matos_and_masei_are_read_together_usually()
    {
        $this->assertEquals('Pinchas', Zman::parse('7/13/17')->parsha);
        $this->assertEquals('Matos - Masei', Zman::parse('7/20/17')->parsha);
        $this->assertEquals('Dvarim', Zman::parse('7/27/17')->parsha);

        $this->assertEquals('פנחס', Zman::parse('7/13/17')->parshaHebrew);
        $this->assertEquals('מטות - מסעי', Zman::parse('7/20/17')->parshaHebrew);
        $this->assertEquals('דברים', Zman::parse('7/27/17')->parshaHebrew);
    }

    /** @test */
    public function matos_and_masei_are_read_together_during_a_regular_leap_year()
    {
        $this->assertEquals('Pinchas', Zman::parse('7/25/24')->parsha);
        $this->assertEquals('Matos - Masei', Zman::parse('8/1/24')->parsha);
        $this->assertEquals('Dvarim', Zman::parse('8/8/24')->parsha);

        $this->assertEquals('פנחס', Zman::parse('7/25/24')->parshaHebrew);
        $this->assertEquals('מטות - מסעי', Zman::parse('8/1/24')->parshaHebrew);
        $this->assertEquals('דברים', Zman::parse('8/8/24')->parshaHebrew);
    }

    /** @test */
    public function matos_and_masei_are_separate_if_a_leap_year_started_on_thursday()
    {
        $this->assertEquals('Pinchas', Zman::parse('7/14/11')->parsha);
        $this->assertEquals('Matos', Zman::parse('7/21/11')->parsha);
        $this->assertEquals('Masei', Zman::parse('7/28/11')->parsha);
        $this->assertEquals('Dvarim', Zman::parse('8/4/11')->parsha);

        $this->assertEquals('פנחס', Zman::parse('7/14/11')->parshaHebrew);
        $this->assertEquals('מטות', Zman::parse('7/21/11')->parshaHebrew);
        $this->assertEquals('מסעי', Zman::parse('7/28/11')->parshaHebrew);
        $this->assertEquals('דברים', Zman::parse('8/4/11')->parshaHebrew);
    }

    /** @test */
    public function matos_and_masei_are_separate_in_a_leap_year_in_israel_if_the_last_day_of_pesach_was_sabbos()
    {
        $this->assertEquals('Matos', Zman::parse('7/28/16')->parshaInIsrael);
        $this->assertEquals('Masei', Zman::parse('8/4/16')->parshaInIsrael);

        $this->assertEquals('מטות', Zman::parse('7/28/16')->parshaInIsraelHebrew);
        $this->assertEquals('מסעי', Zman::parse('8/4/16')->parshaInIsraelHebrew);
    }

    /** @test */
    public function netzavim_and_vayelech_are_usually_together()
    {
        $this->assertEquals('Nitzavim - Vayelech', Zman::parse('9/14/17')->parsha);
        $this->assertEquals('Nitzavim - Vayelech', Zman::parse('9/14/17')->parsha);

        $this->assertEquals('נצבים - וילך', Zman::parse('9/14/17')->parshaHebrew);
    }

    /** @test */
    public function netzavim_and_vayelech_are_separate_when_there_are_two_shabbosim_between_rosh_hashana_and_sukkos()
    {
        $this->assertEquals('Nitzavim', Zman::parse('9/29/16')->parsha);
        $this->assertEquals('Vayelech', Zman::parse('10/6/16')->parsha);
        $this->assertEquals('Haazinu', Zman::parse('9/21/17')->parsha);
        $this->assertEquals(null, Zman::parse('9/26/17')->parsha);
        $this->assertEquals('נצבים', Zman::parse('9/29/16')->parshaHebrew);
        $this->assertEquals('וילך', Zman::parse('10/6/16')->parshaHebrew);
        $this->assertEquals('האזינו', Zman::parse('9/21/17')->parshaHebrew);

        $this->assertEquals('Nitzavim', Zman::parse('9/25/19')->parsha);
        $this->assertEquals('Vayelech', Zman::parse('10/2/19')->parsha);
        $this->assertEquals('Haazinu', Zman::parse('10/7/19')->parsha);
        $this->assertEquals(null, Zman::parse('10/16/19')->parsha);
        $this->assertEquals('נצבים', Zman::parse('9/25/19')->parshaHebrew);
        $this->assertEquals('וילך', Zman::parse('10/2/19')->parshaHebrew);
        $this->assertEquals('האזינו', Zman::parse('10/7/19')->parshaHebrew);
    }

    /** @test */
    public function haazinu_is_after_rosh_hashana_of_the_next_year()
    {
        $this->assertEquals('Haazinu', Zman::parse('9/21/17')->parsha);

        $this->assertEquals('האזינו', Zman::parse('9/21/17')->parshaHebrew);
    }

    /** @test */
    public function yuntif_does_not_have_a_parsha()
    {
        $this->assertEquals('Tzav', Zman::parse('03/25/21')->parsha);
        $this->assertEquals(null, Zman::parse('04/02/21')->parsha);
        $this->assertEquals('Shmini', Zman::parse('04/04/21')->parsha);
    }

    /** @test */
    public function vayakheil_pekudei_in_longer_year()
    {
        $this->assertEquals('Vayakheil', Zman::parse('03/22/2025')->parsha);
        $this->assertEquals('Pekudei', Zman::parse('03/29/2025')->parsha);

        // Wikipedia says this should be Vayakheil https://en.wikipedia.org/wiki/Pekudei but
        // Acording to https://www.chabad.org/calendar/view/day.asp?tdate=3/14/2037 
        // and https://www.hebcal.com/sedrot/5797?i=off it should be together
        $this->assertEquals('Vayakheil - Pekudei', Zman::parse('03/14/2037')->parsha);
    }
}
