<?php namespace App\Http\Controllers;

require_once "thai-dic/src/WordBreaker.php";
use Illuminate\Http\Request;
use App\Http\Requests;
use Image;
use PhlongTaIam\WordBreaker as WordBreaker;
class SiteController extends Controller
{

    var $word1 = '';
    var $word2 = '';

    public function __construct()
    {
        header_remove('x-powered-by');
        header_remove('server');
        header("X-Content-Type-Options: nosniff");
        $this->middleware('guest');
    }

    public function index(Request $request)
    {
        if(env('APP_ENV' )){
            return view('sites/index');
        }else{
            if ($request->server('HTTP_X_FORWARDED_PROTO') == 'http') {
                return redirect('https://www.bbnetworkgroup.com');
            }else{
                return view('sites/index');
            }
        }

    }

    public function activity()
    {
        return view('sites/activity');
    }

    public function howtoplay(){
        return view('sites/how-to-play');
    }

    public function tc(){
        return view('sites/tc');
    }

    public function termsofuse(){
        return view('sites/terms-of-use');
    }

    public function uploadResult(Request $request)
    {
        $baseURL = env('URL_PD','https://www.bbnetworkgroup.com');
        $frameno = $request->frame;
        $text = $request->text;
        $text = trim(strip_tags($text));
        $text = $text.' ';
        $img = $request->image;
        $img = preg_replace('#data:image/[^;]+;base64,#', '', $img);
        $img = str_replace(' ', '+', $img);
        $file = base64_decode($img);
        $imageFolderName = time().'1'.rand(0,99999);
        mkdir('./assets/uploads/' . $imageFolderName);
        $filePath = './assets/uploads/' . $imageFolderName;
        $file1 = '';
        $wordBreaker = new WordBreaker("thai-dic/data/tdict-std.txt");
        $countWord = count($wordBreaker->breakIntoWords($text));
        $num1 = 0;
        $randstatus = rand(0,3);
        $randimg = rand(1,6);
        $wordar = array();
        foreach ($wordBreaker->breakIntoWords($text) as $in => $w) {
            $omg1 = $this->word2 . '' . $w;
            $len = $this->getStrLenTH($omg1);
            if ($len > 20) {
                if (($in + 1) == $countWord) {
                    $wordar[] = $this->word2;
                    $wordar[] = $w;
                } else {
                    $wordar[] = $this->word2;
                    $this->word2 = $w;
                    $num1++;
                }
            } else {
                if (($in + 1) == $countWord) {
                    $wordar[] = $omg1;
                } else {
                    $this->word2 = $omg1;
                }
            }
        }
    if($frameno == 1){
         $num = 10;
    }elseif($frameno == 2){
        $num = 10;
    }elseif($frameno == 3){
        $num = 11;
    }elseif($frameno == 4){
        $num = 10;
    }else{
        $num = 10;
    }
        for ($i = 1; $i <= $num; $i++) {
            $bg = Image::canvas(600, 600, '#5dc5d8');
            $photo = Image::make($file);
            $photo->resize(600,600);
            $frame = Image::make('assets/img/frame/f'.$frameno.'/'.$i.'.png');
            $frame->resize(600,600);
            $bg->insert($photo,'top-left', 0, 0);
            $bg->insert($frame,'top-left', 0, 0);
            foreach($wordar as $key => $wordin){
                if($key == 0){
                    $bg->text($wordin, 300, 355, function($font) {
                        $font->file('./assets/css/fonts/KittithadaLight45.ttf');
                        $font->size(70);
                        $font->color('#FFFFFF');
                        $font->align('center');
                        $font->valign('top');
                    });
                }elseif($key == 1){
                    $bg->text($wordin, 300, 418, function($font) {
                        $font->file('./assets/css/fonts/KittithadaLight45.ttf');
                        $font->size(70);
                        $font->color('#FFFFFF');
                        $font->align('center');
                        $font->valign('top');
                    });
                }else{
                    $bg->text($wordin, 300, 481, function($font) {
                        $font->file('./assets/css/fonts/KittithadaLight45.ttf');
                        $font->size(70);
                        $font->color('#FFFFFF');
                        $font->align('center');
                        $font->valign('top');
                    });
                }
            }
            if($i == 10){
                if($randstatus == 3){
                    $bg->save('./assets/uploads/img/'.$randimg.'.png',100);
                }
            }
            $bg->save($filePath.'/'.$i.'.png',30);
            $file1 .= 'assets/uploads/' . $imageFolderName . '/'.$i.'.png ';
        }
        $file2 = "assets/uploads/$imageFolderName/mom.gif";
        exec("convert -delay 0.01 -loop 0 $file1 $file2");
        for ($i = 1; $i <= 10; $i++) {
            unlink($filePath.'/'.$i.'.png');
        }
        $results['filename'] = $file2;
        $results['fullpath'] = $baseURL.'/'.$file2;
        $results['pathname'] = $imageFolderName;
        $results['status'] = 'Upload successfully';
        echo json_encode($results);

    }

    // Get string length for Character Thai
    private function getStrLenTH($string)
    {
        $textSmallArrayray = $this->getMBStrSplit($string);
        $count = 0;
        foreach ($textSmallArrayray as $value) {
            $ascii = ord(iconv("UTF-8", "TIS-620", $value));
            if (!($ascii == 209 || ($ascii >= 212 && $ascii <= 218) || ($ascii >= 231 && $ascii <= 238))) {
                $count += 1;
            }
        }
        return $count;
    }

    // Convert a string to an array with multibyte string
    private function getMBStrSplit($string, $split_length = 1)
    {
        mb_internal_encoding('UTF-8');
        mb_regex_encoding('UTF-8');
        $split_length = ($split_length <= 0) ? 1 : $split_length;
        $mb_strlen = mb_strlen($string, 'utf-8');
        $textSmallArrayray = array();
        $i = 0;
        while ($i < $mb_strlen) {
            $textSmallArrayray[] = mb_substr($string, $i, $split_length);
            $i = $i + $split_length;
        }
        return $textSmallArrayray;
    }
}