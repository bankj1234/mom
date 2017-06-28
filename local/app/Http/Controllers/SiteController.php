<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Image;

class SiteController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('sites/index');
    }

    public function activity()
    {
        return view('sites/activity');
    }

    public function howtoplay(){
        return view('sites/how-to-play');
    }

    public function termsofuse(){
        return view('sites/terms-of-use');
    }

    public function uploadResult(Request $request)
    {
        $baseURL = 'https://www.bbnetworkgroup.com/nestle/public';
        $frameno = $request->frame;
        $text = $request->text;
        $img = $request->image;
        $img = preg_replace('#data:image/[^;]+;base64,#', '', $img);
        $img = str_replace(' ', '+', $img);
        $file = base64_decode($img);
        $imageFolderName = time().'1'.rand(0,99999);
        mkdir('./assets/uploads/' . $imageFolderName);
        $filePath = './assets/uploads/' . $imageFolderName;
        $file1 = '';
        for ($i = 1; $i <= 10; $i++) {
            $photo = Image::make($file);
            $photo->resize(600,600);
            $frame = Image::make('assets/img/frame/f'.$frameno.'/'.$i.'.png');
            $frame->resize(600,600);
            $photo->insert($frame,'top-left', 0, 0);
            $photo->text($text, 300, 450, function($font) {
                $font->file('./assets/css/fonts/KittithadaLight45.ttf');
                $font->size(50);
                $font->color('#FFFFFF');
                $font->align('center');
                $font->valign('top');
            });

            $photo->save($filePath.'/'.$i.'.png',50);
            $file1 .= 'assets/uploads/' . $imageFolderName . '/'.$i.'.png ';
        }
        $file2 = "assets/uploads/$imageFolderName/mom.gif";
        exec("convert -delay 0.01 -loop 0 $file1 $file2");
        for ($i = 1; $i <= 10; $i++) {
            unlink($filePath.'/'.$i.'.png');
        }
        $results['filename'] = $file2;
        $results['fullpath'] = $baseURL.'/'.$file2;
        $results['status'] = 'Upload successfully';
        echo json_encode($results);

    }
}