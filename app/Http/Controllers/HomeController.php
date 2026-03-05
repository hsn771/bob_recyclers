<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Circular;
use App\Models\Career;
use App\Models\AboutUs;
use App\Models\Sister;
use App\Models\Page;
use App\Models\Video;
use App\Models\Ship;
use App\Models\Text;
use App\Models\Mission;
use App\Models\History;
use App\Models\BuyerLogo;
use App\Models\TrackRecord;
use App\Models\SisterLogo;
use App\Models\CompanyInfo;
use App\Models\Chairman;
use App\Models\Overview;
use App\Models\Moderation;
use App\Models\Management;
use App\Models\TopManagement;
use App\Models\MidManagement;
use App\Models\YardManagement;
use App\Models\Carousel;
use App\Models\Project;
use App\Models\FrontMenu;
use App\Models\SisterConcern;
use Exception;
use Toastr;

class HomeController extends Controller
{
    /* get daynamic page */
    public function page($slug)
    {
        $sister= SisterLogo::all();
        $info = CompanyInfo::first();
        $page_data= Page::where('page_slug',$slug)->where('published',1)->first();
        return view('frontend.page.index',compact('page_data','info','sister'));
    }

    //  public function menu()
    // {
    //     $menus = FrontMenu::orderBy('rank')->get();
    //     return view('frontend.home', compact('menus'));
    // }

    public function index()
    {
        $chairman = Chairman::first();
        $about= AboutUs::first();
        $ship= Ship::latest()->take(4)->get();
        $carousel= Carousel::all();
        $buyerLogos= BuyerLogo::all();
        $card = TrackRecord::first();
        $sister= SisterLogo::all();
        $info = CompanyInfo::first();
        return view('frontend.home', compact('info','sister','card','buyerLogos','carousel','ship','about','chairman'));
    }


    public function sister()
    {
        $text= Text::first();
        $sis=Sister::first();
        $buyerLogos= BuyerLogo::all();
        $card = TrackRecord::first();
        $sisC= SisterConcern::all();
        $info = CompanyInfo::first();
        $sister = SisterLogo::all();
        return view('frontend.sister-concern.sister', compact('info','sister','sisC','card','buyerLogos','sis','text'));
    }

    public function management()
    {
        $chairman = Chairman::first();
        $management= Management::first();
        $sister= SisterLogo::all();
        $info = CompanyInfo::first();
        $topM = TopManagement::all();
        $midM = MidManagement::all();
        $yardM = YardManagement::all();
        return view('frontend.management.management', compact('topM', 'midM', 'yardM', 'info', 'sister', 'management', 'chairman'));
    }

    public function trackRecord()
    {
        $projects= Project::paginate(15);
        $sister= SisterLogo::all();
        $info = CompanyInfo::first();
        $card= TrackRecord::first();
        return view('frontend.track-record.track', compact('card','info','sister','projects'));
    }

     public function overview()
    {
        $sister= SisterLogo::all();
        $info = CompanyInfo::first();
        $over = Overview::first();
        return view('frontend.overview.overview', compact('over','info','sister'));
    }

     public function moderation()
    {
        $sister= SisterLogo::all();
        $info = CompanyInfo::first();
        $moderation = Moderation::first();
        return view('frontend.moderation.moderation', compact('moderation','info','sister'));
    }

      public function chairman()
    {
        $sister= SisterLogo::all();
        $info = CompanyInfo::first();
        $chairman = Chairman::first();
        return view('frontend.chairman.chairman', compact('chairman','info','sister'));
    }

     public function about()
    {
        $text= Text::first();
        $history= History::first();
        $mission= Mission::first();
        $buyerLogos= BuyerLogo::all();
        $card = TrackRecord::first();
        $sister= SisterLogo::all();
        $info = CompanyInfo::first();
        $about = AboutUs::first();
        return view('frontend.about.about', compact('about','info','sister','card','buyerLogos','mission','history','text'));
    }

    public function contact()
    {
        $sister= SisterLogo::all();
        $info = CompanyInfo::first();
        return view('frontend.contact.contact', compact('info','sister'));
    }

     public function career()
    {   
        $circular= Circular::all();
        $sister= SisterLogo::all();
        $info = CompanyInfo::first();
        return view('frontend.career.career', compact('info','sister','circular'));
    }

      public function applyJob($id)
    {   
        $circular= Circular::findOrFail(encryptor('decrypt', $id));
        $sister= SisterLogo::all();
        $info = CompanyInfo::first();
        return view('frontend.career.apply', compact('info','sister','circular'));
    }

     public function video()
    {
        $info = CompanyInfo::first();
        $sister= SisterLogo::all();
        $videos = Video::paginate(15); 
        return view('frontend.gallery.video', compact('videos','info','sister'));
    }

}


