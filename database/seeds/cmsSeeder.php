<?php

use Illuminate\Database\Seeder;
use App\CMS;

class cmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pagearr = array('seller','realtor','investor');
        for ($i=0; $i <3 ; $i++) {
            $content = new CMS();
            $content->page = $i+1;
            $content->topheading = ' ';
            $content->topimage = 'Cover-contact.jpg';
            $content->textbelow = 'GET VALUE FOR MONEY BY INVESTING IN HOMES WHICH CAN GET A MUCH BETTER PRICE WITH SOME INVESTMENTS. INVESTOUT HELPS YOU MAXIMIZE VALUE FOR INVESTMENTS.';
            $content->headingcontent = 'The Investment';
            $content->content = 'Invest Out believes that home’s have potential value which is just as important as its current value. Each and every house has a significant amount of value which turns it into a home. Investout belives in maximising and getting value for those factors which are overlooked or due to lack of money, are not taken into account. You can bridge the gap as an investor and maximise the value of the home and take a share of the profits.';
            $content->contentimage = 'investor-about-img.jpg';
            $content->save();
        }
    }
}
